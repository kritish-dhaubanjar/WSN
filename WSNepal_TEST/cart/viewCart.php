<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
?>
<!--     <script type="text/javascript">
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            location.reload();
            // if(data === 'ok'){
            //     location.reload();
            // }else{
            //     alert('Cart update failed, please try again.');
            // }
        });
    }
    </script> -->

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SHOPPING CART</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container-fluid">

          <ul class="list-group">
<?php
if($cart->total_items() > 0){
    //get cart items from session
    $cartItems = $cart->contents();
    foreach($cartItems as $item){
        // print_r($item); 
?>
            <li class="list-group-item">
            <div class="row">
              <div class="col-md-3">
                <!-- <img src="http://via.placeholder.com/112x150" class="img-fluid"> -->
                <img src="<?php echo $item["image"];?>" class="img-fluid">
              </div>
              <div class="col-md-9">
                <h4 style="padding-top: 10px;"><?php echo $item["name"]; ?></h4>
                <p>SIZE : <?php echo $item["size"]; ?></p>
                <h3><?php echo 'NRs '.$item["price"].'.00'; ?><p> x <?php echo $item["qty"]; ?></p></h3>
                <h4>Subtotal : <?php echo 'NRs '.$item["subtotal"].'.00'; ?></h4>

                <a href="cart/cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="remove btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </div>
            </div>
            </li>

<?php } ?>
          </ul>    
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
                echo 'NRs '.$total.'.00'; ?></th>
              </tr>
            </tbody>
</table>        
        </div>

<?php
    }else{
?>
    <h4>Your cart is empty.....</h4>
<?php }?>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-info" data-dismiss="modal">Continue Shopping</button>
<?php
if($_SESSION['totalItems']>0){
?>
    <a href="wsncheckout.php" class="btn btn-dark">Checkout</a>
<?php } ?>
</div>

<!-- <a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i> -->

