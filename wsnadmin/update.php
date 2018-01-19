<?php
  session_start();
  require 'library/database.php';
  if(!isset($_SESSION['adminId'])){
    include 'signin.php';
    die();
  }
?>
<!-- 
  http://localhost/wsnadmin/add.php?id=&category=saree&name=&price=&stock=&details=&desc=&color1=&color2=&color3=
 -->
<?php
  if(isset($_GET['id']) && isset($_GET['oldprice']) && isset($_GET['price']) && isset($_GET['stock'])){

    if(!empty($_GET['id'])){

      $id = $_GET['id'];
      $oldprice = $_GET['oldprice'];
      $price = $_GET['price'];
      $stock = $_GET['stock'];
      if(!empty($price) AND !empty($oldprice) AND !empty($stock))
        $query = "UPDATE products SET oldPrice= $oldprice, price= $price, stock= stock + $stock WHERE productId = $id";

      else if(empty($price) AND empty($oldprice) AND !empty($stock))
        $query = "UPDATE products SET stock= stock + $stock WHERE productId = $id";

      else if(!empty($price) AND !empty($oldprice) AND empty($stock))
        $query = "UPDATE products SET oldPrice= $oldprice, price= $price WHERE productId = $id";

      if(mysqli_query($con,$query))
        $_SESSION['success'] = 'success';
      else
        $_SESSION['success'] = 'fail';
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php require 'navigation.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Products</li>
      </ol>
    </div>
    <!-- /.container-fluid-->


  <div class="container">
    <div class="alert alert-success" role="alert" style="display: none;">
      <strong>Well done!</strong> Product updated successfully.
    </div>
    <div class="alert alert-warning" role="alert" style="display: none;">
      <strong>Oh No!</strong> Something is wrong.
    </div>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Product</div>
      <div class="card-body">
        <form action="update.php" method="GET">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="IDTag">Product ID</label>
                <input name="id" class="form-control" id="IDTag" type="text" aria-describedby="nameHelp" placeholder="eg. 1001">
              </div>
              <div class="col-md-6">
                <label for="priceTag">Old Price</label>
                <input name="oldprice" class="form-control" id="priceTag" type="text" aria-describedby="nameHelp" placeholder="eg. NRs 1234">
              </div>              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="priceTag">New Price</label>
                <input name="price" class="form-control" id="priceTag" type="text" aria-describedby="nameHelp" placeholder="eg. NRs 1234">
              </div>
              <div class="col-md-6">
                <label for="stockTag">Stock</label>
                <input name="stock" class="form-control" id="stockTag" type="text" aria-describedby="nameHelp" placeholder="eg. 12">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
      </div>
    </div>
  </div>
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php?logout=true">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>

  <script type="text/javascript">
    <?php
      if($_SESSION['success'] == 'success'){
        echo "$('.alert-success').show()";
        unset($_SESSION['success']);
      }
      else if($_SESSION['success'] == 'fail'){
        echo "$('.alert-warning').show()";
        unset($_SESSION['success']);
      }
    ?>
  </script>
</body>

</html>
