<?php  
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'university');
	$query = mysqli_query($con, "SELECT * FROM students WHERE phone='{$_POST['phone']}' AND password='{$_POST['password']}'");
	$res = $query->fetch_assoc();

	$_SESSION['student_id'] = $res['id'];

	$num = mysqli_num_rows($query);
	if ($num == 0) {
		header("Location:loginStudent.php?text=Нет такого пользователя");
	}
	else
	{
		header("Location:accountStudent.php");
	}
?>