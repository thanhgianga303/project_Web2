function timkiemSP()
{
	a=document.getElementById("mySelect1").value;
	var inputSearch=$('.timkiem').val();
	b=document.getElementById("soluongdau").value;
	c=document.getElementById("soluongcuoi").value;
	d=document.getElementById("giabatdau").value;
	e=document.getElementById("giaketthuc").value;	
	// alert(inputSearch);
	$.ajax({
		url:"xulitimkiem/xulitimkiemsanpham.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			data_soluongdau:b,
			data_soluongcuoi:c,
			data_giadau:d,
			data_giacuoi:e,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthisanpham').html(kq);
		}
	});
}
$(document).load(function(){
	document.getElementById('ngaybatdau').addEventListener('change',()=>{
	alert(123)
})
})
function timkiemDH()
{
	a=document.getElementById("mySelectDonHang").value;
	var inputSearch=$('.timkiemDonHang').val();
	b=document.getElementById("tongtiendau").value;
	c=document.getElementById("tongtiencuoi").value;
	d=document.getElementById("ngaybatdau").value;
	e=document.getElementById("ngayketthuc").value;	
	$.ajax({
		url:"xulitimkiem/xulitimkiemdonhang.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			data_tongtiendau:b,
			data_tongtiencuoi:c,
			data_ngaybatdau:d,
			data_ngayketthuc:e,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthidonhang').html(kq);
		}
	});
}
function timkiemH()
{
	a=document.getElementById("mySelectHang").value;
	var inputSearch=$('.timkiemHang').val();	
	// alert(inputSearch);
	$.ajax({
		url:"xulitimkiem/xulitimkiemhang.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthihang').html(kq);
		}
	});
}
function timkiemTK()
{
	a=document.getElementById("mySelectTaiKhoan").value;
	var inputSearch=$('.timkiemTaiKhoan').val();	
	$.ajax({
		url:"xulitimkiem/xulitimkiemtaikhoan.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthitaikhoan').html(kq);
		}
	});
}
function timkiemKH()
{
	a=document.getElementById("mySelectKhachHang").value;
	var inputSearch=$('.timkiemKhachHang').val();	
	// alert(inputSearch);
	$.ajax({
		url:"xulitimkiem/xulitimkiemkhachhang.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthikhachhang').html(kq);
		}
	});
}
function timkiemNV()
{
	a=document.getElementById("mySelectNhanVien").value;
	var inputSearch=$('.timkiemNhanVien').val();	
	// alert(inputSearch);
	$.ajax({
		url:"xulitimkiem/xulitimkiemnhanvien.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthinhanvien').html(kq);
		}
	});
}
function timkiemQ()
{
	a=document.getElementById("mySelectQuyen").value;
	var inputSearch=$('.timkiemQuyen').val();	
	// alert(inputSearch);
	$.ajax({
		url:"xulitimkiem/xulitimkiemquyen.php",
		type:"get",
		data: {
			data_inputSearch:inputSearch,
			data_select:a,
			page:1		
		},
		//async:true,
		success:function(kq){
		// hienThiSanPham();
		$('#hienthiquyen').html(kq);
		}
	});
}



