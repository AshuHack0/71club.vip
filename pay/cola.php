<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');

$config = [
    'db_host' => 'localhost',
    'db_user' => 'dragonlo_71club',
    'db_pass' => 'dragonlo_71club',
    'db_name' => 'dragonlo_71club',
    'access_key' => 'DUuwpqdFsUy1ZtmR8T8H6w',
    'access_secret' => '99qIkYFZkEaW22GOylLBMg',
    'channel_code' => '71001',
    'notify_url' => 'https://71club.vip/pay/cola/verify.php',
    'page_url' => 'https://71club.vip/#/wallet/RechargeHistory'
];

// Only ColaPay is supported in this implementation
$payTypeMap = [
    1015 => 'ColaPay'
];

function generateColaPaySign($method, $requestPath, $accessKey, $timestamp, $nonce, $accessSecret) {
    $stringToSign = strtoupper($method).'&'.$requestPath.'&'.$accessKey.'&'.$timestamp.'&'.$nonce.'&'.$accessSecret;
    return md5($stringToSign);
}

function generateOrderNo() {
    return '71CLUB'.date('YmdHis').mt_rand(1000, 9999);
}

function dbConnect($host, $user, $pass, $db) {
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die(json_encode(['status'=>'error', 'message'=>'DB connection failed: '.$conn->connect_error]));
    }
    return $conn;
}

// Validate and sanitize input parameters
$payTypeID = isset($_GET['tyid']) ? (int)$_GET['tyid'] : 0;
$amount = isset($_GET['amount']) ? (float)$_GET['amount'] : 0;
$uid = isset($_GET['uid']) ? (int)$_GET['uid'] : 0;

// Validate payment type
if (!isset($payTypeMap[$payTypeID])) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Invalid payment type. Only ColaPay (tyid=1015) is supported',
        'received_tyid' => $payTypeID
    ]));
}

// Validate amount
if ($amount <= 0) {
    die(json_encode(['status'=>'error', 'message'=>'Amount must be greater than 0']));
}

// Generate order details
$serial = generateOrderNo();
$date = date('Y-m-d H:i:s');
$payName = $payTypeMap[$payTypeID];

// Database connection
$conn = dbConnect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

// Get user info
$stmt = $conn->prepare("SELECT mobile FROM shonu_subjects WHERE id = ?");
$stmt->bind_param('i', $uid);
$stmt->execute();
$stmt->bind_result($userMobile);
if (!$stmt->fetch()) {
    die(json_encode(['status'=>'error', 'message'=>'User not found']));
}
$stmt->close();

// Get next order number
$res = $conn->query("SELECT MAX(shonu) AS max_shonu FROM thevani");
$shonu = ($res) ? ((int)$res->fetch_assoc()['max_shonu']) + 1 : 1;
if ($res) $res->free();

// Prepare ColaPay request
$timestamp = time();
$nonce = substr(md5(microtime()), 0, 8);
$method = 'POST';
$requestPath = '/api/v2/create';

// Generate signature
$signature = generateColaPaySign($method, $requestPath, $config['access_key'], $timestamp, $nonce, $config['access_secret']);

// Prepare request body
$bodyParams = [
    'McorderNo' => $serial,
    'Amount' => number_format($amount, 2, '.', ''),
    'Type' => 'inr',
    'ChannelCode' => $config['channel_code'],
    'CallBackUrl' => $config['notify_url'],
    'JumpUrl' => $config['page_url']
];

$headers = [
    'accessKey: '.$config['access_key'],
    'timestamp: '.$timestamp,
    'nonce: '.$nonce,
    'sign: '.$signature,
    'Content-Type: application/json'
];

// Make API request
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => 'https://mcapi.colapayppp.com/api/v2/create',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($bodyParams),
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    die(json_encode(['status'=>'error', 'message'=>'Payment gateway connection error: '.$curlError]));
}

$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['status'=>'error', 'message'=>'Invalid payment response: '.$response]));
}

if (($data['code'] ?? 0) === 200) {
    // Save transaction to database
    $query = "INSERT INTO thevani (shonu, balakedara, motta, dharavahi, mula, payid, ullekha, duravani, ekikrtapavati, dinankavannuracisi, madari, pavatiaidi, sthiti)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    $defaultUTR = 'N/A';
    $madari = 1111;
    $pavatiaidi = 2;
    $sthiti = 0;
    
    $stmt->bind_param('iidssissssiii', $shonu, $uid, $amount, $serial, $payName, $payTypeID, $defaultUTR, $userMobile, $serial, $date, $madari, $pavatiaidi, $sthiti);
    
    if (!$stmt->execute()) {
        die(json_encode(['status'=>'error', 'message'=>'Failed to save transaction: '.$conn->error]));
    }
    $stmt->close();
    $conn->close();

    if (!empty($data['result']['payUrl'])) {
        // Directly redirect to payment page
        header("Location: " . $data['result']['payUrl']);
        exit;
    } else {
        die(json_encode(['status'=>'error', 'message'=>'Payment URL missing in response']));
    }
} else {
    $errorMsg = $data['message'] ?? 'Payment failed without specific reason';
    die(json_encode([
        'status' => 'error',
        'message' => $errorMsg,
        'code' => $data['code'] ?? 'UNKNOWN_ERROR',
        'response' => $data
    ]));
}
?>