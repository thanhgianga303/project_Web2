function kiemTraLoadAdmin(){
	$.ajax({
		url:"xulidangnhapadmin/xuliloadadmin.php",
		type:"post",
		data: {
		},
		//async:true,
		success:function(kq){
			if(kq.indexOf("0")!=-1){
				alert("Vui lòng đăng nhập!");
				window.location="login.php";
			}
		}

	});
}
window.addEventListener('load', function() {
   kiemTraLoadAdmin();
});