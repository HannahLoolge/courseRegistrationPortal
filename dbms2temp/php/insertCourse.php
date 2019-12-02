<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	
	$course = '';
	$credit = '';
	$lecture = '';
	$practical = '';
	$tutorial = '';
	$prereq = '';
	$facadv = '';

	if(isset($_POST["course"]))
		$course = $_POST["course"];
	if(isset($_POST["credit"]))
		$credit = $_POST["credit"];
	if(isset($_POST["lecture"]))
		$lecture = $_POST["lecture"];
	if(isset($_POST["practical"]))
		$practical = $_POST["practical"];
	if(isset($_POST["tutorial"]))
		$tutorial = $_POST["tutorial"];
	if(isset($_POST["prereq"]))
		$prereq = $_POST["prereq"];
	if(isset($_POST["facadv"]))
		$facadv = $_POST["facadv"];

	$prereqwa = preg_split('/\s|(?<=\w)(?=[.,:;!?)])|(?<=[.,"!()?\x{201C}])/u', $prereq, -1, PREG_SPLIT_NO_EMPTY);

	$np = sizeof($prereqwa);
	$res='';
	foreach($prereqwa as $one){
		$sql = "INSERT INTO CATALOGUE VALUES('$course', '$credit', '$one', '$np', '$facadv')";
		$res = pg_query($dbconn, $sql);
		if(!$res){
			echo "error occurred while oofffering courses\n";
		}
	}
	//echo "hi".$prereq."hkjhkj";
	if($prereq==''){
		$sql = "INSERT INTO CATALOGUE VALUES('$course', '$credit', '$prereq', '$np', 'facadv')";
		$res = pg_query($dbconn, $sql);
		if(!$res){
			echo "error occurred while np = 0\n";
		}
	}

	if($res){
		$sql2 = "INSERT INTO COURSE VALUES('$course', '$credit', '$lecture', '$tutorial', '$practical')";
		$res2 = pg_query($dbconn, $sql2);
		if(!$res2){
			echo "Error occurred while inserting course\n";
		}
		header("Location: ../editFaculty.php");
	}else{
		echo 'Pre requisites donot exist\n';	
		header("Location: ../editFaculty.php");		
	} 	
	
	//header("Location: ../editFaculty.php");
?>