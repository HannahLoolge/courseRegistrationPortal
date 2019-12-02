<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
	<?php
        include 'topnav.php';
    ?>

	<div class="container mt-5">

		<div class="row justify-content-center"> 

			<div class="col-md-8 mt-5" >
				<h2 class="text-center">Upload Grade</h2>
				<form action="php/uploadGrade.php" method = "POST"> 
					<div class="form-group">
					    <label for="sname">Student Name</label>
					    <input type="string" class="form-control" id="sname" name="sname" value="<?php echo $_GET['sname']?>">
				  	</div>

				  	<div class="form-group">
					    <label for="batch">Batch</label>
					    <input type="text" class="form-control" id="batch" name="batch" value="<?php echo $_GET['batch']?>">
				  	</div>

				  	<div class="form-group">
					    <label for="course">Course</label>
					    <input type="text" class="form-control" id="course" name="course" value="<?php echo $_GET['course']?>">
				  	</div>

				  	<div class="form-group">
					    <label for="fname">Faculty name</label>
					    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $_GET['username']?>">
				  	</div>

				  	<div class="form-group">
					    <label for="timeslot">Timeslot</label>
					    <input type="text" class="form-control" id="timeslot" name="timeslot" value="<?php echo $_GET['timeslot']?>">
				  	</div>

				  	<div class="form-group">
					    <label for="grade">Grade</label>
					    <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $_GET['grade']?>">
				  	</div>

				  	<input type="submit" name="UPLOAD" class="btn btn-primary btn-block">
				</form>


			</div>
	
		</div>

	</div>	
		
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var password = document.getElementById("password")
		 , confirm_password = document.getElementById("confirm");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;

	</script>

</body>
</html>
