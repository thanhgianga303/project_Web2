<?php
	$xuli_maquyen=$_POST["data_maquyen"];
	$xuli_tenquyen=$_POST["data_tenquyen"];
	$xuli_chitietquyen=$_POST["data_chitietquyen"];
	require("../connect.php");
	$sql="INSERT INTO role(MaQuyen,TenQuyen,ChiTietQuyen) VALUES ('$xuli_maquyen','$xuli_tenquyen','$xuli_chitietquyen')";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>