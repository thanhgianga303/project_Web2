<?php
				// if(session_id() == '')
				// {
				// 	session_start();
				// }
				require('connect.php');
				if (isset($_SESSION['sqlTaiKhoan'])) {
					$sql = $_SESSION['sqlTaiKhoan'];
					// unset($_SESSION['sqlTaiKhoan']);
				}
				else 
				$sql="SELECT * FROM user";
				mysqli_set_charset($connSanPham,"utf8");
				$rs=mysqli_query($connSanPham,$sql);
				$soluongsp1trang=5;
				$tongsanpham=mysqli_num_rows($rs); //dem so dong trong database
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if($sotrang<=1) $sotrang=0;
				if(isset($_GET["page"])) $tranghientai=$_GET["page"];
				else $tranghientai=1;
				if($tranghientai>1) {}
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				$sqlhienthitrang="$sql LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rs=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div class="col-md-12"><table class="table table-striped"><tr style="background-color:coral;color:black!important"><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Mã tài khoản</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Tên tài khoản</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Mật khẩu</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Tên người dùng</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Email</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Số điện thoại</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Quyền</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
						echo '<tr style="color:#333333;"><td scope="col"  style="text-align:center;vertical-align:middle;">'.$row["id"].'</td><td scope="col" style="text-align:center;vertical-align:middle;" >'.$row["username"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["password"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["name"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["email"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["sdt"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["role"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"><div style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["id"].'" class="btn btn-primary" id="xoa'.$row["id"].'" onclick="xoaTaiKhoan(\''.$row["id"].'\');">Xóa</button></div><div style="text-align:center;vertical-align:middle;"><button type="button" name="sua'.$row["id"].'" class="btn btn-primary" id="sua'.$row["id"].'" 
 data-toggle="modal" data-target="#exampleModal"

						 onclick="suaTaiKhoan(\''.$row["id"].'\',\''.$row["username"].'\',\''.$row["password"].'\',\''.$row["name"].'\',\''.$row["email"].'\',\''.$row["sdt"].'\',\''.$row["role"].'\');hienThi(this);"  >Sửa</button></div></td></tr>'	;	

				}
					echo   '</table></div>';
					mysqli_close($connSanPham);
					?>

			
			<?php
			echo '<div><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangTaiKhoan('.$i.')">'.$i.'</a></li>';
				echo '</ul></div>';	


?>