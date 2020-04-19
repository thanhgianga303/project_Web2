<?php
// session_start();
if (isset($_SESSION['sqlGoc'])) {
unset($_SESSION['sqlGoc']);
			}
if (isset($_SESSION['sqlDonHang'])) {
unset($_SESSION['sqlDonHang']);
}
if (isset($_SESSION['sqlHang'])) {
unset($_SESSION['sqlHang']);
}
if (isset($_SESSION['sqlKhachHang'])) {
unset($_SESSION['sqlKhachHang']);
}
if (isset($_SESSION['sqlNhanVien'])) {
unset($_SESSION['sqlNhanVien']);
}
if (isset($_SESSION['sqlQuyen'])) {
unset($_SESSION['sqlQuyen']);
}
if (isset($_SESSION['sqlTaiKhoan'])) {
unset($_SESSION['sqlTaiKhoan']);
}
echo "1";

?>