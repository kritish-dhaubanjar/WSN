<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
require '../library/resources/database.php';

if(isset($_GET['size']) && isset($_GET['qty'])){
    $size = $_GET['size'];
    $_qty = $_GET['qty'];
}
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $con->query("SELECT * FROM products WHERE productId = ".$productID);
        $row = $query->fetch_assoc();

        $itemData = array(
            'id' => $row['productId'],
            'name' => $row['title'],
            'price' => $row['price'],
            'image' => $row['image1'],
            'qty' => $_qty,
            'size' => $size
        );
        $insertItem = $cart->insert($itemData);

        //TOTAL
        $_SESSION['totalItems'] = $cart->total_items();
        echo $cart->total_items();

        // $redirectLoc = $insertItem?'viewCart.php':'index.php';
        // header("Location: ".$redirectLoc);

    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        // echo $updateItem?'ok':'err'; die;

    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);

        //TOTAL
        $_SESSION['totalItems'] = $cart->total_items();
        // echo $cart->total_items();
        $redirect = $_SERVER['HTTP_REFERER'];
        header("Location: $redirect");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $con->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");

            $_SESSION['totalItems'] = 0;  //empty cart after order placement
            unset($_SESSION['guest_id']);   //unset guest id after order placement

        if($insertOrder){
            $orderID = $con->insert_id;
            /*FOR ORDER STATUS*/
            $insertStatus = $con->query("INSERT INTO order_status (order_id) VALUES ('".$orderID."')");

            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity, size) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."', '".$item['size']."');";
            }
            // insert order items into database
            $insertOrderItems = $con->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: ../wsncheckout.php");
            }
        }else{
            header("Location: ../wsncheckout.php");
        }
    }else{
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
}