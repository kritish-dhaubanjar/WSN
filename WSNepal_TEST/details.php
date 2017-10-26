<!-- ?productCat=saree&productId=1 -->
<?php
  require_once 'library/resources/database.php';

  if(isset($_GET['productCat']) && isset($_GET['productId']) && !empty($_GET['productCat']) && !empty($_GET['productId'])){
    $cat = $_GET['productCat'];
    $cat = $_GET['productCat'];
    $pid = $_GET['productId'];
    $query = "SELECT * FROM products WHERE productId = '$pid'";
    $query_run = mysqli_query($con,$query);
    $product = mysqli_fetch_assoc($query_run);
  }else{
    header('Location: index.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/details.css" rel="stylesheet" type="text/css">
    <?php include 'library/resources/link.inc.php';?>
<div id="fb-root"></div>

  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  </head>
  <body>

  <?php include 'library/templates/navbar.inc.php';?>

  <nav class="breadcrumb">
    <a class="breadcrumb-item" href="http://localhost/WSNepal">Home</a>
    <a class="breadcrumb-item" href="<?php echo $cat.'.php';?>"><?php echo $cat;?></a>
    <span class="breadcrumb-item active"><?php echo $product['title'];?></span>
  </nav>

<div id="wrapper">
  <div class="container-fluid">
    <div class="row">
        <div id="productImages" class="col-lg-5 col-md-6">
          <div class="owl-carousel owl-theme owl-loaded owl-drag">
              <div class="item" data-hash="zero"><img src="<?php echo $product['image1']; ?>" class="img-fluid"></div>
              <div class="item" data-hash="one"><img src="<?php echo $product['image2']; ?>" class="img-fluid"></div>
              <div class="item" data-hash="two"><img src="<?php echo $product['image3']; ?>" class="img-fluid"></div>
          </div>
          <br>
          <div id="productThumb">
            <a href="#zero"><img src="<?php echo $product['image1']; ?>" class="img-fluid"></a>
            <a href="#one"><img src="<?php echo $product['image2']; ?>" class="img-fluid"></a>
            <a href="#two"><img src="<?php echo $product['image3']; ?>" class="img-fluid"></a>
          </div>
        </div>
        <div class="col-md-6">
          <h1><?php echo $product['title'];?></h1><br>
          <h3>NRs <?php echo $product['price'];?>.00</h3><br>
          <?php if(!empty($product['oldPrice'])){?>
              <h4 style="text-decoration: line-through; color: #666;"> NRs <?php echo $product['oldPrice'];?>.00</h4><br>
          <?php }
            if($product['stock'] > 0)
              echo $stock = '<span style="color: green"><i class="fa fa-check" aria-hidden="true"></i> In Stock</span>';
            else
             echo $stock = '<span style="color: red"><i class="fa fa-times" aria-hidden="true"></i> Out of  Stock</span>';
            
          ?>
          <!-- <span style="color: green"><i class="fa fa-check" aria-hidden="true"></i> In Stock</span> -->

          <br><br>
          <!-- <p class="lead"><?php //echo $product['details'];?></p> -->

          <p id="p-details" class="lead"><?php echo $product['description'];?></p>
          <br>
          <form>
            SIZE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <select class="custom-select" id="size" <?php if($cat=='saree' || $cat=='lengha'){ echo 'disabled';}?> >
            <option value="o">Select Size</option>
              <?php 
               if($product['s'] == 1) {echo '<option value="s">S</option>';} 
               if($product['m'] == 1) {echo '<option value="m">M</option>';} 
               if($product['l'] == 1) {echo '<option value="l">L</option>';} ?>
            </select><br><br>
            
            Quantity&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <select class="custom-select" id="qty">
              <?php if($product[stock] >= 1)  echo '<option value="1">1</option>' ?>
              <?php if($product[stock] >= 2) echo '<option value="2">2</option>' ?>
              <?php if($product[stock] >= 3)  echo '<option value="3">3</option>' ?>
              <?php if($product[stock] >= 4)  echo '<option value="4">4</option>' ?>
              <?php if($product[stock] >= 5) echo '<option value="5">5</option>' ?>
              <?php if($product[stock] >= 6) echo '<option value="6">6</option>' ?>
            </select><br><br>
<!--             <button type="button" class="<?php //if($product['stock'] == 0) echo 'disabled';?> btn btn-dark btn-lg">Add to cart</button> -->
                  <a id="addtocart" class="<?php if($product['stock'] == 0) echo 'disabled';?> btn btn-dark btn-lg" 
                    name="cart/cartAction.php?action=addToCart&id=<?php echo $pid; ?>" href="#">
                    Add to cart
                  </a><br><br>

                  <div class="cart-success alert alert-success" role="alert" style="display:none;">
                    <?php echo $product['title']?> has been added to your cart.
                  </div>   

                  <script type="text/javascript">

                    var qty = document.getElementById('qty')
                    var size = document.getElementById('size')
                    url=document.getElementById('addtocart');
                    url_copy= url.name;
                    url.name = url_copy+'&qty='+qty.value+'&size='+size.value;
                    qty.onchange = function(){
                      url.name = url_copy+'&qty='+qty.value+'&size='+size.value;
                    };
                    size.onchange = function(){
                      url.name = url_copy+'&qty='+qty.value+'&size='+size.value;
                    };

                    

                  </script>
          </form>
        </div>
    </div>
  </div>

  <div id="productDetails" class="container-fluid">
        <div id="custom-navs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">DISCRIPTIONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">PRODUCT DETAILS</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <?php echo $product['description'];?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <?php echo $product['moreDetails'];?>
            </div>
          </div>
        </div>

        <div id="accordion" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
              <h5 class="mb-0">
                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  DISCRIPTIONS
                </a>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <?php echo $product['description'];?>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  PRODUCT DETAILS
                </a>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <?php echo $product['moreDetails'];?>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

<div class="container">
<?php //echo $_SERVER['REQUEST_URI'];?>
<div class="fb-comments" data-href="http://jyashaa.com<?php echo $_SERVER['REQUEST_URI'];?>" data-numposts="5" data-width="100%" data-colorscheme="light"></div>
</div>

<div id="products" class="container" style="padding-top: 10px; padding-bottom: 20px;">
  <h3 class="text-center">YOU MIGHT ALSO LIKE</h3>
  <br><br>
    <div class="row">
      <div class="item col-md-3">
        <div class="text-center">
            <div class="container-image">
              <img src="http://via.placeholder.com/510x680" class="image img-fluid img-thumbnail">
              <div class="middle">
                <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
              </div>
            </div>
          <!-- <img src="http://via.placeholder.com/510x680" class="img-fluid img-thumbnail"> -->
          <h4 class="title">Crochet Lace Scoop Tank</h4>
          <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
        </div>
      </div>
      <div class="item col-md-3">
        <div class="text-center">
          <div class="container-image">
              <img src="http://via.placeholder.com/510x680" class="image img-fluid img-thumbnail">
              <div class="middle">
                <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
              </div>
            </div>
          <!-- <img src="http://via.placeholder.com/510x680" class="img-fluid img-thumbnail"> -->
          <h4 class="title">Drapey Split-Neck Tank</h4>
          <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
        </div>
      </div>
      <div class="item col-md-3">
        <div class="text-center">
          <div class="container-image">
              <img src="http://via.placeholder.com/510x680" class="image img-fluid img-thumbnail">
              <div class="middle">
                <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
              </div>
            </div>
          <!-- <img src="http://via.placeholder.com/510x680" class="img-fluid img-thumbnail"> -->
          <h4 class="title">V-Neck Knot Slub Tee</h4>
          <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
        </div>
      </div>
      <div class="item col-md-3">
        <div class="text-center">
          <div class="container-image">
              <img src="http://via.placeholder.com/510x680" class="image img-fluid img-thumbnail">
              <div class="middle">
                <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
              </div>
            </div>
          <!-- <img src="http://via.placeholder.com/510x680" class="img-fluid img-thumbnail"> -->
          <h4 class="title">Drapey Contrast-Stitch Long</h4>
          <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
        </div>
      </div>
  </div>
</div>
   <?php  include 'library/templates/footer.inc.php';?>
   
  </body>
</html>
