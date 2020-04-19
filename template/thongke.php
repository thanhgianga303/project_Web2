 <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.js"></script>
        <script src="xulidangnhapadmin/xuliquyenkhiluachondanhmuc.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.5.0-web/css/all.min.css">
        <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.5.0-web/webfonts/fa-brands-400.ttf">
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">             
                <div class="row">
                <div class="col-md-5 chart chart-bgred" >
                    <div class="chart__num">10,000</div>
                    <div class="chart__label">Lượng người truy cập</div>
                    <div class="chart__img chart__img-img1"></div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 chart chart-bgblue">
                    <div class="chart__num" id="Sold"></div>
                    <div class="chart__label">Số sản phẩm đã được bán: 
                    <?php
                    require("connect.php");
                    $sql="SELECT * FROM orders WHERE TrangThai=1";
                    $rs=mysqli_query($connSanPham,$sql);
                    $num=mysqli_num_rows($rs);
                    $tongSanPhamDaDuocBan=0;
                    // echo $num;
                    if($num>0)  {
                            while($row=$rs->fetch_assoc())
                            {
                                $maTungDonHang=$row['MaDH'];
                                $sqlSoLuongTungChiTiet="SELECT * FROM orders_details WHERE MaDH='$maTungDonHang'";
                                $rsChiTiet=mysqli_query($connSanPham,$sqlSoLuongTungChiTiet);
                                $numChiTiet=mysqli_num_rows($rsChiTiet);
                                if($numChiTiet>0) {
                                    while ($rowChiTiet=$rsChiTiet->fetch_assoc()) {
                                        $tongSanPhamDaDuocBan=$tongSanPhamDaDuocBan+$rowChiTiet['SL'];        
                                    }
                                }
                            }
                    }
                    echo $tongSanPhamDaDuocBan; 
                    ?>
                    </div>
                    <div class="chart__img chart__img-img2"></div>
                </div>
                </div>
                <div class="row"><div class="col-md-12" style=""><hr/></div></div>
                <div class="row">
                <div class="col-md-5 chart chart-bgbluewhite">
                    <div class="chart__num" id="Client"></div>
                    <div class="chart__label">Số lượng khách hàng: 
                    <?php
                    require("connect.php");
                    $sql="SELECT * FROM khachhang";
                    $rs=mysqli_query($connSanPham,$sql);
                    $num=mysqli_num_rows($rs);
                    $soLuongKhachHang=0;
                    // echo $num;
                    if($num>0)  {
                            while($row=$rs->fetch_assoc())
                            {
                                $soLuongKhachHang++;
                            }
                    }
                    echo $soLuongKhachHang; 
                    ?>


                    </div>
                    <div class="chart__img chart__img-img3"></div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 chart chart-bgyellow">
                    <div class="chart__num" id="Money"></div>
                    <div class="chart__label">Doanh thu từ đầu đến nay: 
                    <?php
                    require("connect.php");
                    $sql="SELECT * FROM orders WHERE TrangThai=1";
                    $rs=mysqli_query($connSanPham,$sql);
                    $num=mysqli_num_rows($rs);  
                    $doanhThu=0;
                    // echo $num;
                    if($num>0)  {
                            while($row=$rs->fetch_assoc())
                            {
                                $doanhThu+=$row['TongTien'];
                            }
                    }
                    echo $doanhThu; 
                    ?>
                    VNĐ
                    </div>
                    <div class="chart__img chart__img-img4"></div>
                </div>
                </div>
                <div class="row"><div class="col-md-12" style="red"><hr/></div></div>
                <div class="row">
                    <div class="col-md-3">              
                        <a href="admin.php?id=0">
                            <div class="thong-ke">
                                <div class="thong-ke__num" id="tong_sp"></div>
                                <div class="thong-ke__title" style="color:black;text-align: center;font-size: 20px">Tổng sản phẩm:
                                <label style="color:blue;font-size: 20px">
                                <?php
                                    require("connect.php");
                                    $sql="SELECT * FROM product";
                                    $rs=mysqli_query($connSanPham,$sql);
                                    $num=mysqli_num_rows($rs);
                                    $soLuongSanPham=0;
                                    // echo $num;
                                    if($num>0)  {
                                            while($row=$rs->fetch_assoc())
                                            {
                                                $soLuongSanPham++;
                                            }
                                }
                                echo $soLuongSanPham; 
                                ?>
                                </label>
                                </div>
                                <div class="thong-ke__img img1"></div>
                            </div>
                        </a>
                    </div>
                <div class="col-md-3">
                    <a href="admin.php?id=5" onclick="kiemTraQuyen('<?php echo $_SESSION['user']['role'];?>',5)"><div class="thong-ke">
                        <div class="thong-ke__num" id="Client1"></div>
                        <div class="thong-ke__title" style="color:black;text-align: center;font-size: 20px">Khách hàng: 
                        <label style="color:blue;font-size:20px">
                        <?php
                            require("connect.php");
                            $sql="SELECT * FROM khachhang";
                            $rs=mysqli_query($connSanPham,$sql);
                            $num=mysqli_num_rows($rs);
                            $soLuongKhachHang=0;
                            // echo $num;
                            if($num>0)  {
                                    while($row=$rs->fetch_assoc())
                                    {
                                        $soLuongKhachHang++;
                                    }
                            }
                            echo $soLuongKhachHang; 
                        ?>
                    </label>
                        </div>
                        <div class="thong-ke__img img2"></div>
                    </div></a>
                </div>
                <div class="col-md-3">
                <a href="admin.php?id=2"><div class="thong-ke">
                    <div class="thong-ke__num" id="don_hang"></div>
                    <div class="thong-ke__title" style="text-align:center;color: black;font-size:20px">Đơn hàng: 
                    <label style="color:blue;font-size:20px">
                    <?php
                    require("connect.php");
                    $sql="SELECT * FROM orders WHERE TrangThai=1";
                    $rs=mysqli_query($connSanPham,$sql);
                    $num=mysqli_num_rows($rs);
                    $tongDonHang=0;
                    // echo $num;
                    if($num>0)  {
                            while($row=$rs->fetch_assoc())
                            {
                                $tongDonHang++;
                            }
                    }
                    echo $tongDonHang; 
                    ?>
                    </label>
                    </div>
                    <div class="thong-ke__img img3"></div>
                </div></a>
                </div>
                <div class="col-md-3">
                <a href="admin.php?id=1"><div class="thong-ke">
                    <div class="thong-ke__num" id="danh_muc"></div>
                    <div class="thong-ke__title" style="text-align:center;color: black;font-size:20px">Số hãng giày:<label style="color:blue;font-size:20px">
                      <?php
                                    require("connect.php");
                                    $sql="SELECT * FROM trademark";
                                    $rs=mysqli_query($connSanPham,$sql);
                                    $num=mysqli_num_rows($rs);
                                    $soLuongHang=0;
                                    // echo $num;
                                    if($num>0)  {
                                            while($row=$rs->fetch_assoc())
                                            {
                                                $soLuongHang++;
                                            }
                                }
                                echo $soLuongHang; 
                                ?>  

                    </label></div>
                    <div class="thong-ke__img img4"></div>
                </div></a>
                </div>
            </div>
        </div>
        <script src="js/all.js"></script>
    </body>
</html>