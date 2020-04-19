<?php
$sql_layhang = " SELECT * FROM trademark ";
$trademark = $db->fetchsql($sql_layhang); //Lấy tất cả các hãng trong DB trademark
$data = []; //Khai báo mảnh data rỗng
foreach ($trademark as $hang) {
    //Mỗi hãng sẽ là 1 Array
    $num_hang = intval($hang['MaHang']); //đếm số id trong trademark(int)
    $sql = "SELECT * FROM product Where MaHang=$num_hang"; //Lấy n sp có hãng = mã hãng
    $truyvan = $db->fetchsql($sql); //Chia ra 1 hãng 1 array
    $data[$hang['TenHang']] = $truyvan; //key của từng Array là tên hảng
}

require 'connect.php';


?>
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <div id="getGia"></div>
                        <h3 class="sidebar-title">TÌM KIẾM NÂNG CAO</h3>
                        <div class="sidebar-search">
                            <form>
                                <input placeholder="Tìm sản phẩm..." type="text" style="width: 100%;border: 1px solid #ccc;padding: 12px 5px;"> 
                                <button onclick="search()"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Lọc Theo Giá</h3>
                        <!-- <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Lọc</button>
                            </div>
                        </div> -->
                    <div id="timkiemtheogia">
                        
                              <input placeholder="Giá từ" type="text" id="giatu" style="width: 35%; border-radius: 4px;border: 1px solid #ccc;padding: 5px 5px;"> -->             
                             <input placeholder="Giá đến" type="text" id="giaden"  style="width: 35%;border-radius: 4px;border: 1px solid #ccc;padding: 5px 5px;">
                        
                    </div>    
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Chọn thương hiệu</h3>
                        <div class="sidebar-categories">
                            <ul>
                                <?php foreach ($trademark as $item) : ?>
                                    <li><a href="#" id="<?php echo $item['MaHang']; ?>" title="Xem sản phẩm của hãng <?php echo $item['TenHang']; ?>" onclick="layMaHang('<?php echo $item['MaHang']; ?>')"><?php echo $item['TenHang']; ?></a></li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-10">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <!-- <p><span>23</span> Product Found of <span>50</span></p> -->
                                </div>
                                <div class="shop-selector">
                                    <label>Sắp xếp theo : </label>
                                    <select name="select">
                                        <option value="">Mặc định</option>
                                        <option value="">A tới Z</option>
                                        <option value="">Z tối A</option>
                                        <option value="">Giá Thấp</option>
                                        <option value="">Giá Cao</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- search -->
                        <div id="search_box">
                            <div class="section-title text-center mb-20">
                                <h2 id="hang">SẢN PHẨM HOT</h2>
                            </div>
                            <div class="product-tab-list text-center mb-20 nav product-menu-mrg" role="tablist">

                                <!-- <a class="active" href="#home1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                            <h4>all </h4>
                        </a> -->
                                <?php foreach ($trademark as $item) : ?>
                                    <a href="#home2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home2" class="" onclick="selectHang('<?php echo $item['MaHang']; ?>')">
                                        <h4><?php echo $item['TenHang']; ?> </h4>
                                    </a>
                                <?php endforeach ?>
                            </div>

                            <!-- phan trang -->
                            <!--
                        tong_sp: tổng số phẩn tử
                        current_page: trang hiện tại
                        limit: số sp hiển thị trên mỗi trang
                        start: record bắđầu trong câu lệnh SQL
                         start = (current_page - 1) * limit
                                =(Trang hiện tại -1)* số_sp_cần_xuất_hiện
                         -->
                            <!--  Khung Sản phẩm -->
                            <div id="show_product">
                                <div class="shop-product-content tab-content">
                                    <div id="grid-sidebar1" class="tab-pane fade active show">
                                        <div class="row">
                                            <!-- Chú Thích phân trang
                                    tong_sp: tổng số phẩn tử
                                    current_page: trang hiện tại
                                    limit: số sp hiển thị trên mỗi trang
                                    start: record bắđầu trong câu lệnh SQL
                                    start = (current_page - 1) * limit
                                            =(Trang hiện tại -1)* số_sp_cần_xuất_hiện
                                     -->
                                            <?php
                                            $sql = "SELECT * FROM product ";
                                            $ketnoi = mysqli_query($connect, $sql);
                                            $tong_sp = mysqli_num_rows($ketnoi);
                                            if ($tong_sp > 0) {
                                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                $limit = 8; //số sp mỗi trang
                                                $so_trang = ceil($tong_sp / $limit); //Số trang
                                                $start = ($current_page - 1) * $limit; //sô id bắt đầu của trang
                                                //Câu lệnh xuất từ start tới limit
                                                $thucthi = mysqli_query($connect, "SELECT * FROM product LIMIT $start,$limit");
                                                while ($row = mysqli_fetch_array($thucthi)) {
                                                    ?>
                                                    <!-- Mỗi sản phẩm -->
                                                    <div class="col-lg-6 col-md-6 col-xl-3">
                                                        <div class="product-wrapper mb-30">
                                                            <div class="product-img">
                                                                <a href="index.php?id=chitietsp<?php echo $row['MaSP']; ?>" action="chitietsp.php">
                                                                    <img src="<?php echo $row['HinhAnh']; ?>" alt="">
                                                                </a>
                                                                <?php
                                                                if ($row['SoLuong'] == 0) {
                                                                    ?>
                                                                    <span>HẾT</span>

                                                                    <div class="product-action">
                                                                        <a class="animate-left" title="Wishlist" href="#" onclick="thongbao();">
                                                                            <i class="pe-7s-like"></i>
                                                                        </a>

                                                                        <a clas="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href='index.php?id=<?php echo $row['MaSP']; ?>'>
                                                                            <i class="pe-7s-look"></i>
                                                                        </a>
                                                                    </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                    <div class="product-action">
                                                                        <a class="animate-left" title="Wishlist" href="#" onclick="thongbao();">
                                                                            <i class="pe-7s-like"></i>
                                                                        </a>
                                                                        <a class="animate-top" title="Add To Cart" onclick="addCart(<?php echo '\'' . $row["MaSP"] . '\''; ?>)">
                                                                            <i class="pe-7s-cart"></i>
                                                                        </a>
                                                                        <a clas="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href='index.php?id=<?php echo $row['MaSP']; ?>'>
                                                                            <i class="pe-7s-look"></i>
                                                                        </a>
                                                                    </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            </div>
                                                            <div class="product-content">
                                                                <h4><a href="#"> <?php echo $row['TenSP']; ?> </a></h4>
                                                                Giá: <span><?php echo $gia = number_format($row['DonGia'], 0, ' ', '.'); ?></span> vnđ

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            } //end while
                                        } //end if
                                        ?>
                                            <!-- END Mỗi sản phẩm -->


                                        </div>
                                    </div>
                                </div>
                                <!--  Khung Sản phẩm -->
                                <!--Hiện thị các Phân trang -->
                                <div class="pagination-style mt-30 text-center">
                                    <ul id="showNumPage">
                                        <?php

                                        if ($so_trang > 1) //Thì mới hiện thị Pre ( dấu '<')
                                        {
                                            $pre = $current_page - 1;
                                            if ($current_page != 1) {
                                                echo '<li><a href="index.php?assets=sanpham&page=' . $pre . '"><i class="ti-angle-left"></i></a></li>';
                                            }
                                        }
                                       
                                        if(isset( $_GET['page'])){
                                            $page = $_GET['page'];
                                        }
                                        else{
                                            $page = 1;
                                        }

                                        for ($i = 1; $i <= $so_trang; $i++) {
                                            if ($page == $i) {
                                                echo '<li class="active" ><a id="list" href="index.php?assets=sanpham&page=' . $i . '">' . $i . '</a></li>';
                                            } else {
                                                echo '<li><a id="list" href="index.php?assets=sanpham&page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }
                                        if ($so_trang > 1) //Thì mới hiện thị Pre ( dấu '<')
                                        {
                                            $next = $current_page + 1;
                                            if ($current_page != $so_trang) {
                                                echo '<li><a href="index.php?assets=sanpham&page=' . $next . '"><i class="ti-angle-right"></i></a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div><!-- end phan trang -->

                            </div>
                        </div>
                    </div><!-- end id="show_product" -->

                </div> <!-- show search -->



                <!-- thongbao -->
                <div id="snackbar">Đã thêm sản phẩm vào giỏ hàng</div>

            </div>
        </div>
    </div>
</div>