<?php
require("connect.php");

$id = $_SESSION['idUser'];
$MaDH = $_GET['madh'];

//SELECT $select FROM `$table` WHERE `$option` LIKE '$like'
$idSoHuu = Chon_pt_trongbang('MaKH', 'orders', 'MaDH', $MaDH);
$idSoHuu[0];

if ($idSoHuu[0] == $id) {
    ?>
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_mycart">
                    <h1 class="cart-heading">Chi Tiết Đơn Hàng</h1>

                    <div id="donhang">
                        <form action="#" id="mycart">
                            <div class="table-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Size</th>
                                            <th>Số lượng</th>
                                            <th>Đơn Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="chitietdh" >
                                        <!--  Xuất sp -->
                                        <?php
                                        $thucthi = selectAll__where_like_('orders_details', 'MaDH', $MaDH);
                                        while ($row = mysqli_fetch_array($thucthi)) {
                                            $getProduct = selectAll__where_like_('product', 'MaSP', $row['MaSP']);
                                            $row2 = mysqli_fetch_array($getProduct);
                                            
                                            //echo $row2['MaSP'];
                                            ?>
                                            <tr id="khungtungsp" >
                                                <td class="product-thumbnail img-cart">
                                                    <a><img class="img-cart" src="<?php echo $row2['HinhAnh']; ?>" alt=""></a>
                                                </td>
                                                <td class="product-name"><a><?php echo $row2['TenSP']; ?></a></td>
                                                <td class="product-subtotal">
                                                    <?php echo $row['Size']; ?>
                                                </td>
                                                <td class="product-quantity">
                                                    <?php echo $row['SL']; ?>
                                                </td>
                                                
                                                <td class="product-subtotal" id="" style="color:#ff5050; font-size:15px;">
                                                    <span><?php echo number_format($row['DonGia'], 0, ' ', '.') ?></span>
                                                    <span> đ</span>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                    ?>
                                        <!-- end xuất sp -->

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div>
                        <table border="1" cellpadding="2" cellspacing="2">
                        </table>
                        <table class="table">
                            <thead class="thead-dark">
                                <?php 
                                $select_dh = selectAll__where_like_('orders','MaDH',$MaDH);
                                $orders = mysqli_fetch_array($select_dh);                               
                                ?>
                                <tr>
                                    <th scope="col" colspan="2">
                                        <div>THÔNG TIN ĐẶT HÀNG</div>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">Thành tiền :</th>
                                    <td style="color:red; font-size:20px;"><?php echo number_format($orders['TongGia'],0,' ','.') ?><span> đ</span></td>
                                </tr>
                                <tr>
                                    <th scope="col">Địa chỉ :</th>
                                    <td><?php echo $orders['DiaChi']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Ghi Chú :</th>
                                    <td><?php echo $orders['GhiChu']; ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </div>
<?php
} else {
    echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
Bạn ko thể truy cập đến đơn hàng này!
</div>';
}
?>