<?php 
    if (session_status() == PHP_SESSION_NONE) {
         session_start();
     }
?> 
    <div class="container-fluid bg-dark bar">
      <div class="row">
        <div class="news col-md-3">FREE DELIVERY ABOVE Rs.950</div>
        <div id="social" class="col-md-9">
          <ul>
          <div>
            <?php
              if($_SESSION['id']!=0){
                $link = 'signin.php?signout=1';
                $link_name = 'Sign Out';
              }else{
                $link = 'signin.php';
                $link_name = 'Sign In';
              }
            ?>
            <li class="li-links"><?php if( $_SESSION['id']!=0 ) echo 'Hello! '.$_SESSION['firstname']; ?></li>
            <li class="li-links"><a class="navbar-link" href="<?php echo $link; ?>"> <?php echo $link_name; ?></a></li>
            <!-- <li class="li-links"><a class="navbar-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
            <!-- <li><a class="navbar-link" href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li> -->
            <li class="li-links"><a class="navbar-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="li-links"><a class="navbar-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li class="li-links"><a id="openCart" class="navbar-link" href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp(<span id="cartNum"><?php echo $_SESSION['totalItems'];?></span>)</a></li>
          </div>
            <li>                    
            <form>
                  <div class="m-row" style="max-height: 5px;">
                      <div class="col s10" style="padding: 0px 0px 0px 5px;">
                        <input type="text" class="form-control" placeholder="Search our catalog..." aria-label="Search for...">
                      </div>
                      <div class="col s2" style="padding: 0px 0px 0px 5px;">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div> 
                  </div>  
            </form>         
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="custom-header jumbotron jumbotron-fluid sticky-top">        
       <nav class="navbar navbar-expand-md navbar-custom">
          <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="float: right;">
            <i class="fa fa-bars" aria-hidden="true" style="color: #333;"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ml-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="saree.php">SAREE<span class="sr-only">(current)</span></a>
              </li>               
              <li class="nav-item">
                <a class="nav-link" href="lengha.php">LENGHAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kurta.php">KURTAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dress.php">DRESSES</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="shoes.php">SHOES</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="bag.php">BAGS</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#">SALE</a>
              </li>                 
            </ul>
            <div class="col-md-1"></div>
          </div>
        </nav>
    </div> 



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div  id="cartList" class="modal-content">

<!--       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SHOPPING CART</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> -->

        <!-- <div class="container-fluid">
          <ul class="list-group">
            <li class="list-group-item">
            <div class="row">
              <div class="col-md-3">
                <img src="http://via.placeholder.com/112x150" class="img-fluid">
              </div>
              <div class="col-md-9">
                <h4>Classic peacoat</h4>
                <p>SIZE : S</p>
                <p>COLOR : Orange</p>
                <h3>$16.51</h3><h4> x 1</h4>
              </div>
            </div>
            </li>

            <li class="list-group-item">
            <div class="row">
              <div class="col-md-3">
                <img src="http://via.placeholder.com/112x150" class="img-fluid">
              </div>
              <div class="col-md-9">
                <h4>Classic peacoat</h4>
                <p>SIZE : S</p>
                <p>COLOR : Orange</p>
                <h3>$16.51</h3><h4> x 1</h4>
              </div>
            </div>
            </li>
      
          </ul>          
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Subtotal</td>
                <td>$16.51</td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td>$7.00</td>
              </tr>
              <tr>
                <td>Taxes</td>
                <td>$0.00</td>
              </tr>
              <tr>
                <th scope="row">TOTAL</th>
                <th scope="row">$23.51</th>
              </tr>
            </tbody>
</table>        
        </div> -->

<!--       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Continue Shopping</button>
      <?php
        //if($_SESSION['totalItems']>0){
      ?>
        <button type="button" class="btn btn-dark">Proceed to Checkout</button>
        <?php// } ?>
      </div> -->

    </div>
  </div>
</div>
