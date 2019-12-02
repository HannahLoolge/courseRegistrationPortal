<?php
	require_once 'php/db-connect.php';

//	$sql0 = "CREATE EXTENSION pgcrypto";
//	$result0 = pg_query($dbconn, $sql0);
//	if(!$result0){
//		echo pg_last_error($dbconn);
//	}else{
//		echo "Extension created successfully\n";
//	}

	$sql = "CREATE TABLE COURSE(
		course TEXT UNIQUE,
		credit FLOAT,
		lecture INTEGER,
		tutorial INTEGER,
		practical INTEGER,
		PRIMARY KEY (course)
	)";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo pg_last_error($dbconn);
	}else{
		echo "Table created successfully\n";
	}

	$sql03 = "INSERT INTO COURSE(course, credit, lecture, tutorial, practical) VALUES('', 0, 0, 0, 0)";
	$result03 = pg_query($dbconn, $sql03);
	if(!$result03){
		echo 'null values inserted in course\n';
	}

	$sql2 = "CREATE TABLE CATALOGUE(
		course TEXT,
		credit FLOAT,
		prereq TEXT,
		np INTEGER,
		fAdv TEXT,
		FOREIGN KEY (prereq) REFERENCES COURSE(course)
	)";

	$result2 = pg_query($dbconn, $sql2);
	if(!$result2){
		echo pg_last_error($dbconn);
	}else{
		echo "Table catalogue created successfully ";
	}

	$sql3 = "CREATE TABLE FACULTY(
		id SERIAL PRIMARY KEY,
		name TEXT UNIQUE,
		department TEXT,
		password TEXT NOT NULL
	)";

	$result3 = pg_query($dbconn, $sql3);
	if(!$result3){
		echo pg_last_error($dbconn);
	}else{
		echo "Table faculty created";
	}

	$sql01 = "INSERT INTO FACULTY(name, department, password) VALUES('facadv', 'cse', '123')";
	$result01 = pg_query($dbconn, $sql01);
	if(!$result01){
		echo 'insert failed in faculty';
	}

	$sql4 = "CREATE TABLE OFFER(
		course TEXT,
		timeslot VARCHAR,
		fname TEXT,
		batches TEXT,
		leastCg FLOAT,
		FOREIGN KEY (fname) REFERENCES FACULTY(name)
	)";

	$result4 = pg_query($dbconn, $sql4);
	if(!$result4){
		echo pg_last_error($dbconn);
	}else{
		echo "Table offer created";
	}

	$sql5 = "CREATE TABLE STUDENT(
		id SERIAL PRIMARY KEY,
		name TEXT UNIQUE,
		batch TEXT,
		lastC FLOAT,
		prevC FLOAT,
		credit FLOAT DEFAULT 0,
		cgpa FLOAT,
		password TEXT NOT NULL
	)";

	$result5 = pg_query($dbconn, $sql5);
	if(!$result5){
		echo pg_last_error($dbconn);
	}else{
		echo "Table student created";
	}



	$sql8 = "CREATE TABLE ADVISOR(
		fadv TEXT UNIQUE,
		department TEXT,
		password TEXT NOT NULL
	)";

	$result8 = pg_query($dbconn, $sql8);
	if(!$result8){
		echo pg_last_error($dbconn);
	}

	$sql02 = "INSERT INTO ADVISOR(fadv, department, password) VALUES('facadv', 'cse', '123') ";
	$result02 = pg_query($dbconn, $sql02);
	if(!$result02){
		echo 'facadv inserted into advisor\n';
	}

	$sql6 = "CREATE TABLE STUDCOURSE(
		sname TEXT,
		batch TEXT,
		course TEXT,
		fname TEXT,
		credit FLOAT,
		grade CHAR DEFAULT null,
		timeslot VARCHAR,
		fadv TEXT,
		approve CHAR DEFAULT 'N',
		FOREIGN KEY (sname) REFERENCES STUDENT(name),
		FOREIGN KEY (fname) REFERENCES FACULTY(name),
		FOREIGN KEY (fadv) REFERENCES ADVISOR(fadv)
	)";

	$result6 = pg_query($dbconn, $sql6);
	if(!$result6){
		echo pg_last_error($dbconn);
	}else{
		echo "Table STUDCOURSE created";
	}


	$sql7 = "CREATE TABLE TICKET(
		sName TEXT,
		fName TEXT,
		cName TEXT,
		cCredit FLOAT,
		currCredit FLOAT,
		Approval TEXT DEFAULT 'N',
		FOREIGN KEY (sname) REFERENCES STUDENT(name),
		FOREIGN KEY (cName) REFERENCES COURSE(course)
	)";

	$result7 = pg_query($dbconn, $sql7);
	if(!$result7){
		echo pg_last_error($dbconn);
	}else{
		echo "Table ticket created";
	}


	pg_close($dbconn);
?>