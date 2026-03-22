<?php 
    header("Content-Type: Application/json;");
    header("Access-Control-Allow-Origin: *");
    date_default_timezone_set("Asia/Kolkata");
    session_start();

    if ($_SESSION['unohs'] == null) {
        header("location:index.php?msg=unauthorized");
    }

    include("conn.php");

    if (!isset($_REQUEST['userId']) || !isset($_REQUEST['bonusType']) || !isset($_REQUEST['amount']) || !isset($_REQUEST['remark'])) {
        $res['status'] = 'error';
        $res['statusCode'] = 2;
        $res['msg'] = "Missing parameter(s)";
        echo json_encode($res);
        exit;
    }

    $userId    = $_REQUEST['userId'];
    $bonusType = $_REQUEST['bonusType'];
    $amount    = $_REQUEST['amount'];
    $remark    = $_REQUEST['remark'];

    if ($bonusType == 3) {
        $insertQuery = "INSERT INTO hodike_balakedara (userkani, serial, price, shonu, remark) 
                        VALUES ('$userId', 'Imitator', '$amount', NOW(), '$remark')";
        if (mysqli_query($conn, $insertQuery)) {
            $updateQuery = "UPDATE shonu_kaichila SET motta = motta + $amount WHERE balakedara = '$userId'";
            if (mysqli_query($conn, $updateQuery)) {
                $res['status'] = 'success';
                $res['statusCode'] = 0;
                $res['msg'] = "Special bonus added successfully";
            } else {
                $res['status'] = 'error';
                $res['statusCode'] = 3;
                $res['msg'] = "Bonus added but balance update failed: " . mysqli_error($conn);
            }
        } else {
            $res['status'] = 'error';
            $res['statusCode'] = 1;
            $res['msg'] = "Database error: " . mysqli_error($conn);
        }
        echo json_encode($res);
        exit;
    }

    $type_code_map = [
        3   => 8003,
        8   => 8008,
        10  => 8010,
        13  => 8013,
        14  => 8014,
        20  => 8020,
        25  => 8025,
        107 => 8107,
        115 => 8115,
        117 => 8117,
        118 => 8118,
        124 => 8124
    ];

    $bonusTypes = [
        3   => "Red envelope",
        8   => "Agent red envelope recharge",
        10  => "Recharge gift",
        13  => "Bonus recharge",
        20  => "Invite bonus",
        25  => "Card binding gift",
        107 => "Weekly Awards",
        124 => "Agent Bonus",
        118 => "Daily Awards",
        115 => "Return Awards",
        117 => "New members get bonuses by playing games"
    ];

    $type_code = isset($type_code_map[$bonusType]) ? $type_code_map[$bonusType] : 8003;
    $type_name = isset($bonusTypes[$bonusType]) ? $bonusTypes[$bonusType] : "Unknown Bonus Type";

    $query = "INSERT INTO shonu_extra_bonus (user_id, amount, bonus_type, type_name, type_code, remark) 
              VALUES ('$userId', '$amount', '$bonusType', '$type_name', '$type_code', '$remark')";

    if (mysqli_query($conn, $query)) {
        $updateQuery = "UPDATE shonu_kaichila SET motta = motta + $amount WHERE balakedara = '$userId'";
        if (mysqli_query($conn, $updateQuery)) {
            $res['status'] = 'success';
            $res['statusCode'] = 0;
            $res['msg'] = "Bonus added successfully";
        } else {
            $res['status'] = 'error';
            $res['statusCode'] = 3;
            $res['msg'] = "Bonus added but balance update failed: " . mysqli_error($conn);
        }
        echo json_encode($res);
    } else {
        $res['status'] = 'error';
        $res['statusCode'] = 1;
        $res['msg'] = "Database error: " . mysqli_error($conn);
        echo json_encode($res);
    }
?>
