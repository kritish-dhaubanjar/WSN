<?php
$host = 'localhost';
// $user = 'jyashaa_wsnepal';
// $pass = 'killemall';
// $database = 'jyashaa_wsnepal';
$user = 'root';
$pass = 'toor';
$database = 'wsnepal';

function db_connect($host,$user,$pass,$database){
	$con = mysqli_connect($host,$user,$pass,$database);
	return $con;
}

$con = db_connect($host,$user,$pass,$database);

?>
