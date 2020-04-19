<?php
	$xuli_ma=$_POST["ma"];
	require("../connect.php");
	$sql="DELETE FROM product WHERE MaSP='$xuli_ma';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>