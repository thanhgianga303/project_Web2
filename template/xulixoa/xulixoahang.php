<?php
	$xuli_mahang=$_POST["data_mahang"];
	require("../connect.php");
	$sql="DELETE FROM trademark WHERE MaHang='$xuli_mahang';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>