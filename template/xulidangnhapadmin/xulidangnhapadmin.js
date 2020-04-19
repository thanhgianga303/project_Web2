
function kiemTraDangNhap(){
	a=document.getElementById("username").value;
	b=document.getElementById("password").value;
	if(a == "")
		{
			alert("Tài khoản không được để trống!Vui lòng nhập tài khoản.");
			form.username.focus();
			return false;
		}
	if(b == "")
		{
			alert("Mật khẩu không được để trống!Vui lòng nhập mật khẩu.");
			form.password.focus();
			return false;
		}
	$.ajax({
		url:"xulidangnhapadmin/xulidangnhapadmin.php",
		type:"post",
		data: {
			data_username:a,
			data_password:b
		},
		//async:true,
		success:function(kq){
			if(kq.indexOf("yes")!= -1) 
				{
					alert("Đăng nhập thành công");
					window.location="admin.php";
				}
			 else {
			 	alert("Vui lòng kiểm tra lại");
			 	document.getElementById("username").value="";
			 	document.getElementById("password").value="";
			 	form.username.focus();
			 }
			// }
		}

	});
}