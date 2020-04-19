
//Xử lí sự kiện-> Nút thêm sản phẩm
function themSanPham() {
	 a=$("#masanpham").val();
	 b=$("#tensanpham").val();
	 d=$("#dongia").val(); 
	 e=$("#hang").val();
	 f=$("#soluong").val();
	if(a=="") {
		alert("Vui lòng nhập mã sản phẩm, không được bỏ trống");
		formSanPham.masanpham.focus();
		return false;
	}
	if(b=="") {
		alert("Vui lòng nhập tên sản phẩm, không được bỏ trống");
		formSanPham.tensanpham.focus();
		return false;
	}
	c=document.getElementById("hinhanh").value;
	if(c=="") {
		alert("Vui lòng chọn hình ảnh, không được bỏ trống");
		formSanPham.hinhanh.focus();
		return false;
	}
	else c=document.getElementById("hinhanh").files[0].name;
	if(d=="") {
		alert("Vui lòng nhập đơn giá, không được bỏ trống");
		formSanPham.dongia.focus();
		return false;
	}
	if(e=="") {
		alert("Vui lòng nhập hãng, không được bỏ trống");
		formSanPham.hang.focus();
		return false;
	}
	if(f=="") {
		alert("Vui lòng nhập số lượng, không được bỏ trống");
		formSanPham.soluong.focus();
		return false;
	}
	var soluong=/^[0-9]*$/;
	var dongia=/^[0-9]*$/;
	if(dongia.test(d)==false) {
		alert("Đơn giá không thể là kí tự chữ hoặc kí tự đặc biệt!Vui lòng nhập lại");
		document.getElementById("dongia").value="";
		formSanPham.dongia.focus();
		return false;
	}
	if(soluong.test(f)==false) {
		alert("Số lượng không thể là kí tự chữ hoặc kí tự đặc biệt!Vui lòng nhập lại");
		document.getElementById("soluong").value="";
		formSanPham.soluong.focus();
		return false;
	}

	$.ajax({
		url:"xulithem/xulithemsanpham.php",
		type:"post",
		data: {
			ma:a,
			ten:b,
			hinhanh:c,
			dongia:d,
			hang:e,
			soluong:f
		},
		//async:true,
		success:function(kq){
			// $("#hienthisanpham").html(kq);
			if(kq.indexOf("1")!=-1) {
				alert("Mã sản phẩm "+a+" đã tồn tại, muốn thêm số lượng vui lòng nhập đúng tên sản phẩm");
				formSanPham.tensanpham.focus();
				document.getElementById("tensanpham").value="";
				return false;
			}
			if(kq.indexOf("2")!=-1) {
				alert("Mã sản phẩm "+a+" đã tồn tại, muốn thêm số lượng vui lòng chọn đúng hình ảnh");
				formSanPham.hinhanh.focus();
				document.getElementById("hinhanh").value="";
				return false;
			}
			if(kq.indexOf("3")!=-1) {
				alert("Mã sản phẩm "+a+" đã tồn tại, muốn thêm số lượng vui lòng nhập đúng đơn giá");
				formSanPham.dongia.focus();
				document.getElementById("dongia").value="";
				return false;
			}
			if(kq.indexOf("4")!=-1) {
				alert("Mã sản phẩm "+a+" đã tồn tại, muốn thêm số lượng vui lòng nhập đúng hãng");
				formSanPham.hang.focus();
				document.getElementById("hang").value="";
				return false;
			}
			alert("Thêm thành công");
			hienThiSanPham();
			refreshSP();			
		}

	});
}
//Xử lí sự kiện, Nút thêm Tài khoản
function themTaiKhoan() {
	a=$("#mataikhoan").val();
	b=$("#tentaikhoan").val();
	c=$("#matkhau").val();
	d=$("#tennguoidung").val();
	e=$("#email").val();
	f=$("#sdt").val();
	g=$("#quyen").val();
	if(a=="") {
		alert("Vui lòng nhập mã tài khoản, không được bỏ trống");
		formTaiKhoan.mataikhoan.focus();
		return false;
	}
	if(b=="") {
		alert("Vui lòng nhập tên tài khoản, không được bỏ trống");
		formTaiKhoan.tentaikhoan.focus();
		return false;
	}
	if(c=="") {
		alert("Vui lòng nhập mật khẩu, không được bỏ trống");
		formTaiKhoan.matkhau.focus();
		return false;
	}
	if(d=="") {
		alert("Vui lòng nhập tên người dùng, không được bỏ trống");
		formTaiKhoan.tennguoidung.focus();
		return false;
	}
	if(e=="") {
		alert("Vui lòng nhập email, không được bỏ trống");
		formTaiKhoan.email.focus();
		return false;
	}
	if(f=="") {
		alert("Vui lòng nhập số điện thoại, không được bỏ trống");
		formTaiKhoan.sdt.focus();
		return false;
	}
	if(g=="") {
		alert("Vui lòng nhập mã quyền, không được bỏ trống");
		formTaiKhoan.quyen.focus();
		return false;
	}
	var patternEmail=/^(^[a-zA-Z][a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
	// alert(patternEmail);
	if(patternEmail.test(e)==false) {
		alert("Email không hợp lệ !!!");
		formTaiKhoan.email.focus();
		return false;
	}
	var patternSDT=/^0[0-9\s.-]{9,13}$/;
	if(patternSDT.test(f)==false) {
		alert("SDT không hợp lệ !!!");
		formTaiKhoan.sdt.focus();
		return false;
	}
	$.ajax({
		url:"xulithem/xulithemtaikhoan.php",
		type:"post",
		data: {
			data_mataikhoan:a,
			data_tentaikhoan:b,
			data_matkhau:c,
			data_tennguoidung:d,
			data_email:e,
			data_sdt:f,
			data_quyen:g
		},
		//async:true,
		success:function(kq){
			if(kq.indexOf("no")!==-1)
			{
				alert("Mã quyền này không tồn tại,vui lòng nhâp lại");
				formTaiKhoan.quyen.focus();
				document.getElementById("quyen").value="";
				return false;
			}
			alert("Thêm thành công");
			hienThiTaiKhoan();
			refreshTK();
		}
	});
}
//Xử lí sự kiện, Nút thêm Quyền
function themQuyen() {
a=document.getElementById("maquyen").value;
b=document.getElementById("tenquyen").value;
c=document.getElementById("chitietquyen").value;
if(a=="") {
		alert("Vui lòng nhập mã quyền, không được bỏ trống");
		formQuyen.maquyen.focus();
		return false;
	}
if(b=="") {
		alert("Vui lòng nhập tên quyền, không được bỏ trống");
		formQuyen.tenquyen.focus();
		return false;
	}
if(c=="") {
		alert("Vui lòng nhập chi tiết quyền, không được bỏ trống");
		formQuyen.chitietquyen.focus();
		return false;
	}
$.ajax({
		url:"xulithem/xulithemquyen.php",
		type:"post",
		data: {
			data_maquyen:a,
			data_tenquyen:b,
			data_chitietquyen:c
				},
		//async:true,
		success:function(kq){
			alert("Thêm thành công");
			hienThiQuyen();
		}
	});
	refreshQ();
}
//Xử lí sự kiện, Nút thêm Hãng
function themHang() {
a=document.getElementById("mahang").value;
b=document.getElementById("tenhang").value;
c=document.getElementById("mota").value;
if(a=="") {
		alert("Vui lòng nhập mã hãng, không được bỏ trống");
		formHang.mahang.focus();
		return false;
	}
if(b=="") {
		alert("Vui lòng nhập tên hãng, không được bỏ trống");
		formHang.tenhang.focus();
		return false;
	}
if(c=="") {
		alert("Vui lòng nhập mô tả hãng, không được bỏ trống");
		formQuyen.mota.focus();
		return false;
	}
$.ajax({
		url:"xulithem/xulithemhang.php",
		type:"post",
		data: {
			data_mahang:a,
			data_tenhang:b,
			data_mota:c
				},
		//async:true,
		success:function(kq){
			alert("Thêm thành công");
			hienThiHang();
		}
	});
	refreshH();
}
function hienThiHang(){
	$.ajax({
		url:"hienthi/hienthihang.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthihang").html(kq);
		}
	});
}
//Xử lí sự kiện, Nút thêm Khách hàng
function themKhachHang() {
a=document.getElementById("makhachhang").value;
b=document.getElementById("mataikhoankh").value;
d=document.getElementById("trangthaikh").value;
if(a=="") {
		alert("Vui lòng nhập mã khách hàng, không được bỏ trống");
		formKhachHang.makhachhang.focus();
		return false;
	}
if(b=="") {
		alert("Vui lòng nhập mã tài khoản, không được bỏ trống");
		formKhachHang.mataikhoankh.focus();
		return false;
	}
if(d=="") {
		alert("Vui lòng nhập trạng thái, không được bỏ trống");
		formKhachHang.trangthaikh.focus();
		return false;
	}
if(d!=0&&d!=1) {
		alert("Trạng thái không hợp lệ, không được bỏ trống");
		formKhachHang.trangthaikh.focus();
		document.getElementById("trangthaikh").value="";
		return false;
	}
$.ajax({
		url:"xulithem/xulithemkhachhang.php",
		type:"post",
		data: {
			data_makhachhang:a,
			data_mataikhoan:b,
			data_trangthai:d
				},
		//async:true,
		success:function(kq){
			if(kq.indexOf("no")!==-1)
			{
				alert("Mã tài khoản này không tồn tại,vui lòng nhâp lại");
				formKhachHang.mataikhoankh.focus();
				document.getElementById("mataikhoankh").value="";
				return false;
			}
			alert("Thêm thành công");
			hienThiKhachHang();
			refreshKH();

		}
	});
	refreshKH();
}
//Xử lí sự kiện, Nút thêm Nhân viên
function themNhanVien() {
a=document.getElementById("manhanvien").value;
b=document.getElementById("mataikhoannv").value;
c=document.getElementById("diachinv").value;
d=document.getElementById("trangthainv").value;
if(a=="") {
		alert("Vui lòng nhập mã nhân viên, không được bỏ trống");
		formNhanVien.manhanvien.focus();
		return false;
	}
if(b=="") {
		alert("Vui lòng nhập mã tài khoản, không được bỏ trống");
		formNhanVien.mataikhoannv.focus();
		return false;
	}
if(c=="") {
		alert("Vui lòng nhập địa chỉ, không được bỏ trống");
		formNhanVien.diachinv.focus();
		return false;
	}
if(d=="") {
		alert("Vui lòng nhập trạng thái, không được bỏ trống");
		formNhanVien.trangthainv.focus();
		return false;
	}
if(d!=0&&d!=1) {
		alert("Trạng thái không hợp lệ, không được bỏ trống");
		formNhanVien.trangthainv.focus();
		document.getElementById("trangthainv").value="";
		return false;
	}
$.ajax({
		url:"xulithem/xulithemnhanvien.php",
		type:"post",
		data: {
			data_manhanvien:a,
			data_mataikhoan:b,
			data_diachi:c,
			data_trangthai:d
				},
		//async:true,
		success:function(kq){
			if(kq.indexOf("no")!==-1)
			{
				alert("Mã tài khoản này không tồn tại,vui lòng nhâp lại");
				formNhanVien.mataikhoannv.focus();
				document.getElementById("mataikhoannv").value="";
				return false;
			}
			alert("Thêm thành công");
			hienThiNhanVien();
			refreshNV();
		}
	});
}

