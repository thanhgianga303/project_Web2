<?php
	$xuli_madonhang=$_POST["data_madonhang"];
	require("../connect.php");
	$sqldonhang="DELETE FROM orders WHERE MaDH='$xuli_madonhang';";
	$sqlchitietdonhang="DELETE FROM orders_details WHERE MaDH='$xuli_madonhang';";
	$ketnoidonhang=mysqli_query($connSanPham, $sqldonhang);
	$ketnoidonhang=mysqli_query($connSanPham, $sqlchitietdonhang);
	mysqli_close($connSanPham);
?>