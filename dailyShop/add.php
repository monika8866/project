<?php
ob_start();
include('admin/config.php');

if (isset($_GET['id'])) {

    $query = 'SELECT * FROM products';
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) :
            if ($_GET['id'] == $row['id']) {
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
            }
        endwhile;
    endif;
    $flag = 0;
    $query = 'SELECT * FROM cart';
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) :
            if ($_GET['id'] == $row['product_id']) {
                $quantity = $row['quantity'] + 1;
                $total = $quantity * $row['price'];
                $num = $_GET['id'];
                $flag = 1;
            } else {
                $flag = 2;
            }
        endwhile;
    } else {
        echo "new table";
        $sql = "INSERT INTO cart (product_id,name,image,price,quantity,total) VALUES('$id','$name','$image','$price',1,'$price')";
        $res = mysqli_query($connection, $sql)
            or die("Values cannot be Inserted" . mysqli_error($connection));
    }
    if ($flag == 1) {
        echo "already exist";
        $sql = "UPDATE cart SET quantity='$quantity',total=$total  WHERE product_id=$num";
        $res = mysqli_query($connection, $sql)
            or die("Values cannot be Inserted" . mysqli_error($connection));
    } elseif ($flag == 2) {
        echo "new product";
        $sql = "INSERT INTO cart (product_id,name,image,price,quantity,total) VALUES('$id','$name','$image','$price',1,'$price')";
        $res = mysqli_query($connection, $sql)
            or die("Values cannot be Inserted" . mysqli_error($connection));
    }



    if(isset($_GET['action'])=='detail'){
      header("Location:cart.php");
    }else
    header("Location:product.php");
}
