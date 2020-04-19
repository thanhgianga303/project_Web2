<?php
	$xuli_makhachhang=$_POST["data_makhachhang"];
	$xuli_mataikhoan=$_POST["data_mataikhoan"];
	$xuli_trangthai=$_POST["data_trangthai"];
	require("../connect.php");
	$sqlTaiKhoan="SELECT * FROM user WHERE id='$xuli_mataikhoan'";
	$rs=mysqli_query($connSanPham,$sqlTaiKhoan);
	$num=mysqli_num_rows($rs);
	if($num>0){
		$sql="UPDATE khachhang SET MaTaiKhoan='$xuli_mataikhoan' , TrangThai='$xuli_trangthai' WHERE MaKhachHang='$xuli_makhachhang'";
		$ketnoi=mysqli_query($connSanPham, $sql);
		mysqli_close($connSanPham);
	}
	else echo "no";
?>