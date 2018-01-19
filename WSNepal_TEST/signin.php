<?php
  ob_start();
  session_start();
?>
<!-- SIGNOUT -->
<?php
  if(isset($_GET['signout'])&& $_GET['signout'] == 1){
    session_destroy();
    header("Location: signin.php");
  }else if($_SESSION['id']!=null){
    header("Location: index.php");
  }
?>
<!-- SIGNUP -->
<?php
    require_once 'library/resources/database.php';
  if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['contact'])){

    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['contact'])){

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $contact = $_POST['contact'];

      $password=md5($_POST['password']);
      $repassword=md5($_POST['repassword']);
       
      $search="SELECT email FROM customers WHERE email='$email'" ;
      $search_run=mysqli_query($con,$search);
      $result=mysqli_num_rows($search_run);

      if(strcmp($password,$repassword)!=0){
        $_SESSION['success']='password_error';
      }
      else if($result!=0){
        $_SESSION['success']='email_error';
      }
      else{
        $query = "INSERT INTO customers(firstname, lastname, email, password, address, city, contact) VALUES ('$firstname','$lastname','$email','$password','$address','$city','$contact')";
        // $query_run=mysqli_query($con,$query);
        if(mysqli_query($con,$query))
          $_SESSION['success'] = 'success';
      }
    }
    else{
      $_SESSION['success']='field_error';
    }



     // $_SESSION['success'] = 'success'; 
     // $firstname = mysqli_real_escape_string($_POST['firstname']);
     // $lastname = mysqli_real_escape_string($_POST['lastname']);

     // $email = mysqli_real_escape_string($_POST['email']);

     // $address = mysqli_real_escape_string($_POST['address']);
     // $city = mysqli_real_escape_string($_POST['city']);
     // $contact = mysqli_real_escape_string($_POST['contact']);

     // $password = md5($_POST['password']);
     // $repassword = md5($_POST['repassword']);

     // $query = "SELECT email FROM customers WHERE email = '$email'";
     // $result = mysqli_query($con,$query);



     // $query = "INSERT INTO customers(firstname, lastname, email, password, address, city, contact) VALUES ('$firstname','$lastname','$email','$password','$address','$city','$contact')";
     // if(mysqli_query($con,$query))
     //    $_SESSION['success'] = 'success';

  }

// SIGNIN
  if( isset($_POST['usremail']) && isset($_POST['usrpassword']) ){
     $email = $_POST['usremail'];
     $password = md5($_POST['usrpassword']);
     $query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
     $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run) == 0){
        $_SESSION['success'] = 'fail';
     }else{
        $user = mysqli_fetch_assoc($query_run); 
          $_SESSION['id'] = $user['id'];
          $_SESSION['firstname'] = $user['firstname'];
          $_SESSION['lastname'] = $user['lastname'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['address'] = $user['address'];
          $_SESSION['city'] = $user['city'];
          $_SESSION['contact'] = $user['contact'];
        header("Location: index.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/sign.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/asyncValid.js"></script>
    <?php 
      include 'library/resources/link.inc.php';
    ?>
  </head>
  <body>
  <?php include 'library/templates/navbar.inc.php';?>

  <?php
    if(!isset($_GET['signin']) && $_SESSION['id'] == null){
  ?>
      <div id="wrapper">
        <div class="container">
        <h3>Log in to your account</h3>

      <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Well done!</h4>
          <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
          <hr>
          <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>

      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Oh Snap!</h4>
          <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
          <hr>
          <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>


        <br>
          <form action="signin.php" method="POST">
            <div class="custom-form form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="usremail">
              </div>
            </div>
            <div class="custom-form form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="usrpassword">
              </div>
            </div>
            <button type="submit" class="btn btn-outline-dark btn-lg">Sign In</button>
          </form><br><br>        
          <hr>
          <a href="signin.php?signin=false"><p class="text-center lead">No account? Create one here</p></a>
          <br><br>   
        </div>
      </div>
  <?php
    } 
    else if(isset($_GET['signin']) && !empty($_GET['signin']) && $_SESSION['id'] == null){
  ?>
  <div id="wrapper">
    <div class="container">
    <h3>Create an account</h3><br>
    <h4>Create an account for fast checkouts and easy access to order history.</h4><br>
          <div class="password_error alert alert-danger" role="alert" style="display: none;">
            Holy guacamole! You should check in on your passwords. Either too weak or doesn't match.
          </div>
          <div class="field_error alert alert-warning" role="alert" style="display: none;">
            Holy guacamole! You should check in on some of those fields below.
          </div>
          <div class="email_error alert alert-danger" role="alert" style="display: none;">
            Holy guacamole! Your email has already been used for an account.
          </div>    
    <br>
      <form method="POST" action="signin.php" name="signup">
        <div class="custom-form form-group row">
          <label for="inputName" class="col-sm-3 col-form-label">First name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputName" placeholder="John" name="firstname">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputLName" class="col-sm-3 col-form-label">Last name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputLName" placeholder="Doe" name="lastname">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputRePassword" class="col-sm-3 col-form-label">Re-Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputRePassword" placeholder="Password" name="repassword">
          </div>
        </div>
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address">
          </div>
        </div>   
        <div class="custom-form form-group row">
          <label for="inputAddress" class="col-sm-3 col-form-label">City</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputAddress" placeholder="City" name="city">
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
            <input type="text" class="form-control" id="inputAddress" placeholder="0123456789" name="contact">
          </div>
        </div> 
        <button id='signup' type="submit" class="btn btn-outline-dark btn-lg">Continue</button>
        <hr>
      </form><br><br>
      <a href="signin.php"><p class="text-center lead">Already have an account? Sign in here</p></a>
      <br><br>   
    </div>
  </div>
  <?php } include 'library/templates/footer.inc.php';?>
  <script type="text/javascript" src="js/validate.js"></script>
  </body>
</html>  

<?php
    if(isset($_GET['error']) && $_GET['error'] == 1){
      if($_SESSION['success'] == 'field_error'){ 
        echo '
        <script type="text/javascript">
          $(".field_error").show();
         </script>';
        unset($_SESSION['success']);        
      }else if($_SESSION['success'] == 'password_error'){ 
        echo '
        <script type="text/javascript">
          $(".password_error").show();
         </script>';
        unset($_SESSION['success']);        
      }else if($_SESSION['success'] == 'email_error'){ 
        echo '
        <script type="text/javascript">
          $(".email_error").show();
         </script>';
        unset($_SESSION['success']);        
      }
    }

      if($_SESSION['success'] == 'success'){
        echo '
        <script type="text/javascript">
          $(".alert-success").show();
         </script>';
        unset($_SESSION['success']);
      }

      else if($_SESSION['success'] == 'fail'){
        echo '
        <script type="text/javascript">
          $(".alert-danger").show();
         </script>';
        unset($_SESSION['success']);
      }else if($_SESSION['success'] == 'field_error' || $_SESSION['success'] == 'password_error' || $_SESSION['success'] == 'email_error'){
          header('Location: signin.php?signin=false&error=1');
          exit();
      }
?>


