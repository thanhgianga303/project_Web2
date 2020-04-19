<?php
echo "Thông Tin Tài Khoản";
?>
<br>
<div>Họ và tên:  <?php echo $_SESSION["name"]; ?></div>
<div>Tài Khoản:  <?php echo $_SESSION["username"]; ?></div>
<div>Mật khẩu:  <?php echo $_SESSION["password"]; ?></div>
<div>Email:  <?php echo $_SESSION["email"]; ?></div>
<div>SĐT:  <?php echo $_SESSION["sdt"]; ?></div>
<br>
<button onclick="sign_out()">Đăng Xuất</button>




