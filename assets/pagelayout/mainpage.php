<?php 
    require_once './assets/config/db.php';
?>
    <!-- Phần thân hiển thị nội dung -->
    <div class="grid grid-main-page">
        <div class="grid__row background-row">
            <!-- <div class="grid__column-10 bacground-row"> -->
                <div class="grid__column-6-10 slider-img-view">
                    <div class="slider-view">
                        <div class="slider">
                            <div class="slides">
                                <input type="radio" name="radio-btn" id="rbtn1">
                                <input type="radio" name="radio-btn" id="rbtn2">
                                <input type="radio" name="radio-btn" id="rbtn3">
                                <input type="radio" name="radio-btn" id="rbtn4">

                                <div class="slide fisrt">
                                    <img src="./assets/img/slide1.jpg" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./assets/img/slide2.jpg" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./assets/img/slide1.jpg" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./assets/img/slide2.jpg" alt="">
                                </div>

                                <div class="navigation-auto">
                                    <div class="auto-btn1"></div>
                                    <div class="auto-btn2"></div>
                                    <div class="auto-btn3"></div>
                                    <div class="auto-btn4"></div>
                                </div>
                            </div>

                            <div class="navigation-manual">
                                <label for="rbtn1" class="manual-btn"></label>
                                <label for="rbtn2" class="manual-btn"></label>
                                <label for="rbtn3" class="manual-btn"></label>
                                <label for="rbtn4" class="manual-btn"></label>
                            </div>
                            <script type="text/javascript">
                                var counter = 1;
                                setInterval(function(){
                                    document.getElementById('rbtn' + counter).checked = true;
                                    counter++;
                                    if(counter > 4){
                                        counter = 1;
                                    }
                                }, 3000);
                            </script>
                        </div>
                    </div>
                </div>
                <div class="grid__column-4-10">
                    <div class="view-rightimg">
                        <img class="right-img" src="./assets/img/slide1.jpg" alt="">
                        <img class="right-img" src="./assets/img/slide2.jpg" alt="">
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="grid__row">
            <div class="grid__column-10  bacground-row grid-with-category">
                <div class="grid__column-2-10 category">
                    <div class="category-header">
                        <img src="./assets/img/menu.png" alt="">
                        <h3>Danh mục</h3>
                    </div>
                    <hr>
                    <ul class="category-list">
                        <?php
                            $sql_dm = "SELECT maloai,tenloai FROM phanloai";
                            $query_dm = mysqli_query($connect, $sql_dm);
                            while($row_dm = mysqli_fetch_assoc($query_dm)){
                        ?>
                        <li>
                            <a href="index.php?page_layout=category&id=<?php echo $row_dm['maloai'];  ?>">
                                <img src="./assets/img/tamgiac.png" alt="">
                                <?php echo $row_dm['tenloai']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="grid__column-8-10 saleitem-view">
                    <div class="Saleitem-header">
                        <div>
                            <img class="sale-icon" src="./assets/img/sale.png" alt="">
                            <h2>FLASH SALE</h2>
                        </div>
                        <div>
                            <a href="" class="saleitem-all">Xem tất cả</a>
                            <img class="saleitem-all-img" src="./assets/img/right-arrow.png" alt="">
                        </div>
                    </div>
                    <div class="grid__row">
                        <?php
                            $sql1 = "SELECT sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
                            FROM sach 
                            inner join theloai on sach.matheloai = theloai.matheloai 
                            inner join phanloai on sach.maloai = phanloai.maloai
                            ORDER BY RAND() LIMIT 4";
                            $query1 = mysqli_query($connect, $sql1);
                            while($row = mysqli_fetch_assoc($query1)){
                        ?>
                        <div class="grid__column-2-8">
                            <div class="sale-product">
                                <div class="img-container">
                                    <img class="saleitem-img" src="./assets/img/<?php echo $row['hinhanh']; ?>" alt="">
                                </div>
                                <a href="index.php?page_layout=chitietsp&id=<?php echo $row['masach']; ?>;" class="saleitem-name"><?php echo $row['tensach']; ?></a>
                                <span class="saleitem-classify">
                                    Thể loại: <?php echo $row['tentheloai']; ?>
                                </span>
                                <span class="saleitem-author">
                                    Tác giả: <?php echo $row['tacgia']; ?>
                                </span>
                                <div class="price-view-saleitem">
                                    <span class="saleitem-price"><?php echo $row['dongia']; ?></span>
                                    <span class="saleitem-price-sale">86.400đ</span>
                                </div>
                                <div class="saleitem-rating">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-10 bacground-row">
                <div class="Bestseller-item-header">
                        <div>
                            <img class="Bestseller-icon" src="./assets/img/hot.png" alt="">
                            <h2>Bán chạy nhất</h2>
                        </div>
                        <div>
                            <a href="" class="Bestseller-all">Xem tất cả</a>
                            <img class="Bestseller-all-img" src="./assets/img/right-arrow.png" alt="">
                        </div>
                </div>
                <div class="grid__row">
                    <?php
                        $sql1 = "SELECT sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
                        FROM sach 
                        inner join theloai on sach.matheloai = theloai.matheloai 
                        inner join phanloai on sach.maloai = phanloai.maloai
                        ORDER BY RAND() LIMIT 5";
                        $query1 = mysqli_query($connect, $sql1);
                        while($row = mysqli_fetch_assoc($query1)){
                    ?>
                    <div class="grid__column-2-10">
                            <div class="sale-product">
                                <div class="img-container">
                                    <img class="saleitem-img" src="./assets/img/<?php echo $row['hinhanh']; ?>" alt="">
                                </div>
                                <a href="index.php?page_layout=chitietsp&id=<?php echo $row['masach']; ?>;" class="saleitem-name"> <?php echo $row['tensach']; ?></a>
                                <span class="saleitem-classify">
                                    Thể loại: <?php echo $row['tentheloai']; ?>
                                </span>
                                <span class="saleitem-author">
                                    Tác giả: <?php echo $row['tacgia']; ?>
                                </span>
                                <div class="price-view-saleitem">
                                    <span class="saleitem-price"><?php echo $row['dongia']; ?></span>
                                    <span class="saleitem-price-sale">86.400đ</span>
                                </div>
                                <div class="saleitem-rating">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                </div>
                            </div>
                    </div>
                    <?php } ?>
                </div>
            </div>    
        </div>
        <div class="grid__row">
            <div class="grid__column-10 bacground-row">
                <div class="Bestseller-item-header">
                        <div>
                            <img class="Bestseller-icon" src="./assets/img/hot.png" alt="">
                            <h2>Bán chạy nhất</h2>
                        </div>
                        <div>
                            <a href="" class="Bestseller-all">Xem tất cả</a>
                            <img class="Bestseller-all-img" src="./assets/img/right-arrow.png" alt="">
                        </div>
                </div>
                <div class="grid__row">
                    <?php
                        $sql1 = "SELECT sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
                        FROM sach 
                        inner join theloai on sach.matheloai = theloai.matheloai 
                        inner join phanloai on sach.maloai = phanloai.maloai
                        ORDER BY RAND() LIMIT 5";
                        $query1 = mysqli_query($connect, $sql1);
                        while($row = mysqli_fetch_assoc($query1)){
                    ?>
                    <div class="grid__column-2-10">
                            <div class="sale-product">
                                <div class="img-container">
                                    <img class="saleitem-img" src="./assets/img/<?php echo $row['hinhanh']; ?>" alt="">
                                </div>
                                <a href="index.php?page_layout=chitietsp&id=<?php echo $row['masach']; ?>;" class="saleitem-name"> <?php echo $row['tensach']; ?></a>
                                <span class="saleitem-classify">
                                    Thể loại: <?php echo $row['tentheloai']; ?>
                                </span>
                                <span class="saleitem-author">
                                    Tác giả: <?php echo $row['tacgia']; ?>
                                </span>
                                <div class="price-view-saleitem">
                                    <span class="saleitem-price"><?php echo $row['dongia']; ?></span>
                                    <span class="saleitem-price-sale">86.400đ</span>
                                </div>
                                <div class="saleitem-rating">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                    <img src="./assets/img/star.png" alt="">
                                </div>
                            </div>
                    </div>
                    <?php } ?>
                </div>
            </div>    
        </div>
        <div class="grid__row">
            <div class="grid__column-10 bacground-row">
                <div class="Recommend-item-header">
                        <div>
                            <img class="Recommend-icon" src="./assets/img/recommendation.png" alt="">
                            <h2>Gợi ý cho hôm nay</h2>
                        </div>
                        <div>
                            <a href="" class="Recommend-all">Xem tất cả</a>
                            <img class="Recommend-all-img" src="./assets/img/right-arrow.png" alt="">
                        </div>
                </div>
                <div class="grid__row">
                    <?php
                        $sql1 = "SELECT sach.masach, sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
                        FROM sach 
                        inner join theloai on sach.matheloai = theloai.matheloai 
                        inner join phanloai on sach.maloai = phanloai.maloai
                        ORDER BY RAND() LIMIT 5";
                        $query1 = mysqli_query($connect, $sql1);
                        while($row = mysqli_fetch_assoc($query1)){
                    ?>
                    <div class="grid__column-2-10">
                        <div class="sale-product">
                            <div class="img-container">
                                <img class="saleitem-img" src="./assets/img/<?php echo $row['hinhanh']; ?>" alt="">
                            </div>
                            <a href="index.php?page_layout=chitietsp&id=<?php echo $row['masach']; ?>;"  class="saleitem-name"> <?php echo $row['tensach']; ?></a>
                            <span class="saleitem-classify">
                                Thể loại: <?php echo $row['tentheloai']; ?>
                            </span>
                            <span class="saleitem-author">
                                Tác giả: <?php echo $row['tacgia']; ?>
                            </span>
                            <div class="price-view-saleitem">
                                <span class="saleitem-price"><?php echo $row['dongia']; ?></span>
                                <span class="saleitem-price-sale">86.400đ</span>
                            </div>
                            <div class="saleitem-rating">
                                <img src="./assets/img/star.png" alt="">
                                <img src="./assets/img/star.png" alt="">
                                <img src="./assets/img/star.png" alt="">
                                <img src="./assets/img/star.png" alt="">
                                <img src="./assets/img/star.png" alt="">
                            </div>    
                        </div>  
                    </div>
                    <?php } ?>
                </div>
            </div>    
        </div>
    </div>
