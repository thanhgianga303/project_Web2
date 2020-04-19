<?php
session_start();
echo '<img src="icon/icons8_user_filled_50px_1.png"><p style="font-size:20px;color:black">'.$_SESSION["username"].'</p><a  href="javascript:void(0)"  onclick="xemTaiKhoan(\''.$_SESSION["user"]["id"].'\')"><img src="icon/icons8_Ophthalmology_32px_1.png"></a>'
?>