<?php
				$xuli_madonhang=$_GET['data_madonhang'];
    		  	require('connect.php');
				// mysqli_set_charset($connect ,"utf8");
				if (isset($_SESSION['sqlGoc'])) {
					$sql = $_SESSION['sqlGoc'];
					unset($_SESSION['sqlGoc']);
				}
				else
					$sql="SELECT * FROM orders_details WHERE MaDH='$xuli_madonhang'";
				echo $sql;
				// mysqli_set_charset($connSanPham,"utf8");
				$rs=mysqli_query($connSanPham,$sql);
				$soluongsp1trang=3;
				$tongsanpham=mysqli_num_rows($rs); //dem so dong trong database
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if($sotrang<=1) $sotrang=0;
				if(isset($_GET["page"])) $tranghientai=$_GET["page"];
				else $tranghientai=1;
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				$sqlhienthitrang="$sql LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rs=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div style="color:black!important"><table class="table table-striped"><tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral!important;color:black!important"><th scope="col" style="font-weight:600">Mã đơn hàng</th><th scope="col" style="font-weight:600">Mã sản phẩm</th><th scope="col" style="font-weight:600">Size</th><th scope="col" style="font-weight:600">Đon giá</th><th scope="col" style="font-weight:600">Số lượng</th><th scope="col" style="font-weight:600">Thao tác</th></tr>';
				while ($row = $rs->fetch_assoc()) {
						echo '<tr><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaDH"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["MaSP"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["Size"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DonGia"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["SL"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"></tr>'	;	

				}
				echo   '</table></div>';
				mysqli_close($connSanPham);
		?>