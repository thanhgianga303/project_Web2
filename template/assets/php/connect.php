<?php
$connect= mysqli_connect("localhost","root","","shoestore");
mysqli_set_charset($connect,"utf8");
if ($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
} 
//echo "Connected successfully";
?>