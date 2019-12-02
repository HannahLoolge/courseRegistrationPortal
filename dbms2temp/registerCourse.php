<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  
  <div class="container">

    <div class="row justify-content-center"> 

      <div class="col-md-8 mt-5" >
        <h2 class="text-center">Register Course</h2>
        <form action="php/registerCourse.php" method = "POST"> 
          <!--<a href="userlist.php" class="btn btn-success btn-block">User List</a>-->
          
          <div class="form-group">
              <label for="username">username</label>
              <input type="string" class="form-control" id="username" name="username" value="<?php echo $_GET['username']; ?>">
            </div>
            
            <div class="form-group">
              <label for="course">Course</label>
              <input type="text" class="form-control" id="course" name="course" value="<?php echo $_GET['course']; ?>">
            </div>

            <div class="form-group">
              <label for="batch">Batch</label>
              <input type="text" class="form-control" id="batch" name="batch" value="<?php echo $_GET['batch']; ?>">
            </div>

            <div class="form-group">
              <label for="fname">Faculty Name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $_GET['fname']; ?>">
            </div>

            <div class="form-group">
              <label for="credit">Credit</label>
              <input type="text" class="form-control" id="credit" name="credit" value="<?php echo $_GET['credit']; ?>">
            </div>

 <!--           <div class="form-group">
              <label for="grade">Grade</label>
              <input type="text" class="form-control" id="grade" name="grade" value="">
            </div>-->

            <div class="form-group">
              <label for="timeslot">Timeslot</label>
              <input type="text" class="form-control" id="timeslot" name="timeslot" value="<?php echo $_GET['timeslot']; ?>">
            </div>

            <div class="form-group">
              <label for="fadv">Faculty Advisor</label>
              <input type="text" class="form-control" id="fadv" name="fadv" value="<?php echo $_GET['fadv']; ?>">
            </div>


            <input type="submit" value="REGISTER" class="btn btn-primary btn-block">
        </form>


      </div>
  
    </div>

  </div>  
    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
