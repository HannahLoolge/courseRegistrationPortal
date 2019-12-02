<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	
	$sname = '';
	$fname = '';
	$cname = '';
	$cCredit = '';
	$currCredit = '';
	$approve = '';


	if(isset($_POST["sname"]))
		$sname = $_POST["sname"];
	if(isset($_POST["fname"]))
		$fname = $_POST["fname"];
	if(isset($_POST["cname"]))
		$cname = $_POST["cname"];
	if(isset($_POST["cCredit"]))
		$cCredit = $_POST["cCredit"];
	if(isset($_POST["currCredit"]))
		$currCredit = $_POST["currCredit"];
	if(isset($_POST["approve"]))
		$approve = $_POST["approve"];

	echo "In here\n";

	$sql2 = "UPDATE TICKET SET Approval='$approve'
			WHERE sName='$sname' AND fName='$fname' AND cName='$cname' AND cCredit='$cCredit' AND currCredit='$currCredit' ";
	$res2 = pg_query($dbconn, $sql2);
	if(!$res2){
		echo "Error occurred while inserting course\n";
	}
	//if($approve='yes' || $approve='Yes' || $approve='YES'){
	$sql = "DELETE FROM TICKET WHERE sName='$sname' AND fName='$fname' AND cName='$cname' AND cCredit='$cCredit' AND currCredit='$currCredit'";
	$res = pg_query($dbconn, $sql);
	if(!$res){
		echo pg_last_error();
	}
	//}	
	header("Location: ../facultyAdv.php");
?>