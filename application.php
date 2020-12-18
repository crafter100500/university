<?php 
	session_start();
 ?>
<?php  	
$con = mysqli_connect('127.0.0.1', 'root','','university');
$ins = "INSERT INTO applications (student_id, university_id) VALUES ('".$_SESSION['student_id']."', '".$_GET['university_id']."') ";
mysqli_query($con, $ins);
header("Location: index.php");
?>