<?php
	$xuli_mahang=$_POST["data_mahang"];
	$xuli_tenhang=$_POST["data_tenhang"];
	$xuli_mota=$_POST["data_mota"];
	require("../connect.php");
	$sql="INSERT INTO trademark(MaHang,TenHang,MoTa) VALUES ('$xuli_mahang','$xuli_tenhang','$xuli_mota')";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>