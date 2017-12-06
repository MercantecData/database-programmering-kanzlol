<?php

$host = "localhost";
$user = "root";
$pw = "";
$dbname = "db1";

$con = new mysqli($host, $user, $pw, $dbname);

if($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}

?>