function checkDangKy()
{
	var a=document.getElementById('ho').value;
	var b=document.getElementById('ten').value;
	var c=document.getElementById('sdt').value;
	var d=document.getElementById('email').value;
	var e=document.getElementById('newUser').value;
	var f=document.getElementById('newPass').value;
	$.ajax({
		url:"xulidangky.php",
		type:"post",
		data: {
			data_ho:a,
			data_ten:b,
			data_sdt:c,
			data_email:d,
			data_newUser:e,
			data_newPass:f		
		},
		//async:true,
		success:function(kq){
			alert(kq);

		}

	});
}
function checkDangNhap()
{
	var a=document.getElementById('username').value;
	var b=document.getElementById('pass').value;
	$.ajax({
		url:"xulidangnhap.php",
		type:"post",
		data: {
			data_username:a,
			data_pass:b		
		},
		//async:true,
		success:function(kq){
			if(kq.indexOf("yes")!=-1){
				alert("Đăng nhập thành công");
			}
			if(kq.indexOf("no")!=-1)
			{
				alert("Đăng nhập thất bại");
			}
	
		}
	

	});
}