  <?php
  include_once 'library/resources/database.php';

  if( isset($_GET['term']) && !empty($_GET['term'])) {
    $term = $_GET['term'];
    $query = "SELECT * FROM products WHERE title LIKE '%$term%' ";
    $search = mysqli_query($con, $query);
    $num = mysqli_num_rows($search);
    // while ($search_item = mysqli_fetch_assoc($search)){
    //  echo $search_item['title'];
    // }
  }
?>

          <div class="row" style="padding: 0px 15px;" id="search_number">
            <p>There are <?php echo $num; ?> products.</p>
          </div>

          <div class="row" style="padding: 25px 15px;" id="search_items">
            <!--  -->
              <!-- From search_load.php as XML ResponseText -->
                <?php
      while($search_item = mysqli_fetch_assoc($search)){

    ?>
                      <div class="item col-md-3">
                        <div class="text-center">
                          <div class="container-image">
                            <img src="<?php echo $search_item['image1']?>" class="image img-fluid img-thumbnail">
                            <div class="middle">
                              <div class="text"><a href="details.php?productCat=<?php echo $search_item['category'];?>&productId=<?php echo $search_item['productId'];?>"><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
                            </div>
                          </div>
                          <h4 class="title"><?php echo  strtoupper($search_item['title']);?></h4>
                          <p><?php echo $search_item['description']?></p>
                          <h4>NRs <?php echo $search_item['price']?> 
                            <?php
                              if($search_item['oldPrice'] != null){ ?>
                                  <span class="old"> NRs <?php echo $search_item['oldPrice'] ;?></span>
                              <?php } ?>
                          </h4>
                        </div>
                      </div>
    <?php } ?>   
              <!--  -->
          </div>
