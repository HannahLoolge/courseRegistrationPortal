<!doctype html>
<html lang="en">
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
          <p>This is the course registration portal of the best university.</p>
        </div>
      </div>

  <div class="container mt-5 pt-5">
    <h2>Course Registration portal</h2>

    <?php 
      include 'php/db-connect.php';
            
        //$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
      $temp = $_SESSION['username'];
        $sql = "SELECT DISTINCT course, timeslot, batches, leastCG FROM OFFER
                WHERE fname = '$temp'";
        $result = pg_query($dbconn, $sql);
        if(!$result){
          echo "An error occurred. \n";
          exit;
        }

        echo "<table class='table'>
          <thead>
            <th>Course Offered</th>
            <th>Timeslot</th>
            <th>Batches</th>
            <th>LeastCG</th>
            <th>Upload Grades</th>
          </thead>";

        while($row = pg_fetch_row($result)){
          echo "<tr>",
            "<td>".$row[0]."</td>".
            "<td>".$row[1]."</td>".
            "<td>".$row[2]."</td>".
            "<td>".$row[3]."</td>".
            "<td><a class='btn btn-success btn-=block' href='uploadGrade.php?username=".$temp."&course=".$row[0].
            "&timeslot=".$row[1].
            "&batch=".$row[2].
            "'>Upload</a></td>".
          "</tr>";
        }
        echo "</table>";

        $sql2 = "SELECT course FROM COURSE WHERE course!=''";
        $result2 = pg_query($dbconn, $sql2);
        if(!$result2){
          echo " An error occurred.\n";
          exit;
        }

        echo "<table class='table'>
          <thead>
            <th>Course</th>
            <th>Action</th>
          </thead>";

        while($row = pg_fetch_row($result2)){
          echo "<tr>",
            "<td>".$row[0]."</td>".
            "<td><a class='btn btn-success btn-=block' href='offerCourse.php?username=".$temp.
            "&course=".$row[0]."'>Offer</a></td>".
          "</tr>";
        }
        echo "</table>";

    ?>
    <a class='btn btn-success btn-=block' href='insertCourse.php'>Insert Course</a>

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
