<?php
	$xuli_matk=$_POST["data_mataikhoan"];
	$xuli_tentk=$_POST["data_tentaikhoan"];
	$xuli_matkhau=$_POST["data_matkhau"];
	$xuli_tennguoidung=$_POST["data_tennguoidung"];
	$xuli_email=$_POST["data_email"];
	$xuli_sdt=$_POST["data_sdt"];
	$xuli_quyen=$_POST["data_quyen"];
	require("../connect.php");
	$sqlQuyen="SELECT * FROM role WHERE MaQuyen='$xuli_quyen'";
	$rs=mysqli_query($connSanPham,$sqlQuyen);
	$num=mysqli_num_rows($rs);
	if($num>0){
		$sql="INSERT INTO user(id,username,password,name,email,sdt,role) VALUES ('$xuli_matk','$xuli_tentk','$xuli_matkhau','$xuli_tennguoidung','$xuli_email','$xuli_sdt','$xuli_quyen')";
		$ketnoi=mysqli_query($connSanPham, $sql);
		mysqli_close($connSanPham);
	}
	else echo "no";
	mysqli_close($connSanPham);
?>