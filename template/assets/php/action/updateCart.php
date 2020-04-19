<?php 
session_start();
include("../connect.php");
//Truy xuất vào session để thay đổi
// if(isset($_POST['id'])){
//     $cart=$_SESSION['cart_shoes'];
//     $id=$_POST['id'];
//     if (array_key_exists($id, $cart)) {
//         $cart[$id] = array(
//             "sLuong" => $num ,//Lấy gt nhập lên
//             "img" => $cart[$id]['img'],
//             "name" => $cart[$id]['name'],
//             "price" => $cart[$id]['price']
//         );
//         $_SESSION['cart_shoes']=$cart;
//     }
//     echo "<pre>";
//     print_r("$_SESSION['cart_shoes']");
//     //print_r("$_SESSION['cart_shoes']["sLuong"]");
// }
// session_start();
if( $_POST["sLuong"] > 0){
echo $_POST["sLuong"];
$_SESSION['cart_shoes'][$_POST['id']]["sLuong"] = $_POST["sLuong"];
$_SESSION['cart_shoes'][$_POST['id']]["price"] = $_POST["price"];     
}else{
    unset($_SESSION['cart_shoes'][$_POST['id']]);
}

?>