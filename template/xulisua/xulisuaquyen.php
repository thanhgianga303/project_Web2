<?php
	$xuli_maquyen=$_POST["data_maquyen"];
	$xuli_tenquyen=$_POST["data_tenquyen"];
	$xuli_chitietquyen=$_POST["data_chitietquyen"];
	require("../connect.php");
	$sql="UPDATE role SET TenQuyen='$xuli_tenquyen', ChiTietQuyen='$xuli_chitietquyen' WHERE MaQuyen='$xuli_maquyen'";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>