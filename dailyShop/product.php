<?php include('header.php'); ?>
<?php include('admin/config.php'); ?>

<?php
$limit = 3;

echo '<!-- catg header banner section -->
<section id="aa-catg-head-banner">
<img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
<div class="aa-catg-head-banner-area">
 <div class="container">
  <div class="aa-catg-head-banner-content">
    <h2>Fashion</h2>
    <ol class="breadcrumb">
      <li><a href="index.html">Home</a></li>         
      <li class="active">Women</li>
    </ol>
  </div>
 </div>
</div>
</section>
<!-- / catg header banner section -->';
echo '<section id="aa-product-category">
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
      <div class="aa-product-catg-content">
        <div class="aa-product-catg-head">
          <div class="aa-product-catg-head-left">
            <form action="" class="aa-sort-form">
              <label for="">Sort by</label>
              <select name="">
                <option value="1" selected="Default">Default</option>
                <option value="2">Name</option>
                <option value="3">Price</option>
                <option value="4">Date</option>
              </select>
            </form>
            <form action="" class="aa-show-form">
              <label for="">Show</label>
              <select name="">
                <option value="1" selected="12">12</option>
                <option value="2">24</option>
                <option value="3">36</option>
              </select>
            </form>
          </div>
          <div class="aa-product-catg-head-right">
            <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
            <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
          </div>
        </div>
        <div class="aa-product-catg-body">
          <ul class="aa-product-catg">
            <!-- start single product item -->';

