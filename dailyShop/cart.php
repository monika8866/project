<?php include('header.php'); ?>
<?php include('admin/config.php'); ?>

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Cart</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
            <form action="">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['Update'])) {
                      $quantity = isset($_POST['quant']) ? $_POST['quant'] : '';
                      print_r($quantity);
                      $total = $quantity * $row['price'];


                      $sql = "UPDATE cart SET quantity='$quantity',total=$total  WHERE product_id=$num";
                      $res = mysqli_query($connection, $sql) or die("Values cannot be Inserted" . mysqli_error($connection));
                    }

                    ?>
                    <?php

                    $query = 'SELECT * FROM cart';
                    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

                    if ($result->num_rows > 0) :

                      while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                          <td><a class="remove" <?php echo "href='delete.php?id=" . $row['id'] . "&action=deletecart'" ?>>
                              <fa class="fa fa-close"></fa>
                            </a></td>
                          <td><a href="#"><?php echo '<image src="admin/resources/images/product/' . $row['image'] . '">'; ?></a></td>
                          <td><a class="aa-cart-title" href="#"><?php echo $row['name']; ?></a></td>
                          <td>$<?php echo $row['price']; ?></td>
                          <td><input class="aa-cart-quantity" type="number" name="quant" value="<?php echo $row['quantity']; ?>"></td>
                          <td>$<?php echo $row['total']; ?></td>
                        </tr>

                    <?php
                      endwhile;
                    endif;
                    ?>
                    <tr>
                      <td colspan="6" class="aa-cart-view-bottom">
                        <div class="aa-cart-coupon">
                          <input class="aa-coupon-code" type="text" placeholder="Coupon">
                          <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                        </div>
                        <input class="aa-cart-view-btn" type="submit" name="Update" value="Update Cart" />
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
            <!-- Cart Total view -->
            <div class="cart-view-total">
              <h4>Cart Totals</h4>
              <table class="aa-totals-table">
                <tbody>
                  <?php

                  $query = 'SELECT * FROM cart';
                  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                  $subtotal = 0;
                  if ($result->num_rows > 0) :

                    while ($row = $result->fetch_assoc()) :
                      $subtotal += $row['total'];
                    endwhile;
                  endif;
                  $gst = (18 / 100) * $subtotal;
                  $total = $gst + $subtotal;
                  ?>
                  <tr>
                    <th>Subtotal</th>
                    <td>$<?php echo $subtotal; ?></td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>$<?php echo $total; ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->


<?php include('footer.php'); ?>