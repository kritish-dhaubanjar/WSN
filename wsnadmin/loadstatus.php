<?php
	require_once 'library/database.php';
	if(isset($_GET['current']) && !empty($_GET['current'])){
		$current = $_GET['current'];
		$url = 'http://localhost/WSNepal_TEST/details.php?productCat=';
		// saree&productId=1112
	}else if(isset($_GET['order_id']) && !empty($_GET['order_id'])){
		$order_id = $_GET['order_id'];
		$query = "SELECT * FROM order_items WHERE order_id = $order_id";
		$query_run = mysqli_query($con, $query);
?>		
<table class="table table-striped">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Product ID</th>
      <th>Qty.</th>
      <th>Size</th>
    </tr>
  </thead>
  <tbody>
<?php 
while($data = mysqli_fetch_assoc($query_run)){
?>
    <tr>
      <th scope="row"><?php echo $data['order_id']; ?></th>
      <td><?php echo $data['product_id']; ?></td>
      <td><?php echo $data['quantity']; ?></td>
      <td><?php echo $data['size']; ?></td>
    </tr>

<?php }	die();  ?>
  </tbody>
</table> 
<?php
	}else if(isset($_GET['delivered_order_id']) && !empty($_GET['delivered_order_id'])){
		$order_id_delivered = $_GET['delivered_order_id'];
		$delivered = "UPDATE orders SET delivered = 1 WHERE id = $order_id_delivered";

		$order_query = "SELECT product_id, quantity FROM order_items WHERE order_id = $order_id_delivered";
		$query_run = mysqli_query($con, $order_query);
		while($data = mysqli_fetch_assoc($query_run)){
			print_r($data);
			$qty = $data['quantity'];
			$id = $data['product_id'];
			$stock_update = "UPDATE products SET stock = stock - $qty WHERE productId = $id ";
			mysqli_query($con, $stock_update);
		}
		mysqli_query($con, $delivered);
		header('Location: index.php');
		die();
		
	}
?>


		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
