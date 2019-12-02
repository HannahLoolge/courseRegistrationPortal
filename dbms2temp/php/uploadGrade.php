<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	

	$sname = '';
	$batch = '';
	$course = '';
	$fname = '';
	$grade = '';
	$timeslot = '';


	if(isset($_POST["sname"]))
		$sname = $_POST["sname"];
	if(isset($_POST["batch"]))
		$batch = $_POST["batch"];
	if(isset($_POST["course"]))
		$course = $_POST["course"];
	if(isset($_POST["fname"]))
		$fname = $_POST["fname"];
	if(isset($_POST["grade"]))
		$grade = $_POST["grade"];
	if(isset($_POST["timeslot"]))
		$timeslot = $_POST["timeslot"];

	echo $_POST["grade"]."\n";

	$sql = "UPDATE STUDCOURSE 
			SET grade='$grade'
			WHERE sname='$sname' AND batch='$batch' AND course='$course' AND fname='$fname' AND timeslot='$timeslot'";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo 'An error occurred in uploading grade\n';
	}else{
		header("location:../uploadGrade.php?username=".$fname."&course=".$course."&timeslot=".$timeslot."&batch=".$batch);
	}

?>