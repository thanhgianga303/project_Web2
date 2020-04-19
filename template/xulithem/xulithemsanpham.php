<?php
	$xuli_ma=$_POST["ma"];
	$xuli_ten=$_POST["ten"];
	$xuli_hinhanh="assets/img/product/giay/".$_POST["hinhanh"];
	$xuli_dongia=$_POST["dongia"];
	$xuli_hang=$_POST["hang"];
	$xuli_soluong=$_POST["soluong"];
	require("../connect.php");
	$soLuongDaUpdate=0;
	//Kiểm tra xem sản phẩm thêm vào có trùng sản phẩm trong database không!Nếu có thì update số lượng
	$sqlKiemTra="SELECT * FROM product WHERE MaSP='$xuli_ma'";
	$ketnoiKiemTra=mysqli_query($connSanPham,$sqlKiemTra);
	$numKiemTra=mysqli_num_rows($ketnoiKiemTra);
	if($numKiemTra>0) 
	{
		$rowKiemTra=$ketnoiKiemTra->fetch_assoc();
		if($rowKiemTra['TenSP']==$xuli_ten&&$rowKiemTra['HinhAnh']==$xuli_hinhanh&&$rowKiemTra['DonGia']==$xuli_dongia&&$rowKiemTra['MaHang']==$xuli_hang)
			{
				$soLuongDaUpdate=$xuli_soluong+$rowKiemTra['SoLuong'];
				$sqlUpdate="UPDATE product SET  SoLuong='$soLuongDaUpdate' WHERE MaSP='$xuli_ma'";
				$ketnoiKiemTra=mysqli_query($connSanPham,$sqlUpdate);
				mysqli_close($connSanPham);
				return false;
				}
		if($rowKiemTra['TenSP']!=$xuli_ten) {
			echo "1";
			return false;
		}
		if($rowKiemTra['HinhAnh']!=$xuli_hinhanh) {
			echo "2";
			return false;
		}
		if($rowKiemTra['DonGia']!=$xuli_dongia) {
			echo "3";
			return false;
		}
		if($rowKiemTra['MaHang']!=$xuli_hang) {
			echo "4";
			return false;
		}
	}
	$sql="INSERT INTO product(MaSP,TenSP,HinhAnh,DonGia,MaHang,SoLuong) VALUES ('$xuli_ma','$xuli_ten','$xuli_hinhanh','$xuli_dongia','$xuli_hang','$xuli_soluong')";

	$ketnoi=mysqli_query($connSanPham, $sql);
	mysqli_close($connSanPham);

?>