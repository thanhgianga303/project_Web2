//Xử lí sự kiện quản lý sản phẩm Nút xóa
function xoaSanPham(masp) {
	a=masp;
	if(confirm("Bạn muốn xóa sản phẩm này?")){
	$.ajax({
		url:"xulixoa/xulixoasanpham.php",
		type:"post",
		data: {
			ma:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiSanPham();
		}

	});
}
}
//Xử lí sự kiện quản lý tài khoản Nút xóa
function xoaTaiKhoan(matk) {
	a=matk;
	if(confirm("Bạn muốn xóa tài khoản này")){
	$.ajax({
		url:"xulixoa/xulixoataikhoan.php",
		type:"post",
		data: {
			data_matk:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiTaiKhoan();
		}

	});
}
}
//Xử lí sự kiện quản lý quyền Nút xóa
function xoaQuyen(maquyen) {
	a=maquyen;
	if(confirm("Bạn muốn xóa quyền này")){	
	$.ajax({
		url:"xulixoa/xulixoaquyen.php",
		type:"post",
		data: {
			data_maquyen:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiQuyen();
		}

	});
}
}
//Xử lí sự kiện quản lý hãng Nút xóa
function xoaHang(mahang) {
	a=mahang;
	if(confirm("Bạn muốn xóa hãng này")){	
	$.ajax({
		url:"xulixoa/xulixoahang.php",
		type:"post",
		data: {
			data_mahang:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiHang();
		}

	});
}
}
//Xử lí sự kiện quản lý khách hàng Nút xóa
function xoaKhachHang(makhachhang) {
	a=makhachhang;
	if(confirm("Bạn muốn xóa khách hàng này")){	
	$.ajax({
		url:"xulixoa/xulixoakhachhang.php",
		type:"post",
		data: {
			data_makhachhang:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiKhachHang();
		}

	});
}
}
//Xử lí sự kiện quản lý Nhân viên Nút xóa
function xoaNhanVien(manhanvien) {
	a=manhanvien;
	if(confirm("Bạn muốn xóa nhân viên này")){
	$.ajax({
		url:"xulixoa/xulixoanhanvien.php",
		type:"post",
		data: {
			data_manhanvien:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiNhanVien();
		}

	});
}
}
function xoaDonHang(madonhang,trangthai) {
	a=madonhang;
	if(confirm("Bạn muốn xóa sản phẩm này")){
	var b=trangthai;
	if(b!=1){
	$.ajax({
		url:"xulixoa/xulixoadonhang.php",
		type:"post",
		data: {
			data_madonhang:a,
		},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Xóa thành công");
			hienThiDonHang();
		}

	});
}
	else {
		alert("Đơn hàng đã được xử lý không thể xóa");
	}
}
}