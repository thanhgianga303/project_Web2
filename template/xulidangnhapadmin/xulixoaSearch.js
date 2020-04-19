function load(){
	$.ajax({
		url:"xulidangnhapadmin/xulixoaSearch.php",
		type:"post",
		data: {
		},
		//async:true,
		success:function(kq){
	
		// alert(kq);	
		}

	});
}
window.addEventListener('load', function() {
   load();
});