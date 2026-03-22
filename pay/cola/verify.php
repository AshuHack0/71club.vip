<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = [
    'access_key' => 'DUuwpqdFsUy1ZtmR8T8H6w',
    'access_secret' => '99qIkYFZkEaW22GOylLBMg',
    'db_host' => 'localhost',
    'db_user' => 'dragonlo_71club',
    'db_pass' => 'dragonlo_71club',
    'db_name' => 'dragonlo_71club'
];

function verifyIndianPaySign($headers, $accessSecret) {
    $method = 'POST';
    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    $accessKey = $headers['accesskey'] ?? '';
    $timestamp = $headers['timestamp'] ?? '';
    $nonce = $headers['nonce'] ?? '';
    $receivedSign = $headers['sign'] ?? '';
    
    $stringToSign = $method . '&' . $requestPath . '&' . 
                    $accessKey . '&' . $timestamp . '&' . $nonce . '&' . $accessSecret;
    $expectedSign = md5($stringToSign);
    
    return $expectedSign === $receivedSign;
}

$headers = array_change_key_case(getallheaders(), CASE_LOWER);

$allowedIPs = ['47.237.10.82', '8.219.253.212'];
$clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
if (!in_array($clientIP, $allowedIPs)) {
    error_log("IndianPay callback error: Unauthorized IP. IP: " . $clientIP);
    echo "fail";
    exit;
}

if (!verifyIndianPaySign($headers, $config['access_secret'])) {
    error_log("IndianPay callback error: Invalid signature. Headers: " . json_encode($headers));
    echo "fail";
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("IndianPay callback error: Invalid JSON data: " . $input);
    echo "fail";
    exit;
}

$requiredFields = [
    "orderno",
    "merchantorder",
    "currency",
    "amount",
    "status",
    "createtime",
    "updatetime"
];

foreach ($requiredFields as $field) {
    if (!isset($data[$field])) {
        error_log("IndianPay callback error: Missing field '{$field}'");
        echo "fail";
        exit;
    }
}

$orderNo = $data['orderno'];
$merchantOrder = $data['merchantorder'];
$amount = $data['amount'];
$status = $data['status'];
$fee = $data['fee'] ?? 0;
$proof = $data['proof'] ?? '';
$payee = $data['payee'] ?? '';
$createTime = $data['createtime'];
$updateTime = $data['updatetime'];

$conn = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    echo "fail";
    exit;
}

$stmt = $conn->prepare("SELECT sthiti, duravani FROM thevani WHERE dharavahi = ?");
$stmt->bind_param('s', $merchantOrder);
$stmt->execute();
$stmt->bind_result($currentStatus, $userPhone);

if ($stmt->fetch()) {
    if ($currentStatus === 1) {
        $stmt->close();
        $conn->close();
        echo "success";
        exit;
    }
} else {
    $stmt->close();
    $conn->close();
    echo "success"; 
    exit;
}
$stmt->close();

if ($status === 'success') {
    $stmt = $conn->prepare("SELECT balakedara FROM thevani WHERE dharavahi = ?");
    $stmt->bind_param('s', $merchantOrder);
    $stmt->execute();
    $stmt->bind_result($userId);
    $stmt->fetch();
    $stmt->close();

    if ($userId) {
        $stmt = $conn->prepare("UPDATE thevani SET sthiti = 1, ekikrtapavati = ? WHERE dharavahi = ?");
        $stmt->bind_param('ss', $proof, $merchantOrder);
        $stmt->execute();
        $stmt->close();
        
        $stmt = $conn->prepare("UPDATE shonu_kaichila SET motta = motta + ? WHERE balakedara = ?");
        $stmt->bind_param('di', $amount, $userId);
        $stmt->execute();
        $stmt->close();
    }
} else {
    $stmt = $conn->prepare("UPDATE thevani SET sthiti = 2, ekikrtapavati = ? WHERE dharavahi = ?");
    $stmt->bind_param('ss', $proof, $merchantOrder);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
echo "success";
exit;
?>