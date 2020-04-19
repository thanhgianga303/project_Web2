

function addCart(id) {
	// const  a = await $.ajax({
	// $.ajax({
	// 	type: "POST",
	// 	url:"assets/php/action/check_sl_add.php",
	// 	data:{
	// 		id : id
	// 	}
	// }).done(function(data){
	// 	var data = parseInt(data);
		// if(data == 1){
		// 	alert ("Xin lỗi Quý Khách ! Bạn không thể tăng số lượng sản phẩm này nữa");
		// }else{
			$.ajax({
				type: "POST",
				url: "assets/php/action/addToCart.php",
				data: {
					"id": id
				}
			}).done(function (data) {
				var data = parseInt(data);
				if(data == 1){
					alert ("Xin lỗi Quý Khách ! Bạn không thể tăng số lượng sản phẩm này nữa");
				}else{
				thongbao();
				$.ajax({
					type: "GET",
					url: "assets/php/action/count_card.php",
				}).done(function (data) {
					$("#count_card").text(data);
				})
			}
			});
		//}

	//});
	
}
function delete_all() {
	var thongbao = confirm("Bạn có muốn xóa giỏ hàng ?");
	if(thongbao){
		$.ajax({
			type: "POST",
			url: "assets/php/action/delete_all.php",
		}).done(function () {
			//
			if (document.getElementById("mycart")) {
				document.getElementById("mycart").style.display = "none";
				$.ajax({
					type: "GET",
					url: "assets/php/action/count_card.php",
				}).done(function (data) {
					$("#count_card").text(data);
				})
			}
			//
			$('#giohang').html('<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;">Chưa có sản phẩm nào trong giỏ hàng!</div>');
		})
	}
}
function deleteCart(id) {
	var thongbao = confirm("Xóa sản phẩm này khỏi giỏ hàng ??")
	if (thongbao) {
		$.ajax({
				url: 'assets/php/action/deleteCart.php',
				type: 'POST',
				data: {
					id: id
				},
			})
			.done(function (data) {
				if (document.getElementById("numCart_" + id)) {
					document.getElementById("numCart_" + id).style.display = "none";
					console.log("Xóa sp " + id);
					$.ajax({
						type: "GET",
						url: "assets/php/action/totalCard.php"
					}).done(function (data) {
						$("#priceCart").text(data);
					});
					$.ajax({
						type: "GET",
						url: "assets/php/action/count_card.php",
					}).done(function (data) {
						$("#count_card").text(data);
					})
				}
			});
	} //Hủy
}

function checknum_delete(id) {
	$.ajax({
			url: 'assets/php/action/deleteCart.php',
			type: 'POST',
			data: {
				id: id
			},
		})
		.done(function (data) {
			if (document.getElementById("numCart_" + id)) {
				document.getElementById("numCart_" + id).style.display = "none";
				console.log("Xóa sp " + id);
				$.ajax({
					type: "GET",
					url: "assets/php/action/totalCard.php"
				}).done(function (data) {
					$("#priceCart").text(data);
				});
				$.ajax({
					type: "GET",
					url: "assets/php/action/count_card.php",
				}).done(function (data) {
					$("#count_card").text(data);
				})
			}
		});
}
function select_size(id){
	var size= $('#size_sp'+id).val();
	$.ajax({
		type: "GET",
		url: "assets/php/action/select_size.php",
		data: {
			id: id,
			size: size,
		},
	}).done(function (data) {
		$('#sLuong_'+id).text(data);
	})
}
function temp(data){
}

function updateCart(id, info, price) {
	

	//checkSL(id,info.value);
	var sl_ton = parseInt($('#hidden_sl_'+id).val())
	var sl_mua = parseInt(info.value);
	console.log("tồn "+sl_ton+" SL mua"+sl_mua);
	if(sl_mua > sl_ton){
		alert("Sản Phẩm của chúng tôi chỉ còn lại "+sl_ton);
		$('#sLuong_'+id).val(sl_ton);
	}else{
	
		if (info.value <= 0) {
			//alert("Chúng tôi không cho phép nhập Số lượng < 0");
			checknum_delete(id);
			//window.location.assign("index.php?assets=sanpham&page=1");
		}
		$.ajax({
			type: "POST",
			url: "assets/php/action/updateCart.php",
			data: {
				id: id,
				sLuong: info.value,
				price: price
			}
		}).done(function (data) {
			$("#total_product" + id).text(number_format(info.value * parseInt(price), 0, ""));
			console.log("SL=" + info.value + " Giá gốc=" + price + " Tổng=" + info.value * parseInt(price));
			$.ajax({
				type: "GET",
				url: "assets/php/action/totalCard.php"
			}).done(function (data) {
				$("#priceCart").text(data);
			});
			$.ajax({
				type: "GET",
				url: "assets/php/action/count_card.php",
			}).done(function (data) {
				$("#count_card").text(data);
			})
		});
	}
}

function closedialog() {
	window.location.assign("index.php?assets=giohang");
}



function xacnhan() {
	//Lấy Giá
	$.ajax({
		type: "GET",
		url: "assets/php/action/priceCart.php",
	}).done(function (data) {
		var Price = parseInt(data);
		var DiaChi = $("#getDiaChi").val();
		var GhiChu = $("#getGhiChu").val();

		$.ajax({//-Số lượng
			type: "GET",
			url: "assets/php/action/update_sl.php",
		}).done(function(){
			$.ajax({ // POST thông tin
				type: "GET",
				url: "assets/php/action/orders.php",
				data: {
					Price : Price,
					DiaChi: DiaChi,
					GhiChu: GhiChu
				}
			}).done(function (data) {
				alert("Đặt Hàng Thành Công");
				window.location.assign("index.php?assets=giohang");
			});
		});
		//var Price = getPrice();
		//alert(Price);
		// alert("Thành công");
		//alert(id+" "+Username+" "+Email+" "+Sdt+" "+DiaChi+" "+GhiChu);

	})
	//window.location.assign("index.php?assets=donhang");
}

function chuyensangdn() {
	window.location.assign("index.php?assets=login");
}
$('#dathang').click(function () {
	$.ajax({
		type: "GET",
		url: "assets/php/action/check_isset_login.php"
	}).done(function (data) {
		$('#exampleModal_card').html(data);

	});
});

function number_format(number, decimals, dec_point, thousands_sep) {
	// http://kevin.vanzonneveld.net
	// + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// + bugfix by: Michael White (http://crestidg.com)
	// + bugfix by: Benjamin Lupton
	// + bugfix by: Allan Jensen (http://www.winternet.no)
	// + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// * example 1: number_format(1234.5678, 2, '.', '');
	// * returns 1: 1234.57

	var n = number,
		c = isNaN((decimals = Math.abs(decimals))) ? 2 : decimals;
	var d = dec_point == undefined ? "," : dec_point;
	var t = thousands_sep == undefined ? "." : thousands_sep,
		s = n < 0 ? "-" : "";
	var i = parseInt((n = Math.abs(+n || 0).toFixed(c))) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;

	return (
		s +
		(j ? i.substr(0, j) + t : "") +
		i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) +
		(c ?
			d +
			Math.abs(n - i)
			.toFixed(c)
			.slice(2) :
			"")
	);
}