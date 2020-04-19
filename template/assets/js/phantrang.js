function add_class(){
	var clickpage = document.getElementById("list");
   	clickpage.classList.add("active");
}
function selectHang(id,page){
	
	$.ajax({
		type: "GET",
		url: "assets/php/action/selectHang.php",
		data: {
			id : id,
			page:page
		}
	}).done(function(data){
		$('#show_product').html(data);
		$.ajax({
			type: "GET",
			url: "assets/php/action/showHang.php",
			data: {
				id : id
			}
		}).done(function(data){
			$('#hang').text(data);
		});
	});
}
