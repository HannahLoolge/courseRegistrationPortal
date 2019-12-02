<?php
	require_once 'php/db-connect.php';

	$sql = "CREATE OR REPLACE FUNCTION ticketUpdate()
	RETURNS TRIGGER AS
	$$
	DECLARE
	recS RECORD;
	curS CURSOR
		FOR SELECT *
		FROM STUDENT;

	BEGIN
		IF NEW.Approval='YES' OR NEW.Approval='Yes' OR NEW.Approval='yes' THEN
			OPEN curS;
			LOOP
				FETCH curS INTO recS;
				EXIT WHEN NOT FOUND;

				IF recS.name = NEW.sName THEN
					INSERT INTO STUDCOURSE VALUES(NEW.sName, recS.batch, NEW.cName, NEW.fname, NEW.cCredit, 'N', NEW.timeslot, NEW.fadv);
				END IF;
			END LOOP;
			CLOSE curS;
		END IF;
		RETURN NULL;

	END;
	$$
	LANGUAGE plpgsql
	";

	$result = pg_query($dbconn, $sql);

	if(!$result){
		echo "error in second trigger ka procedure\n";
	}

	$sqlb = pg_query($dbconn, "DROP TRIGGER ticket_update ON TICKET");
	$sql1 = "CREATE TRIGGER ticket_update
	BEFORE UPDATE 
	ON TICKET 
	FOR EACH ROW 
	EXECUTE PROCEDURE ticketUpdate()
	";

	$result1 = pg_query($dbconn, $sql1);
	if(!$result1){
		echo "error in trigger for ticket update\n";
	}


	$sql8 = "CREATE OR REPLACE FUNCTION studReg()
	RETURNS trigger AS
	$$
	DECLARE
		recSC RECORD;
		curSC CURSOR
			FOR SELECT *
			FROM STUDCOURSE
			WHERE sname = NEW.sname;
		recC RECORD;
		curC CURSOR
			FOR SELECT *
			FROM CATALOGUE AS cat
			WHERE cat.course = NEW.course;
		recO RECORD;
		curO CURSOR
			FOR SELECT *
			FROM OFFER AS off
			WHERE off.course = NEW.course AND off.fname = NEW.fname AND off.timeslot = NEW.timeslot;
		recS RECORD;
		curS CURSOR
			FOR SELECT *
			FROM STUDENT AS st
			WHERE st.name = NEW.sname;

		i INTEGER :=0;
		var INTEGER;
	BEGIN
		RAISE NOTICE 'inside begin';
		OPEN curS;

		LOOP
			FETCH curS INTO recS;
			EXIT WHEN NOT FOUND;

			IF recS.lastC!=0 AND recS.prevC!=0 THEN 
				var := (recS.lastC+recS.prevC)*(3/4);
			ELSE 
				var := 21;
			END IF;

			IF recS.credit+NEW.credit <= var  THEN
				OPEN curO;

				LOOP
				FETCH curO INTO recO;
				EXIT WHEN NOT FOUND;

				IF (recO.leastCG <= recS.cgpa OR recS.cgpa=0) AND NEW.batch=recO.batch THEN
					OPEN curC;

					LOOP
					FETCH curC INTO recC;
					EXIT WHEN NOT FOUND;
						OPEN curSC;

						LOOP 
						FETCH curSC INTO recSC;
						EXIT WHEN NOT FOUND;

						IF recSC.course = curC.prereq AND recSC.timeslot!=NEW.timeslot AND (recSC.grade='A' OR recSC.grade='B' OR recSC.grade='C' OR recSC.grade='D' ) THEN
							i := i+1;
						END IF;

						END LOOP;

						CLOSE curSC;
					IF i=recC.np THEN
					
						UPDATE STUDENT
						SET credit = credit + NEW.credit
						WHERE CURRENT OF curS;
						RETURN NEW;
					ELSE
						RAISE EXCEPTION 'Pre-requisites not completed or another class at the given timeslot';
					END IF;

					END LOOP;
					CLOSE curC;

				ELSE
					RAISE EXCEPTION 'cg criteria or batch criteria not fulfilled';
				END IF;

				END LOOP;
				CLOSE curO;

			ELSE
				INSERT INTO TICKET VALUES(NEW.sname, NEW.fname, NEW.course, NEW.credit, var, 'NO' );
				RAISE EXCEPTION 'Credits already completed';

			END IF;

		END LOOP;

		CLOSE curS;
		RETURN NULL;

	END;
	$$

	LANGUAGE plpgsql
	";
	$result8 = pg_query($dbconn, $sql8);
	if(!$result8){
		echo "error in trigger function for student registration\n ";
	}

	$sqla = pg_query($dbconn, "DROP TRIGGER student_registers ON STUDCOURSE");
	$sql9 = "CREATE TRIGGER student_registers
			BEFORE INSERT
			ON STUDCOURSE
			FOR EACH ROW
			EXECUTE PROCEDURE studReg();
			";

	$result9 = pg_query($dbconn, $sql9);
	if(!$result9){
		echo "error in insert trigger in student course registration\n";
	}


	$sql2 = "CREATE OR REPLACE FUNCTION updateCG()
	RETURNS VOID AS
	$$
	DECLARE
	recS RECORD;
	curS CURSOR
		FOR SELECT * 
		FROM STUDENT;

	recSC RECORD;
	curSC CURSOR
		FOR SELECT *
		FROM STUDCOURSE;

	totalGrade FLOAT;
	totalCredit FLOAT;

	BEGIN
	OPEN curS;

	LOOP
		FETCH curS INTO recS;
		EXIT WHEN NOT FOUND;

		totalGrade := 0;
		totalCredit := 0;

		OPEN curSC;
		LOOP
			FETCH curSC INTO recSC;
			EXIT WHEN NOT FOUND;

			IF recSC.sname = recS.name THEN
					
				IF recSC.grade='E' THEN	
					totalGrade := totalGrade + recSC.credit*(6);
				END IF;
				IF recSC.grade='D' THEN
					totalGrade := totalGrade + recSC.credit*(7);
				END IF;	
				IF recSC.grade='C' THEN
					totalGrade := totalGrade + recSC.credit*(8);
				END IF;	
				IF recSC.grade='B' THEN
					totalGrade := totalGrade + recSC.credit*(9);
				END IF;	
				IF recSC.grade='A' THEN
					totalGrade := totalGrade + recSC.credit*(10);
				END IF;	
				totalCredit := totalCredit + recSC.credit;
			END IF;

		END LOOP;
		UPDATE STUDENT
		SET cgpa = totalGrade/totalCredit
		WHERE CURRENT OF curS;
		CLOSE curSC;

	END LOOP;
	CLOSE curS;

	END;

	$$
	LANGUAGE plpgsql";

	$result2 = pg_query($dbconn, $sql2);
	if(!$result2){
		echo "update_cg error\n";
	}


//	$sql3 = "";

	pg_close($dbconn);
?>