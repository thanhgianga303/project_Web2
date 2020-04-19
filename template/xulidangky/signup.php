<head>
 <meta charset="utf-8">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/quanlysanpham.css">   
    <script type="text/javascript" src="xulidangky.js"></script>
</head>
<body>
<div class="containTaikhoan">
        <span class="close" ">&times;</span> 
        <div class="taikhoan">

            <ul class="tab-group">
                <li class="tab active"><a href="#login">Đăng nhập</a></li>
                <li class="tab"><a href="#signup">Đăng kí</a></li>
            </ul> <!-- /tab group -->

            <div class="tab-content">
                <div id="login">
                    <h1>Chào mừng bạn trở lại!</h1>

                    <!-- <form onsubmit="return logIn(this);"> -->
                    <form action="" method="post" name="formDangNhap">
                        <div class="field-wrap">
                            <label>
                                Tên đăng nhập<span class="req">*</span>
                            </label>
                            <input name="username" type="text" id="username" required autocomplete="off" />
                        </div> <!-- /user name -->

                        <div class="field-wrap">
                            <label>
                                Mật khẩu<span class="req">*</span>
                            </label>
                            <input name="pass" type="password" id="pass" required autocomplete="off" />
                        </div> <!-- pass -->

                        <p class="forgot"><a href="#">Quên mật khẩu?</a></p>

                        <button  type="button" onclick="checkDangNhap()" class="button button-block" />Tiếp tục</button>

                    </form> <!-- /form -->

                </div> <!-- /log in -->

                <div id="signup">
                    <h1>Đăng kí miễn phí</h1>

                    <!-- <form onsubmit="return signUp(this);"> -->
                        <form action="" method="post" name="formDangKy">
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Họ<span class="req">*</span>
                                </label>
                                <input name="ho" type="text" id="ho" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Tên<span class="req">*</span>
                                </label>
                                <input name="ten" id="ten" type="text" required autocomplete="off" />
                            </div>
                        </div> <!-- / ho ten -->

                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Điện thoại<span class="req">*</span>
                                </label>
                                <input name="sdt" id="sdt" type="number" required autocomplete="off" />
                            </div> <!-- /sdt -->
    
                            <div class="field-wrap">
                                <label>
                                    Email<span class="req"></span>
                                </label>
                                <input name="email" id="email" type="email" required autocomplete="off" />
                            </div> <!-- /email -->
                        </div>

                        <div class="field-wrap">
                            <label>
                                Tên đăng nhập<span class="req">*</span>
                            </label>
                            <input name="newUser" id="newUser" type="text" required autocomplete="off" />
                        </div> <!-- /user name -->

                        <div class="field-wrap">
                            <label>
                                Mật khẩu<span class="req">*</span>
                            </label>
                            <input name="newPass" id="newPass" type="password" required autocomplete="off" />
                        </div> <!-- /pass -->

                        <button type="button" onclick="checkDangKy()" class="button button-block" />Tạo tài khoản</button>

                    </form> <!-- /form -->

                </div> <!-- /sign up -->
            </div><!-- tab-content -->

        </div> <!-- /taikhoan -->
    </div>
</body>    