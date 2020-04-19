<?php 
session_start();
$idProduct = $_POST['id'];
unset($_SESSION['cart_shoes'][$idProduct]);
echo $idProduct;

?>