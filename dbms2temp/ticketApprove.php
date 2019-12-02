<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <?php
        include 'topnav.php';
        session_start();
    ?>

    <main role="main">

  <div class="container">

    <div class="row justify-content-center"> 

      <div class="col-md-8 mt-5" >
        <h2 class="text-center">Insert Course</h2>
        <form action="php/ticketApprove.php" method = "POST"> 
          <!--<a href="userlist.php" class="btn btn-success btn-block">User List</a>-->
          
          <!--<div class="form-group">
              <label for="username">username</label>
              <input type="string" class="form-control" id="username" name="username" value="">
            </div>-->
            
            <div class="form-group">
              <label for="sname">Student name</label>
              <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $_GET['sname']?>">
            </div>

            <div class="form-group">
              <label for="fname">Faculty name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $_GET['fname']?>">
            </div>

            <div class="form-group">
              <label for="cname">Course Name</label>
              <input type="text" class="form-control" id="cname" name="cname" value="<?php echo $_GET['cname']?>">
            </div>

            <div class="form-group">
              <label for="cCredit">Course Credit</label>
              <input type="number" class="form-control" id="cCredit" name="cCredit" value="<?php echo $_GET['cCredit']?>">
            </div>

            <div class="form-group">
              <label for="currCredit">Current Credit</label>
              <input type="number" class="form-control" id="currCredit" name="currCredit" value="<?php echo $_GET['currCredit']?>">
            </div>

            <div class="form-group">
              <label for="approve">Approval</label>
              <input type="text" class="form-control" id="approve" name="approve" value="Yes">
            </div>

            <input type="submit" value="APPROVE" class="btn btn-primary btn-block">
        </form>


      </div>
  
    </div>

  </div>  
    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
