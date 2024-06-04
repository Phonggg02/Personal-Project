<?php 
    $tt = $_GET['tt'];
    require_once './assets/config/db.php';
?>
    <!-- Phần thân hiển thị nội dung -->
    <div class="grid grid-main-page">
        <div class="grid__row">
            <div class="grid__column-10 search-derectory-row">
                <div class="search-page-derectory derectory">
                    <a href="index.php?page_layout=home">Trang chủ</a>
                    <span> > </span>
                    <span> Tìm kiếm </span>
                </div>
            </div>
        </div>
        <?php
            $sql1 = "SELECT sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
            FROM sach 
            inner join theloai on sach.matheloai = theloai.matheloai 
            inner join phanloai on sach.maloai = phanloai.maloai
            WHERE sach.tensach LIKE '%$tt%'";
            $query1 = mysqli_query($connect, $sql1);
        ?>
        <div class="grid__row empty-search-row">
            <div class="grid__column-10 bacground-row">
                <div class="Saleitem-header">
                    <div>
                        <h2>Không có kết quả tìm kiếm nào cho '<?php echo $tt ?>'</h2>
                    </div>
                </div>
                <div class="empty-search-view">
                    <img class="empty-search-icon" src="assets/img/empty-search.png" alt="">
                </div>
            </div>
        </div>
        <div class="grid__row search-row">
            <div class="grid__column-10 bacground-row">
                <div class="Saleitem-header">
                    <div>
                        <h2>Danh sách tìm kiếm cho '<?php echo $tt ?>' (kết quả có <?php echo ($query1 -> num_rows) ?> sản phẩm)</h2>
                    </div>
                </div>
                <div class="grid__row">
                    <?php while($row = mysqli_fetch_assoc($query1)){ ?>
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
        <?php if($query1 -> num_rows > 0){ ?>
                <script>
                    document.querySelector(".empty-search-row").style.display = "none";
                </script>
            <?php } else { ?>
                <script>
                    document.querySelector(".search-row").style.display = "none";
                </script>
            <?php } ?>
    </div>
