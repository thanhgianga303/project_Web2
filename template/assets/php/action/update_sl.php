<?php 
session_start();
include ("./../connect.php");
include ("./../../../function.php");

show($_SESSION['cart_shoes']);
foreach ($_SESSION['cart_shoes'] as $key => $value) {
    $sL =$_SESSION['cart_shoes'][$key]["sLuong"];
    $query = selectAll__where_like_('product','MaSP',$key);
    $sl_co = mysqli_fetch_array($query);
    echo $key." SL có:".$sl_co['SoLuong'];
    $sl_up= $sl_co['SoLuong'] - $sL;
    echo " Số lượng còn: ".$sl_up."<br>";
    //UPDATE `product` SET `SoLuong` = '18' WHERE `product`.`MaSP` = 'sp13';
    $sql="UPDATE `product` SET `SoLuong` = '$sl_up' WHERE `product`.`MaSP` = '$key'";
    query($sql);
}

?>