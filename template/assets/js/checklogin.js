// function checklogin(){
//     $.ajax({
//         type: "POST",
//         url: "assets/php/action/checklogin.php",
//         data: $("#form_login").serialize()
//     }).done(function(data){
//         if(data==1){
//             alert("data=1");
//             window.location.assign("index.php");
//         }else{
//             $("#dangnhap").html(`<p style="color:red;">Đăng Nhập Không Thành Công</p>`);
//         }
//     });
// }

function sign_out() {
    if (confirm("Bạn có chắc chắn muốn thoát ?"))
      $.ajax({
        type: "GET",
        url: "assets/php/action/sign_out.php"
      }).done(function() {
        window.location.assign("index.php");
      });
  }