<?php
	include "../../conn.php";
	include "../../functions2.php";

header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin: ' . $origin);
header('vary: Origin');

date_default_timezone_set("Asia/Kolkata");
$shnunc = date("Y-m-d H:i:s");
$res = [
    'code' => 11,
    'msg' => 'Method not allowed',
    'msgCode' => 12,
    'serviceNowTime' => $shnunc,
];
$shonubody = file_get_contents("php://input");
$shonupost = json_decode($shonubody, true);

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    if (isset($shonupost['language']) && isset($shonupost['random']) && isset($shonupost['signature']) && isset($shonupost['timestamp'])) {
        $language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
        $random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
        $signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
        $shonustr = '{"language":' . $language . ',"random":"' . $random . '"}';
        $shonusign = strtoupper(md5($shonustr));

        if ($shonusign == $signature) {
            $bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
            $author = $bearer[1];
            $is_jwt_valid = is_jwt_valid($author);
            $data_auth = json_decode($is_jwt_valid, true);

            if ($data_auth['status'] === 'Success') {
                $userId = $data_auth['payload']['id'];
                $sesquery = "SELECT akshinak, userPhoto, codechorkamukala, mobile, createdate, shonullgnt FROM shonu_subjects WHERE akshinak = ? AND id = ?";
                $stmt = $conn->prepare($sesquery);
                $stmt->bind_param("si", $author, $userId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();

                    // Get balance
                    $balquery = "SELECT motta FROM shonu_kaichila WHERE balakedara = ?";
                    $balstmt = $conn->prepare($balquery);
                    $balstmt->bind_param("i", $userId);
                    $balstmt->execute();
                    $balresult = $balstmt->get_result();
                    $balance = $balresult->fetch_assoc();
                    $balstmt->close();

                    // Get USDT rate
                    $ratequery = "SELECT rate FROM tbl_pg WHERE value = 'usdt' LIMIT 1";
                    $rateresult = $conn->query($ratequery);
                    $rate = $rateresult->fetch_assoc();

                    $notifquery = "SELECT COUNT(*) AS total_notifications FROM notification WHERE user_id = ? AND state = 0";
                    $notifstmt = $conn->prepare($notifquery);
                    $notifstmt->bind_param("i", $userId);
                    $notifstmt->execute();
                    $notifresult = $notifstmt->get_result();
                    $unread = $notifresult->fetch_assoc();
                    $notifstmt->close();

                    $data = [
                        'userId' => (int) $userId,
                        'userPhoto' => $user['userPhoto'],
                        'userName' => '91' . $user['mobile'],
                        'nickName' => $user['codechorkamukala'],
                        'amount' => $balance['motta'] ?? 0.00,
                        'uRate' => (float) ($rate['rate'] ?? 10.0),
                        'unRead' => (int) ($unread['total_notifications'] ?? 0),
                        'userLoginDate' => $user['shonullgnt'],
                        'createdate' => $user['createdate'],
                        'amountofCode' => 0.00,
                        'isWithdraw' => null,
                        'message' => null,
                        'withdrawCount' => 0,
                        'addTime' => date('Y-m-d H:i:s'),
                        'startTime' => null,
                        'endTime' => null,
                        'fee' => 0.0,
                        'facebookAppID' => null,
                        'googleAppID' => null,
                        'twitterAppID' => null,
                        'keyCode' => null,
                        'trxRate' => 10.0,
                        'uGold' => 0.00,
                        'googleVerify' => 0,
                        'isvalidator' => 0,
                        'isRePwd' => '1',
                        'integral' => 0,
                        'isOpenPointMall' => '0',
                        'isOpenAmountOfCode' => '1',
                        'isPartnerReward' => '1',
                        'isOpenOfficialRechargeInputDialog' => '0',
                        'isAllowUserAddUSDT' => '1',
                        'isShowWalletTotalCT' => '0',
                        'isShowRechargeBankList' => '0',
                        'isPopupCommissionSwitch' => '0',
                        'regType' => 1,
                        'bindReward' => 0.0,
                        'isGoogle' => '0',
                        'isOpenChampion' => '0',
                        'isAllowWithdraw' => 1
                    ];

                    // Generate signature
                    $knbdstr = json_encode([
                        'userId' => $data['userId'],
                        'userPhoto' => $data['userPhoto'],
                        'userName' => $data['userName'],
                        'nickName' => $data['nickName'],
                        'createdate' => $data['createdate']
                    ]);
                    $data['sign'] = strtoupper(hash('sha256', $knbdstr));

                    // Group data auth
                    $data['groupDataShowAuth'] = array_map(function ($id) {
                        return ['id' => $id, 'isShow' => true];
                    }, [11, 12, 15, 16, 17, 18, 19, 20]);

                    // Verify methods
                    $data['verifyMethods'] = [
                        'mobile' => $data['userName'],
                        'email' => '',
                        'google' => '0'
                    ];

                    // User group auth
                    $data['userGroupAuth'] = range(0, 9);

                    $res['data'] = $data;
                    $res['code'] = 0;
                    $res['msg'] = 'Succeed';
                    $res['msgCode'] = 0;
                    http_response_code(200);
                } else {
                    $res['code'] = 4;
                    $res['msg'] = 'No operation permission';
                    $res['msgCode'] = 2;
                    http_response_code(401);
                }
                $stmt->close();
            } else {
                $res['code'] = 4;
                $res['msg'] = 'No operation permission';
                $res['msgCode'] = 2;
                http_response_code(401);
            }
        } else {
            $res['code'] = 5;
            $res['msg'] = 'Wrong signature';
            $res['msgCode'] = 3;
            http_response_code(200);
        }
    } else {
        $res['code'] = 7;
        $res['msg'] = 'Param is Invalid';
        $res['msgCode'] = 6;
        http_response_code(200);
    }
} else {
    $res['code'] = 11;
    $res['msg'] = 'Method not allowed';
    $res['msgCode'] = 12;
    http_response_code(405);
}

echo json_encode($res);
?>
