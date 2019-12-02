<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	

	$username = '';
	$batch = '';
	$course = '';
	$fname = '';
	$credit = '';
	$timeslot = '';
	$grade = 'N';
	$fcadv = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	if(isset($_POST["batch"]))
		$batch = $_POST["batch"];
		if(isset($_POST["course"]))
		$course = $_POST["course"];
	if(isset($_POST["fname"]))
		$fname = $_POST["fname"];
		if(isset($_POST["credit"]))
		$credit = $_POST["credit"];
		if(isset($_POST["timeslot"]))
		$timeslot = $_POST["timeslot"];
		if(isset($_POST["fadv"]))
		$fcadv = $_POST["fadv"];

	$grade = 'N';


	$sql = "INSERT INTO STUDCOURSE(sname, batch, course, fname, credit, grade, timeslot, fadv) VALUES('$username', '$batch', '$course', '$fname', '$credit', '$grade', '$timeslot', '$fcadv')";
	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo "ERROR!";
	}else{
		header("Location: ../editStudent.php");
	}

?>