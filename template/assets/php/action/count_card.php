<?php 
session_start();
$count = 0;
if(isset($_SESSION['cart_shoes'])){
    foreach ($_SESSION['cart_shoes'] as $key) {
        $count ++;
        # code...
    }
echo $count; 
}else{
    echo 0;
}
?>