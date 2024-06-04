<?php 
    include './assets/config/db.php';
?>
<div class="grid">
    <div class="grid__row">
        <div class="grid__column-10 adminpage-derectory">
            <div class="admminpage-derectory">
                <a href="index.php?page_layout=home">Trang chủ</a>
                <span> > </span>
                <span> Quản lý admin </span>
            </div>
        </div>
        <div class="grid__row mane-page-container">
            <div class="grid__row">
                <div class="grid__column-3">
                    <div class="grid__row adminpage-menu-view">
                        <div class="manage-page-menu-header">
                            <span>Menu quản lý admin</span>
                        </div>
                        <div class="manage-page-menu">
                            <div class="manage-page-menu-item manage-item-active">
                                <span>Quản lý sản phẩm</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Quản lý thể loại</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Quản lý phân loại</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Quản lý hóa đơn</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Quản lý đơn hàng</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Quản lý khách hàng</span>
                            </div>
                            <div class="manage-page-menu-item">
                                <span>Thống kê</span>
                            </div>
                        </div>
                    </div>
                </div>
                div
                <div class="grid__column-9 adminpage-product-view">
                    <div class="tab-product-view product-view-active">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách sản phẩm</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-2-9 adminpage-list-name">Tên sách</div>
                                <div class="grid__column-1-9 adminpage-list-quantity">Số lượng</div>
                                <div class=" grid__column-2-9 adminpage-list-img">Ảnh</div>
                                <div class="grid__column-1-9 adminpage-list-price">Đơn giá</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.slton 
                                FROM sach";
                                $query1 = mysqli_query($connect, $sql1);
                                while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row['masach'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                                <div class="grid__column-1-9 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                                <div class=" grid__column-2-9 adminpage-list-img">
                                    <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                                </div>
                                <div class="grid__column-1-9 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách thể loại</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm thể loại</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-3-9 adminpage-list-name">Tên thể loại</div>
                                <div class="grid__column-3-9 adminpage-list-quantity">Phân loại</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql_theloai = "SELECT theloai.matheloai, theloai.tentheloai, theloai.maloai, phanloai.maloai, phanloai.tenloai 
                                FROM theloai
                                inner join phanloai on theloai.maloai = phanloai.maloai";
                                $query_theloai = mysqli_query($connect, $sql_theloai);
                                while($row_theloai = mysqli_fetch_assoc($query_theloai)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row_theloai['matheloai'] ?></div>
                                <div class="grid__column-3-9 adminpage-list-name"><?php echo $row_theloai['tentheloai'] ?></div>
                                <div class="grid__column-3-9 adminpage-list-quantity"><?php echo $row_theloai['tenloai'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách phân loại</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm phân loại</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-2-9 adminpage-list-id">ID</div>
                                <div class="grid__column-5-9 adminpage-list-name">Tên loại</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql_phanloai = "SELECT * 
                                FROM phanloai";
                                $query_phanloai = mysqli_query($connect, $sql_phanloai);
                                while($row_phanloai = mysqli_fetch_assoc($query_phanloai)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-2-9 adminpage-list-id"><?php echo $row_phanloai['maloai'] ?></div>
                                <div class="grid__column-5-9 adminpage-list-name"><?php echo $row_phanloai['tenloai'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách hóa đơn</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-2-9 adminpage-list-name">Tên sách</div>
                                <div class="grid__column-1-9 adminpage-list-quantity">Số lượng</div>
                                <div class=" grid__column-2-9 adminpage-list-img">Ảnh</div>
                                <div class="grid__column-1-9 adminpage-list-price">Đơn giá</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.slton 
                                FROM sach";
                                $query1 = mysqli_query($connect, $sql1);
                                while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row['masach'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                                <div class="grid__column-1-9 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                                <div class=" grid__column-2-9 adminpage-list-img">
                                    <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                                </div>
                                <div class="grid__column-1-9 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách đơn hàng</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-2-9 adminpage-list-name">Tên sách</div>
                                <div class="grid__column-1-9 adminpage-list-quantity">Số lượng</div>
                                <div class=" grid__column-2-9 adminpage-list-img">Ảnh</div>
                                <div class="grid__column-1-9 adminpage-list-price">Đơn giá</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.slton 
                                FROM sach";
                                $query1 = mysqli_query($connect, $sql1);
                                while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row['masach'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                                <div class="grid__column-1-9 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                                <div class=" grid__column-2-9 adminpage-list-img">
                                    <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                                </div>
                                <div class="grid__column-1-9 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Danh sách khách hàng</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-2-9 adminpage-list-name">Tên sách</div>
                                <div class="grid__column-1-9 adminpage-list-quantity">Số lượng</div>
                                <div class=" grid__column-2-9 adminpage-list-img">Ảnh</div>
                                <div class="grid__column-1-9 adminpage-list-price">Đơn giá</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.slton 
                                FROM sach";
                                $query1 = mysqli_query($connect, $sql1);
                                while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row['masach'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                                <div class="grid__column-1-9 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                                <div class=" grid__column-2-9 adminpage-list-img">
                                    <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                                </div>
                                <div class="grid__column-1-9 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-product-view">
                        <div class="grid__row">
                            <span class="adminpage-header">Thống kê</span>
                        </div>
                        <div class="grid__row adminpage-container">
                            <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                            <div class="grid__row adminpage-list-header">
                                <div class="grid__column-1-9 adminpage-list-id">ID</div>
                                <div class="grid__column-2-9 adminpage-list-name">Tên sách</div>
                                <div class="grid__column-1-9 adminpage-list-quantity">Số lượng</div>
                                <div class=" grid__column-2-9 adminpage-list-img">Ảnh</div>
                                <div class="grid__column-1-9 adminpage-list-price">Đơn giá</div>
                                <div class="grid__column-2-9 adminpage-list-btn"></div>
                            </div>
                            <?php
                                $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.slton 
                                FROM sach";
                                $query1 = mysqli_query($connect, $sql1);
                                while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <div class="grid__row adminpage-list">
                                <div class="grid__column-1-9 adminpage-list-id"><?php echo $row['masach'] ?></div>
                                <div class="grid__column-2-9 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                                <div class="grid__column-1-9 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                                <div class=" grid__column-2-9 adminpage-list-img">
                                    <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                                </div>
                                <div class="grid__column-1-9 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                                <div class="grid__column-2-9 adminpage-list-btn">
                                    <a href="index.php?page_layout=suasp&id=<?php echo $row['masach']; ?>" class="manage-btn">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row['masach']; ?> " class="manage-btn">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const $ = document.querySelector.bind(document)
                const $$ = document.querySelectorAll.bind(document)

                const tabs = $$('.manage-page-menu-item')
                const panes = $$('.tab-product-view')

                tabs.forEach((tab, index) => {
                    const pane = panes[index]
                    tab.onclick = function(){
                        $('.manage-page-menu-item.manage-item-active').classList.remove('manage-item-active')
                        $('.tab-product-view.product-view-active').classList.remove('product-view-active')

                        this.classList.add('manage-item-active')
                        pane.classList.add('product-view-active')
                    }
                });
            </script>
        </div>
    </div>
</div>