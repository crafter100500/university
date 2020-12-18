<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>АдминПанель</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <a class="navbar-brand" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3">
	         <a href="accountStudent.php">Аккаунт студента</a>
	      </li>
	      <a href="signOutStudent.php" class="nav-link text-danger">Выйти</a>
	      
	    </ul>
	  </div>
	</nav>
	<?php
		$con = mysqli_connect('127.0.0.1', 'root', '', 'university');
		$query = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin_id']}");
		$universitys = mysqli_query($con, "SELECT * FROM admin INNER JOIN universities ON admin.university_id = universities.id WHERE admin.id = {$_SESSION['admin_id']}");
		$students = mysqli_query($con, "SELECT * FROM applications INNER JOIN students ON applications.student_id = students.id WHERE applications.university_id = {$_SESSION['admin_id']}");
		$stroka = $query->fetch_assoc();
		$res = $universitys->fetch_assoc();
		$student = $students->fetch_assoc();
		if ($_SESSION['admin_id'] == null) { ?>
			<div class="col-10 mx-auto">
				<h3>Войдите как админ</h3>
				<p>Вы не авторизованы</p>
				<a href="adminLogin.php">Авторизация админ</a>
			</div>
	<?php } else{ ?>
		<div class="mx-auto col-8" style="height: 600px;">
			<h1>Добро пожаловать, <?php echo $stroka['login'] ?> !</h1>
			<h3>Ваш университет: <?php echo $res['name'] ?></h3>
			<h3>Заявки от абитуриентов:</h3>
			<h3>ФИО абитуриентов: <?php echo $student['fio'] ?></h3>
			<p>Возраст: <?php echo $student['age'] ?></p>
			<p>Школа: <?php echo $student['school'] ?></p>
		</div>
	<?php } ?>
</body>
</html>