function xuLiPhanTrangSanPham(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthisanpham.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthisanpham").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangHang(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthihang.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthihang").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangTaiKhoan(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthitaikhoan.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthitaikhoan").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangKhachHang(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthikhachhang.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthikhachhang").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangNhanVien(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthinhanvien.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthinhanvien").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangQuyen(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthiquyen.php",
		type:"get",
		data: {
			page:a
		},
		//async:true,
		success:function(kq){
			$("#hienthiquyen").html(kq);
			// hienThiSanPham();
		}

	});
}
function xuLiPhanTrangDonHang(page){
	a=page;

	$.ajax({
		url:"hienthi/hienthidonhang.php",
		type:"get",
		data: {
			page:a
		},
		success:function(kq){
			$("#hienthidonhang").html(kq);
		}

	});
}
function xuLiPhanTrangChiTietDonHang(page,mahdphantrang){
	a=page;
	b=mahdphantrang;
	$.ajax({
		url:"xulixem/xulixemchitiethoadon.php",
		type:"post",
		data: {
			page:a,
			data_madonhang:b
		},
		success:function(kq){
			$("#hienthichitietdonhang").html(kq);
		}
	});
}
