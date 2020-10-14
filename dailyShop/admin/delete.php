<?php
ob_start();
include('config.php');
if(isset($_GET['id']))
{
    if ($_GET['action'] == 'deleteproduct')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM products WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:products.php');
    }
    if ($_GET['action'] == 'deleteuser')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM users WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:user.php');
    }
    if ($_GET['action'] == 'deletetags')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM tags WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:tags.php');
    }
    if ($_GET['action'] == 'deletecategory')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM categories WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:tags.php');
    }
}

?>
