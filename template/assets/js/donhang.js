function delete_orders(id){
    var thongbao = confirm("Bạn có chắc muốn xóa đơn hàng này không ?");
    if(thongbao){
        $.ajax({
            type: "GET",
            url: "assets/php/action/upload_sl.php",
            data: {
                id : id
            }
        }).done(function(){
            $.ajax({
                type: "GET",
                url: "assets/php/action/delete_orders.php",
                data: {
                    id : id,
                }            
            }).done(function (){
                if (document.getElementById(id)) {
                    document.getElementById(id).style.display = "none";            
                }                      
            });
        });        
    }
}

function chitietdh(id){
    window.location.assign("index.php?assets=chitietdh&&madh="+id);
}