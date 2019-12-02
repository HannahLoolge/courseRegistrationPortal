<?php
	include 'db.inc.php';
	$bulk = new MongoDB\Driver\BulkWrite;

	$id = '';
	$username = '';
	$publication = '';
	$grant = '';
	$award = '';
	$password = '';

	if(isset($_POST["id"]))
		$id = $_POST["id"];

	if(isset($_POST["Username"]))
		$username = $_POST["Username"];
	
	if(isset($_POST["Publication"]))
		$publication = $_POST["Publication"];

	if(isset($_POST["Grant"]))
		$grant = $_POST["Grant"];

	if(isset($_POST["Award"]))
		$award = $_POST["Award"];

	if(isset($_POST["Password"]))
		$password = $_POST["Password"];

	
//	if(isset($_POST["Username"]))
//		$username = $_POST["Username"];
//	if(isset($_POST["Password"]))
//		$password = $_POST["Password"];


//	$id = $_POST["id"];
//	$username = $_POST["Username"];
//	$password = $_POST["Password"];

	try{
		$bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
			['username' => $username,
			'publication' => $publication,
			'grant' => $grant,
			'award' => $award,
			'password' => $password
		]);
		
		$result = $manager->executeBulkWrite($dbname, $bulk);
		header("Location: ../index.php");
	} catch(MongoDB\Driver\Exception\Exception $e){
		die("Error encountered" .$e);
	}
?>