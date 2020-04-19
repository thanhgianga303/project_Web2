	function xemChiTietDonHang(madh)
	{
	var string="Xem chi tiết đơn hàng  "+madh;
	document.getElementById("exampleModalLabel").innerHTML=string;

	var a=madh;
	$.ajax({
			url:"xulixem/xulixemchitiethoadon.php",
			type:"post",
			data: {
				data_madonhang:a,
			},
			//async:true,
			success:function(kq){
				$('#hienthichitietdonhang').html(kq);
			}

		});
	}
function xemKhachHang(makh)
{
var string="Xem thông tin khách hàng "+makh;
document.getElementById("exampleModalLabel").innerHTML=string;
var a=makh;
$.ajax({
		url:"xulixem/xulixemkhachhang.php",
		type:"post",
		data: {
			data_makhachhang:a,
		},
		//async:true,
		success:function(kq){
			$('#hienthichitietdonhang').html(kq);
		}

	});
}
function xemNhanVien(manv)
{
var string="Xem thông tin nhân viên "+manv;
document.getElementById("exampleModalLabel").innerHTML=string;
var a=manv;
$.ajax({
		url:"xulixem/xulixemnhanvien.php",
		type:"post",
		data: {
			data_manhanvien:a,
		},
		//async:true,
		success:function(kq){
			$('#hienthichitietdonhang').html(kq);
		}

	});
}
//Xử lí tài khoản
function xemTaiKhoan(matk)
{
var a=matk;
$.ajax({
		url:"xulixem/xulixemtaikhoan.php",
		type:"post",
		data: {
			data_mataikhoan:a,
		},
		//async:true,
		success:function(kq){
			$('#hienthi').html(kq);
		}

	});
}
function hienThiDoiMatKhau()
{
var string=`<div class="row"><div class="col-md-12">
			<form name="form"><div class="row">
			<div class="col-md-12 form-group">
				<label for="mkCu">Mật khẩu cũ:</label>
				<div class="row"><div class="col-md-12"><hr/></div></div>
				<input type="password" class="form-control" style="color:black" size="30" name="mkCu" id="mkCu"style="color:red">
			</div></div>
			<div class="row"><div class="col-md-12 form-group">
				<label for="mkMoi">Mật khẩu mới:</label>
				<div class="row"><div class="col-md-12"><hr/></div></div>
				<input type="password" class="form-control" style="color:black" size="30" name="mkMoi" id="mkMoi"style="color:red">
			</div></div>
			<div class="row"><div class="col-md-12 form-group">
				<label for="nhaplaimkMoi">Nhập lại mật khẩu mới:</label>
				<div class="row"><div class="col-md-12"><hr/></div></div>
				<input type="password" class="form-control" style="color:black" size="30" name="nhaplaimkMoi" id="nhaplaimkMoi"style="color:red">
			</div></div>
			<div class="row"><div class="col-md-12"><hr/></div></div>
			<div class="row">
			<div class="col-md-12"><button type="button" name="xacnhan" class="btn btn-primary" id="xacnhan" onclick="doiMatKhau()">Xác nhận</button></div></div>	
			<div class="row"><div class="col-md-12"><hr/></div></div>
			<div class="row" style="">
			<div class="col-md-12"><button type="button" name="quaylai" class="btn btn-primary" id="quaylai" onclick="quayLai()">Hủy</button></div></div>
			</form>
			</div></div>`;
document.getElementById("hienthi").innerHTML=string;
	form.mkCu.focus();
}
function doiMatKhau()
{
var matKhauCu=document.getElementById("mkCu").value;
var matKhauMoi=document.getElementById("mkMoi").value;
var nhapLaiMatKhauMoi=document.getElementById("nhaplaimkMoi").value;
if(matKhauCu=="") {
	alert("Mật khẩu cũ vui lòng không để trống!");
	form.mkCu.focus();
	return false;
	} 
if(matKhauMoi=="") {
	alert("Mật khẩu mới vui lòng không để trống!");
	form.mkMoi.focus();
	return false;
	} 
if(nhapLaiMatKhauMoi=="") {
	alert("Nhập lại mật khẩu mới vui lòng không để trống!");
	form.nhaplaimkMoi.focus();
	return false;
	} 
$.ajax({
		url:"xulixem/xulidoimatkhau.php",
		type:"post",
		data: {
			data_matKhauCu:matKhauCu,
			data_matKhauMoi:matKhauMoi,
			data_nhapLaiMatKhauMoi:nhapLaiMatKhauMoi
		},
		//async:true,
		success:function(kq){
			if(kq.indexOf("0")!= -1) {
				alert("Mật khẩu cũ không đúng!");
				document.getElementById("mkCu").value="";
				form.mkCu.focus();
				return false;	
				}
			if(kq.indexOf("1")!= -1) {
				alert("Mật khẩu mới và nhập lại mật khẩu mới không trùng khớp!");
				document.getElementById("mkMoi").value="";
				document.getElementById("nhaplaimkMoi").value="";
				form.mkMoi.focus();
				return false;	
				}
			if(kq.indexOf("2")!= -1) {
				alert("Mật khẩu mới và mật khẩu cũ không được trùng!");
				document.getElementById("mkMoi").value="";
				document.getElementById("nhaplaimkMoi").value="";
				document.getElementById("mkCu").value="";
				form.mkCu.focus();
				return false;	
				}					
			if(kq.indexOf("3")!= -1) {
				alert("Đổi mật khẩu thành công, vui lòng đăng nhập lại");
				window.location.href="login.php";	
				}				
			// $('#hienthitaikhoan').html(kq);
		}

	});
}
function logOut()
{
$.ajax({
		url:"xulixem/xulilogout.php",
		type:"post",
		data: {
		},
		//async:true,
		success:function(kq){
			alert("Đăng xuất thành công");
			window.location.href="login.php";
		}

	});
}
function quayLai()
{
document.getElementById('xoaForm').innerHTML="";
$.ajax({
		url:"xulixem/xulixemtaikhoan.php",
		type:"post",
		data: {
		},
		//async:true,
		success:function(kq){
			$('#hienthi').html(kq);
		}

	});
}
function troLai()
{
$.ajax({
		url:"xulixem/xulihienthiuser.php",
		type:"post",
		data: {
		},
		//async:true,
		success:function(kq){
			$('#hienthi').html(kq);
		}

	});
}