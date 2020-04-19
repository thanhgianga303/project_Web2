<?php
	$xuli_masp=$_POST["data_masp"];
	$xuli_tensp=$_POST["data_tensp"];
	$xuli_hinhanh="assets/img/product/giay/".$_POST["data_hinhanh"];
	$xuli_dongia=$_POST["data_dongia"];
	$xuli_hang=$_POST["data_hang"];
	$xuli_soluong=$_POST["data_soluong"];
	require("../connect.php");
	$sql="UPDATE product SET TenSP='$xuli_tensp', HinhAnh='$xuli_hinhanh', DonGia='$xuli_dongia', MaHang='$xuli_hang', SoLuong='$xuli_soluong' WHERE MaSP='$xuli_masp'";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>