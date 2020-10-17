<?php
ob_start();
include('admin/config.php');

if(isset($_GET['id']))
{
    if ($_GET['action'] == 'deletecart')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM cart WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:cart.php');
    }
    if ($_GET['action'] == 'delete')
	{
        $num=intval($_GET["id"]);
        $query = " DELETE FROM cart WHERE id=$num";
        $result=mysqli_query($connection,$query)or die(mysqli_error($connection));
        header('Location:product.php');
    }
}