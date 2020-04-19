<?php
	$xuli_manhanvien=$_POST["data_manhanvien"];
	$xuli_mataikhoan=$_POST["data_mataikhoan"];
	$xuli_diachi=$_POST["data_diachi"];
	$xuli_trangthai=$_POST["data_trangthai"];
	require("../connect.php");
	$sqlTaiKhoan="SELECT * FROM user WHERE id='$xuli_mataikhoan'";
	$rs=mysqli_query($connSanPham,$sqlTaiKhoan);
	$num=mysqli_num_rows($rs);
	if($num>0){
	$sql="UPDATE employees SET MaTaiKhoan='$xuli_mataikhoan', DiaChi='$xuli_diachi' , TrangThai='$xuli_trangthai' WHERE MaNhanVien='$xuli_manhanvien'";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);
		}
	else echo "no";
?>