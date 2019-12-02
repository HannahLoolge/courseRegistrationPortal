<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';

	$username = '';
	$department = '';
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	
	if(isset($_POST["department"]))
		$department = $_POST["department"];
	
	if(isset($_POST["password"]))
		$password = $_POST["password"];



	$sql = "INSERT INTO FACULTY(name, department, password) VALUES('$username', '$department', '$password')";
	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo pg_last_error($dbconn);
	}else{
		echo "Faculty registered successfully";
		header("Location: ../loginF.php");
	}

?>