<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="xulidangnhapadmin/xulidangnhapadmin.js"></script>

</head>
 <body class="main-bg" id="hienthiadmin">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Sign In Admin</h3>
                    <p class="text-whitesmoke">Sign In</p>
                <div class="container-content">
                    <form action="" method="post" name="form" class="margin-t">
                        <div class="form-group">
                            <input name="username" id="username" type="text" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input name="password" id="password" type="password" class="form-control" placeholder="*****" required="">
                        </div>
                        <button type="button" class="form-button button-l margin-b" onclick="kiemTraDangNhap()">Sign In</button>

                        <div id="hienthiketqua"></div>
                        <!-- Xử lí đăng nhập với thông tin tài khoản trên database -->

                        <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
                        <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                    </form>
                    <p class="margin-t text-whitesmoke"><small> Your Name &copy; 2019</small> </p>
                </div>
            </div>  
            </body>

