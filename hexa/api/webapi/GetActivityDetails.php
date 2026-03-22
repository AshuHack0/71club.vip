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
		if (isset($shonupost['bannerId']) && isset($shonupost['language']) && isset($shonupost['random']) && isset($shonupost['signature']) && isset($shonupost['timestamp'])) {
			$bannerId = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['bannerId']));
			$language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
			$random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
			$signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
			$shonustr = '{"bannerId":'.$bannerId.',"language":'.$language.',"random":"'.$random.'"}';
			$shonusign = strtoupper(md5($shonustr));
			if($shonusign == $signature){
				$bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
				$author = $bearer[1];				
				$is_jwt_valid = is_jwt_valid($author);
				$data_auth = json_decode($is_jwt_valid, 1);
				if($data_auth['status'] === 'Success') {
					$sesquery = "SELECT akshinak
					  FROM shonu_subjects
					  WHERE akshinak = '$author'";
					$sesresult=$conn->query($sesquery);
					$sesnum = mysqli_num_rows($sesresult);
					if($sesnum == 1){
						$data = [];
						
					 if($bannerId == 78){
							$data['title'] = 'Benefits of Using AR WALLET';
							$data['img'] = '<p><br><b>Click </b><a href="https://t.me/arbpaychannel" target="_blank" style="background-color: rgb(255, 255, 255);"><span style="font-family: &quot;Arial Black&quot;;">ARWallet Channel</span></a><b> for more information<br><br></b></p><p><br><img src="https://71club.vip/assets/banners/1.png" style="width: 702px;"></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/1.png';
							$data['jumpType'] = 1;
							$data['contents'] = '';
						}
						else if($bannerId == 47){
							$data['title'] = 'Extra Bonus Aviator';
							$data['img'] = '<p><img src="https://ossimg.51game-game.com/51game/editor/editor_20240919191832nvnq.png" style="width: 768px;"><br></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/2.png';
							$data['jumpType'] = 1;
							$data['contents'] = '';
						}
						else if($bannerId == 45){
							$data['title'] = 'VIP Level Bonus';
							$data['img'] = '<p><img src="https://71club.vip/assets/banners/ex.png" style="width: 768px;"><br></p><p><span style="font-size: 14px;">Exclusively at 71Club, unlock additional rewards each time you achieve a new VIP level for the first time!</span></p><p><span style="font-size: 14px;"><br></span></p><p><span style="font-size: 14px;">Visit our bonus site and claim your reward now!</span></p><p><a href="http://71club.vip" target="_blank">71club.vip</a></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/3.png';
							$data['jumpType'] = 1;
							$data['contents'] = '';
						}
						else if($bannerId == 46){
							$data['title'] = 'Extra Bonus On Slots';
							$data['img'] = '<p><img src="https://ossimg.51game-game.com/51game/editor/editor_20240919191950m93k.png" style="width: 768px;"><br></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/4.png';
							$data['jumpType'] = 1;
							$data['contents'] = '';
						}
						else if($bannerId == 56){
							$data['title'] = '71Club Guard Against Scams';
							$data['img'] = '<p><img src="https://71club.vip/assets/banners/trx.png" style="width: 398px;"><br></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/55.png';
							$data['jumpType'] = 1;
							$data['contents'] = '';
						}
						else if($bannerId == 65){
							$data['title'] = 'First Recharge Bonus';
							$data['img'] = '';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/6.png';
							$data['jumpType'] = 2;
							$data['contents'] = '/activity/FirstRecharge';
						}
						else if($bannerId == 71){
							$data['title'] = 'Member Recharge Benefits';
							$data['img'] = '[{"Id":"17225024498060d979egil58","Url":"https://71club.vip/apiimages/BDGWin/banner/rechargebenifet.png"}]';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/3.png';
							$data['jumpType'] = 3;
						}
						else if($bannerId == 66){
							$data['title'] = "71club.vip AGENT GOLD EVENT\t";
							$data['img'] = '<p><img src="https://71club.vip/apiimages/BDGWin/editor/editor_20240716090948aako.jpg" style="width: 658px;"><br></p>';
							$data['coverUrl'] = 'https://71club.vip/assets/banners/3.png';
							$data['jumpType'] = 1;
						}
						
						$res['data'] = $data;
						$res['code'] = 0;
						$res['msg'] = 'Succeed';
						$res['msgCode'] = 0;
						http_response_code(200);
						echo json_encode($res);			
					}
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