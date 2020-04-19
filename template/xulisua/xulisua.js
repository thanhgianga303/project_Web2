
//Quản lý sản phẩm, xư lí sự kiện Nút Sửa
function suaSanPham(masp,tensp,hinhanh,dongia,hang,soluong)
{
formSanPham.masanpham.focus();
document.getElementById("masanpham").value=masp;
document.getElementById("tensanpham").value=tensp;
// alert(hinhanh);
var string=hinhanh.split("giay/");
// document.getElementById("hinhanh").files[0]==string[1];
document.getElementById("txthinhanh").value=string[1];
document.getElementById("dongia").value=dongia;
document.getElementById("hang").value=hang;
document.getElementById("soluong").value=soluong;
}
function layGiaTriCuaFormNhap()
{
a=document.getElementById("masanpham").value;
b=document.getElementById("tensanpham").value;
c=document.getElementById("hinhanh").value;
// document.getElementById("hinhanh").files[0].name="";
txtc=document.getElementById("txthinhanh").value;
d=document.getElementById("dongia").value;
e=document.getElementById("hang").value;
f=document.getElementById("soluong").value;
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
if(txtc==""){
	if(c=="") {
		alert("Vui lòng chọn hình ảnh, không được bỏ trống");
		formSanPham.hinhanh.focus();
		return false;
	}
	else c=document.getElementById("hinhanh").files[0].name;
}
if(c==""){
	if(txtc=="") {
		alert("Vui lòng chọn hình ảnh, không được bỏ trống");
		formSanPham.hinhanh.focus();
		return false;
	}
	else c=txtc;
}
testc=document.getElementById("hinhanh").value;
if(testc!=""&&txtc!="") c=document.getElementById("hinhanh").files[0].name;
alert(c);	
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
		url:"xulisua/xulisuasanpham.php",
		type:"post",
		data: {
			data_masp:a,
			data_tensp:b,
			data_hinhanh:c,
			data_dongia:d,
			data_hang:e,
			data_soluong:f
				},
		//async:true,
		success:function(kq){
			//$(".col-md-8").html(kq);
			//alert(kq);
			//window.location.href = window.location.href; //refresh trang sau khi them
			alert("Sửa thành công");
			hienThiSanPham();
		}

	});
refreshSP();
}
function hienThiSanPham(){
	$.ajax({
		url:"hienthi/hienthisanpham.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthisanpham").html(kq);
		}
	});
}
function refreshSP(){
	formSanPham.masanpham.focus();
	document.getElementById("masanpham").value="";
	document.getElementById("tensanpham").value="";
	document.getElementById("hinhanh").value="";
	document.getElementById("dongia").value="";
	document.getElementById("hang").value="";
	document.getElementById("soluong").value="";
}
//Quản lí tài khoản, xử lí sự kiện Nút Sửa
function suaTaiKhoan(matk,tentk,matkhau,tennd,email,sdt,quyen)
{
document.getElementById("mataikhoan").value=matk;
document.getElementById("tentaikhoan").value=tentk;
document.getElementById("matkhau").value=matkhau;
document.getElementById("tennguoidung").value=tennd;
document.getElementById("email").value=email;
document.getElementById("sdt").value=sdt;
document.getElementById("quyen").value=quyen;
}
function layGiaTriCuaFormTaiKhoan()
{
a=document.getElementById("mataikhoan").value;
b=document.getElementById("tentaikhoan").value;
c=document.getElementById("matkhau").value;
d=document.getElementById("tennguoidung").value;
e=document.getElementById("email").value;
f=document.getElementById("sdt").value;
g=document.getElementById("quyen").value;
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
		url:"xulisua/xulisuataikhoan.php",
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
			alert("Sửa thành công thành công");
			hienThiTaiKhoan();
			refreshTK();
		}

	});
}
function hienThiTaiKhoan(){
	$.ajax({
		url:"hienthi/hienthitaikhoan.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthitaikhoan").html(kq);
		}
	});
}
function refreshTK(){
document.getElementById("mataikhoan").value="";
document.getElementById("tentaikhoan").value="";
document.getElementById("matkhau").value="";
document.getElementById("tennguoidung").value="";
document.getElementById("email").value="";
document.getElementById("sdt").value="";
document.getElementById("quyen").value="";
}
//Xử lí sửa Quyền
function suaQuyen(maq,tenq,chitiet)
{
document.getElementById("maquyen").value=maq;
document.getElementById("tenquyen").value=tenq;
document.getElementById("chitietquyen").value=chitiet;
}
function layGiaTriCuaFormQuyen()
{
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
		url:"xulisua/xulisuaquyen.php",
		type:"post",
		data: {
			data_maquyen:a,
			data_tenquyen:b,
			data_chitietquyen:c
				},
		success:function(kq){
			alert("Sửa thành công");
			hienThiQuyen();
		}

	});
