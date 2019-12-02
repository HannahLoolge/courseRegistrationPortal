<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	

	$username = '';
	$course = '';
	$timeslot = '';
	$batches = '';
	$leastCG = '';


	if(isset($_POST["username"]))
		$username = $_POST["username"];
	if(isset($_POST["course"]))
		$course = $_POST["course"];
	if(isset($_POST["timeslot"]))
		$timeslot = $_POST["timeslot"];
	if(isset($_POST["batches"]))
		$batches = $_POST["batches"];
	if(isset($_POST["leastCG"]))
		$leastCG = $_POST["leastCG"];


	$batchwa = preg_split('/\s|(?<=\w)(?=[.,:;!?)])|(?<=[.,"!()?\x{201C}])/u', $batches, -1, PREG_SPLIT_NO_EMPTY);

	foreach($batchwa as $one){
		$sql = "INSERT INTO OFFER VALUES('$course', '$timeslot', '$username', '$one', '$leastCG')";
		$res = pg_query($dbconn, $sql);
		if(!$res){
			echo "error occurred while oofffering courses";
		}
	}

	header("Location: ../editFaculty.php");

?>