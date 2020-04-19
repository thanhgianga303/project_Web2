<?php
// session_start();
require("../connect.php");
mysqli_set_charset($connSanPham,"utf8");
$xuli_inputSearch=$_GET["data_inputSearch"];
$xuli_select=$_GET["data_select"];
switch ($xuli_select) {
	case 'tatca':
		$sql="SELECT * FROM user WHERE id LIKE '%$xuli_inputSearch%' OR username LIKE '%$xuli_inputSearch%' OR name LIKE '%$xuli_inputSearch%' OR email LIKE '%$xuli_inputSearch%' OR sdt LIKE '%$xuli_inputSearch%' OR role LIKE '%$xuli_inputSearch%'";
		break;
	case 'mataikhoan':
		$sql="SELECT * FROM user WHERE id LIKE '%$xuli_inputSearch%'";
		break;
	case 'tentaikhoan':
		$sql="SELECT * FROM user WHERE username LIKE '%$xuli_inputSearch%'";
		break;
	case 'tennguoidung':
		$sql="SELECT * FROM user WHERE name LIKE '%$xuli_inputSearch%'";
		break;
	case 'email':
		$sql="SELECT * FROM user WHERE email LIKE '%$xuli_inputSearch%'";
		break;
	case 'sdt':
		$sql="SELECT * FROM user WHERE sdt LIKE '%$xuli_inputSearch%'";
		break;
	case 'quyen':
		$sql="SELECT * FROM user WHERE role LIKE '%$xuli_inputSearch%'";
		break;				
	default:
		# code...
		break;
	}
	$_SESSION['sqlTaiKhoan'] = $sql;
	// echo $sql;
	
	$rs=mysqli_query($connSanPham, $sql);
	$num=mysqli_num_rows($rs);
	if($num > 0){
				$soluongsp1trang=5;
				$tongsanpham=$num;
				$sotrang=ceil($tongsanpham/$soluongsp1trang);
				if($sotrang<=1) $sotrang=0;
				if(isset($_GET["page"])) $tranghientai=$_GET["page"];
				else $tranghientai=1;
				$sanphamdaucuatrang=($tranghientai-1)*$soluongsp1trang;
				// echo $sanphamdaucuatrang;
				$sqlhienthitrang=$sql." LIMIT $sanphamdaucuatrang,$soluongsp1trang";
				$rssotrang=mysqli_query($connSanPham,$sqlhienthitrang);

				echo '<div class="col-md-12"><table class="table table-striped"><tr style="background-color:coral;color:black!important"><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Mã tài khoản</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Tên tài khoản</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Mật khẩu</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Tên người dùng</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Email</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Số điện thoại</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Quyền</th><th scope="col" style="text-align:center;vertical-align:middle;font-size:20px;font-weight:600">Thao tác</th></tr>';
				while ($row = $rssotrang->fetch_assoc()) {
						echo '<tr style="color:#333333;"><td scope="col"  style="text-align:center;vertical-align:middle;">'.$row["id"].'</td><td scope="col" style="text-align:center;vertical-align:middle;" >'.$row["username"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["password"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["name"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["email"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["sdt"].'</td><td scope="col" style="text-align:center;vertical-align:middle;">'.$row["role"].'</td><td scope="col" style="text-align:center;vertical-align:middle;"><div style="text-align:center;vertical-align:middle;"><button type="button" name="xoa'.$row["id"].'" class="btn btn-primary" id="xoa'.$row["id"].'" onclick="xoaTaiKhoan(\''.$row["id"].'\');">Xóa</button></div><div style="text-align:center;vertical-align:middle;"><button type="button" name="sua'.$row["id"].'" class="btn btn-primary" id="sua'.$row["id"].'" 
 data-toggle="modal" data-target="#exampleModal"

						 onclick="suaTaiKhoan(\''.$row["id"].'\',\''.$row["username"].'\',\''.$row["password"].'\',\''.$row["name"].'\',\''.$row["email"].'\',\''.$row["sdt"].'\',\''.$row["role"].'\');hienThi(this);"  >Sửa</button></div></td></tr>'	;	

				}
				echo   '</table></div>';
				?>
			
			<?php
			echo '<div><ul class="pagination">'; 
				for($i=1;$i<=$sotrang;$i++)
					if($i==$tranghientai) echo '<li class="active page-link" style="background-color:#58b252;color:white"><span>'.$i.'</span></li>';
					else echo '<li><a href="javascript:void(0)" class="page-link" onclick="xuLiPhanTrangTaiKhoan('.$i.')">'.$i.'</a></li>';
				echo '</ul></div>';
}
mysqli_close($connSanPham);
?>