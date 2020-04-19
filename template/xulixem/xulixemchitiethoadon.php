<?php
	$xuli_madonhang=$_POST["data_madonhang"];
	require("../connect.php");
	$sqlchitiet="SELECT * FROM orders_details WHERE MaDH='$xuli_madonhang'";
	$ketnoi=mysqli_query($connSanPham, $sqlchitiet);
	$numchitietdonhang=mysqli_num_rows($ketnoi);
	if ($numchitietdonhang > 0) {
				$soluongsp1trang=3;
				$tongsanpham=$numchitietdonhang; //dem so dong trong database
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if(isset($_POST["page"])) $tranghientai=$_POST["page"];
				else $tranghientai=1;
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				$sqlhienthitrang="$sqlchitiet LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rssotrang=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div><table class="table table-striped" ><tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral!important;color:black!important;"><th scope="col" style="font-weight:600">Mã đơn hàng</th><th scope="col" style="font-weight:600">Mã sản phẩm</th><th scope="col" style="font-weight:600">Size</th><th scope="col" style="font-weight:600">Đơn giá</th><th scope="col" style="font-weight:600">Số lượng</th></tr>';
				while ($row = $rssotrang->fetch_assoc()) {
						echo '<tr><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaDH"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaSP"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["Size"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DonGia"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["SL"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"></tr>'	;	

				}
				echo   '</table></div>';
	

			echo '<div><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangChiTietDonHang('.$i.',\''.$xuli_madonhang.'\')">'.$i.'</a></li>';
			echo '</ul></div>';
			}	
	mysqli_close($connSanPham);
			?>