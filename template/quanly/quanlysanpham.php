<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/quanlysanpham.css">
	<style>	
	.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
	</style>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="xulisua/xulisua.js"></script>
	<script src="xulithem/xulithem.js"></script>
	<script src="xulixoa/xulixoa.js"></script>
	<script src="xulitimkiem/xulitimkiem.js"></script>
	<script src="xulidangnhapadmin/xulixoaSearch.js"></script>
	<script src="xuliphantrang/xuliphantrang.js"></script>
	<script>
	function hienThi(name)
	{
		document.getElementById("sua").style.display="";
		document.getElementById("sub").style.display="";
		a=name.innerHTML;
		var value=a.split(">");
		if(value[1]=="Thêm sản phẩm") {
			document.getElementById("sua").style.display="none";
			document.getElementById("exampleModalLabel").innerHTML="Thêm sản phẩm";
		}
		else
			if(a=="Sửa") {
				document.getElementById("masanpham").value.disabled="true";
				document.getElementById("sub").style.display="none";
				document.getElementById("exampleModalLabel").innerHTML="Sửa sản phẩm";
			}
	}
					
	</script>
</head>
<body>
		
		<div class="row" >
			<div class="col-md-12" style="overflow: auto">
			<div class="row">
			<div class="col-md-12" style="text-align: center">
				<button type="button" name="them" class="btn btn-primary" id="them" onclick="hienThi(this);refreshSP()" data-toggle="modal" data-target="#exampleModal"><img src="icon/icons8_plus_48px_1.png" style="width:30px;height:30px"/>Thêm sản phẩm</button>
			</div>
		</div>
			<div class="row"  style="margin-top:10px;">
				<div class="col-md-12">
					<div class="row"><div class="col-md-12"><hr/></div></div>
					<div class="row" style="">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="row" >
								<div class="col-md-4"><label style="float:right!important;color:black;font-size: 17px;font-weight: 1000">Tìm kiếm:</label>
								</div>
								<div class="col-md-8"><input type="text" class="timkiem form-control" id="timkiemSP" size="30px" style="width: 200px!important" onkeyup="timkiemSP();" />
							</div>
					</div>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row"><div class="col-md-12"><hr/></div></div>
				</div>
			</div>
			<div class="row" style="margin-top:10px" >
				<div class="col-md-2" style="color:black;font-size: 17px;font-weight: 1000">Lựa chọn:</div>
				<div class="col-md-4" style="color:black;font-size: 17px;font-weight: 1000">Số lượng:</div>
				<div class="col-md-6" style="color:black;font-size: 17px;font-weight: 1000">Đơn giá:</div>

			</div>
			<div style="text-align: center;padding:5px;margin-top:10px" class="row">
				<div class="col-md-2">
					<select id="mySelect1" class="form-control" style="width:145px!important;">
				         <option value="tatca">Tất cả</option>
				         <option value="ma">Mã sản phẩm</option>
				         <option value="ten">Tên sản phẩm</option>
						 <option value="hang">Hãng</option>		
      				</select>
				</div>
						<div class="col-md-2"><input type="text" class="form-control" style="color:black;width: 120px!important;" placeholder="Từ" name="soluongdau" id="soluongdau" style="color:red" onkeyup="timkiemSP();"></div>
						
						<div class="col-md-2"><input type="text" class="form-control" style="color:black;width: 120px!important;" placeholder="Đến" name="soluongcuoi" id="soluongcuoi" style="color:red" onkeyup="timkiemSP();"></div>
						<div class="col-md-3"><input type="text" class="form-control" style="color:black;width: 150px!important;" placeholder="Từ" name="giabatdau" id="giabatdau" style="color:red" onkeyup="timkiemSP();"></div>
			
						<div class="col-md-3"><input type="text" class="form-control" style="color:black;width: 150px!important;" placeholder="Đến" name="giaketthuc" id="giaketthuc" style="color:red" onkeyup="timkiemSP();"></div>
			</div>
			<div class="row" id="hienthisanpham">
			<?php
			include "hienthi/hienthisanpham.php"
			?>
			</div>
		</div>
			
<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px!important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
           <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<form method="post" name="formSanPham" action="">
							<div class="form-group">
								<label for="masanpham">
								Mã sản phẩm:</label>
							<input type="text"  class="form-control" style="color:black" size="30" name="masanpham" placeholder="sp" id="masanpham" style="color:red">
							</div>
							<div class="form-group">
								<label for="tensanpham" >Tên sản phẩm:</label>
								<input type="text" class="form-control" style="color:black" size="30" name="tensanpham" id="tensanpham" style="color:red">
							</div>
							<div class="form-group">
								<label for="hinhanh">Chọn ảnh:</label>
								<input type="file" style="color:black;border:1px solid #0062cc" name="hinhanh" id="hinhanh"style="color:red">
								<label for="hinhanh">Ảnh cũ:</label>
								<input type="text" class="form-control" style="color:black" size="30" name="txthinhanh" id="txthinhanh" style="color:red">
							</div>
							<div class="form-group">
								<label for="dongia">Đơn giá:</label>
								<input type="text" class="form-control" style="color:black" size="30" name="dongia" id="dongia" style="color:red">
							</div>
							<div class="form-group">
								<label for="hang">Hãng:</label>
								<input type="text" placeholder="Adidas, Balencia, Gucci" class="form-control" style="color:black" size="30" name="hang" id="hang" style="color:red">
							</div>
							<div class="form-group">
								<label for="soluong">Số lượng</label>
								<input class="form-control" type="text" style="color:black" size="30" name="soluongg" id="soluong" style="color:red">
							</div>
							<button type="button" name="sub" class="btn btn-primary" id="sub" onclick="themSanPham();">Thêm</button>
							<button type="button" name="sua" class="btn btn-primary" id="sua" onclick="layGiaTriCuaFormNhap();">Sửa</button>
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
				</body>