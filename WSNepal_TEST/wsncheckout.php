<?php
session_start();

// include database configuration file
require 'library/resources/database.php';
// initializ shopping cart class
include 'cart/Cart.php';
$cart = new Cart;
// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}
// set customer ID in session
if($_SESSION['id']==null && $_SESSION['guest_id']==null){
	header('Location: guest.php?guest=on');
	exit;
}else if($_SESSION['id'] != null){
	$_SESSION['sessCustomerID'] = $_SESSION['id'];
}else{
	$_SESSION['sessCustomerID'] = $_SESSION['guest_id'];
}



// get customer details by session customer ID
$query = $con->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);

/*Guest*/
if(mysqli_num_rows($query) == 0 ){
	$query = $con->query("SELECT * FROM guest_customers WHERE id = ".$_SESSION['sessCustomerID']);
}

$custRow = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'library/resources/link.inc.php';?>
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
  </head>
  <body>
  	<?php include 'library/templates/navbar.inc.php';?>
  	<div id="wrapper">
	  	<div class="container-fluid">
		  	<h2 class="display-5">Shopping Cart</h2><br>
		  	
		  	<div class="row" id="checkoutList">
		  		<div class="col-md-8 col-sm-8">
		          <ul class="list-group">
<?php
if($cart->total_items() > 0){
    //get cart items from session
    $cartItems = $cart->contents();
    foreach($cartItems as $item){
?>		
            <li class="list-group-item">
            <div class="row">
              <div class="col-md-3">
                <img src="<?php echo $item["image"];?>" class="img-fluid">
              </div>
              <div class="col-md-6">
                <h4 style="padding-top: 10px;"><?php echo $item["name"]; ?></h4>
                <p>SIZE : <?php echo $item["size"]; ?></p>
                <h3><?php echo 'NRs '.$item["price"].'.00'; ?><p> x <?php echo $item["qty"]; ?></p></h3>
                <h4>Subtotal : <?php echo 'NRs '.$item["subtotal"].'.00'; ?></h4>
              </div>
              <div class="col-md-3">
             	<a href="cart/cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="remove btn"><h2><i class="fa fa-trash-o" aria-hidden="true"></i></h2></a>
              </div>
            </div>
            </li>
<?php } ?>
		          </ul>    
		        </div>
		        <div class="col-md-4 col-sm-4">
		          <table class="table table-striped">
		            <tbody>
		              <tr>
		                <td>Shipping</td>
		                <td><?php if($cart->total()>=950) echo 'FREE'; else echo 'NRs 100.00';?></td>
		              </tr>
		              <tr>
		                <th scope="row">TOTAL</th>
						<th scope="row"><?php 
              			  $total = ($cart->total()>=950)? $cart->total():($cart->total()+100);
              			  echo 'NRs '.$total.'.00'; ?>  
              			</th>
		              </tr>
		            </tbody>
					</table>
					<div class="row">
						    <div id="shipAddr">
						        <h3>Shipping Details</h3><br>
						        <p>Name: <?php echo $custRow['firstname'].' '.$custRow['lastname']; ?></p>
						        <p>email: <?php echo $custRow['email']; ?></p>
						        <p>Contact: <?php echo $custRow['contact']; ?></p>
						        <p>Address: <?php echo $custRow['address'].', '.$custRow['city']; ?></p>
						    </div>
					</div>
					<a id="placeOrder" class=" btn btn-dark btn-lg" href="cart/cartAction.php?action=placeOrder">
                    Place Order
                  	</a>   
				</div>
		  	</div>
	  	</div>
	</div>
<?php } ?>

    
    <?php include 'library/templates/footer.inc.php';?>
  </body>
</html>

