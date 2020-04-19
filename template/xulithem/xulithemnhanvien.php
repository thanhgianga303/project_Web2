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
	$sql="INSERT INTO employees(MaNhanVien,MaTaiKhoan,DiaChi,TrangThai) VALUES ('$xuli_manhanvien','$xuli_mataikhoan','$xuli_diachi','$xuli_trangthai')";
	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);}
	else echo "no";
	mysqli_close($connSanPham);
?>