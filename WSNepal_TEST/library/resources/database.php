<?php
$host = 'localhost';
$user = 'jyashaa_wsnepal';
$pass = 'killemall';
$database = 'jyashaa_wsnepal';

function db_connect($host,$user,$pass,$database){
	$con = mysqli_connect($host,$user,$pass,$database);
	return $con;
}

$con = db_connect($host,$user,$pass,$database);

?>
