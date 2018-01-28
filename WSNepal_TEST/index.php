<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'library/resources/link.inc.php';?>
  </head>
  <body>
      <?php include 'library/templates/navbar.inc.php';?>
      <!-- OWL Carousel -->
      <div id="backCarousel" class="owl-carousel owl-theme owl-loaded">
        <div><div class="custom-inner0 jumbotron jumbotron-fluid">
<!--           <h1 class="display-4 text-center">Vintage Wash Crewneck</h1>
          <p class="text-center lead">Garment-dyed and washed with a special technique for incredible,<br> softness and true color.</p> -->
        </div></div>

        <div><div class="custom-inner1 jumbotron jumbotron-fluid">
<!--           <h1 class="display-4 text-center">Modern Crew tree</h1>
          <p class="text-center lead">Garment-dyed and washed with a special technique for incredible,<br> softness and true color.</p> -->
        </div></div>

        <div><div class="custom-inner2 jumbotron jumbotron-fluid">
<!--           <h1 class="display-4 text-center">City Graphic Crew tree</h1>
          <p class="text-center lead">Garment-dyed and washed with a special technique for incredible,<br> softness and true color.</p> -->
        </div></div>
      </div>

    <!-- Features -->
    <div class="feature">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-xs-1">
              <img src="images/home/free-shipping.jpg">
              <h6>FREE SHIPPING</h6>
              <p>Convenient shipping to your door. Skip the trip on orders $50+</p>
            </div>
            <div class="col-md-4 col-xs-1">
              <img src="images/home/money-back.jpg">
              <h6>MONEY BACK GUARANTEE</h6>
              <p>Not satisfied with your order? Ship it back or return it in-store.</p>
            </div>
            <div class="col-md-4 col-xs-1">
            <img src="images/home/support.jpg">
            <h6>SUPPORT 24/7</h6>
            <p>You’ll be speaking with one of our courteous representatives in 60 seconds or less! </p>
            </div>
          </div>
        </div>
    </div>

<!-- Catogories -->
<div id="products" class="generics">
  <div class="container">
     <div class="m-container">
        <div class="m-row">
          <div class="col s2">
          </div>
          <div class="col s8"><h2 class="text-center">Generics</h2></div>
        </div>
      </div>

      <!-- <div class="row"> -->
          <!-- <div class="item col-md-2 col-sm-2"> -->
      <div class="m-row">
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="saree.php">
                  <img src="images/generics/saree_icon.jpg" class="image img-fluid img-thumbnail">
                </a>
            </div>
          </div>
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="lengha.php">
                <img src="images/generics/lengha_icon.jpg" class="image img-fluid img-thumbnail">
              </div>
          </div>
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="kurta.php">
                  <img src="images/generics/kurti_icon.jpg" class="image img-fluid img-thumbnail">
                </a>
              </div>
          </div>
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="dress.php">
                  <img src="images/generics/dress_icon.jpg" class="image img-fluid img-thumbnail">
                </a>
              </div>
          </div>
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="shoes.php">
                  <img src="images/generics/shoe_icon.jpg" class="image img-fluid img-thumbnail">
                </a>
              </div>
          </div>
          <div class="item col s4 l2 m4">
              <div class="hover-image">
                <a href="bag.php">
                  <img src="images/generics/bag_icon.jpg" class="image img-fluid img-thumbnail">
                </a>
          </div>
      </div>

    </div>
  </div>
</div>

<!-- New Arrivals Products -->

<div id="products">
  <div class="container">
     <div class="m-container">
        <div class="m-row">
          <div class="col s2"> 
              <a href="#indicators" role="button" data-slide="prev">
                <h2><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></h2>
              </a>
          </div>
          <div class="col s8"><h2 class="text-center">New Arrivals</h2></div>
          <div class="col s2">              
              <a href="#indicators" role="button" data-slide="next">
                <h2><i class="fa fa-chevron-circle-right" aria-hidden="true" style="float: right;"></i></h2>
              </a>
          </div>
        </div>
      </div>
        <br><br>

<!-- New 6 Items -->
<?php
  $sareeQuery = "SELECT * FROM products WHERE category='saree'  ORDER By productId DESC LIMIT 1";
  $lenghaQuery = "SELECT * FROM products WHERE category='lengha'  ORDER By productId DESC LIMIT 1";
  $shoesQuery = "SELECT * FROM products WHERE category='shoes'  ORDER By productId DESC LIMIT 2";
  $dressQuery = "SELECT * FROM products WHERE category='dress'  ORDER By productId DESC LIMIT 2";
  $bagQuery = "SELECT * FROM products WHERE category='bag'  ORDER By productId DESC LIMIT 2";

  $sarees = mysqli_query($con, $sareeQuery);
  $lenghas = mysqli_query($con, $lenghaQuery);
  $shoes = mysqli_query($con, $shoesQuery);
  $dresses = mysqli_query($con, $dressQuery);
  $bags = mysqli_query($con, $bagQuery);

