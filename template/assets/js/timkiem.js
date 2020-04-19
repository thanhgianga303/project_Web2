function enterpressalert(e, textarea){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13) { //Enter keycode
        alert('enter press');
        debugger;
        }
    }

function search_sp(page){
    var s = $('#search').val();
    $.ajax({
        type: "GET",
        url: "assets/php/action/search.php",
        data: {
            text : s,
            page: page
        }
    }).done(function (data) {
        $("#search_box").html(data);
    });
}