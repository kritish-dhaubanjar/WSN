<?php
if(!isset($_REQUEST['id'])){
    header("Location: ../index.php");
}
$orderId = $_GET['id'];
	header("Location: ../index.php?orderId=$orderId");
?>
<!-- $_GET['id'] -->