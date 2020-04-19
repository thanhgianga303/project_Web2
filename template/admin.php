<?php
    session_start();
?> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
 <style type="text/css">
   

.menuTaiKhoan{
  color:red;
}
 </style>
  <script src="xulixem/xulixem.js"></script>
  <script src="xulidangnhapadmin/xuliquyenkhiluachondanhmuc.js"></script>
  <script src="xulidangnhapadmin/xuliloadtrangadmin.js"></script>
  <script type="text/javascript">


  </script>
  <style>
.hover li a:hover {
  color:#1e98ea!important;
  /*background: red;*/
}
.hover li a:visited {
/*color:#1e98ea!important;;*/
}

</style>
</head>
<body> 
	<div class="container-fluid">
  	
    <div class="row">
		  <div class="col-md-2">
        <div class="row">
          <div class="col-md-12" style="text-align: center" >
        <?php
        require("connect.php");
        
        echo '<div style="border-width: 3px;
               border-style: solid;
               border-color: hsla(89, 43%, 51%, 0.3);
               width: auto;
               height: auto" id="hienthi"><img src="icon/icons8_user_filled_50px_1.png"><p style="font-size:20px;color:black">'.$_SESSION["username"].'</p><a  href="javascript:void(0)"  onclick="xemTaiKhoan(\''.$_SESSION["user"]["id"].'\')"><img src="icon/icons8_Ophthalmology_32px_1.png"></a></div>';
        mysqli_close($connSanPham);
        ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
				<ul class="nav navbar-nav"  style="background-color: #26241b">
			     <?php
             taomenu();
            ?>
		    </ul>
      </div>
    </div>
		  </div>
      		<?php
      		function taomenu(){
      			$menuarray=array("Quản lý sản phẩm","Quản lý hãng","Quản lý đơn hàng","Quản lý tài khoản","Quản lý nhân viên","Quản lý khách hàng","Quản lý quyền","Thống kê"); 
            $menuicon=array("icons8_trainers_48px_1.png","icons8_trainers_64px_3.png","icons8_check_48px_1.png","icons8_user_group_man_woman_48px.png","icons8_permanent_job_48px.png","icons8_cash_in_hand_48px.png","icons8_Admin_Settings_Male_48px.png","icons8_bar_chart_48px.png");
      			$d=count($menuarray);
      			for($i=0;$i < $d;$i++)
      				{
                      echo '<div class="hover"><li style="margin-top:15px;margin-left:0px"><a href="admin.php?id='.$i.'"style="text-decoration: none;font-size:16px;color:white;" id="danhmuc'.$i.'" onclick="kiemTraQuyen(\''.$_SESSION["user"]["role"].'\',\''.$i.'\')"><img src="icon/'.$menuicon[$i].'" style="width:50px;height:50px"/>'.$menuarray[$i].'</a></li></div>';
                  }
      		}
      		?>
		<div class="col-md-10" style="background-color: #E4E5E6">
			<?php
							if(isset($_GET['id']))
                            {

                            	if($_GET['id']=='0')
                                include("quanly/quanlysanpham.php");
                            else
                            	if($_GET['id']=='1')
                                	{include("quanly/quanlyhang.php");
                                  if (isset($_SESSION['sqlGoc'])) {
                                 $sql = $_SESSION['sqlGoc'];
                                  unset($_SESSION['sqlGoc']);
        }} 
                            else
                              if($_GET['id']=='2')
                                  include("quanly/quanlydonhang.php"); 
                            else
                            	if($_GET['id']=='3')
                                	include("quanly/quanlytaikhoan.php");
                            else 
                            	if($_GET['id']=='4')
                                	include("quanly/quanlynhanvien.php");
                            else 
                              if($_GET['id']=='5')
                                  include("quanly/quanlykhachhang.php");
                            else 
                              if($_GET['id']=='6')
                                  include("quanly/quanlyquyen.php");
                            else 
                            	if($_GET['id']=='7')
                                	include("thongke.php");
                                	}
                             else include("thongke.php");   
                 ?>
    
		</div>
		
		
	</div> 
</div> 
</body>