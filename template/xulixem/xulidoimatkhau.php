<?php
session_start();
$xuli_matKhauCu=$_POST['data_matKhauCu'];
$xuli_matKhauMoi=$_POST['data_matKhauMoi'];
$xuli_nhapLaiMatKhauMoi=$_POST['data_nhapLaiMatKhauMoi'];
require("../connect.php");
$mkSession=(string) $_SESSION['user']['password'];
$idSession=$_SESSION['user']['id'];
// echo $xuli_matKhauCu."va".$mkSession;
if($xuli_matKhauCu!=$mkSession)
 {
 	echo '0';
 	return false;
}
if($xuli_matKhauMoi!=$xuli_nhapLaiMatKhauMoi)
 {
 	echo '1';
 	return false;
}
if($xuli_matKhauMoi==$xuli_matKhauCu)
 {
 	echo '2';
 	return false;
}
$sql="UPDATE user SET password='$xuli_matKhauMoi' WHERE id='$idSession'";
$ketnoi=mysqli_query($connSanPham, $sql);
 echo '3';
 unset($_SESSION['user']);
 mysqli_close($connSanPham);
?>