<?php
session_start();
$idSession=$_SESSION['user']['id'];
if($idSession=="") echo "0";

?>