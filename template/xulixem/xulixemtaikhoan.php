<?php
	session_start();
	$xuli_mataikhoan=$_SESSION['user']['id'];
	require("../connect.php");
	$sqlchitiet="SELECT * FROM user WHERE id='$xuli_mataikhoan'";
	// $sqluser="SELECT * FROM user WHERE MaKhachHang='$xuli_makhachhang'";
	$ketnoi=mysqli_query($connSanPham, $sqlchitiet);
	$numchitiettaikhoan=mysqli_num_rows($ketnoi);
	// echo $numchitietkhachhang;
	if ($numchitiettaikhoan > 0) {
					$row=$ketnoi->fetch_assoc();
					echo '
						<div class="row"><div class="col-md-12"><hr/></div></div>
						<div class="row"><div class="col-md-12 menuTaiKhoan" ><a href="javascript:void(0)" style="text-decoration:none;vertical-align:middle" onclick="hienThiDoiMatKhau()">Đổi mật khẩu</a></div></div>
						<div class="row"><div class="col-md-12 "><hr/></div></div>
						<div class="row"><div class="col-md-12 menuTaiKhoan"><a href="javascript:void(0)" style="text-decoration:none" onclick="logOut()">Đăng xuất</a></div></div>
						<div class="row"><div class="col-md-12"><hr/></div></div>
						<div class="rol"><div class="col-md-12 menuTaiKhoan"><a href="javascript:void(0)" style="text-decoration:none" onclick="troLai()">Hủy</a></div></div>
						<div class="row"><div class="col-md-12"><hr/></div></div>';
				// }			
			}	
mysqli_close($connSanPham);
			?>
