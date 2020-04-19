<?php
include('connect.php');

?>
<div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">ĐƠN HÀNG</h1>

                <?php  
                if(isset($_SESSION['idUser'])){
                    $idUser = $_SESSION['idUser'];
                    $row1 = count_id('orders','MaDH');                   
                    //echo $row1[0];
                    if($row1[0]!=0){//Loi nha
                
                ?>
    
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Thời Gian</th>
                                    <th>Giá Trị</th>
                                    <th>Trạng Thái</th>
                                    <th>TÙY CHỌN</th>
                                </tr>
                            </thead>
                            <?php
                
                            //SELECT * FROM `orders` WHERE `MaKH` = '$idUser' ORDER BY `orders`.`MaDH` DESC
                            $sql = "SELECT * FROM `orders`  WHERE `MaKH` = '$idUser' ORDER BY NgayLap DESC ";
                            $thucthi = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($thucthi)) {

                                ?>
                                <tbody>
                                    <tr id="<?php echo $row['MaDH']; ?>">
                                        <td class="product-subtotal" id="maDH_<?php echo $row['MaDH']; ?>">
                                            <?php echo $row['MaDH']; ?>
                                        </td>
                                        <td class="product-subtotal"><?php echo $row['NgayLap']; ?></td>
                                        <td class="product-subtotal"><span class="amount"><?php echo $gia = number_format($row['TongGia'], 0, ' ', '.'); ?></span><span> đ</span></td>
                                        <td class="product-subtotal">
                                            <?php
                                            if ($row['TrangThai'] == 0) {

                                                echo '<div style="color:#17a2b8">Đang chờ xử lý</div>';
                                            } else {
                                                echo '<div style="color:#28a745">Đã xử lý</div>';
                                            }
                                            ?>
                                        </td>
                                        <td class="product-remove">
                                            <?php
                                            if ($row['TrangThai'] == 0) {
                                                ?>
                                                
                                                <button type="button" class="btn btn-danger" id="delete_<?php echo $row['MaDH']; ?>" onclick="delete_orders(<?php echo "'".$row['MaDH']."'"; ?>);" >Xóa</button>
                                                <button type="button" class="btn btn-info" id="chitiet_<?php echo $row["MaDH"]; ?>"  onclick="chitietdh(<?php echo "'".$row['MaDH']."'"; ?>);">Chi tiết</button>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="button" class="btn btn-info" id="chitiet_<?php echo $row["MaDH"]; ?>"  onclick="chitietdh(<?php echo "'".$row['MaDH']."'"; ?>);">Chi tiết</button>
                                            <?php 
                                        }
                                        ?>
                                        </td>


                                    </tr>
                                </tbody>
                            <?php
                        }
                        mysqli_close($connect);
                        ?>
                        </table>

                    </div>
                </form>
                <?php
                    }else{
                        echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
                                    Bạn chưa có đơn hàng nào !!!
                                    </div>';
                    }
                }else{
                    echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
                                    Bạn cần đăng nhập để xem chi tiết đơn hàng !!!
                                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>