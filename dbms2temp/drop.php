<?php
	require_once 'php/db-connect.php';


	$sql = "DROP TABLE COURSE";
	$sql2 = "DROP TABLE CATALOGUE";
	$sql3 = "DROP TABLE FACULTY";
	$sql0 = "DROP TABLE ADVISOR";
	$sql4 = "DROP TABLE OFFER";
	$sql5 = "DROP TABLE STUDENT";
	$sql6 = "DROP TABLE STUDCOURSE";
	$sql7 = "DROP TABLE TICKET";

	$result2 = pg_query($dbconn, $sql2);
	if(!$result2){
		echo "DROP FAILED CATALOGUE";
	}

	$result7 = pg_query($dbconn, $sql7);
	if(!$result7){
		echo "DROP FAILED TICKET";
	}

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo "DROP FAILED COURSE";
	}

	$result4 = pg_query($dbconn, $sql4);
	if(!$result4){
		echo "DROP FAILED OFFER";
	}	

	$result6 = pg_query($dbconn, $sql6);
	if(!$result6){
		echo "DROP FAILED STUDCOURSE";
	}

	$result0 = pg_query($dbconn, $sql0);
	if(!$result0){
		echo "DROP FAILED ADVISOR";
	}

	$result3 = pg_query($dbconn, $sql3);
	if(!$result3){
		echo "DROP FAILED FACULTY";
	}



	$result5 = pg_query($dbconn, $sql5);
	if(!$result5){
		echo "DROP FAILED STUDENT";
	}


?>