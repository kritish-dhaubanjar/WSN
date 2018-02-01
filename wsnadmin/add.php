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
  if(isset($_GET['id']) && isset($_GET['category']) && isset($_GET['name']) && isset($_GET['price']) &&
    isset($_GET['stock']) && isset($_GET['details']) && isset($_GET['desc']) && isset($_GET['color1']) && 
    isset($_GET['color2']) && isset($_GET['color3'])
   ){

    if(!empty($_GET['id']) && !empty($_GET['category']) && !empty($_GET['name']) && !empty($_GET['price']) &&
    !empty($_GET['stock'])){

      $id = $_GET['id'];
      $image1 = 'products/'.$id.'-01.png';
      $image2 = 'products/'.$id.'-02.png';
      $image3 = 'products/'.$id.'-03.png';
      $cat = $_GET['category'];
      $title = addslashes($_GET['name']);
      $price = $_GET['price'];
      $stock = $_GET['stock'];
      $details = addslashes($_GET['details']);
      $desc = addslashes($_GET['desc']);
      $color1 = $_GET['color1'];
      $color2 = $_GET['color2'];
      $color3 = $_GET['color3'];

      if(!isset($_GET['sm']))
        $sm = 0;
      else
        $sm = $_GET['sm'];
      if(!isset($_GET['md']))
        $md = 0;
      else
        $md = $_GET['md'];
      if(!isset($_GET['lg']))
        $lg = 0;
      else
        $lg = $_GET['lg'];

      $query = "INSERT INTO products(productId, category, title, price, stock, details, s, m, l, description, image1, image2, image3, color1, color2, color3) VALUES ( '$id', '$cat', '$title', '$price','$stock', '$details',
      '$sm','$md','$lg','$desc','$image1', '$image2', '$image3','$color1','$color2','$color3' )";

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
        <li class="breadcrumb-item active">Add Products</li>
      </ol>
    </div>
    <!-- /.container-fluid-->


  <div class="container">
    <div class="alert alert-success" role="alert" style="display: none;">
      <strong>Well done!</strong> Product added successfully.
    </div>
    <div class="alert alert-warning" role="alert" style="display: none;">
      <strong>Oh No!</strong> Something is wrong.
    </div>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Product</div>
      <div class="card-body">
        <form action="add.php" method="GET">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="IDTag">Product ID</label>
                <input name="id" class="form-control" id="IDTag" type="text" aria-describedby="nameHelp" placeholder="eg. 1001">
              </div>
              <div class="col-md-6">
                <label for="Category">Category</label>
                <select name="category" class="form-control" id="Category" aria-describedby="nameHelp">
                  <option value="saree">Saree</option>
                  <option value="lengha">Lengha</option>
                  <option value="kurta">Kurtas</option>
                  <option value="shoes">Shoes</option>
                  <option value="dress">Dress</option>
                  <option value="bag">Bags</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input name="name" class="form-control" id="productName" type="text" aria-describedby="emailHelp" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="priceTag">Price</label>
                <input name="price" class="form-control" id="priceTag" type="text" aria-describedby="nameHelp" placeholder="eg. NRs 1234">
              </div>
              <div class="col-md-6">
                <label for="stockTag">Stock</label>
                <input name="stock" class="form-control" id="stockTag" type="text" aria-describedby="nameHelp" placeholder="eg. 12">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="detailsTag">Product Details</label>
            <textarea name="details" class="form-control" id="detailsTag" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label for="descriptionTag">Product Descriptions</label>
            <textarea name="desc" class="form-control" id="descriptionTag" rows="4"></textarea>
          </div>

          <label class="custom-control custom-checkbox">
            <input name="sm" type="checkbox" class="custom-control-input" value='1'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">S</span>
          </label>
          <label class="custom-control custom-checkbox">
            <input name="md" type="checkbox" class="custom-control-input" value='1'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">M</span>
          </label>
          <label class="custom-control custom-checkbox">
            <input name="lg" type="checkbox" class="custom-control-input" value='1'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">L</span>
          </label>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="color">Color #1</label>
                <input name="color1" class="form-control" id="color" type="text" aria-describedby="nameHelp" placeholder="eg. white">
              </div>
              <div class="col-md-4">
                <label for="stockTag">Color #2</label>
                <input name="color2" class="form-control" id="color" type="text" aria-describedby="nameHelp" placeholder="eg. white">
              </div>
              <div class="col-md-4">
                <label for="stockTag">Color #3</label>
                <input name="color3" class="form-control" id="color" type="text" aria-describedby="nameHelp" placeholder="eg. white">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add to List</button>
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
