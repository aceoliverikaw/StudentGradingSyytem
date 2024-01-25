<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
  }


?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APPNAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column vh-100">
    <?php include '../layouts/Header.php'; ?>

    <div class="container">
      <h1>Grade</h1>
      <a href="add_grade.php" class="btn btn-success">Add Grade</a>
      <table class="table">
        <thead>
          <th>gradeId</th>
          <th>studentID</th>
          <th>subjectID</th>
          <th>prelim</th>
          <th>midterm</th>
          <th>final</th>
          <th>dateGraded</th>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM grade";
          $result = $conn->query($sql); 
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
              echo '<tr>';
                echo '<td>'.$row['gradeID'].'</td>';
                echo '<td>'.$row['studentID'].'</td>';
                echo '<td>'.$row['subjectID'].'</td>';
                echo '<td>'.$row['prelim'].'</td>';
                echo '<td>'.$row['midterm'].'</td>';
                echo '<td>'.$row['final'].'</td>';
                echo '<td>'.$row['dateGraded'].'</td>';
                echo '<td><a href="edit_grade.php?id='.$row['gradeID'].'" class="btn btn-info">Edit</a><a href="delete_grade.php?id='.$row['gradeID'].'" class="btn btn-danger">Delete</a></td>';
              echo '</tr>';
            }
          }
           
          ?>
        </tbody>
      </table>
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>