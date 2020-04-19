<?php
require("../connect.php");
$xuli_ho=$_POST['data_ho'];
$xuli_ten=$_POST['data_ten'];
$xuli_sdt=$_POST['data_sdt'];
$xuli_email=$_POST['data_email'];
$xuli_newUser=$_POST['data_newUser'];
$xuli_newPass=$_POST['data_newPass'];
$xuli_newPass=md5($xuli_newPass);
$sql="INSERT INTO nguoidung(MaND,Ho,Ten,GioiTinh,SDT,Email,DiaChi,TaiKhoan,MatKhau,MaQuyen,TrangThai) VALUES ('','$xuli_ho','$xuli_ten','','$xuli_sdt','$xuli_email','','$xuli_newUser','$xuli_newPass','Q1',1)";
$ketnoi=mysqli_query($conn,$sql);
echo $sql;
?>