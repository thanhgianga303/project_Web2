<?php 
include 'connect.php';
?>
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_mycart">
                <h1 class="cart-heading">GIỎ HÀNG</h1>
                <div id="giohang">
                <?php
                if (isset($_SESSION['cart_shoes'])) {
                    if (count($_SESSION['cart_shoes']) != 0) { ?>
                        <form action="#" id="mycart">
                            <div class="table-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Xóa</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Size</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="giohang2">
                                        <!--  Xuất sp -->
                                        <?php
                                        if (!empty($_SESSION['cart_shoes'])) {
                                            $i = 0;
                                            foreach ($_SESSION['cart_shoes'] as $key => $value) {
                                                $i++;
                                                ?>

                                                <tr id="numCart_<?php echo $key; ?>">
                                                    <td class="product-remove" id="delete_<?php echo $key; ?>"><a onclick="deleteCart(<?php echo "'$key'"; ?>)"><i class="pe-7s-close"></i></a></td>
                                                    <td class="product-thumbnail img-cart">
                                                        <a href="#"><img class="img-cart" src="<?php echo $_SESSION['cart_shoes'][$key]["img"] ?>" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"><?php echo $_SESSION['cart_shoes'][$key]["name"] ?></a></td>
                                                    <td class="product-quantity">
                                                        <select class="select-size" value="Chọn" id="size_sp<?php echo $key; ?>" onchange="select_size(<?php echo "'$key'"; ?>);">
                                                            <option value="<?php echo $_SESSION['cart_shoes'][$key]["size"]; ?>"><?php echo $_SESSION['cart_shoes'][$key]["size"]; ?></option>
                                                            <option value="38">38</option>
                                                            <option value="39">39</option>
                                                            <option value="40">40</option>
                                                            <option value="41">41</option>
                                                            <option value="42">42</option>
                                                            <option value="43">43</option>
                                                        </select>
                                                    </td>
                                                    <?php
                                                    $price_product = $_SESSION['cart_shoes'][$key]["price"]; //price gốc
                                                    $price_cart = ($_SESSION['cart_shoes'][$key]["price"] * $_SESSION['cart_shoes'][$key]["sLuong"]); // Price đã nhân SL
                                                    $price_format = number_format($price_cart, 0, ' ', '.');

                                                    ?>
                                                    <td class="product-quantity">
                                                       
                                                        <input class="sLuong_<?php echo $key; ?>" id="sLuong_<?php echo $key; ?>" onchange="updateCart(<?php echo "'$key'"; ?>,this,<?php echo $price_product; ?>)" value="<?php echo $_SESSION
                                                        ['cart_shoes'][$key]["sLuong"]; ?>" type="number" min="1">

                                                        <?php
                                                        $thucthi = selectAll__where_like_('product','MaSP',$key);
                                                        $sL = mysqli_fetch_array($thucthi);

                                                        ?>  
                                                        <input type="hidden" value="<?php echo $sL['SoLuong'] ?>" id="hidden_sl_<?php echo $key; ?>">
                                                    </td>
                                                    <!-- Show Price -->


                                                    <td style="color:#000000; font-size:16px;" class="product-subtotal" id="total_product<?php echo $key; ?>"><?php echo $price_format ?><span> đ</span></td>
                                                </tr>
                                            <?php
                                        } //foreah
                                    } //if !empty
                                    else {
                                        echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
                                    Chưa có sản phẩm nào trong giỏ hàng!
                                    </div>';
                                    }
                                    ?>
                                        <!-- end xuất sp -->
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button"  type="button" value="XÓA TẤT CẢ" onclick="delete_all()">
                                            <input type="button" class="button" data-toggle="modal" data-target="#exampleModal_card" id="dathang" value="   Đặt Hàng   ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total" id="thanhtoan">
                                        <?php
                                        $total = 0;
                                        foreach ($_SESSION['cart_shoes'] as $key) {
                                            $total += $key['price'] * $key['sLuong'];
                                        }
                                        ?>
                                        <h2>Thanh Toán</h2>
                                        <ul>
                                            <li>Khuyến Mãi<span>0%</span></li>
                                            <li>THÀNH TIỀN<span>
                                                    <div id="priceCart" style="color:#ff5050; font-size:20px;"><?php echo number_format($total, 0, ' ', '.')." đ";  ?></div>

                                                </span>
                                                
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    <?php
                } else {
                    echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
                Chưa có sản phẩm nào trong giỏ hàng!
                </div>';
                }
            } else {
                echo '<div class="alert alert-success" style="text-align:center;margin-top:5px; padding:20px 0 20px 0;" >
                Chưa có sản phẩm nào trong giỏ hàng!
                </div>';
            }
            ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <!-- <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Thông Tin Đặt Hàng</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="user_orders">Tai Khoản :</label>
                        <label for="recipient-name" class="col-form-label">accout</label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="email_orders">Email :</label>
                        <label for="recipient-name" class="col-form-label">abc@gmail.com</label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="num_orders" >Sđt :</label>
                        <label for="recipient-name" class="col-form-label">0123456789</label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="dChi" >Địa Chỉ:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label" id="ghichu" >Ghi Chú:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Xác Nhận</button>
            </div>
        </div>
    </div> -->

</div>