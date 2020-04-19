<?php
	$xuli_matk=$_POST["data_matk"];
	require("../connect.php");
	$sql="DELETE FROM user WHERE id='$xuli_matk';";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
?>