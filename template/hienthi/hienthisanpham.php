
				<?php
				if(session_id() == '')
				{
					session_start();
				}
				require('connect.php');
				if (isset($_SESSION['sqlGoc'])) {
					$sql = $_SESSION['sqlGoc'];
					// unset($_SESSION['sqlGoc']);
				}

				else
					$sql="SELECT * FROM product";
				mysqli_set_charset($connSanPham,"utf8");
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

				echo '<div class="col-md-12"><table class="table table-striped" ><tr style="text-align:center;vertical-align:middle;background-color:coral;font-size:20px;font-weight:600;color:black!important"><th scope="col" style="font-weight:600">Mã sản phẩm</th><th scope="col" style="font-weight:600">Tên sản phẩm</th><th scope="col" style="font-weight:600">Hình ảnh</th><th scope="col" style="font-weight:600" >Đơn giá</th><th scope="col" style="font-weight:600">Hãng</th><th scope="col" style="font-weight:600">Số lượng</th><th scope="col" style="font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
						echo '<tr><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaSP"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["TenSP"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"><img src="'.$row["HinhAnh"].'" width="100px" heigh="200px"></td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DonGia"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaHang"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["SoLuong"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["MaSP"].'" class="btn btn-primary" id="xoa'.$row["MaSP"].'"  onclick="xoaSanPham(\''.$row["MaSP"].'\');">Xóa</button><button type="button" name="sua'.$row["MaSP"].'" class="btn btn-primary" id="sua'.$row["MaSP"].'" onclick="suaSanPham(\''.$row["MaSP"].'\',\''.$row["TenSP"].'\',\''.$row["HinhAnh"].'\',\''.$row["DonGia"].'\',\''.$row["MaHang"].'\',\''.$row["SoLuong"].'\');hienThi(this);"data-toggle="modal" data-target="#exampleModal">Sửa</button></td></tr>'	;	

				}
				echo   '</table></div>';
				?>
			
			<?php
			echo '<div class="row"><div class="col-md-12"><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangSanPham('.$i.')">'.$i.'</a></li>';
			echo '</ul></div></div>';	
			mysqli_close($connSanPham);
			?>		
			