if (isset($_GET['id'])) {
  if ($_GET['action'] == 'category') {

    $query = 'SELECT * FROM products';
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    if ($result->num_rows > 0) :


      while ($row = $result->fetch_assoc()) :
        if ($row['category_id'] == $_GET['id']) :

?>
          <li>
            <figure>
              <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
              <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
              <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
                <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
                <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
              </figcaption>
            </figure>
            <div class="aa-product-hvr-content">
              <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
              <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="'+store[i].id+'" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
            </div>
            <!-- product badge -->
            <span class="aa-badge aa-sale" href="#">SALE!</span>
          </li>
    <?php
        endif;
      endwhile;
    endif;
    ?>
    <!-- end single product item -->
    </ul>
    <?php

  } elseif ($_GET['action'] == 'tag') {
    $query = 'SELECT * FROM products';
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    if ($result->num_rows > 0) :
      while ($row = $result->fetch_assoc()) :
        $tags = json_decode($row['tag']);
        foreach ($tags as $tag) :
          if ($tag == $_GET['id']) :

    ?>
            <li>
              <figure>
                <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
                <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                <figcaption>
                  <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
                  <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
                  <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
                </figcaption>
              </figure>
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="'+store[i].id+'" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
              </div>
              <!-- product badge -->
              <span class="aa-badge aa-sale" href="#">SALE!</span>
            </li>
    <?php
          endif;
        endforeach;
      endwhile;
    endif;
    ?>
    <!-- end single product item -->
    </ul>
    <?php

  } elseif ($_GET['action'] == 'color') {
    $query = 'SELECT * FROM products';
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    if ($result->num_rows > 0) :
      while ($row = $result->fetch_assoc()) :
        $sql = 'SELECT * FROM colors';
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if ($row['id'] == $_GET['id']) :

    ?>
          <li>
            <figure>
              <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
              <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
              <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
                <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
                <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
              </figcaption>
            </figure>
            <div class="aa-product-hvr-content">
              <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
              <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="'+store[i].id+'" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
            </div>
            <!-- product badge -->
            <span class="aa-badge aa-sale" href="#">SALE!</span>
          </li>
    <?php
        endif;

      endwhile;
    endif;
    ?>
    <!-- end single product item -->
    </ul>
    <?php

  } elseif ($_GET['action'] == 'page') {
    $page = $_GET['id'];
    $max = $page * 9;
    $min = intval($max - 9);
    $query = "SELECT * FROM products LIMIT 9 OFFSET $min ";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    if ($result->num_rows > 0) :


      while ($row = $result->fetch_assoc()) :

    ?>
        <li>
          <figure>
            <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
            <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
            <figcaption>
              <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
              <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
            </figcaption>
          </figure>
          <div class="aa-product-hvr-content">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
          </div>
          <!-- product badge -->
          <span class="aa-badge aa-sale" href="#">SALE!</span>
        </li>
    <?php
      endwhile;
    endif;
    ?>
    <!-- end single product item -->
    </ul>
    <?php

  }
} elseif (isset($_GET['id1'])) {
  $id1 = $_POST['id1'];
  $id2 = $_POST['id2'];
  $query = 'SELECT * FROM products';
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

  if ($result->num_rows > 0) :


    while ($row = $result->fetch_assoc()) :
      if ($row['price'] >= $id1 && $row['price'] <= $id2) :

    ?>
        <li>
          <figure>
            <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
            <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
            <figcaption>
              <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
              <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
            </figcaption>
          </figure>
          <div class="aa-product-hvr-content">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
          </div>
          <!-- product badge -->
          <span class="aa-badge aa-sale" href="#">SALE!</span>
        </li>
  <?php
      endif;
    endwhile;
  endif;
  ?>
  <!-- end single product item -->
  </ul>
  <?php
} else {

  $query = 'SELECT * FROM products LIMIT 9';
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

  if ($result->num_rows > 0) :


    while ($row = $result->fetch_assoc()) :

  ?>
      <li>
        <figure>
          <a class="aa-product-img" <?php echo "href='product-detail.php?id=" . $row['id'] . "'" ?>><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250">'; ?></a>
          <a class="aa-add-card-btn" <?php echo "href='add.php?id=" . $row['id'] . "'" ?>><span class="fa fa-shopping-cart"></span>Add To Cart</a>
          <figcaption>
            <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
            <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price'] + 200; ?></del></span>
            <p class="aa-product-descrip"><?php echo $row['description']; ?></p>
          </figcaption>
        </figure>
        <div class="aa-product-hvr-content">
          <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
          <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-productid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
        </div>
        <!-- product badge -->
        <span class="aa-badge aa-sale" href="#">SALE!</span>
      </li>
  <?php
    endwhile;
  endif;
  ?>
  <!-- end single product item -->
  </ul>
<?php


} ?>
<!-- quick view modal -->
<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="row">
          <!-- Modal view slider -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="aa-product-view-slider">
              <div class="simpleLens-gallery-container" id="demo-1">
                <div class="simpleLens-container">
                  <div class="simpleLens-big-image-container">
                    <script>
                      $('.fa fa-search').click(function() {
                        var $productid = $(this).data('productid');
                        $(document).ready(function() {
                          $('.add-to-cart').click(function() {
                            var productid = $(this).data('productid');
                            //  console.log('clicked '+productid);
                            $.ajax({
                              method: "POST",
                              url: "product.php",
                              data: {
                                proid: productid
                              }
                            })
                          })
                        })
                      });
                    </script>
                    <?php


                      $query = "SELECT * FROM products";
                      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

                      if ($result->num_rows > 0) :



                        while ($row = $result->fetch_assoc()) :
                          if ($_GET['proid'] == $row['id']) :

                            echo  '<a class="simpleLens-lens-image" data-lens-image="admin/resources/images/product/' . $row['image'] . '">
                        <img src="admin/resources/images/product/' . $row['image'] . '" class="simpleLens-big-image">
                      </a>
                    </div>
                  </div>
                  <div class="simpleLens-thumbnails-container">
                    <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="admin/resources/images/product/' . $row['image'] . '" data-big-image="admin/resources/images/product/' . $row['image'] . '">
                      <img src="admin/resources/images/product/' . $row['image'] . '">
                    </a>
                    <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="admin/resources/images/product/' . $row['image'] . '" data-big-image="admin/resources/images/product/' . $row['image'] . '">
                      <img src="admin/resources/images/product/' . $row['image'] . '">
                    </a>
  
                    <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="admin/resources/images/product/' . $row['image'] . '" data-big-image="admin/resources/images/product/' . $row['image'] . '">
                      <img src="admin/resources/images/product/' . $row['image'] . '">
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal view content -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="aa-product-view-content">
                <h3>T-Shirt</h3>
                <script></script>
                <div class="aa-price-block">
                  <span class="aa-product-view-price">$' . $row['price'] . '</span>
                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                </div>
                <p>' . $row['short_description'] . '</p>
                <h4>Size</h4>
                <div class="aa-prod-view-size">
                  <a href="#">S</a>
                  <a href="#">M</a>
                  <a href="#">L</a>
                  <a href="#">XL</a>
                </div>
                <div class="aa-prod-quantity">
                  <form action="">
                    <select name="" id="">
                      <option value="0" selected="1">1</option>
                      <option value="1">2</option>
                      <option value="2">3</option>
                      <option value="3">4</option>
                      <option value="4">5</option>
                      <option value="5">6</option>
                    </select>
                  </form>
                  <p class="aa-prod-category">
                    Category: <a href="#">' . $row['category_id'] . '</a>
                  </p>
                </div>
                <div class="aa-prod-view-bottom">
                  <a href="add.php?id=' . $row['id'] . '"class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                </div>
              </div>
            </div>';

                          endif;
                        endwhile;
                      endif;
                    ?>


                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- / quick view modal -->
        </div>

        <!-------------=============================pagination=====================------------------------------->

        <div class="aa-product-catg-pagination">
          <nav>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php
              $query = "SELECT * FROM products";
              $result = mysqli_query($connection, $query);
              $total_records = mysqli_num_rows($result);
              $total_pages = intval($total_records / $limit);
              for ($i = 1; $i < $total_pages; $i++) :
              ?>
                <li><a <?php echo "href='product.php?id=" . $i . "&action=page'" ?>><?php echo $i; ?></a></li>
              <?php
              endfor;
              ?>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <?php include("sidebar.php"); ?>

  </div>
</div>
</section>
<!-- / product category -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include('footer.php'); ?>