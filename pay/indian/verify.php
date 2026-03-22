<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');

$config = [
    'access_key' => 'VRhQKrnQZEiiSj+TxdfS/g',
    'access_secret' => 'LoAWkS9/GE6GUuAF5TNGDA',
    'db_host' => 'localhost',
    'db_user' => 'dragonlo_71club',
    'db_pass' => 'dragonlo_71club',
    'db_name' => 'dragonlo_71club',
    'allowed_ips' => ['8.222.170.155', '47.237.14.219'] 
];

function verifyIndianPaySign($headers, $accessSecret) {
    $method = 'POST';
    $path = '/api/order/makeup';
    
    $stringToSign = strtoupper($method) . '&' . $path . '&' . 
                   $headers['accesskey'] . '&' . $headers['timestamp'] . '&' . $headers['nonce'];
    
    $expectedSign = base64_encode(hash_hmac('sha256', $stringToSign, $accessSecret, true));
    
    return $expectedSign === $headers['sign'];
}

$clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? 
            $_SERVER['HTTP_X_FORWARDED_FOR'] ?? 
            $_SERVER['REMOTE_ADDR'] ?? '';

if (!in_array($clientIP, $config['allowed_ips'])) {
    http_response_code(403);
    echo json_encode([
        'code' => 403,
        'type' => 'error',
        'message' => 'Unauthorized IP: ' . $clientIP,
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

$headers = array_change_key_case(getallheaders(), CASE_LOWER);

if (!isset($headers['accesskey'], $headers['timestamp'], $headers['nonce'], $headers['sign'])) {
    http_response_code(401);
    echo json_encode([
        'code' => 401,
        'type' => 'error',
        'message' => 'Missing required headers',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

if (!verifyIndianPaySign($headers, $config['access_secret'])) {
    http_response_code(401);
    echo json_encode([
        'code' => 401,
        'type' => 'error',
        'message' => 'Invalid signature',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE || !isset($data['OrderNo'], $data['utr'])) {
    http_response_code(400);
    echo json_encode([
        'code' => 400,
        'type' => 'error',
        'message' => 'Invalid request data',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

$conn = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'code' => 500,
        'type' => 'error',
        'message' => 'Database connection failed',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT dharavahi, sthiti FROM thevani WHERE ekikrtapavati = ?");
$stmt->bind_param('s', $data['OrderNo']);
$stmt->execute();
$stmt->bind_result($merchantOrder, $currentStatus);

if (!$stmt->fetch()) {
    $stmt->close();
    $conn->close();
    http_response_code(404);
    echo json_encode([
        'code' => 404,
        'type' => 'error',
        'message' => 'Order not found',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}
$stmt->close();

if ($currentStatus !== 1) {
    $stmt = $conn->prepare("UPDATE thevani SET sthiti = 1, ullekha = ? WHERE ekikrtapavati = ?");
    $stmt->bind_param('ss', $data['utr'], $data['OrderNo']);
    
    if ($stmt->execute()) {
        $stmt = $conn->prepare("SELECT balakedara, motta FROM thevani WHERE ekikrtapavati = ?");
        $stmt->bind_param('s', $data['OrderNo']);
        $stmt->execute();
        $stmt->bind_result($userId, $amount);
        $stmt->fetch();
        $stmt->close();
        if ($userId) {
            $stmt = $conn->prepare("UPDATE shonu_kaichila SET motta = motta + ? WHERE balakedara = ?");
            $stmt->bind_param('di', $amount, $userId);
            $stmt->execute();
            $stmt->close();
        }
    }
    $stmt->close();
}

$conn->close();

echo json_encode([
    'code' => 200,
    'type' => 'success',
    'message' => '',
    'result' => 'Successful, waiting for callback',
    'time' => date('Y-m-d H:i:s')
]);
exit;
?>