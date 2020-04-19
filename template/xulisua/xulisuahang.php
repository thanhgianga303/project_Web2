<?php
	$xuli_mahang=$_POST["data_mahang"];
	$xuli_tenhang=$_POST["data_tenhang"];
	$xuli_mota=$_POST["data_mota"];
	require("../connect.php");
	$sql="UPDATE trademark SET TenHang='$xuli_tenhang', MoTa='$xuli_mota' WHERE MaHang='$xuli_mahang'";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>