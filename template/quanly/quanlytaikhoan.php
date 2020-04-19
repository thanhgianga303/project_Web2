<head>
	<title>Quản lí tài khoản</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/quanlysanpham.css">
	<style>
	</style>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="xulisua/xulisua.js"></script>
	<script src="xulithem/xulithem.js"></script>
	<script src="xulixoa/xulixoa.js"></script>
	<script src="xulitimkiem/xulitimkiem.js"></script>
	<script src="xuliphantrang/xuliphantrang.js"></script>
	
</head>
<body>
	<div class="row">
	<div class="col-md-12" style="overflow: auto;">
		<div class="row">
			<div style="text-align: center;background-color: #e5e5e5" class="col-md-12">		
				<button type="button" name="them" class="btn btn-primary" id="them" data-toggle="modal" data-target="#exampleModal" onclick="hienThi(this);refreshTK();"><img src="icon/icons8_plus_48px_1.png" style="width:30px;height:30px"/>Thêm tài khoản</button>	
			</div>
		</div>
		<div class="row"><div class="col-md-12"><hr/></div></div>
		<div class="row" style="margin-top:10px">
					<div class="col-md-3">
						<select id="mySelectTaiKhoan" class="form-control" style="width:145px!important;color:#495057!important">
				         <option value="tatca">Tất cả</option>
				         <option value="mataikhoan">Mã tài khoản</option>
				         <option value="tentaikhoan">Tên tài khoản</option>
						 <option value="tennguoidung">Tên người dùng</option>
						 <option value="email">Email</option>
						 <option value="sdt">Số điện thoại</option>
						 <option value="quyen">Mã quyền</option>		
      					</select>
					</div>
					<div class="col-md-2"><label style="float:right!important;color:black;font-size: 17px;font-weight: 1000">Tìm kiếm:</label>
						</div>
					<div class="col-md-7"><input type="text" class="timkiemTaiKhoan form-control" size="30px" style="width: 200px!important" onkeyup="timkiemTK();" /></div>
				
		</div>
		<div id="hienthitaikhoan" style="margin-top:10px">
	<?php
			include "hienthi/hienthitaikhoan.php";
	
	?>
	</div>
	</div>
	<div class="col-md-4" style="background-color: #696969;color:white">
	</div>
	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Sửa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="formTaiKhoan" action="">
			<div class="form-group">
				<label for="mataikhoan">Mã tài khoản:</label>
				<input type="text" class="form-control" style="color:black" size="30" name="mataikhoan" id="mataikhoan" style="">
			</div>
			<div class="form-group">
				<label for="tentaikhoan">Tên tài khoản:</label>
				<input type="text" class="form-control" style="color:black" size="30" name="tentaikhoan" id="tentaikhoan" style="">
			</div>
			<div class="form-group">
				<label for="matkhau">Mật khẩu:</label>
				<input type="password" class="form-control" style="color:black" size="30" name="matkhau" id="matkhau"style="">
			</div>
			<div class="form-group">
				<label for="tennguoidung">Tên người dùng:</label>
				<input type="text" class="form-control" style="color:black" size="30" name="tennguoidung" id="tennguoidung" style="">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" style="color:black" size="30" name="email" id="email" style="">
			</div>
			<div class="form-group">
				<label for="sdt">Số điện thoại</label>
				<input class="form-control" type="text" style="color:black" size="30" name="sdt" id="sdt" style="">
			</div>
			<div class="form-group">
				<label for="quyen">Quyền</label>
				<input class="form-control" type="text" placeholder="Q1,Q2,Q3" style="color:black" size="30" name="quyen" id="quyen" style="">
			</div>

			<button type="button" name="sub" class="btn btn-primary" id="sub" onclick="themTaiKhoan();">Thêm</button>	

			<button type="button" name="sua" class="btn btn-primary" id="sua" onclick="layGiaTriCuaFormTaiKhoan();">Sửa</button>

			<button type="reset" class="btn btn-primary">Làm mới</button>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

</div>
<script>
	function hienThi(name)
	{
		document.getElementById("sua").style.display="";
		document.getElementById("sub").style.display="";
		a=name.innerHTML;
		var value=a.split(">");
		if(value[1]=="Thêm tài khoản") {
			document.getElementById("sua").style.display="none";
			document.getElementById("exampleModalLabel").innerHTML="Thêm tài khoản";
		}
		else
			{
				if(a=="Sửa") document.getElementById("sub").style.display="none";
				document.getElementById("exampleModalLabel").innerHTML="Sửa tài khoản";}	
	}
</script>
</body>