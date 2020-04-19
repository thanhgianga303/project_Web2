<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>



    <div class="modal-dialog modal-quickview-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-left">
                    <div class="quick-view-learg-img">
                        <div class="quick-view-tab-content tab-content">
                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                <?php
                                // while ($row=mysqli_fetch_array($ketnoi)){

                                ?>
                                <img src="<?php echo $row['img']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="qwick-view-right">
                    <div class="qwick-view-content">

                        <h3><?php echo $row['name']; ?></h3>
                        <div class="price">
                            <span class="new"><?php echo $row['gia']; ?></span>
                            <span class="old">$120.00</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                        <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Size*</label>
                                <select class="select">
                                    <option value="">- Please Select -</option>
                                    <option value="">900</option>
                                    <option value="">700</option>
                                </select>
                            </div>
                            <div class="select-option-part">
                                <label>Color*</label>
                                <select class="select">
                                    <option value="">- Please Select -</option>
                                    <option value="">orange</option>
                                    <option value="">pink</option>
                                    <option value="">yellow</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        //}
                        ?>
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black" href="#">add to cart</a>
                            </div>
                            <div class="quickview-btn-wishlist">
                                <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-compare-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <div class="table-content compare-style table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <a href="#">Remove <span>x</span></a>
                                        <img src="assets/img/cart/4.jpg" alt="">
                                        <p>Blush Sequin Top </p>
                                        <span>$75.99</span>
                                        <a class="compare-btn" href="#">Add to cart</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Description </h4>
                                    </td>
                                    <td class="compare-dec compare-common">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Sku </h4>
                                    </td>
                                    <td class="product-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Availability </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>In stock</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Weight </h4>
                                    </td>
                                    <td class="compare-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Dimensions </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>N/A</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>brand </h4>
                                    </td>
                                    <td class="compare-brand compare-common">
                                        <p>HasTech</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>color </h4>
                                    </td>
                                    <td class="compare-color compare-common">
                                        <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>size </h4>
                                    </td>
                                    <td class="compare-size compare-common">
                                        <p>XS, S, M, L, XL, XXL </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title"></td>
                                    <td class="compare-price compare-common">
                                        <p>$75.99 </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>