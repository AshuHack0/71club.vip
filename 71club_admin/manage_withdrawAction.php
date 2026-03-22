<?php 
	include('conn.php');
	
	if(isset($_POST['type'])){
		$id=$_POST['id'];
        $remark=$_POST['remark'];
		$today=date( 'Y-m-d H:i:s' );
		
		$finduid=mysqli_query($conn,"select * from `hintegedukolli` where `shonu`='".$id."'");
		$finduidArray = mysqli_fetch_array($finduid);
		$userid = $finduidArray['balakedara'];
		$serial = $finduidArray['dharavahi'];
		$amount = $finduidArray['motta'];
		$bid = $finduidArray['khateshonu'];
		
		$sql_d = "SELECT * FROM tbl_pg WHERE status = '1'";		
		$run_d = mysqli_query($conn, $sql_d);
		$rund_f = mysqli_fetch_array($run_d);
		$gateway = $rund_f['value'];
		
		if($_POST['type']=='accept'){
			$sqlA = mysqli_query($conn,"Update `hintegedukolli` set sthiti = '1',tike = 'Completed',remarks = '".$remark."',dinankavannuracisi = '".$today."' where `shonu`='".$id."' ");
			//$sqlA = mysqli_query($conn,"Update `hintegedukolli` set sthiti = '1',remarks = 'Completed',tike = 'Completed',dinankavannuracisi = '".$today."' where `shonu`='".$id."' ");
			echo 1;
		}
		else if($_POST['type']=='reject'){
			$sqlA = mysqli_query($conn, "UPDATE `hintegedukolli` 
                             SET sthiti = '2', 
                                 tike = 'Rejected', 
                                 dinankavannuracisi = '".$today."', 
                                 remarks = '".$remark."' 
                             WHERE `shonu`='".$id."'");

$sqlwallet = mysqli_query($conn, "UPDATE `shonu_kaichila` 
                                  SET `motta` = ROUND((motta + '$amount'), 2) 
                                  WHERE `balakedara`= '$userid'");
			echo 2;
		}
	}
?>