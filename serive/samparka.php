<?php
	$conn = mysqli_connect('localhost', 'dragonlo_71club', 'dragonlo_71club', 'dragonlo_71club');
	
	if (!$conn) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
	
	date_default_timezone_set("Asia/Kolkata"); 
?>