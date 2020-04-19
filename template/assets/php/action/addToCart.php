
<?php 
session_start();
include ("./../connect.php");
include ("./../../../function.php");
if(isset($_POST['id'])){
    include "../connect.php";
    $id=$_POST['id'];
    $num=1;
    $sql = "SELECT * From product Where MaSP= '$id' ";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_row($result);
    if (!isset($_SESSION['cart_shoes'])) {
        $cart=array();
        $cart[$id] = array(
            "sLuong" => 1,
            "img" => $data[1],
            "name" => $data[2],
            "price" => $data[3],
            "size"=> 38
        );
    }
    else{//Đã tồn tại tăng số lượng
        $cart=$_SESSION['cart_shoes'];
        if (array_key_exists($id, $cart)) {
			$cart[$id] = array(
				"sLuong" => (int)$cart[$id]["sLuong"] +$num ,
				"img" => $data[1],
				"name" => $data[2],
                "price" => $data[3],
                "size"=> 38	
			);
        }else{//chưa tồn tại
            $cart[$id] = array(
                "sLuong" => 1,
                "img" => $data[1],
				"name" => $data[2],
                "price" => $data[3],
                "size"=> 38
            );
        }
        
     // $_SESSION['cart_shoes'][$id]["sLuong"] = $_POST["sLunog"];  
    }//else
    $_SESSION['cart_shoes']=$cart;

        $query = selectAll__where_like_('product', 'MaSP', $id);
        $row = mysqli_fetch_array($query);
        if (isset($_SESSION['cart_shoes'])) {
            $sL_add = $_SESSION['cart_shoes'][$id]["sLuong"];
            if ($sL_add > $row["SoLuong"]) {
                $_SESSION['cart_shoes'][$id]["sLuong"]--;
                echo 1;
            } else {
                echo 0;
            }
        }
    // $query = selectAll__where_like_('product','MaSP',$id);
    // $row = mysqli_fetch_array($query);
    // echo "<br> SL có".$row["SoLuong"];

    // $sL_add = $_SESSION['cart_shoes'][$id]["sLuong"];
    // echo "<br> Số lượng Add: ".$sL_add;
    // if( $sL_add > $row["SoLuong"]){
    //     echo "<br>Xin lỗi";
    // }
    // echo "<pre>";
    // print_r($_SESSION['cart_shoes']);
    // echo "</pre>";
    

}   
?>