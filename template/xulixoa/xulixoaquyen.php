<?php
	$xuli_maquyen=$_POST["data_maquyen"];
	require("../connect.php");
	$sql="DELETE FROM role WHERE MaQuyen='$xuli_maquyen';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>