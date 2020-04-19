    function dangkyUser(){
        var name = $("#name").val();
        var tk = $("#tk").val();
        var mk = $("#mk").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        // $.ajax({
        //     type:"GET",
        //     url:"assets/php/action/xulyDangKy.php",
        //     data:{
        //         name :name,
        //         tk : tk,
        //         mk : mk,
        //         email : email,
        //         phone : phone
        //     }
        // }).done(function(data){
        //     alert('DKTK');
        // });
    }
    
    $(document).ready(function(){
          //check ho va ten 
        $("#name").keyup(function(){
            $(this).removeClass("ui-state-error");
            $("#nhacloiHVT").fadeOut(300);
        });
        $("#name").blur(function(){
            var name=$("#name").val();
            //alert("123123");
            var patternNA= /^[a-zÀ-ÿ]+(([',. -][a-zÀ-ÿ ])?[a-zÀ-ÿ]*)*$/g;
            if(name==""){
       
                $(this).addClass("ui-state-error");
                $("#nhacloiHVT").fadeIn(300);
                $("#nhacloiHVT").html("Họ và tên không được bỏ trống");
            }
             
            else {
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiHVT").fadeOut(300);
                }
                     
        });
        //check tai khoan
        $("#tk").keyup(function(){
            $(this).removeClass("ui-state-error");
            $("#nhacloiUser").fadeOut(300);
        });

        $("#tk").blur(function(){
            var patternUS= /^[A-Za-z0-9_-]{1,20}$/g;
            var usrname = $(this).val();  
             
                if(usrname=="") 
                {
                    
                    $("#nhacloiUser").html("Bạn chưa nhập tài khoản");
                    $(this).addClass("ui-state-error");
                    $("#nhacloiUser").fadeIn(300); 
                }
                
           
                else if(!patternUS.test(usrname)){
                    $(this).addClass("ui-state-error");
                    $("#nhacloiUser").html("Tài khoản chỉ nên chứa các kí tự số, chữ không dấu(thường hoặc in hoa)");
                    $("#nhacloiUser").fadeIn(300);
                    
                    }
                           
                
                else if(usrname.length<6){
                    $(this).addClass("ui-state-error");
                    $("#nhacloiUser").html("Tài khoản phải dài hơn 6 kí tự"); 
                    $("#nhacloiUser").fadeIn(300);
                    
                }
                else {
                        
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiUser").html("");
                    $.ajax({
                        type:"post",
                        url:"assets/php/checkusr.php", 
                        data:{us:usrname},
                        success:function(data){
                            if( data == 0 ){
                                $("#tk").addClass("ui-state-error");
                                $("#nhacloiUser").html("Tài khoản này đã tồn tại");
                                $("#nhacloiUser").fadeIn(300);
                            }
                                
                            if( data == 1 ){
                                
                                $("#tk").removeClass("ui-state-error");
                                $("#nhacloiUser").html("Hợp lệ");
                                $("#nhacloiUser").addClass("text-success");
                                $("#nhacloiUser").fadeIn(300);
                            }    
                        }    
                    });  
                }
        });   
        // //check mat khau
        $("#mk").keyup(function(){
            $(this).removeClass("ui-state-error")
            $("#nhacloiPass").fadeOut(300);
        });
        $("#mk").blur(function(){
                var patternPW=/^[A-Za-z0-9]{6,25}$/g;
                var passwd = $("#mk").val();
                var passwd2 = $("#mk2").val();
                if(passwd=="")
                {
                    $(this).addClass("ui-state-error");
                    $("#nhacloiPass").html("Bạn chưa nhập mật khẩu!!!");
                    $("#nhacloiPass").fadeIn(300);
                    
                }    
                else if(passwd.length>=1){
                    
                    if(!patternPW.test(passwd)){
                        
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass").html("Mật khẩu phải có kí tự chữ hoặc 1 kí tự số");
                        $("#nhacloiPass").fadeIn(300);
                    }
                    if(passwd.length>=25){
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass").html("Mật khẩu không được lớn hơn 25 kí tự");
                        $("#nhacloiPass").fadeIn(300);
                    }   
                }
                else if((passwd2!=passwd)||(passwd.length!=passwd2.length))
                        {
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass2").html("Mật khẩu không trùng khớp !");
                        $("#nhacloiPass2").fadeIn(300);
                } 
                else if((passwd!=passwd2)||(passwd.length!=passwd2.length))
                        {
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass2").html("Mật khẩu không trùng khớp !");
                        $("#nhacloiPass2").fadeIn(300);
                }    
                else {
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiPass").fadeOut(300);
                }
                        //$("#nhacloiUser").Font()
        });
        //check pass2
        $("#mk2").keyup(function(){
            var passwd = $("#mk").val();
            var passwd2 = $("#mk2").val(); 
            if(passwd==passwd2){
                $(this).removeClass("ui-state-error");
                $("#nhacloiPass2").fadeOut(300);
                    
            }
            else if(passwd2==passwd){
                $(this).removeClass("ui-state-error");
                $("#nhacloiPass2").fadeOut(300);
                    
            }
            else{
                $(this).addClass("ui-state-error");
                $("#nhacloiPass2").html("Mật khẩu không trùng khớp !");
                $("#nhacloiPass2").fadeIn(300);
            }
            
        });
        $("#mk2").blur(function(){
                var passwd = $("#mk").val();
                var passwd2 = $("#mk2").val();
                if(passwd2=="")
                {
                    $(this).addClass("ui-state-error");
                    $("#nhacloiPass2").html("Bạn chưa nhập lại mật khẩu !");
                    $("#nhacloiPass2").fadeIn(300);
                }
                else if((passwd2!=passwd)||(passwd.length!=passwd2.length))
                        {
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass2").html("Mật khẩu không trùng khớp !");
                        $("#nhacloiPass2").fadeIn(300);
                } 
                else if((passwd!=passwd2)||(passwd.length!=passwd2.length))
                        {
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPass2").html("Mật khẩu không trùng khớp !");
                        $("#nhacloiPass2").fadeIn(300);
                }
                else {
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiPass2").html("");
                }        //$("#nhacloiUser").Font()
            });

        $("#email").keyup(function(){
            $(this).removeClass("ui-state-error");
            $("#nhacloiEmail").fadeOut(300);
        });
        $("#email").blur(function(){
                var eml = $("#email").val();
                var patternEM=/^([A-Za-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
                if(eml=="")
                {
                    
                    $(this).addClass("ui-state-error");
                    $("#nhacloiEmail").html("Bạn chưa nhập email!!!");
                    $("#nhacloiEmail").fadeIn(300);
                }
                else if(eml.length>=1){
                    //alert(usrname);
                        if(!patternEM.test(eml)){
                        $(this).addClass("ui-state-error");    
                        $("#nhacloiEmail").html("Vui lòng nhập lại đúng mẫu email ví dụ: youremail@gmail.com");
                        $("#nhacloiEmail").fadeIn(300);
                        }
                }
                else {
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiEmail").html("");
                    $("#nhacloiEmail").fadeOut(300);
                }
        });
        $("#phone").keyup(function(){
            $(this).removeClass("ui-state-error");
            $("#nhacloiPhone").fadeOut(300);
        });
        $("#phone").blur(function(){
                var phone = $("#phone").val();
                var patternPH=/^0(8|9|3|7|5)\d{8}$/;
                if(phone=="")
                {
                    
                    $(this).addClass("ui-state-error");
                    $("#nhacloiPhone").html("Bạn chưa nhập số điện thoại!!!");
                    $("#nhacloiPhone").fadeIn(300);
                }
                else if(phone.length>=1){
                    //alert(phone);
                        if(!patternPH.test(phone)||phone.length!=10){
                        $(this).addClass("ui-state-error");    
                        $("#nhacloiPhone").html("Đầu số điện thoại bạn nhập không tồn tại");
                        $("#nhacloiPhone").fadeIn(300);
                        }

                }
                else {
                    $(this).removeClass("ui-state-error");
                    $("#nhacloiPhone").html("");
                    $("#nhacloiPhone").fadeOut(300);
                }
        });
    });      
function checksignup(){
        var flag = true;
        // $("#sign-up-form input.form-control").each(function(){
        //     if($(this).val()==""){
        //             $(this).addClass("ui-state-error");
        //         }
        // });
        var patternUS= /^[A-Za-z0-9_-]{6,20}$/g;
        var patternPW=/^[A-Za-z0-9]{3,20}$/g;
        var patternEM=/^([A-Za-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        //submit hvt
        if($("#name").val()==""){
            $("#name").addClass("ui-state-error");
            $("#nhacloiHVT").fadeIn(300);
            $("#nhacloiHVT").html("Họ và tên không bỏ trống");
            flag= false;
            
        }
        //submit tk
        if($("#tk").val()==""){
            $("#tk").addClass("ui-state-error");
            $("#nhacloiUser").html("Tài khoản không được bỏ trống");
            $("#nhacloiUser").fadeIn(300);
            flag=false;
        }
        else if(!patternUS.test($("#tk").val())){
            $("#tk").addClass("ui-state-error");
            $("#nhacloiUser").html("Tài khoản chỉ nên chứa các kí tự số, chữ không dấu(thường hoặc in hoa)");
            $("#nhacloiUser").fadeIn(300);
            flag= false;
            }

        else if($("#tk").val().length<6){
                $("#tk").addClass("ui-state-error");
                $("#nhacloiUser").html("Tài khoản phải dài hơn 6 kí tự"); 
                $("#nhacloiUser").fadeIn(300);
                flag= false;
        }
        

        if($("#mk").val()==""){
            $("#mk").addClass("ui-state-error");
            $("#nhacloiPass").html("Mật khẩu không được bỏ trống");
            $("#nhacloiPass").fadeIn(300);
            flag=false;
        }
        else if(!patternPW.test($("#mk").val())){

                $(this).addClass("ui-state-error");
                $("#nhacloiPass").html("Mật khẩu phải có ít nhất 1 kí tự chữ hoa, 1 kí tự số");
                $("#nhacloiPass").fadeIn(300);
            
        }
        if($("#mk2").val()==""){
            $("#mk2").addClass("ui-state-error");
            $("#nhacloiPass2").html("Mật khẩu nhập lại không được bỏ trống");
            $("#nhacloiPass2").fadeIn(300);
            flag=false;
        }
        else if($("#mk2").val()!=$("#mk").val()){
            $("#mk").addClass("ui-state-error");
            $("#mk2").addClass("ui-state-error");
            $("#nhacloiPass2").html("Mật khẩu nhập lại phải khớp với mật khẩu ban đầu");
            $("#nhacloiPass2").fadeIn(300);
            flag=false;
        }
        else  if($("#mk").val()!=$("#mk2").val()){
            $("#mk2").addClass("ui-state-error");
            $("#mk").addClass("ui-state-error");
            $("#nhacloiPass2").html("Mật khẩu nhập lại phải khớp với mật khẩu ban đầu");
            $("#nhacloiPass2").fadeIn(300);
            flag=false;
        
        }
        if($("#email").val()==""){
            $("#email").addClass("ui-state-error");
            $("#nhacloiEmail").html("Email không được bỏ trống");
            $("#nhacloiEmail").fadeIn(300);
            flag=false;
        }    
        else if($("#email").val().length>=1){
                //alert(usrname);
                    if(!patternEM.test($("#email").val())){
                    $(this).addClass("ui-state-error");    
                    $("#nhacloiEmail").html("Vui lòng nhập lại đúng mẫu email ví dụ: youremail@gmail.com");
                    $("#nhacloiEmail").fadeIn(300);
                    }
                    flag=false;
        }
        if($("#phone").val()==""){
            $("#phone").addClass("ui-state-error");
            $("#nhacloiPhone").html("Số điện thoại không được bỏ trống");
            $("#nhacloiPhone").fadeIn(300);
            flag=false;
        }
        else if($("#phone").val()>=1){
                
                var patternPH=/^0(8|9|3|7|5)\d{8}$/;
                        if(!patternPH.test($("#phone").val()))
                        {
                        $(this).addClass("ui-state-error");
                        $("#nhacloiPhone").html("Đầu số điện thoại bạn nhập không tồn tại");
                        $("#nhacloiPhone").fadeIn(300);
                        flag = false;
                        }       
                
        }
        
        return flag;
    }



    
    
    
                
   
       
    
                  
