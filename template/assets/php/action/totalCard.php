<?php 
session_start();
$total =0;
foreach ($_SESSION['cart_shoes'] as $key){
	$total += $key['price'] * $key['sLuong'];
}

echo number_format($total, 0, ' ', '.'); 
?>