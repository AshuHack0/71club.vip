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
			$shonustr = '{"language":'.$language.',"random":"'.$random.'"}';
			$shonusign = strtoupper(md5($shonustr));
			if($shonusign == $signature){
				$bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
				$author = $bearer[1];				
				$is_jwt_valid = is_jwt_valid($author);
				$data_auth = json_decode($is_jwt_valid, 1);
				if($data_auth['status'] === 'Success') {
					$data = [
						[
							"id" => 4,
							"typeNameCode" => 9304,
							"categoryCode" => "Slot",
							"categoryName" => "\u7535\u5b50\u6e38\u620f",
							"state" => 1,
							"sort" => 7,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_202403062335332eu1.png"
						],
						[
							"id" => 1,
							"typeNameCode" => 9301,
							"categoryCode" => "Lottery",
							"categoryName" => "\u5f69\u7968",
							"state" => 1,
							"sort" => 6,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_2024030623351551lj.png"
						],
						[
							"id" => 5,
							"typeNameCode" => 9305,
							"categoryCode" => "Sport",
							"categoryName" => "\u4f53\u80b2\u6e38\u620f",
							"state" => 1,
							"sort" => 5,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_20240306233509iqfa.png"
						],
						[
							"id" => 6,
							"typeNameCode" => 9306,
							"categoryCode" => "Video",
							"categoryName" => "\u89c6\u8baf\u6e38\u620f",
							"state" => 1,
							"sort" => 4,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_20240306233502xkvs.png"
						],
						[
							"id" => 7,
							"typeNameCode" => 9307,
							"categoryCode" => "Chess",
							"categoryName" => "\u68cb\u724c\u6e38\u620f",
							"state" => 1,
							"sort" => 3,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_202403062334551n7x.png"
						],
						[
							"id" => 3,
							"typeNameCode" => 9303,
							"categoryCode" => "Fish",
							"categoryName" => "\u6355\u9c7c\u6e38\u620f",
							"state" => 1,
							"sort" => 2,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_202403062334443pb8.png"
						],
						[
							"id" => 8,
							"typeNameCode" => 9308,
							"categoryCode" => "Flash",
							"categoryName" => "\u5c0f\u6e38\u620f",
							"state" => 1,
							"sort" => 1,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_20240306233424oag3.png"
						],
						[
							"id" => 2,
							"typeNameCode" => 9302,
							"categoryCode" => "Popular",
							"categoryName" => "\u70ed\u95e8\u6e38\u620f",
							"state" => 1,
							"sort" => 0,
							"categoryImg" => "https://ossimg.bdg123456.com/BDGWin/gamecategory/gamecategory_20240306233417aiaq.png"
						],
					];
					
					$res['data'] = $data;
					$res['code'] = 0;
					$res['msg'] = 'Succeed';
					$res['msgCode'] = 0;
					http_response_code(200);
					echo json_encode($res);					
				}
				else{					
					$res['code'] = 4;
					$res['msg'] = 'No operation permission';
					$res['msgCode'] = 2;
					http_response_code(401);
					echo json_encode($res);					
				}
			}
			else{
				$res['code'] = 5;
				$res['msg'] = 'Wrong signature';
				$res['msgCode'] = 3;
				http_response_code(200);
				echo json_encode($res);				
			}
		}
		else{
			$res['code'] = 7;
			$res['msg'] = 'Param is Invalid';
			$res['msgCode'] = 6;
			http_response_code(200);
			echo json_encode($res);			
		}		
	} else {		
		http_response_code(405);
		echo json_encode($res);
	}
?>