refreshQ();
}
function hienThiQuyen(){
	$.ajax({
		url:"hienthi/hienthiquyen.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthiquyen").html(kq);
		}
	});
}
function refreshQ(){
document.getElementById("maquyen").value="";
document.getElementById("tenquyen").value="";
document.getElementById("chitietquyen").value="";
}
//Xử lí sửa Hãng
function suaHang(mahang,tenhang,mota)
{
document.getElementById("mahang").value=mahang;
document.getElementById("tenhang").value=tenhang;
document.getElementById("mota").value=mota;
}
function layGiaTriCuaFormHang()
{
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
		url:"xulisua/xulisuahang.php",
		type:"post",
		data: {
			data_mahang:a,
			data_tenhang:b,
			data_mota:c
				},
		//async:true,
		success:function(kq){
			alert("Sửa thành công");
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
function refreshH(){
document.getElementById("mahang").value="";
document.getElementById("tenhang").value="";
document.getElementById("mota").value="";
}
//Xử lí sửa Khách hàng
function suaKhachHang(makhachhang,mataikhoan,trangthai)
{
document.getElementById("makhachhang").value=makhachhang;
document.getElementById("mataikhoankh").value=mataikhoan;
document.getElementById("trangthaikh").value=trangthai;
}
function layGiaTriCuaFormKhachHang()
{
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
		url:"xulisua/xulisuakhachhang.php",
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
			alert("Sửa thành công");
			hienThiKhachHang();
			refreshKH();
		}

	});
}
function hienThiKhachHang(){
	$.ajax({
		url:"hienthi/hienthikhachhang.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthikhachhang").html(kq);
		}
	});
}
function refreshKH(){
document.getElementById("makhachhang").value="";
document.getElementById("mataikhoankh").value="";
document.getElementById("trangthaikh").value="";
}
//Xử lí sửa Nhân viên
function suaNhanVien(manhanvien,mataikhoan,diachi,trangthai)
{
document.getElementById("manhanvien").value=manhanvien;
document.getElementById("mataikhoannv").value=mataikhoan;
document.getElementById("diachinv").value=diachi;
document.getElementById("trangthainv").value=trangthai;
}
function layGiaTriCuaFormNhanVien()
{
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
		url:"xulisua/xulisuanhanvien.php",
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
			alert("Sửa thành công");
			hienThiNhanVien();
			refreshNV();
		}

	});
}
function hienThiNhanVien(){
	$.ajax({
		url:"hienthi/hienthinhanvien.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthinhanvien").html(kq);
		}
	});
}
function refreshNV(){
document.getElementById("manhanvien").value="";
document.getElementById("mataikhoannv").value="";
document.getElementById("diachinv").value="";
document.getElementById("trangthainv").value="";
}
function hienThiDonHang(){
	$.ajax({
		url:"hienthi/hienthidonhang.php",
		type:"post",
		data: {

		},
		//async:true,
		success:function(kq){
			$("#hienthidonhang").html(kq);
		}
	});
}