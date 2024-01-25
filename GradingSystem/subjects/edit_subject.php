<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
  }

  if(isset($_GET['id'])){
    $sql = "SELECT * FROM subjects WHERE subjectID =".$_GET['id'];
    $subjects = $conn->query($sql);
    if ($subjects->num_rows > 0){
      while($row = $student->fetch_assoc()){
        $subjectName = $_POST['subjectName'];
        $subjectDescription = $_POST['subjectDescription'];
        $courseID = $_POST['courseID'];
        $instructorID = $_POST['instructorID'];
      }
    }
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $subjectName = $_POST['subjectName'];
    $subjectDescription = $_POST['subjectDescription'];
    $courseID = $_POST['courseID'];
    $instructorID = $_POST['instructorID'];

    $sql = "UPDATE `subjects` SET `firstName`='$subjectName',`subjectDescription`='$subjectDescription',`courseID`='$courseID',`instructorID`='$instructorID' WHERE subjectID = ".$_GET['id'];
    
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
      <h1>Add Student Form</h1>
      <a href="index.php" class="btn btn-success">Back</a>
        <form action="" method="POST">
            <div class="form-group mb-2">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $student_firstName; ?>">
            </div>
            <div class="form-group mb-2">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $student_lastName; ?>">
            </div>
            <div class="form-group mb-2">
                <label for="">Date of Birth</label>
                <input type="date" class="form-control" name="DOB" value="<?php echo $student_DOB; ?>">
            </div>
            <div class="form-group mb-2">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $student_email; ?>">
            </div>
            <div class="form-group mb-2">
                <label for="">Address</label>
                <textarea name="address" id="" cols="30" rows="5" class="form-control"><?php echo $student_address; ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

       
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>