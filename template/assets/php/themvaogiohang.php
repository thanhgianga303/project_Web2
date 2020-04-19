<?php 
// require("connect.php");
// if(isset($_GET['id'])){
// 	$id = $_GET['id']; 
// 	$cart = $_SESSION['cart'];
// 	$sql ="SELECT * From product Where id=".$id;
// 	$result=mysqli_query($connect,$sql);
// 	$data= mysqli_fetch_row($result);
// 	//echo $data[3];//Lấy cột thứ 4 (Giá)
//     $num_rows=mysqli_num_rows($result);
//     // echo $data[2];
//     // echo $data[3];

// 	if(!empty($_SESSION['cart'])){
// 		$cart = $_SESSION['cart'];
// 		echo "id truyen vao la".$id;
// 		//kiểm tra lần thứ >2
// 		if(array_key_exists($id,$_SESSION['cart']))
// 			{
// 				echo "Tồn tại . Tăng số lượng lên 1";
// 				$cart[$id] = array(
// 					"sl"=>(int)$cart[$id]++,
// 					"price"=>$data[3],
// 					"name"=>$data[2]
// 		 	 	);
// 			}//if
// 		else
// 			{//Mua sp khác
// 				echo 'Chưa có , Thêm vào';
// 				$cart[$id] = array(				
// 					"sl"=>1,
// 					"price"=>$data[3],
// 					"name"=>$data[2]
// 		 	 	);
// 			}//else
// 		}
// 		$_SESSION['cart']= $cart;
	 	 
// 	else
// 		{
// 		//lan dau mua hang
// 		echo "Lần đầu mua sp có Id: ".$id." ".$data[2];
// 			$cart[$id] = array(
// 				"sl"=>1,
// 				"price"=>$data[3],
// 				"name"=>$data[2]
// 	 	 	);	 	 	
// 		}//else

//  }//if isset[id]	
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "<pre>";
// die;
// include("connect.php");
//  $sql="SELECT * FROM product ";
//     $ketnoi=mysqli_query($connect,$sql);
//     $tong_sp=mysqli_num_rows($ketnoi);
//     echo $tong_sp;
//     	session_start();
	// $id = $_GET['id'];
	// //echo $id;
	// if(isset($_SESSION['cart']))
	// 	$_SESSION['cart'][$id] ++;
	// else
	// 	$_SESSION['cart'][$id] = 1;
	// echo "<pre>";
	// print_r($_SESSION);
