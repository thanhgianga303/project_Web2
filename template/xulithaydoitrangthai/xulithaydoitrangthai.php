<?php

	session_start();
	require("../connect.php");
	$id=$_SESSION['user']['id'];

	$xuli_madonhang=$_POST["data_madonhang"];
	$sqlNhanVien="SELECT * FROM employees WHERE MaTaiKhoan='$id'";
	$rs=mysqli_query($connSanPham,$sqlNhanVien);
	$row=$rs->fetch_assoc();
	$maNhanVien=$row['MaNhanVien'];
	echo $maNhanVien;
	$sql="UPDATE orders SET TrangThai=1,MaNV='$maNhanVien' WHERE MaDH='$xuli_madonhang'";	
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>