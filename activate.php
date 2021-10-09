<?php
	include 'partials/dbconnection.php';

	session_start();

	if(isset($_GET['token'])){
		$token = $_GET['token'];

		$updateQuery = "update signupuser set status='active' where token='$token'";
		$query = mysqli_query($conn, $updateQuery);

		if($query){
			if(isset($_SESSION['msg'])){
				$_SESSION['msg'] = "Account updated successfully";
				header("location: login.php");
			}
			else{
				$_SESSION['msg'] = "you are logged out";
				header("location: login.php");
			}
		}
		else{
			$_SESSION['msg'] = "Account not updated";
				header("location: signup.php");
		}
	}
?>