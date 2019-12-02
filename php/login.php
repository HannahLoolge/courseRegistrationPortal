<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db.inc.php';
	

	$username = '';
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	if(isset($_POST["password"]))
		$password = $_POST["password"];

//	$username = (string)$post_data_array["Username"];
//	$password = (string)$post_data_array["Password"];

	$filter = [
		'username' => $username,
		'password' => $password
	];
	$query = new MongoDB\Driver\Query($filter);

	try{
		$result = $manager->executeQuery($dbname, $query);
		$row = $result->toArray();
		$user = $row[0]->username;
		$pass = $row[0]->password;
		echo $user;
		$_SESSION['username'] = $user;

		if(isset($row[0]->_id)){
			header("Location: ../edituser.php?id=".$row[0]->_id.
						"&username=".$user.
						"&publication=".$row[0]->publication.
						"&grant=".$row[0]->grant.
						"&award=".$row[0]->award.
						"&password=".$pass.
						"");	
		} else{
			header("Location: ../login.php");
		}

		
		//var_dump($result);
	} catch(MongoDB\Driver\Exception\Exception $e){
		die("Error encountered: ".$e);
	}
?>