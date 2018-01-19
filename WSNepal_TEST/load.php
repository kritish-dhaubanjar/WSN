<?php
  
  require_once 'library/resources/database.php';
  if(isset($_GET['filter']) && $_GET['filter']=='off' &&isset($_GET['cat'])){
    $cat = $_GET['cat'];
    $number_of_products = mysqli_query($con,"SELECT productId FROM products WHERE category = '$cat' ORDER BY productId DESC LIMIT 1");
    $number_of_products = mysqli_fetch_assoc($number_of_products);
    $total = $number_of_products['productId'];

    $sort = $_GET['sort'];

    if($sort == 'null'){
      $column = 'productId';
      $order = 'DESC';      
    }else if($sort == 'A'){
      $column = 'title';
      $order = 'ASC';
    }else if($sort == 'Z'){
      $column = 'title';
      $order = 'DESC';
    }else if($sort == 'L'){
      $column = 'price';
      $order = 'ASC';
    }else if($sort == 'H'){
      $column = 'price';
      $order = 'DESC';
    }

      if( !isset($_GET['page']) && empty($_GET['page'])){
        echo $_GET['filter'];
        $query = "SELECT productId, title, oldPrice, price, image1 FROM products WHERE category = '$cat' ORDER BY $column $order LIMIT 9";
        $query_run = mysqli_query($con,$query); 
        $_GET['page'] = 1; 
      }
      else if( isset($_GET['page']) && !empty($_GET['page'])){
        $start = $total-($_GET['page'] - 1)*9;
        $end = $start - (9-1);
        $query = "SELECT productId, title, oldPrice, price, image1 FROM products WHERE category = '$cat' AND productId BETWEEN $end AND $start ORDER BY $column $order";
        $query_run = mysqli_query($con,$query);  
      }
  }
?>

<?php
 //load.php?page=1&sm='+sm+'&md='+md+'&lg='+lg+'&a='+a+'&b='+b+'&c='+c+'&taupe='+taupe+'&beige='+beige+'&white='+white
if(isset($_GET['filter']) && $_GET['filter']=='on' && isset($_GET['page']) && isset($_GET['sm']) && isset($_GET['md']) && isset($_GET['lg']) &&
    isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) && isset($_GET['taupe']) && isset($_GET['beige']) && isset($_GET['white']) &&isset($_GET['sort']) && isset($_GET['cat'])
  ) {
    $cat = $_GET['cat'];
    $sort = $_GET['sort'];

    if($sort == 'null'){
      $column = 'productId';
      $order = 'DESC';      
    }else if($sort == 'A'){
      $column = 'title';
      $order = 'ASC';
    }else if($sort == 'Z'){
      $column = 'title';
      $order = 'DESC';
    }else if($sort == 'L'){
      $column = 'price';
      $order = 'ASC';
    }else if($sort == 'H'){
      $column = 'price';
      $order = 'DESC';
    }

  $sm = $_GET['sm'];
  $md = $_GET['md'];
  $lg = $_GET['lg'];
  $a = $_GET['a'];
  $b = $_GET['b'];
  $c = $_GET['c'];
  $taupe = $_GET['taupe'];
  $beige = $_GET['beige'];
  $white = $_GET['white'];


    $query = "SELECT productId, title, oldPrice, price, image1,s,m,l FROM products WHERE category = '$cat' AND (";
  if($sm==1)
    $query = $query." s=$sm OR";
  if($md==1)
    $query = $query." m=$md OR";
  if($lg==1)
    $query = $query." l=$lg OR";

  if($a != 'null')
    $query = $query." (price >0 AND price < 3000) OR";
  if($b != 'null')
    $query = $query." (price >= 3000 AND price < 6000) OR";
  if($c != 'null')
    $query = $query." (price >= 6000) OR";

  if($taupe=='taupe')
    $query = $query." color1='$taupe' OR color2='$taupe' OR color3='$taupe' OR ";
  if($beige=='beige')
    $query = $query." color1='$beige' OR color2='$beige' OR color3='$beige' OR ";
  if($white=='white')
    $query = $query." color1='$white' OR color2='$white' OR color3='$white' OR ";
  $query_temp = $query;
  $query = $query." productId IN (0)) ORDER BY productId ASC";
  // echo $query;
  $query_run = mysqli_query($con,$query);


  $num = 1;
  while($id = mysqli_fetch_assoc($query_run)){
    $pid[$num] = $id['productId'];
    $pid[$num].'<br>';
    $num++;
  }
  $total = mysqli_num_rows($query_run);
  $num;
  $start = $total-($_GET['page'] - 1)*9;
  $end = $start - (9-1);
  $start = $pid[$start];
  $end = $pid[$end];
  if($end<=0){
    $end = 0;
  }
  $query_temp = $query_temp." productId IN (0)) AND productId BETWEEN $end AND $start ORDER BY $column $order ";
  $query_run = mysqli_query($con,$query_temp);
}
?>


    <div id="products" class="container" style="padding-top: 10px; padding-bottom: 20px;">
      <br><br>
        <div class="row">


