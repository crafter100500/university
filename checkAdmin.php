<?php  
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'university');
	$query = mysqli_query($con, "SELECT * FROM admin WHERE login='{$_POST['login']}' AND password='{$_POST['password']}'");
	$stroka = $query->fetch_assoc();

	$_SESSION['admin_id'] = $stroka['id'];

	$num = mysqli_num_rows($query);
	if ($num == 0) {
		header("Location:adminLogin.php?text=Нет такого пользователя");
	}
	else
	{
		header("Location:admin.php");
	}
?>