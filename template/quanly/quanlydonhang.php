<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/quanlysanpham.css">
	<link rel="stylesheet" href="css/cssphantrang.css">
	<link rel="stylesheet" href="css/csshover.css">
	<link href="css/datepicker.css" rel="stylesheet" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="xulisua/xulisua.js"></script>
	<script src="xulithem/xulithem.js"></script>
	<script src="xulixoa/xulixoa.js"></script>
	<script src="xulitimkiem/xulitimkiem.js"></script>
	<script src="xuliphantrang/xuliphantrang.js"></script>
	<script src="xulixem/xulixem.js"></script>
	<script src="xulisapxep/xulisapxep.js"></script>
	<script src="xulithaydoitrangthai/xulithaydoitrangthai.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

</head>
<body>
		<div class="row"><div class="col-md-12"><hr/></div></div>
		<div class="row" >
			<div class="col-md-12" style="overflow: auto;background-color: #E4E5E6">
			<div class="row"  style="">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-4"><label style="float:right!important;color:black;font-size: 17px;font-weight: 1000">Tìm kiếm:</label>
								</div>
								<div class="col-md-8"><input type="text" class="timkiemDonHang form-control" size="30px" style="width: 200px!important" onkeyup="timkiemDH();" />
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row"><div class="col-md-12"><hr/></div></div>
				</div>

			</div>
			
			<div class="row" style="margin-top:10px">
				<div class="col-md-2" style="color:black;font-size: 17px;font-weight: 1000">Lựa chọn:</div>
				<div class="col-md-4" style="color:black;font-size: 17px;font-weight: 1000">Tổng tiền:</div>
				<div class="col-md-6" style="color:black;font-size: 17px;font-weight: 1000">Ngày lập:</div>

			</div>
			<div style="text-align: center;margin-top:10px" class="row">
				<div class="col-md-2">
					<select id="mySelectDonHang" class="form-control" style="width:145px!important;">
				         <option value="tatca">Tất cả</option>
				         <option value="ma">Mã đơn hàng</option>
				         <option value="makhachhang">Mã khách hàng</option>
						 <option value="makhuyenmai">Mã khuyến mãi</option>
						 <option value="manhanvien">Mã nhân viên</option>
						 <option value="trangthai">Trạng thái</option>
						 <option value="diachi">Địa chỉ</option>
						 <option value="ghichu">Ghi chú</option>		
      				</select>
				</div>
					<div class="col-md-2"><input type="text" class="form-control" style="color:black;width: 120px!important;" name="tongtiendau" id="tongtiendau" placeholder="Từ" style="color:red" onkeyup="timkiemDH();"></div>
				<div class="col-md-2"><input type="text" class="form-control" style="color:black;width: 120px!important;" name="tongtiencuoi" id="tongtiencuoi" placeholder="Đến" style="color:red" onkeyup="timkiemDH();"></div>
	
					<div class="col-md-3 form-group">
                		<div class='input-group date' id='datetimepicker1'>
                    		<input type='text' placeholder="Từ" onkeyup="timkiemDH();" id="ngaybatdau" class="datepicker form-control" />
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
                		</div>
           			 </div>
					<script type="text/javascript">
			        	$(function(){
			           	$('.datepicker').datepicker({
			            	  format: 'yyyy/mm/dd'
			            	});
       		 		});
    				</script>

					<div class="col-md-3 form-group">
                		<div class='input-group date' id='datetimepicker1'>
                    		<input type='text' placeholder="Đến" onkeyup="timkiemDH();" id="ngayketthuc" class="datepicker form-control" />
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
                		</div>
           			 </div>
           			</div>
			<div class="row"><div class="col-md-12"><hr/></div></div>

			<div class="row" id="hienthidonhang">
			<?php
			include "hienthi/hienthidonhang.php"
			?>
			</div>
		</div>
			
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Xem chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="hienthichitietdonhang">
      			
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
// function hienThi(name)
// 	{
// 		document.getElementById("sua").style.display="";
// 		document.getElementById("sub").style.display="";
// 		a=name.innerHTML;
// 		if(a=="Thêm sản phẩm") document.getElementById("sua").style.display="none";
// 		else
// 			if(a=="Sửa") {
// 				// document.getElementById("masanpham").value.disabled="true";
// 				document.getElementById("sub").style.display="none";
// 			}
// 	}				
			</script>
				</body>