?>
    <div id="indicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
              <div class="carousel-item active">
                  <div class="row">
  <?php
    while($saree = mysqli_fetch_assoc($sarees)){

  ?>
                    <div class="item col-md-3">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="<?php echo $saree['image1']?>" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="details.php?productCat=<?php echo $saree['category'];?>&productId=<?php echo $saree['productId'];?>"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title"><?php echo  strtoupper($saree['title']);?></h4>
                        <p><?php echo $saree['description']?></p>
                        <h4>NRs <?php echo $saree['price']?> 
                          <?php
                            if($saree['oldPrice'] != null){ ?>
                                <span class="old"> NRs <?php echo $saree['oldPrice'] ;?></span>
                            <?php } ?>
                        </h4>
                      </div>
                    </div>
  <?php } ?>             

    <?php
    while($lengha = mysqli_fetch_assoc($lenghas)){

  ?>
                    <div class="item col-md-3">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="<?php echo $lengha['image1']?>" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                              details.php?productCat=<?php echo $lengha['category'];?>&productId=<?php echo $lengha['productId'];?>
                              "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title"><?php echo  strtoupper($lengha['title']);?></h4>
                        <p><?php echo $lengha['description']?></p>
                        <h4>NRs <?php echo $lengha['price']?> 
                          <?php
                            if($lengha['oldPrice'] !=null){ ?>
                                <span class="old"> NRs <?php echo $lengha['oldPrice'] ;?></span>
                            <?php } ?>
                        </h4>
                      </div>
                    </div>
  <?php } ?> 
      <?php
    while($bag = mysqli_fetch_assoc($bags)){

  ?>
                    <div class="item col-md-3">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="<?php echo $bag['image1']?>" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                              details.php?productCat=<?php echo $bag['category'];?>&productId=<?php echo $bag['productId'];?>
                              "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title"><?php echo  strtoupper($bag['title']);?></h4>
                        <p><?php echo $bag['description']?></p>
                        <h4>NRs <?php echo $bag['price']?> 
                          <?php
                            if($bag['oldPrice'] !=null){ ?>
                                <span class="old"> NRs <?php echo $bag['oldPrice'] ;?></span>
                            <?php } ?>
                        </h4>
                      </div>
                    </div>
  <?php } ?> 

                    <!-- <div class="item col-md-4">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="images/cards/002.jpg" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                            details.php?productCat=saree&productId=1001
                            "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title">LOREM IPSUM</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
                      </div>
                    </div>
                    <div class="item col-md-4">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="images/cards/003.jpg" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                            details.php?productCat=saree&productId=1001
                            "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title">LOREM IPSUM</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
                      </div>
                    </div> -->
                </div>
              </div>

              <div class="carousel-item">
                  <div class="row">
  <?php
    while($shoe = mysqli_fetch_assoc($shoes)){

  ?>
                    <div class="item col-md-3">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="<?php echo $shoe['image1']?>" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                              details.php?productCat=<?php echo $shoe['category'];?>&productId=<?php echo $shoe['productId'];?>
                              "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title"><?php echo  strtoupper($shoe['title']);?></h4>
                        <p><?php echo $shoe['description']?></p>
                        <h4>NRs <?php echo $shoe['price']?> 
                          <?php
                            if($shoe['oldPrice'] !=null){ ?>
                                <span class="old"> NRs <?php echo $shoe['oldPrice'] ;?></span>
                            <?php } ?>
                        </h4>
                      </div>
                    </div>
  <?php } ?>             

    <?php
    while($dress = mysqli_fetch_assoc($dresses)){

  ?>
                    <div class="item col-md-3">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="<?php echo $dress['image1']?>" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="
                              details.php?productCat=<?php echo $dress['category'];?>&productId=<?php echo $dress['productId'];?>
                              "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title"><?php echo  strtoupper($dress['title']);?></h4>
                        <p><?php echo $dress['description']?></p>
                        <h4>NRs <?php echo $dress['price']?> 
                          <?php
                            if($dress['oldPrice'] !=null){ ?>
                                <span class="old"> NRs <?php echo $dress['oldPrice'] ;?></span>
                            <?php } ?>
                        </h4>
                      </div>
                    </div>
  <?php } ?> 



 <!--                    <div class="item col-md-4">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="images/cards/001.jpg" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title">LOREM IPSUM</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
                      </div>
                    </div>
                    <div class="item col-md-4">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="images/cards/002.jpg" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title">LOREM IPSUM</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
                      </div>
                    </div>
                    <div class="item col-md-4">
                      <div class="text-center">
                        <div class="container-image">
                          <img src="images/cards/003.jpg" class="image img-fluid img-thumbnail">
                          <div class="middle">
                            <div class="text"><a href="#"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                          </div>
                        </div>
                        <h4 class="title">LOREM IPSUM</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
                      </div>
                    </div> -->
                </div>
              </div>
      </div>
    </div>
  </div>

  <div class="new-sale">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-12" style="padding-bottom: 15px;">
            <img id="new" src="images/new.png" class="img-fluid">
            <div class="product-border"></div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12">
        <img id="sale" src="images/sale.png" class="img-fluid">
      </div>
    </div>
    </div>
  </div>

  <div class="letter container">
    <div class="row">
      <div class="off-back col-md-3 col-sm-12" style="padding: 0 15px 15px 15px; ">
        <img src="images/home/off.jpg">
      </div>
      <div class="news-letter col-md-9">
        <br>
        <h2 class="text-center">Newsletter</h2>
        <p class="lead text-center">Subscribe to mailing list to receive updates on new arrivals,<br> special offers and other discount information</p>
            <div class="m-container">
              <div class="m-row">
                <div class="col s10">
                  <input type="text" class="form-control" placeholder="Enter your email.." aria-label="Enter your email..">
                </div>
                <div class="col s2" style="padding-left: 0px;">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>

