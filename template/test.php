<head>
<script type="text/javascript" src="xulitest.js"></script>
</head>
<body>	
						<form method="get" name="formKhachHang" action="xulitest.php" onsubmit="return xuLi()">
							<div class="form-group">
								<label for="makhachhang">
								Mã khách hàng:</label>
							<input type="text" class="form-control" style="color:black" size="30" name="makhachhang" id="makhachhang" style="color:red">
							</div>
							<div class="form-group">
								<label for="mataikhoankh">Mã tài khoản:</label>
								<input type="text" class="form-control" style="color:black" size="30" name="mataikhoankh" id="mataikhoankh" style="color:red">
							</div>
							<div class="form-group">
								<label for="trangthaikh">Trạng thái</label>
								<input type="text" class="form-control" style="color:black" size="30" name="trangthaikh" id="trangthaikh"style="color:red">
							</div>						
							<button type="submit" name="sub" class="btn btn-primary" id="sub">Thêm</button>
							</form>

</body>