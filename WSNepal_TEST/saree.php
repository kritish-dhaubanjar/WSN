<?php
	ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/saree.css" rel="stylesheet" type="text/css">
    <?php include 'library/resources/link.inc.php';?>
    <script type="text/javascript" src="load.js"></script>
  </head>
  <body>
  	<?php include 'library/templates/navbar.inc.php';?>


  <nav class="breadcrumb">
    <a class="breadcrumb-item" href="http://localhost/WSNepal">Home</a>
    <span class="breadcrumb-item active">saree</span>
  </nav>

<section id="wrapper">
  <div class="container-fluid">
    <div class="row">

      <div id="filter" class="col-md-3">
        <h3> Filter by &nbsp&nbsp<i id="showOptions" class="fa fa-th-large" aria-hidden="true"></i></h3>
        </h3>
        <br>
            <div id="filterOptions" class="filter_off">
<!--             <h6>SIZE</h6> -->
          <form name="filterform" method="GET" action="#">
<!--             <label class="custom-control custom-checkbox">
              <input name="small" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">S</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="medium" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">M</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="large" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">L</span>
            </label><br><br>-->  

            <h6>COLOR</h6>
            <label class="custom-control custom-checkbox">
              <input name="taupe" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator" style="background-color:#CFC4A6;"></span>
              <span class="custom-control-description">Taupe</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="beige" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator" style="background-color:#f5f5dc;"></span>
              <span class="custom-control-description">Beige</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="white" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">White</span>
            </label><br>   
<!--             <label class="custom-control custom-checkbox">
              <input name="" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator" style="background-color:#5D9CEC"></span>
              <span class="custom-control-description">Blue</span>
            </label> --><br>      
<!--             <label class="custom-control custom-checkbox">
              <input name="" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator" style="background-color:#F1C40F"></span>
              <span class="custom-control-description">Yellow</span>
            </label> --><br>       
  <!--           <label class="custom-control custom-checkbox">
              <input name="" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator" style="background-color:#F39C11"></span>
              <span class="custom-control-description">Orange</span>
            </label> --><br><br>  
            <h6>PRICE</h6>
            <label class="custom-control custom-checkbox">
              <input name="a" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">NRs 0 - NRs 2,999</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="b" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">NRs 3,000 - NRs 5,999</span>
            </label><br>    
            <label class="custom-control custom-checkbox">
              <input name="c" type="checkbox" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">NRs 6,000 - NRs 10,999</span>
            </label><br>
            <br><br>
          </form>
          <button id="clear" type="submit" class="btn btn-dark btn-lg">CLEAR FILTER</button>
          </div>
      </div>

      <div id="items" class="col-md-9">
          <h2>Saree</h2>
          <div id="about" class="row">
            <div class="col-md-9">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-md-3">
              <img src="images/blouses.jpg" class="img-fluid">
            </div>
          </div>
            <nav class="navbar navbar-light bg-light">
<!--               <div class="dropdown">
                Sort By:&nbsp&nbsp
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Relevence
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Name, A-Z</a>
                  <a class="dropdown-item" href="#">Name, Z-A</a>
                  <a class="dropdown-item" href="#">Price, low to high</a>
                  <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
              </div>   --> 
              <div id="sort" class="dropdown">
                Sort By:&nbsp&nbsp
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Relevence
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <button id="A" class="dropdown-item" type="button">Name, A-Z</button>
                  <button id="Z" class="dropdown-item" type="button">Name, Z-A</button>
                  <button id="L" class="dropdown-item" type="button">Price, low to high</button>
                  <button id="H" class="dropdown-item" type="button">Price, high to low</button>
                </div>
              </div>           
            </nav>
            <div id="products" class="container" style="padding-top: 10px; padding-bottom: 20px;">
              <br><br>
              <!-- Here -->
            </div>

    </div>
  </div>
</section>
  <?php  include 'library/templates/footer.inc.php';?> 
  <script type="text/javascript" src="js/filter.js"></script>
  </body>
</html>