</div>


<div>
<!-- JS TABLE -->
  <div class="bottom-content container">
    <div class="row">
      <div class="question col-md-6">
        <h3>Why should you buy from us</h3>
            <div id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      The most important thing is that we - punctual
                    </a>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Money back guarantee
                    </a>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      You have questions? Our experts will answer them
                    </a>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                  </div>
                </div>
              </div>
            </div>
      </div>

      <!-- REVIEW SECTION -->
      <div class="review col-md-6"">
        <div class="owl-carousel owl-theme" style="border: solid #fff 5px; padding-bottom: 10px;">
            <div class="owl-item">
                <img src="images/review/info.jpg" class="img-fluid" style="width: auto; margin: auto; padding-top: 20px; ">
                <br>
                <h4 class="text-center">Lorem Ipsum</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="owl-item">
                <img src="images/review/info.jpg" class="img-fluid" style="width: auto; margin: auto; padding-top: 20px;">
                <br>
                <h4 class="text-center">Lorem Ipsum</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>              
            </div>
            <div class="owl-item">
                <img src="images/review/info.jpg" class="img-fluid" style="width: auto; margin: auto; padding-top: 20px;">
                <br>
                <h4 class="text-center">Lorem Ipsum</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>              
            </div>
        </div>   
      </div>
    </div>
  </div>
</div>


<!-- <div class="container-image">
  <img src="images/cards/001.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">John Doe</div>
  </div>
</div> -->
<!--     <div id="products" class="container">
      
      <br><br>
        <div class="row">
          <div class="item col-md-4">
            <div class="text-center">
              <img src="images/cards/001.jpg" class="img-fluid img-thumbnail">
              <h4 class="title">LOREM IPSUM</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
              <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
            </div>
          </div>
          <div class="item col-md-4">
            <div class="text-center">
              <img src="images/cards/002.jpg" class="img-fluid img-thumbnail">
              <h4 class="title">LOREM IPSUM</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
              <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
            </div>
          </div>
          <div class="item col-md-4">
            <div class="text-center">
              <img src="images/cards/003.jpg" class="img-fluid img-thumbnail">
              <h4 class="title">LOREM IPSUM</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
              <h4>NRs 1,200 <span class="old"> NRs 1,500</span></h4>
            </div>
          </div>
      </div>
    </div> -->
    <?php include 'library/templates/footer.inc.php';?>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderSuccess">
  Launch demo modal
</button> -->
<!-- Modal -->

<?php
  if(isset($_GET['orderId']) && !empty($_GET['orderId'])){
?>
  <div class="modal fade" id="orderSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-faded">
          <h5 class="modal-title" id="exampleModalLabel">Thankyou for Shopping!
          </h5>
<!--           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body alert-success">
          Your order has been placed successfully. Order ID is #<?php echo $_GET['orderId']; ?>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#orderSuccess').modal('show');
  </script>
<?php
}
?>
  <script type="text/javascript">
    document.onresize = function () {
      document.getElementById("backCarousel").reload();
    }
  </script>
  </body>
</html>