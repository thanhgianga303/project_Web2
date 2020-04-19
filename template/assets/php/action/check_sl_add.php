<?php
session_start();
include("./../connect.php");
include("./../../../function.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = selectAll__where_like_('product', 'MaSP', $id);
    $row = mysqli_fetch_array($query);
    if (isset($_SESSION['cart_shoes'])) {
        $sL_add = $_SESSION['cart_shoes'][$id]["sLuong"];
        if ($sL_add > $row["SoLuong"]) {
            //$_SESSION['cart_shoes'][$id]["sLuong"]--;
            echo 1;
        } else {
            echo 0;
        }
    }
} else {
    echo 0;
}
