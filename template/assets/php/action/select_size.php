<?php 
session_start();
include("../connect.php");
echo $_GET['size'];
 $_SESSION['cart_shoes'][$_GET['id']]["size"] = $_GET["size"];   
echo "<pre>";
print_r($_SESSION['cart_shoes']);
echo "</pre>";
?>