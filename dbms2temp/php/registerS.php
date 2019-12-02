<!--<a href="../login.php">Login</a><br>-->
<?php
	include 'db-connect.php';

	$username = '';
	$batch = '';
	$lastC = 0;
	$prevC = 0;
	$credit = 0;
	$cgpa = 0;
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	
	if(isset($_POST["batch"]))
		$batch = $_POST["batch"];

	if(isset($_POST["lastC"]))
		$lastC = $_POST["lastC"];

	if(isset($_POST["prevC"]))
		$prevC = $_POST["prevC"];
	
	if(isset($_POST["credit"]))
		$credit = $_POST["credit"];

	if(isset($_POST["cgpa"]))
		$cgpa = $_POST["cgpa"];

	if(isset($_POST["password"]))
		$password = $_POST["password"];


	$sql04 = "INSERT INTO STUDCOURSE(sname, batch, course, fname, credit, grade, timeslot, fadv) VALUES('$username', '$batch', '', 'facadv', 0,0,'--', 'facadv')";
	$result04 = pg_query($dbconn, $sql04);
	if(!$result04){
		echo 'fake course in student registration issue\n';
	}


	$sql = "INSERT INTO STUDENT(name, batch, lastC, prevC, credit, cgpa, password) VALUES('$username', '$batch', '$lastC', '$prevC', '$credit', '$cgpa', '$password')";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo pg_last_error($dbconn);
	}else{
		echo "Student registered successfully";
		header("Location: ../loginS.php");
	}

?>