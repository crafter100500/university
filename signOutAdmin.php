<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'university');
	$_SESSION['admin_id'] = 0;
	header("Location:adminLogin.php");
?>