<?php
  ob_start();
  session_start();

  require 'library/database.php';
  if(isset($_GET['adminName']) && isset($_GET['adminPassword'])){
    if(!empty($_GET['adminName']) && !empty($_GET['adminPassword'])){
      $username = $_GET['adminName'];
      $password = $_GET['adminPassword'];
      $admin_query = "SELECT id, username, password FROM admin WHERE username = '$username' AND password = '$password' ";
      $admin = mysqli_query($con,$admin_query);
      $admin = mysqli_fetch_assoc($admin);
      $_SESSION['adminId'] = $admin['id'];
      header('Location: index.php');
      exit();
    }else{
      $_SESSION['adminId'] = null;
      header('Location: index.php');
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>WSN Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="signin.php" method="GET">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" placeholder="Enter username" name="adminName">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="adminPassword">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
