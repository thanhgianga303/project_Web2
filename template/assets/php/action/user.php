<?php
    if(!isset($_SESSION["login"])){
        echo '<a href="index.php?assets=login"><i class="ti-user"></i>Đăng Nhập</a>';
    }  else{
        if($_SESSION["login"]==1)
        echo '<a href="index.php?assets=viewuser"><i class="ti-user"></i>Hi '.$_SESSION["username"].' !!!</a>';
    }

?>