<?php
    while($product = mysqli_fetch_assoc($query_run) ){

?>
      <div class="item col-md-4">
        <div class="text-center">
            <div class="container-image">
              <img src="<?php echo $product['image1'] ;?>" class="image img-fluid img-thumbnail">
              <div class="middle">
                <div class="text"><a href="details.php?productCat=<?php echo $cat;?>&productId=<?php echo $product['productId'];?> "><h5><i class="fa fa-search" aria-hidden="true"></i> Quick View</h5></a></div>
              </div>
            </div>
          <h4 class="title"> <?php echo $product['title'];?> </h4>
            <h4>NRs <?php echo $product['price']?>.00 
            <?php if($product['oldPrice'] != null) echo '<span class="old"> NRs '.$product['oldPrice'].'</span>';?>
            </h4>
        </div>
      </div>
<?php } ?>

      </div>
    </div>
       


<?php
  if($_GET['filter']=='off'){
?>
    <nav aria-label="Page navigation example">
      <ul id="pageNo" class="pagination justify-content-center">
        <li class="page-item <?php
          if($_GET[page]-1 <=0)
            echo 'disabled';
        ?> ">
          <a class="page-link" onclick="load(<?php echo ($_GET[page]-1).','.'\''.$sort.'\'';?>)" id="<?php echo $cat.'.php';?>?page=<?php echo $_GET[page]-1;?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp&nbsp</a>
        </li>
        <?php
          $page = 1;
          for($i=1 ; $i<=$total; $i += 9){
            if($page == $_GET['page'])
              $active = 'active';
            else
              $active ='';
            echo '<li class="page-item '.$active.'"><a onclick="load('.$page.','.'\''.$sort.'\''.')" class="page-link" id="'.$cat.'.php?page='.$page.'">'.$page.'</a></li>';
            $page++;
            if($page == 6){
              break;
            }
          }
        ?>
        <li class="page-item <?php
          if($_GET[page]+1 >= $page)
            echo 'disabled';
        ?>">
          <a class="page-link" onclick="load(<?php echo ($_GET[page]+1).','.'\''.$sort.'\'';?>)" id="<?php echo $cat.'.php';?>?page=<?php echo $_GET[page]+1;?>">&nbsp&nbsp<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </li>
      </ul>
    </nav>
<?php
  }
?>

<?php
  if($_GET['filter']=='on'){
?>
  <!-- 
  filter(1,sm,md,lg,a,b,taupe,beige,white);
  echo $_GET[page]-1.','.$sm.','.$md.','.$lg.','.$a.','.$b.','.$taupe.','.$beige.','.$white;
  filter(2,0,1,0,,,null,null,null)
   -->
    <nav aria-label="Page navigation example">
      <ul id="pageNo" class="pagination justify-content-center">
        <li class="page-item <?php
          if($_GET[page]-1 <=0)
            echo 'disabled';
        ?> ">
          <a class="page-link" onclick="filterfxn(<?php echo ($_GET[page]-1).','.$sm.','.$md.','.$lg.','.$a.','.$b.','.$c.','.$taupe.','.$beige.','.$white.','.'\''.$sort.'\'';?>)" id="<?php echo $cat.'.php';?>?page=<?php echo $_GET[page]-1;?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp&nbsp</a>
        </li>
        <?php
          $page = 1;
          for($i=1 ; $i<=$total; $i += 9){
            if($page == $_GET['page']){
              $active = 'active';
            }
            else{
              $active ='';
            }
            echo '<li class="page-item '.$active.'"><a onclick="filterfxn('.$page.','.$sm.','.$md.','.$lg.','.$a.','.$b.','.$c.','.$taupe.','.$beige.','.$white.','.'\''.$sort.'\''.')" class="page-link" id="'.$cat.'.php?page='.$page.'">'.$page.'</a></li>';
            $page++;
          }
        ?>
        <li class="page-item <?php
          if($_GET[page]+1 >= $page)
            echo 'disabled';
        ?>">
          <a class="page-link" onclick="filterfxn(<?php echo ($_GET[page]+1).','.$sm.','.$md.','.$lg.','.$a.','.$b.','.$c.','.$taupe.','.$beige.','.$white.','.'\''.$sort.'\'';?>)" id="<?php echo $cat.'.php';?>?page=<?php echo $_GET[page]+1;?>">&nbsp&nbsp<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </li>
      </ul>
    </nav>
<?php
  }
?>

