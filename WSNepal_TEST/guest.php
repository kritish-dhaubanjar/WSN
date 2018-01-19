<?php
  ob_start();
  session_start();
?>
<!-- SIGNUP -->
<?php
    require_once 'library/resources/database.php';
  if( isset($_POST['guest_firstname']) && isset($_POST['guest_lastname']) && isset($_POST['guest_address']) && isset($_POST['guest_city']) && isset($_POST['guest_contact'])){

    if(!empty($_POST['guest_firstname']) && !empty($_POST['guest_lastname']) && !empty($_POST['guest_address']) && !empty($_POST['guest_city']) && !empty($_POST['guest_contact'])){

      $guest_firstname = $_POST['guest_firstname'];
      $guest_lastname = $_POST['guest_lastname'];
      $guest_email = 'NULL';
      $guest_password = 'NULL';
      $guest_address = $_POST['guest_address'];
      $guest_city = $_POST['guest_city'];
      $guest_contact = $_POST['guest_contact'];

      echo $query = "INSERT INTO customers(firstname, lastname, email, password, address, city, contact) VALUES ('$guest_firstname','$guest_lastname','$guest_email','$guest_password','$guest_address','$guest_city','$guest_contact')";
      // $query_run=mysqli_query($con,$query);
          if(mysqli_query($con,$query)){
            echo $query = "SELECT id FROM customers WHERE firstname = '$guest_firstname' AND lastname = '$guest_lastname' AND address = '$guest_address' AND city = '$guest_city' AND contact = '$guest_contact' ";
            $query_run=mysqli_query($con,$query);
            $guest = mysqli_fetch_assoc($query_run);
            $_SESSION['guest_id'] = $guest['id'];
            header("Location: wsncheckout.php");
            exit();  
          }
          // $_SESSION['success'] = 'success';
    }
    else{
      // die();
      $_SESSION['success']='field_error';
      header('Location: guest.php?&guest=on');
      exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/sign.css" rel="stylesheet" type="text/css">
    <?php 
      include 'library/resources/link.inc.php';
    ?>
  </head>
  <body>
  <?php include 'library/templates/navbar.inc.php';?>

  <?php
    if($_SESSION['id'] == null && isset($_GET['guest'])){
  ?>
  <div id="wrapper">
    <div class="container">
    <h3>Guest Checkout</h3><br>
    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h4><br>

    <div class="field_error alert alert-warning" role="alert" style="display: none;">
      Holy guacamole! You should check in on some of those fields below.
    </div>

    <br>
      <form method="POST" action="guest.php">
        <div class="custom-form form-group row">
          <label for="inputName" class="col-sm-3 col-form-label">First name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputName" placeholder="John" name="guest_firstname">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputLName" class="col-sm-3 col-form-label">Last name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputLName" placeholder="Doe" name="guest_lastname">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="guest_address">
          </div>
        </div>   
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">City</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="City" name="guest_city">
          </div>
        </div>    
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">Country</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="Nepal" disabled>
          </div>
        </div>  
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">Contact No</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="0123456789" name="guest_contact">
          </div>
        </div> 
        <button type="submit" class="btn btn-outline-dark btn-lg">Continue</button>
        <hr>
      </form><br><br>
      <a href="signin.php"><p class="text-center lead">Already have an account? Sign in here</p></a>
      <br><br>   
    </div>
  </div>
  <?php } include 'library/templates/footer.inc.php';?>
  </body>
</html>  

<?php
    // if(isset($_GET['error']) && $_GET['error'] == 1){
      if($_SESSION['success'] == 'field_error'){ 
        echo '
         <script type="text/javascript">
           $(".field_error").show();
          </script>';
        unset($_SESSION['success']);        
      }
    //  else if($_SESSION['success'] == 'password_error'){ 
    //     echo '
    //     <script type="text/javascript">
    //       $(".password_error").show();
    //      </script>';
    //     unset($_SESSION['success']);        
    //   }else if($_SESSION['success'] == 'email_error'){ 
    //     echo '
    //     <script type="text/javascript">
    //       $(".email_error").show();
    //      </script>';
    //     unset($_SESSION['success']);        
    //   }
    // }

    //   if($_SESSION['success'] == 'success'){
    //     echo '
    //     <script type="text/javascript">
    //       $(".alert-success").show();
    //      </script>';
    //     unset($_SESSION['success']);
    //   }

    //   else if($_SESSION['success'] == 'fail'){
    //     echo '
    //     <script type="text/javascript">
    //       $(".alert-danger").show();
    //      </script>';
    //     unset($_SESSION['success']);
    //   }else if($_SESSION['success'] == 'field_error' || $_SESSION['success'] == 'password_error' || $_SESSION['success'] == 'email_error'){
    //       header('Location: signin.php?signin=false&error=1');
    //       exit();
      // }
?>


