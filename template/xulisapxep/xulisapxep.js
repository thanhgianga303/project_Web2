function sapXepTheoNgay()
{
	$.ajax({
		url:"xulisapxep/xulisapxep.php",
		type:"post",
		data: {
			
		},
		//async:true,
		success:function(kq){
			$("#hienthidonhang").html(kq);
		}
	});
}
function sapXepTheoNgay1()
{
	$.ajax({
		url:"xulisapxep/xulisapxep1.php",
		type:"post",
		data: {
			
		},
		//async:true,
		success:function(kq){
			// hienThiDonHang();
			$("#hienthidonhang").html(kq);
			// refreshTK();
		}
	});
}