<?php

/*

This file contains database config.phpuration assuming you are running mysql using user "root" and password ""

*/

date_default_timezone_set('Asia/Kolkata');



define('DB_SERVER', '127.0.0.1');

define('DB_USERNAME', 'indgames_app');

define('DB_PASSWORD', 'YourStrongPasswordHere!');

define('DB_NAME', 'indgames_db');



// Try connecting to the Database

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



//Check the connection

if($conn == false){

    dir('Error: Cannot connect');

    Echo"Fail";

}



?>