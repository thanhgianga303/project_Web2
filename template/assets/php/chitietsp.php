<?php
include "connect.php";
$sql = "SELECT * FROM product";
$conn = mysqli_query($connect, $sql);
$num_rows = mysqli_num_rows($conn);
if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        ?>
        <!-- <div style="height: 50px; width: 100%; background: red;"></div>		 -->
    <?php
}
}
?>
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Cart</h1>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Wooden Furniture </a></td>
                                    <td class="product-price-cart"><span class="amount">$165.00</span></td>
                                    <td class="product-quantity">
                                        <select>
                                            <option value="">39</option>
                                            <option value="">40</option>
                                            <option value="">41</option>
                                            <option value="">42</option>
                                        </select>
                                    </td>
                                    <td class="product-quantity">
                                        <input value="1" type="number">
                                    </td>
                                    <td class="product-subtotal">$165.00</td>
                                </tr>
                                <tr>
                                    <td class="product-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Wooden Furniture </a></td>
                                    <td class="product-price-cart"><span class="amount">$165.00</span></td>
                                    <td class="product-quantity">
                                        <select>
                                            <option value="">39</option>
                                            <option value="">40</option>
                                            <option value="">41</option>
                                            <option value="">42</option>
                                        </select>
                                    </td>
                                    <td class="product-quantity">
                                        <input value="1" type="number">
                                    </td>
                                    <td class="product-subtotal">$165.00</td>
                                </tr>

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
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal<span>100.00</span></li>
                                    <li>Total<span>100.00</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>