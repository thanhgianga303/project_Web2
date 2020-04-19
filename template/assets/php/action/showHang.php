<?php 
session_start();
include ("./../connect.php");
include ("./../../../function.php");
$id = $_GET['id'];

$query = selectAll__where_like_('trademark','MaHang',$id);
$row = mysqli_fetch_array($query);
echo $row['TenHang'];

// for ($i = 1; $i <= $so_trang; $i++) {
// 	if ($page == $i) {
// 		echo '<li class="active" ><a href="javascript:void(0)" id="list">' . $i . '</a></li>';
// 	} else {
// 		echo '<li><a href="javascript:void(0)" id="list" onclick=selectHang("'.$id.'",'.$i.')">' . $i . '</a></li>';
//     }

// }
?>