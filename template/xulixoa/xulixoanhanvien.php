<?php
	$xuli_manhanvien=$_POST["data_manhanvien"];
	require("../connect.php");
	$sql="DELETE FROM employees WHERE MaNhanVien='$xuli_manhanvien';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>