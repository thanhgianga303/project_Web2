<?php
session_start();
$taikhoan=$_POST['data_username'];
$matkhau=$_POST['data_pass'];
$matkhau=md5($matkhau);
require ("../connect.php");
$sql = "SELECT * FROM nguoidung WHERE TaiKhoan = '$taikhoan' AND MatKhau='$matkhau' AND MaQuyen='Q1' AND TrangThai=1";
$result = mysqli_query($conn,$sql);
$num=$result->num_rows;
// echo $num;
if($num>0){
    // $_SESSION['username']=$taikhoan;
    // $_SESSION['password']=$matkhau;
    $row = $result->fetch_assoc();
// var_dump($row);
    $_SESSION['nguoidangsudung']=$row;
    echo "yes";
    return false;
    }  
else echo "no";
mysqli_close($conn);   
?>