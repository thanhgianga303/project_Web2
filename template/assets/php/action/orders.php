<?php 
session_start();
//include ('./../../../conn.php')

include ("./../connect.php");
include ("./../../../function.php");
echo "<pre>";
print_r($_GET);
echo "</pre>";
$idUser = $_SESSION['idUser'];
$DiaChi= $_GET['DiaChi'];
$GhiChu= $_GET['GhiChu'];
$Price = $_GET['Price'];
//them vào đơn hàng
$table="orders";
$id="MaDH";

$row2 = count_id($table,$id); //echo $row2[0]; =>SL dong`:

$sql = "SELECT * FROM `orders` ORDER BY NgayLap DESC ";
$thucthi = query($sql);
$row3 = mysqli_fetch_array($thucthi);
 
if($row2[0]==0){//kt SL dòng = 0 => sẽ tăng 0->dh1
    $newDH = $row2[0]+1;
    $MaDH = "dh".$newDH;
    echo "Đơn hàng đầu tiên: MaDH:".$MaDH;
    $sql="INSERT INTO `orders` ( `MaDH`,`MaKH`, `TongGia`, `TrangThai`, `NgayLap` ,`GhiChu`,`DiaChi`) VALUES ('$MaDH', '$idUser','$Price', '0', CURRENT_TIMESTAMP,'$GhiChu','$DiaChi')";
    query($sql);
}else{//lấy đh cuối cùng + 1
    $maDH = $row3['MaDH'];
    $maso_DH = substr($maDH ,2);
    echo  "mã số DH cuối".$maso_DH."<br>";
    $next_num = $maso_DH+1;
    echo "<br>dh".$next_num;
    $MaDH="dh".$next_num;
    echo "<br>Ma DH :".$MaDH;
    $sql="INSERT INTO `orders` ( `MaDH`,`MaKH`, `TongGia`, `TrangThai`, `NgayLap` ,`GhiChu`,`DiaChi`) VALUES ('$MaDH', '$idUser','$Price', '0', CURRENT_TIMESTAMP,'$GhiChu','$DiaChi')";
query($sql);
}


if(isset($_SESSION['cart_shoes'])){
    foreach ($_SESSION['cart_shoes'] as $key => $value ) {
        $key;
        $size =$_SESSION['cart_shoes'][$key]["size"];
        $sL =$_SESSION['cart_shoes'][$key]["sLuong"];
        echo "<br>  MaDH:".$MaDH; 
        $dongia =$_SESSION['cart_shoes'][$key]["price"];
        $sql1="INSERT INTO `orders_details` (`MaDH`, `MaSP`, `Size`, `DonGia`, `SL`) VALUES ('$MaDH', '$key', '$size', '$dongia', '$sL')";
        query($sql1);
    }
}

unset($_SESSION['price']);
unset($_SESSION['cart_shoes']);
//"<br>dh".
 //DELETE FROM `orders_details` WHERE `orders_details`.`MaDH` = 'dh1'; 
?>