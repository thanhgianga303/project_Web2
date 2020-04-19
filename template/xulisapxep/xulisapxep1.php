<?php

require("../connect.php");
$sql="SELECT * FROM orders ORDER BY NgayLap ASC ";
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

				echo '<div class="col-md-12"><table class="table table-striped" ><tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral!important;color:black!important"><th scope="col" style="font-weight:600">Mã đơn hàng</th><th scope="col" style="font-weight:600">Mã khách hàng</th><th scope="col" style="font-weight:600">Tổng tiền</th><th scope="col" style="font-weight:600">Trạng thái</th><th scope="col" style="font-weight:600"><a href="javascript:void(0)" onclick="sapXepTheoNgay()" style="text-decoration:none;color:black">Ngày lập</a></th><th scope="col" style="font-weight:600">Mã nhân viên</th><th scope="col" style="font-weight:600">Địa chỉ</th><th scope="col" style="font-weight:600">Ghi chú</th><th scope="col" style="font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
						 $trangthai=($row["TrangThai"]==1?"Đã xử lí":"Chưa xử lí");
						 if ($trangthai=="Chưa xử lí"){
						 	$buttonxuli='<a href="javascript:void(0)"  style="text-decoration: none;font-size:16px;" onclick="thayDoiTrangThai(\''.$row["MaDH"].'\')">Chưa xử lí</a>';
						echo '<tr class="csshover">
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaDH"].'</td>
						
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemKhachHang(\''.$row["MaKH"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaKH"].'</a>
						</td>

						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["TongTien"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$buttonxuli.'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["NgayLap"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemNhanVien(\''.$row["MaNV"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaNV"].'</a>
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
						<td scope="col" style="text-align:center;vertical-align:middle;"><a href="javascript:void(0)"  style="text-decoration: none;margin-left:5px" onclick="xemNhanVien(\''.$row["MaNV"].'\')" data-toggle="modal" data-target="#exampleModal">'.$row["MaNV"].'</a></td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DiaChi"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["GhiChu"].'</td>
						<td scope="col" style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["MaDH"].'" class="btn btn-primary" id="xoa'.$row["MaDH"].'"  onclick="xoaDonHang(\''.$row["MaDH"].'\','.$row["TrangThai"].');">Xóa</button><button type="button" name="xem'.$row["MaDH"].'" class="btn btn-primary" id="xem'.$row["MaDH"].'" onclick="xemChiTietDonHang(\''.$row["MaDH"].'\')"data-toggle="modal" data-target="#exampleModal">Xem</button></td></tr>';	
						}	

				}
				echo   '</table></div>';
				?>
			
			<?php
			echo '<div class="row"><div class="col-md-12"><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangDonHang('.$i.')">'.$i.'</a></li>';
			echo '</ul></div></';	
	}
mysqli_close($connSanPham);
?>