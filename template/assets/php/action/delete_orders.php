<?php
include "./../connect.php";
include "../../../function.php";

show($_GET);
$id = $_GET['id'];
$sql="DELETE FROM `orders` WHERE `orders`.`MaDH` = '$id'";
query($sql);

$sql1=$sql="DELETE FROM `orders_details` WHERE `orders_details`.`MaDH` = '$id'";
query($sql);
//DELETE FROM `orders` WHERE `orders`.`MaDH` = 'dh4';
?>
