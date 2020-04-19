function thayDoiTrangThai(madonhang){
	// sub=$("#sub").val();
	a=madonhang;
	$.ajax({
		url:"xulithaydoitrangthai/xulithaydoitrangthai.php",
		type:"post",
		data: {
			data_madonhang:a
		},
		//async:true,
		success:function(kq){
			alert("Thay đổi trạng thái thành công");
			hienThiDonHang();
			// alert(kq);
		}

	});
}