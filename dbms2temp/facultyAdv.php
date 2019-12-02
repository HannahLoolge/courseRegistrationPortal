<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>University Portal</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

     Custom styles for this template 
    <link href="jumbotron.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <?php
        include 'topnav.php';
    ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">
            <?php
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }
              else{
              echo 'University!';
              }
            ?>
          </h1>
          <p>This is the faculty portal of the best university.</p>
        </div>
      </div>

  <div class="container mt-5 pt-5">
    <h2>Approve tickets</h2>

    <?php 
      include 'php/db-connect.php';

      $sql = "SELECT sName, fName, cName, cCredit, currCredit, Approval FROM TICKET
              ";
      $result = pg_query($dbconn, $sql);
      if(!$result){
        echo 'error running query';
      }

      echo "<table class='table'>
        <thead>
         <th>Student name</th>
         <th>Faculty name</th>
         <th>Course name</th>
         <th>Course Credit</th>
         <th>Current Credit</th>
         <th>Approve</th>
        </thead>";

     while($row = pg_fetch_row($result)){
       echo "<tr>",
         "<td>".$row[0]."</td>".
         "<td>".$row[1]."</td>".
         "<td>".$row[2]."</td>".
         "<td>".$row[3]."</td>".
         "<td>".$row[4]."</td>".
         "<td><a class='btn btn-success btn-=block' href='ticketApprove.php?sname=".$row[0]."&fname=".$row[1].
            "&cname=".$row[2].
            "&cCredit=".$row[3].
            "&currCredit=".$row[4].
            "'>Approve</a></td>".
        "</tr>";
      }
      echo "</table>";      


    ?>
  </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
