<?php
$host = 'localhost';
$user = 'root';
$pass = 'toor';
$database = 'wsnepal';

function db_connect($host,$user,$pass,$database){
	$con = mysqli_connect($host,$user,$pass,$database);
	return $con;
}

$con = db_connect($host,$user,$pass,$database);

?>