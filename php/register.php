<!--<a href="../login.php">Login</a><br>-->
<?php
	include 'db.inc.php';
	$bulk = new MongoDB\Driver\BulkWrite;

	$username = '';
	$publication = '';
	$grant = '';
	$award = '';
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	
	if(isset($_POST["publication"]))
		$publication = $_POST["publication"];
	
	if(isset($_POST["grant"]))
		$grant = $_POST["grant"];
	
	if(isset($_POST["award"]))
		$award = $_POST["award"];

	if(isset($_POST["password"]))
		$password = $_POST["password"];

//	$username = (string)$post_data_array["Username"];
//	$password = (string)$post_data_array["Password"];

	$user = [
		'_id' => new MongoDB\BSON\ObjectId,
		'username' => $username,
		'publication' => $publication,
		'grant' => $grant,
		'award' => $award,
		'password' => $password
	];

	try{
		$bulk->insert($user);
		$result = $manager->executeBulkWrite($dbname, $bulk);
		header("Location: ../login.php");
	} catch(MongoDB\Driver\Exception\Exception $e){
		die("Error encountered: ".$e);
	}
?>