<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $studentID = $_POST['studentID'];
    $subjectID = $_POST['subjectID'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];
    $dateGraded = $_POST['dateGraded'];

    $sql = "INSERT INTO `grade`(`studentID`, `subjectID`, `prelim`, `midterm`, `final`, `dateGraded`) VALUES ( ' $studentID', '$subjectID', ' $prelim',' $midterm',' $final,' $dateGraded')";
    
   if($conn->query($sql) === TRUE){
    // header('location : index.php');
    echo '<script> window.location = "index.php";</script>';
   }

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
      <h1>Add Grade Form</h1>
      <a href="index.php" class="btn btn-success">Back</a>
        <form action="" method="POST">
            <div class="form-group mb-2">
                <label for="">studentID</label>
                <input type="text" class="form-control" name="studentID">
            </div>
            <div class="form-group mb-2">
                <label for="">subjectID</label>
                <input type="text" class="form-control" name="subjectID">
            </div>
            <div class="form-group mb-2">
                <label for="">prelim</label>
                <input type="text" class="form-control" name="prelim">
            </div>
            <div class="form-group mb-2">
                <label for="">midterm</label>
                <input type="text" class="form-control" name="midterm">
            </div>
            <div class="form-group mb-2">
                <label for="">final</label>
                <input type="text" class="form-control" name="final">
            </div>
            <div class="form-group mb-2">
                <label for="">dateGraded</label>
                <input type="date" class="form-control" name="dateGraded">
            </div>
         
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

       
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>