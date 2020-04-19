<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="padding: 0 0 20px 0;">
        <form method="post" action="assets/php/action/checklogin.php">
        <!-- <form id="form_login" method="post">     -->
            <div>
                <h3 style="text-align:center;padding:10px; ">Đăng Nhập</h3>
            </div>
            <div class="form-group">
                <label>Tài Khoản</label>
                <input type="username" class="form-control" id="tk" name="tk" placeholder="Nhập tài khoản">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" class="form-control" id="pass" name="mk" placeholder="Mật khẩu">
            </div>
            <div class="form-check">
                <a href="#">Chưa có tài khoản ?</a>
            </div>
            <div class="submit_login">
                <input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập">
            </div>
        </form>
        <?php 
             if (isset($_GET['login']) == "fail"){
                echo '<p style="color:red;">Đăng Nhập Không Thành Công</p>';
            }
        ?>

    </div>
    <div class="col-sm-3"></div>
</div> <!-- row -->