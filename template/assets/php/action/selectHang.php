<?php
session_start();
include("./../connect.php");
include("./../../../function.php");
$id = $_GET['id'];


// $query = selectAll__where_like_('product','MaHang',$id);
// while($row = mysqli_fetch_array($query)){
//    // echo $row['MaSP'];

?>
<div class="shop-product-content tab-content">
    <div id="grid-sidebar1" class="tab-pane fade active show">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `product` WHERE `MaHang` LIKE '$id'";
            $ketnoi = mysqli_query($connect, $sql);
            $tong_sp = mysqli_num_rows($ketnoi);
            if ($tong_sp > 0) {
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 8; //số sp mỗi trang
                $so_trang = ceil($tong_sp / $limit); //Số trang
                $start = ($current_page - 1) * $limit; //sô id bắt đầu của trang
                //Câu lệnh xuất từ start tới limit
                //SELECT * FROM `product` WHERE `MaHang` LIKE 'h1' ORDER BY `product`.`MaSP` LIMIT 9,16 
                // $thucthi = mysqli_query($connect, "SELECT * FROM product LIMIT $start,$limit");
                $thucthi = mysqli_query($connect, "SELECT * FROM `product` WHERE `MaHang` LIKE '$id' ORDER BY `product`.`MaSP` LIMIT $start,$limit");
                while ($row = mysqli_fetch_array($thucthi)) {
                    ?>
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


        </div>
    </div>
</div>
<!--  Khung Sản phẩm -->
</div>


<!--Hiện thị nút Phân trang -->
<div class="pagination-style mt-30 text-center">
    <ul id="showNumPage">
        <?php


        if ($so_trang > 1) {
            if ($so_trang > 1) //Thì mới hiện thị Pre ( dấu '<')
            {
                $pre = $current_page - 1;
                if ($current_page != 1) {
                    ?>
                    <li><a onclick="search('<?php echo $pre ?>')"><i class="ti-angle-left"></i></a></li>
                <?php
            }
        }
        //$page = $_GET['page'];
        $page = 0;
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        for ($i = 1; $i <= $so_trang; $i++) {
            if ($page == $i) {
                echo '<li class="active" ><a href="javascript:void(0)" id="list">' . $i . '</a></li>';
            } else {
                ?>
                    <li><a href="javascript:void(0)" id="list" onclick="search(<?php echo $i ?>)"><?php echo $i ?></a></li>
                <?php
            }
        }
        if ($so_trang > 1) //Thì mới hiện thị Pre ( dấu '>')
        {
            $next = $current_page + 1;
            if ($current_page != $so_trang) {
                ?>
                    <li><a onclick="search('<?php echo $next ?>')"><i class="ti-angle-right"></i></a></li>
                <?php
            }
        }
    }
    ?>
    </ul>
</div>
<?php
//}

?>