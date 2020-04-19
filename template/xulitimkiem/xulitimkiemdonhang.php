
<?php
	// if(session_id() == '')
	// 			{
	// 				session_start();
	// 			}
	require("../connect.php");
	$xuli_inputSearch=$_GET["data_inputSearch"];
	$xuli_select=$_GET["data_select"];
	$xuli_tongtiendau=$_GET["data_tongtiendau"];
	$xuli_tongtiencuoi=$_GET["data_tongtiencuoi"];
	$xuli_ngaybatdau=$_GET["data_ngaybatdau"];
	$xuli_ngayketthuc=$_GET["data_ngayketthuc"];


	switch ($xuli_select) {
		case 'tatca':
			$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' OR MaKH LIKE '%$xuli_inputSearch%' OR MaKM LIKE '%$xuli_inputSearch%' OR TrangThai LIKE '%$xuli_inputSearch%' OR MaNV LIKE '%$xuli_inputSearch%' OR DiaChi LIKE '%$xuli_inputSearch%' OR GhiChu LIKE '%$xuli_inputSearch%'  " ;
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'
				OR MaKH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' 
				OR MaKM LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' 
				OR TrangThai LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' 
				OR MaNV LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' 
				OR DiaChi LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' 
				OR GhiChu LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR MaKH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR MaKM LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR TrangThai LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR MaNV LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR DiaChi LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR GhiChu LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' ";
							}
					}
				else {
					if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
						{
							$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR MaKH LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'
							OR MaKM LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR TrangThai LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' 
							OR MaNV LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'
							OR DiaChi LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'
							OR GhiChu LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc' ";
						}
				}
			break;
		case 'ma':
			$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%'";
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			else {
			if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
						{
							$sql="SELECT * FROM orders WHERE MaDH LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
						}

			}
			
			break;
		case 'makhachhang':
			$sql="SELECT * FROM orders WHERE MaKH LIKE '%$xuli_inputSearch%'";
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE MaKH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE MaKH LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			else {
			if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
						{
							$sql="SELECT * FROM orders WHERE MaKH LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
						}

			}		
			break;
		case 'trangthai':
			$sql="SELECT * FROM orders WHERE TrangThai LIKE '%$xuli_inputSearch%'";
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE TrangThai LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE MaKH TrangThai '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			
			break;
			case 'manhanvien':
			$sql="SELECT * FROM orders WHERE MaNV LIKE '%$xuli_inputSearch%'";
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE MaNV LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE MaNV LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			break;
			// case 'makhuyenmai':
			// if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			//  {
			// $sql="SELECT * FROM orders WHERE MaKM LIKE '%$xuli_inputSearch%'";
			// 	$xuli_tongtiendau=(float) $xuli_tongtiendau;
			// 	$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

			// 	$sql="SELECT * FROM orders WHERE MaKM LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

			// 				if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
			// 				{	
			// 				$sql="SELECT * FROM orders WHERE MaKM LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
			// 				}
			// 		}
			// else {
			// if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
			// 			{
			// 				$sql="SELECT * FROM orders WHERE MaKM LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
			// 			}

			// }
			case 'diachi':
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
			$sql="SELECT * FROM orders WHERE DiaChi LIKE '%$xuli_inputSearch%'";
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE DiaChi LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE DiaChi LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			else {
			if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
						{
							$sql="SELECT * FROM orders WHERE DiaChi LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
						}

			}
			break;
			case 'ghichu':
			$sql="SELECT * FROM orders WHERE GhiChu LIKE '%$xuli_inputSearch%'";
			if($xuli_tongtiendau!=""&&$xuli_tongtiencuoi!="")
			 {
				$xuli_tongtiendau=(float) $xuli_tongtiendau;
				$xuli_tongtiencuoi=(float) $xuli_tongtiencuoi;

				$sql="SELECT * FROM orders WHERE GhiChu LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi'";

							if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
							{	
							$sql="SELECT * FROM orders WHERE GhiChu LIKE '%$xuli_inputSearch%' AND TongTien BETWEEN '$xuli_tongtiendau' AND '$xuli_tongtiencuoi' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
							}
					}
			else {
			if($xuli_ngaybatdau!=""&&$xuli_ngayketthuc!="")
						{
							$sql="SELECT * FROM orders WHERE DiaChi LIKE '%$xuli_inputSearch%' AND '$xuli_ngaybatdau'<= NgayLap AND NgayLap <= '$xuli_ngayketthuc'";
						}

			}
			break;
		default:
			break;
	}
	$_SESSION['sqlDonHang'] = $sql;
	$rs=mysqli_query($connSanPham, $sql);
	$num=mysqli_num_rows($rs);
	if($num > 0){
				$soluongsp1trang=3;
				$tongsanpham=mysqli_num_rows($rs); //dem so dong trong database
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if($sotrang<=1) $sotrang=0;
				if(isset($_GET["page"])) $tranghientai=$_GET["page"];
				else $tranghientai=1;
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				$sqlhienthitrang="$sql LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rs=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div><table class="table table-striped" ><tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral!important;color:black!important"><th scope="col" style="font-weight:600">Mã đơn hàng</th><th scope="col" style="font-weight:600">Mã khách hàng</th><th scope="col" style="font-weight:600">Tổng tiền</th><th scope="col" style="font-weight:600">Trạng thái</th><th scope="col" style="font-weight:600">Ngày lập</th><th scope="col" style="font-weight:600">Mã nhân viên</th><th scope="col" style="font-weight:600">Địa chỉ</th><th scope="col" style="font-weight:600">Ghi chú</th><th scope="col" style="font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
						 $trangthai=($row["TrangThai"]==1?"Đã xử lí":"Chưa xử lí");
						 if ($trangthai=="Chưa xử lí"){
						 	$buttonxuli='<a href="javascript:void(0)"  style="text-decoration: none;font-size:16px;" onclick="thayDoiTrangThai(\''.$row["MaDH"].'\')">Chưa xử lí</a>';
						echo '<tr class="csshover">
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaDH"].'</td>
						
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemKhachHang(\''.$row["MaKH"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaKH"].'</a>
						</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["TongTien"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$buttonxuli.'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["NgayLap"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemNhanVien(\''.$row["MaNV"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaNV"].'
							</a>
						</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DiaChi"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["GhiChu"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["MaDH"].'" class="btn btn-primary" id="xoa'.$row["MaDH"].'"  onclick="xoaDonHang(\''.$row["MaDH"].'\','.$row["TrangThai"].');">Xóa</button><button type="button" name="xem'.$row["MaDH"].'" class="btn btn-primary" id="xem'.$row["MaDH"].'" onclick="xemChiTietDonHang(\''.$row["MaDH"].'\')"data-toggle="modal" data-target="#exampleModal">Xem</button></td>
						</tr>';
						}
						else{
						echo '<tr class="csshover"><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaDH"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemKhachHang(\''.$row["MaKH"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaKH"].'</a></td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["TongTien"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$trangthai.'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["NgayLap"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemNhanVien(\''.$row["MaNV"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaNV"].
						'</a></td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DiaChi"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["GhiChu"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["MaDH"].'" class="btn btn-primary" id="xoa'.$row["MaDH"].'"  onclick="xoaDonHang(\''.$row["MaDH"].'\','.$row["TrangThai"].');">Xóa</button><button type="button" name="xem'.$row["MaDH"].'" class="btn btn-primary" id="xem'.$row["MaDH"].'" onclick="xemChiTietDonHang(\''.$row["MaDH"].'\')"data-toggle="modal" data-target="#exampleModal">Xem</button></td></tr>';	
						}	

				}
				echo   '</table></div>';
				?>
			
			<?php
			echo '<div><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangDonHang('.$i.')">'.$i.'</a></li>';
			echo '</ul></div>';	
	}
	mysqli_close($connSanPham);
?>