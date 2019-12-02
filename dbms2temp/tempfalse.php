psql --host=localhost --username=postgres

$sql = "CREATE TRIGGER student_registers
		BEFORE INSERT
		ON STUDCOURSE
		FOR EACH ROW
		EXECUTE PROCEDURE studReg();
		
	"

$sql1 = "CREATE OR REPLACE FUNCTION studReg()
		RETURNS trigger AS
		$$
		BEGIN
				
	"


editFaculty.php  //href vala   ?id=".$row->course.
            "