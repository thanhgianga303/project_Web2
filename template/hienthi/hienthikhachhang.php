<?php
				
				require('connect.php');
				if (isset($_SESSION['sqlKhachHang'])) {
					$sql = $_SESSION['sqlKhachHang'];
					// unset($_SESSION['KhachHang']);
				}
				else 
				$sql="SELECT * FROM khachhang";
				// mysqli_set_charset($connSanPham,"utf8");
				$rs=mysqli_query($connSanPham,$sql);
				$soluongsp1trang=5;
				$tongsanpham=mysqli_num_rows($rs); //dem so dong trong database
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if($sotrang<=1) $sotrang=0;
				if(isset($_GET["page"])) $tranghientai=$_GET["page"];
				else $tranghientai=1;
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				$sqlhienthitrang="$sql LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rs=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div class="col-md-12"><table class="table table-striped" ><tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral;color:black!important"><th scope="col" style="font-weight:600">Mã khách hàng</th><th scope="col" style="font-weight:600">Mã tài khoản</th><th scope="col" style="font-weight:600">Trạng thái</th><th scope="col" style="font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
   
						echo '<tr><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaKhachHang"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaTaiKhoan"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["TrangThai"].'</td>
							<td scope="col" style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["MaKhachHang"].'" class="btn btn-primary" id="xoa'.$row["MaKhachHang"].'"  onclick="xoaKhachHang(\''.$row["MaKhachHang"].'\');">Xóa</button><button type="button" name="sua'.$row["MaKhachHang"].'" class="btn btn-primary" id="sua'.$row["MaKhachHang"].'" onclick="suaKhachHang(\''.$row["MaKhachHang"].'\',\''.$row["MaTaiKhoan"].'\',\''.$row["TrangThai"].'\');hienThi(this);"data-toggle="modal" data-target="#exampleModal">Sửa</button></td></tr>'	;	

				}
				echo   '</table></div>';
				?>
			
			<?php
			echo '<div><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangKhachHang('.$i.')">'.$i.'</a></li>';
				echo '</ul></div>';	
			mysqli_close($connSanPham);
			?>		
			