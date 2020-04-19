<?php 
include ("./../connect.php");
include ("./../../../function.php");

show($_GET);
$id = $_GET['id'];

$sql = "SELECT * FROM `orders_details` WHERE `MADH` LIKE '$id' ";
$query =query($sql);
while($row = mysqli_fetch_array($query)){

    echo $row['MaSP']." ".$row['SL']."<br>";

    $MaSP = $row['MaSP'];

    $query1 = selectAll__where_like_('product','MaSP',$row['MaSP']);
    $getSL_DB= mysqli_fetch_array($query1);

    echo "<br> So luong hiện Co :".$getSL_DB['SoLuong']; //Xuất số lượng hiện có BD
    echo "<br>Số lượng + lại: ".$row['SL'];
    $set_sl = $getSL_DB['SoLuong'] + $row['SL'];
    echo "<br> SO luong cap nhat : ".$set_sl;
    $sql3="UPDATE `product` SET `SoLuong` = '$set_sl' WHERE `product`.`MaSP` = '$MaSP'";
    query($sql3);

}
// $row = mysqli_fetch_array($query);
// echo $row['MaSP']." ";
// echo $row[0];


// $query1 = selectAll__where_like_('orders_details', 'MaDH', $id);
// $row1 = mysqli_fetch_array($query1);
// echo $row1['MaSP']." Có SL: ".$row1['SL']."<br>";
// while( $row = mysqli_fetch_array($query1)){

//  echo $row['MaSP']." Có SL: ".$row['SoLuong']."<br>";  echo " ddmm ";

// }
?>