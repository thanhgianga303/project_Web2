<?php
	$xuli_makhachhang=$_POST["data_makhachhang"];
	require("../connect.php");
	$sqlchitiet="SELECT * FROM khachhang WHERE MaKhachHang='$xuli_makhachhang'";
	// $sqluser="SELECT * FROM user WHERE MaKhachHang='$xuli_makhachhang'";
	$ketnoi=mysqli_query($connSanPham, $sqlchitiet);
	$numchitietkhachhang=mysqli_num_rows($ketnoi);
	// echo $numchitietkhachhang;
	if ($numchitietkhachhang > 0) {
					$row=$ketnoi->fetch_assoc();
					$maTaiKhoanKhiClick=$row['MaTaiKhoan'];
					$sqluser="SELECT * FROM user WHERE id='$maTaiKhoanKhiClick'";
					$ketnoiuser=mysqli_query($connSanPham, $sqluser);
					$numuser=mysqli_num_rows($ketnoiuser);
					if($numuser > 0) {
						$rowuser=$ketnoiuser->fetch_assoc();
						echo '<div><table class="table table-striped" style="font-size:13px;height:auto!important"><th scope="col">Tên</th><th scope="col">Mã tài khoản</th><th scope="col">SDT</th><th scope="col">Email</th><th scope="col">Quyền</th></tr>';
						echo '<tr><td scope="col" style="text-align:center;vertical-align:middle;">'.$rowuser["name"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaTaiKhoan"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$rowuser["sdt"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$rowuser["email"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"> '.$rowuser["role"].'</td></tr>'	;	
				echo   '</table></div>';
					}			
			}	
	mysqli_close($connSanPham);
			?>