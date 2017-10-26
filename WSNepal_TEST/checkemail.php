<?php
	require 'library/resources/database.php';

	if(isset($_GET['email']) && !empty($_GET['email'])){
		$email = $_GET['email'];
		$query = "SELECT email FROM customers WHERE email = '$email'";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result) == 0){
			echo '0';
		}
		else{
			echo '1';
		}
	}

?>