if($current =='out_of_stock'){
	$out_of_stock_query = "SELECT * FROM products WHERE stock = 0";
	$out_of_stock = mysqli_query($con,$out_of_stock_query);
?>
		  <thead>
		    <tr>
		      <th>Product ID</th>
		      <th>Category</th>
		      <th>Product Name</th>
		      <th>Price</th>
		    </tr>
		  </thead>
		  <tfoot>
		    <tr>
		      <th>Product ID</th>
		      <th>Category</th>
		      <th>Product Name</th>
		      <th>Price</th>
		    </tr>
		  </tfoot>
   		<tbody>
<?php
	while($data = mysqli_fetch_assoc($out_of_stock)){
?>
    <tr>
      <td><?php echo $data['productId'];?></td>
      <td><?php echo $data['category'];?></td>
      <td><?php echo $data['title'];?></td>
      <td><?php echo 'NRS '.$data['price'].'.00';?></td>
    </tr>
<?php
	}} else if($current =='list_products'){
		$list_query = "SELECT * FROM products WHERE 1";
		$list = mysqli_query($con,$list_query);
?>
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>URL</th>
		      <th>Cat</th>
		      <th>Name</th>
		      <th>Old</th>
		      <th>Price</th>
		      <th>Stock</th>
		      <th>S</th>
		      <th>M</th>
		      <th>L</th>
		      <th>#1</th>
		      <th>#2</th>
		      <th>#3</th>
		    </tr>
		  </thead>
		  <tfoot>
		    <tr>
		      <th>ID</th>
		      <th>URL</th>
		      <th>Cat</th>
		      <th>Name</th>
		      <th>Old</th>
		      <th>Price</th>
		      <th>Stock</th>
		      <th>S</th>
		      <th>M</th>
		      <th>L</th>
		      <th>#1</th>
		      <th>#2</th>
		      <th>#3</th>
		    </tr>
		  </tfoot>
			<tbody>
<?php
	while($data = mysqli_fetch_assoc($list)){
?>
		    <tr>
		      <td><?php echo $data['productId'];?></td>
		      <td><a target='new' href="<?php echo $url.$data['category'].'&productId='.$data['productId'];?>">
		      	<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
		      </td>
		      <td><?php echo $data['category'];?></td>
		      <td><?php echo $data['title'];?></td>
		      <td><?php echo $data['oldPrice'];?></td>
		      <td><?php echo $data['price'].'.00';?></td>
		      <td><?php echo $data['stock'];?></td>
		      <td><?php echo $data['s'];?></td>
		      <td><?php echo $data['m'];?></td>
		      <td><?php echo $data['l'];?></td>
		      <td><?php echo $data['color1'];?></td>
		      <td><?php echo $data['color2'];?></td>
		      <td><?php echo $data['color3'];?></td>
		    </tr>
<?php
	}} else if($current =='new_orders'){
	 	// $list_query = "SELECT * FROM orders INNER JOIN customers ON orders.customer_id = customers.id WHERE orders.delivered IS NULL";
	 	$list_query = "SELECT * FROM customers INNER JOIN orders ON orders.customer_id = customers.id WHERE orders.delivered IS NULL";
	 	$list = mysqli_query($con,$list_query);
?>
		  <thead>
		    <tr>
		      <th>Order ID</th>
		      <th>Name</th>
		      <th>email</th>
		      <th>Address</th>
		      <th>Contact</th>
		      <th>Date</th>
		      <th>Total</th>
		      <th>Details</th>
		      <th>Delivered</th>
		    </tr>
		  </thead>
		  <tfoot>
		    <tr>
		      <th>Orde ID</th>
		      <th>Name</th>
		      <th>email</th>
		      <th>Address</th>
		      <th>Contact</th>
		      <th>Date</th>
		      <th>Total</th>
		      <th>Details</th>
		      <th>Delivered</th>
		    </tr>
		  </tfoot>
			<tbody>
<?php
	 while($data = mysqli_fetch_assoc($list)){
?>
		    <tr>
		      <td><?php echo $data['id'];?></td>
		      <td><?php echo $data['firstname'].' '.$data['lastname'];?></td>
		      <td><?php echo $data['email'];?></td>
		      <td><?php echo $data['address'];?></td>
		      <td><?php echo $data['contact'];?></td>
		      <td><?php echo $data['created'];?></td>
		      <td><?php echo 'NRs '.$data['total_price'];?></td>
		      <td><a class="order_info" href="loadstatus.php?order_id=<?php echo $data['id'];?>"><i class="fa fa-info" aria-hidden="true"></i></a></td>
		      <td><a class="order_delivered" href="loadstatus.php?delivered_order_id=<?php echo $data['id'];?>"><i class="fa fa-square-o" aria-hidden="true"></i></a></td>
		    </tr>
<?php
	}} else if($current =='delivered_orders'){
	 	// $list_query = "SELECT * FROM orders INNER JOIN customers ON orders.customer_id = customers.id WHERE orders.delivered IS NULL";
	 	$list_query = "SELECT * FROM customers INNER JOIN orders ON orders.customer_id = customers.id WHERE orders.delivered = 1";
	 	$list = mysqli_query($con,$list_query);
?>
		  <thead>
		    <tr>
		      <th>Order ID</th>
		      <th>Name</th>
		      <th>email</th>
		      <th>Address</th>
		      <th>Contact</th>
		      <th>Date</th>
		      <th>Total</th>
		      <th>Details</th>
		      <th>Delivered</th>
		    </tr>
		  </thead>
		  <tfoot>
		    <tr>
		      <th>Orde ID</th>
		      <th>Name</th>
		      <th>email</th>
		      <th>Address</th>
		      <th>Contact</th>
		      <th>Date</th>
		      <th>Total</th>
		      <th>Details</th>
		      <th>Delivered</th>
		    </tr>
		  </tfoot>
			<tbody>
<?php
	 while($data = mysqli_fetch_assoc($list)){
?>
		    <tr>
		      <td><?php echo $data['id'];?></td>
		      <td><?php echo $data['firstname'].' '.$data['lastname'];?></td>
		      <td><?php echo $data['email'];?></td>
		      <td><?php echo $data['address'];?></td>
		      <td><?php echo $data['contact'];?></td>
		      <td><?php echo $data['created'];?></td>
		      <td><?php echo 'NRs '.$data['total_price'];?></td>
		      <td><a class="order_info" href="loadstatus.php?order_id=<?php echo $data['id'];?>"><i class="fa fa-info" aria-hidden="true"></i></a></td>
		      <td><i class="fa fa-check" aria-hidden="true"></i></td>
		    </tr>
<?php
	} } ?>

</tbody>
</table>