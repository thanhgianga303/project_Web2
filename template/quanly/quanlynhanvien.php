<head>
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
	<style>
	</style>
</head>
<body>

		<div class="row" >
			<div class="col-md-12" style=""style="overflow: auto">
			<div class="row">
				<div style="text-align: center;background-color: #e5e5e5" class="col-md-12">
					<button type="button" name="them" class="btn btn-primary" id="them" onclick="hienThi(this);refreshNV();" data-toggle="modal" data-target="#exampleModal"><img src="icon/icons8_plus_48px_1.png" style="width:30px;height:30px"/>Thêm nhân viên</button>
				</div>
			</div>
			<div class="row"><div class="col-md-12"><hr/></div></div>
			<div class="row" style="margin-top:10px">
					<div class="col-md-3">
						<select id="mySelectNhanVien" class="form-control" style="width:145px!important;color:#495057!important">
				         <option value="tatca">Tất cả</option>
				         <option value="manhanvien">Mã nhân viên </option>
				         <option value="mataikhoan">Mã tài khoản</option>
						 <option value="diachi">Địa chỉ</option>
						 <option value="trangthai">Trạng thái</option>		
      					</select>
					</div>
					<div class="col-md-2"><label style="float:right!important;color:black!important;font-size: 17px;font-weight: 1000">Tìm kiếm:</label>
						</div>
					<div class="col-md-7"><input type="text" class="timkiemNhanVien form-control" size="30px" style="width: 200px!important;color:#495057!important" onkeyup="timkiemNV();" /></div>
				
		</div>
			<div class="row"><div class="col-md-12"><hr/></div></div>
			<div class="row" id="hienthinhanvien" style="margin-top:10px">
			<?php
			include "hienthi/hienthinhanvien.php"
			?>
			</div>
		</div>
			
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Chi tiết nhân viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<form method="post" name="formNhanVien" action="">
							<div class="form-group">
								<label for="manhanvien">
								Mã nhân viên:</label>
							<input type="text" class="form-control" style="color:black" size="30" name="manhanvien" id="manhanvien" style="color:red">
							</div>
							<div class="form-group">
								<label for="mataikhoannv">Mã tài khoản:</label>
								<input type="text" class="form-control" style="color:black" size="30" name="mataikhoannv" id="mataikhoannv" style="color:red">
							</div>
							<div class="form-group">
								<label for="diachinv">Địa chỉ</label>
								<input type="text" class="form-control" style="color:black" size="30" name="diachinv" id="diachinv"style="color:red">
							</div>
							<div class="form-group">
								<label for="trangthainv">Trạng thái</label>
								<input type="text" class="form-control" style="color:black" size="30" name="trangthainv" id="trangthainv"style="color:red">
							</div>						
							<button type="button" name="sub" class="btn btn-primary" id="sub" onclick="themNhanVien();" >Thêm</button>
							<button type="button" name="sua" class="btn btn-primary" id="sua" onclick="layGiaTriCuaFormNhanVien();" >Sửa</button>
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
		if(value[1]=="Thêm nhân viên") { document.getElementById("sua").style.display="none";
			document.getElementById("exampleModalLabel").innerHTML="Thêm nhân viên";
		}
		else
			{
				if(a=="Sửa") document.getElementById("sub").style.display="none";
				document.getElementById("exampleModalLabel").innerHTML="Sửa nhân viên";
			}
	}				
			</script>
				</body>