<?php include('header.php'); ?>
<?php include('admin/config.php'); ?>

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>T-Shirt</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <?php
                      if (isset($_GET['id'])) :
                        $query = 'SELECT * FROM products';
                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

                        if ($result->num_rows > 0) :

                          while ($row = $result->fetch_assoc()) :
                            if ($_GET['id'] == $row['id']) :
                      ?>
                              <div class="simpleLens-big-image-container"><a <?php echo 'data-lens-image="admin/resources/images/product/' . $row['image'] . '"' ?> class="simpleLens-lens-image"> <?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="300" width="250" class="simpleLens-big-image">'; ?></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      <a <?php echo 'data-big-image="admin/resources/images/product/' . $row['image'] . '"' ?> <?php echo 'data-lens-image="admin/resources/images/product/' . $row['image'] . '"' ?> class="simpleLens-thumbnail-wrapper" href="#">
                        <?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="55" width="45"'; ?>
                      </a>
                      <a <?php echo 'data-big-image="admin/resources/images/product/' . $row['image'] . '"' ?> <?php echo 'data-lens-image="admin/resources/images/product/' . $row['image'] . '"' ?> class="simpleLens-thumbnail-wrapper" href="#">
                        <?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="55" width="45"'; ?>
                      </a>
                      <a <?php echo 'data-big-image="admin/resources/images/product/' . $row['image'] . '"' ?> <?php echo 'data-lens-image="admin/resources/images/product/' . $row['image'] . '"' ?> class="simpleLens-thumbnail-wrapper" href="#">
                        <?php echo '<image src="admin/resources/images/product/' . $row['image'] . '" height="55" width="45"'; ?>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3><?php echo $row['name']; ?></h3>
                  <div class="aa-price-block">
                    <span class="aa-product-view-price">$<?php echo $row['price']; ?></span>
                    <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                  </div>
                  <p><?php echo $row['short_description']; ?></p>
                  <h4>Size</h4>
                  <div class="aa-prod-view-size">
                    <a href="#">S</a>
                    <a href="#">M</a>
                    <a href="#">L</a>
                    <a href="#">XL</a>
                  </div>
                  <h4>Color</h4>
                  <div class="aa-color-tag">
                    <?php

                              $sql = 'SELECT * FROM colors';
                              $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                              if ($res->num_rows > 0) :

                                while ($rows = $res->fetch_assoc()) :
                                  if ($rows['product_id'] == $row['id']) :
                                    echo '<a class="aa-color-' . $rows['color'] . '" href="#"></a>';
                                  endif;
                                endwhile;
                              endif;
                    ?>
                  </div>
                  <div class="aa-prod-quantity">
                    <form action="">
                      <select id="" name="">
                        <option selected="1" value="0">1</option>
                        <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>
                        <option value="4">5</option>
                        <option value="5">6</option>
                      </select>
                    </form>
                    <p class="aa-prod-category">
                      Category: <a href="#">
                        <?php

                              $sql = 'SELECT * FROM categories';
                              $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                              if ($res->num_rows > 0) :

                                while ($rows = $res->fetch_assoc()) :
                                  if ($rows['id'] == $row['category_id']) :
                                    echo $rows['name'];
                        ?>
                      </a>
                <?php
                                  endif;
                                endwhile;
                              endif; ?>
                    </p>
                  </div>
                  <div class="aa-prod-view-bottom">
                    <a class="aa-add-to-cart-btn" <?php echo "href='add.php?id=" . $row['id'] . "&action=detail'" ?>>Add To Cart</a>
                    <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                    <a class="aa-add-to-cart-btn" href="#">Compare</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-details-bottom">
            <ul class="nav nav-tabs" id="myTab2">
              <li><a href="#description" data-toggle="tab">Description</a></li>
              <!--<li><a href="#review" data-toggle="tab">Reviews</a></li>  -->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="description">
                <?php echo $row['long_description']; ?>
              </div>
      <?php endif;
                          endwhile;
                        endif;
                      endif; ?>
      <div class="tab-pane fade " id="review">
        <div class="aa-product-review-area">
          <h4>2 Reviews for T-Shirt</h4>
          <ul class="aa-review-nav">
            <li>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                  <div class="aa-product-rating">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                  <div class="aa-product-rating">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </li>
          </ul>
          <h4>Add a review</h4>
          <div class="aa-your-rating">
            <p>Your Rating</p>
            <a href="#"><span class="fa fa-star-o"></span></a>
            <a href="#"><span class="fa fa-star-o"></span></a>
            <a href="#"><span class="fa fa-star-o"></span></a>
            <a href="#"><span class="fa fa-star-o"></span></a>
            <a href="#"><span class="fa fa-star-o"></span></a>
          </div>
          <!-- review form -->
          <form action="" class="aa-review-form">
            <div class="form-group">
              <label for="message">Your Review</label>
              <textarea class="form-control" rows="3" id="message"></textarea>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>

            <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
          </form>
        </div>
      </div>
            </div>
          </div>
          <!-- Related product -->
          <div class="aa-product-related-item">
            <h3>Related Products</h3>
            <ul class="aa-product-catg aa-related-item-slider">
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-sale" href="#">SALE!</span>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/women/girl-2.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                    <span class="aa-product-price">$45.50</span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                </figure>
                <figcaption>
                  <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                  <span class="aa-product-price">$45.50</span>
                </figcaption>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-hot" href="#">HOT!</span>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/women/girl-3.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/women/girl-4.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-hot" href="#">HOT!</span>
              </li>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/women/girl-1.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                    <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-sale" href="#">SALE!</span>
              </li>
            </ul>
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
                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                  <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                              </a>
                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                              </a>

                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal view content -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                          <h3>T-Shirt</h3>
                          <div class="aa-price-block">
                            <span class="aa-product-view-price">$34.99</span>
                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
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
                              Category: <a href="#">Polo T-Shirt</a>
                            </p>
                          </div>
                          <div class="aa-prod-view-bottom">
                            <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <!-- / quick view modal -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / product category -->

<?php include('footer.php'); ?>