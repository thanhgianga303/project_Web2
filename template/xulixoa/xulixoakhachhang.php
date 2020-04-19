<?php
	$xuli_makhachhang=$_POST["data_makhachhang"];
	require("../connect.php");
	$sql="DELETE FROM khachhang WHERE MaKhachHang='$xuli_makhachhang';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>