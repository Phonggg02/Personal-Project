<?php
    include './assets/config/db.php';
?>
<div class="manage-page-container">
        <div class="manage-menu">
            <div class="manage-page-logo">
                <img class="admin-logo" src="assets/img/logo.jpg" alt="">
                <span>Trang quản lý Admin</span>
            </div>
            <div class="manage-page-menu-header">
                <img class="userinfor-img" src="assets/img/<?php echo $_SESSION['admin']['nvien_img'] ?>" alt="">
                <div class="user-account-infor">
                    <div><?php echo $_SESSION['admin']['nvien_name'] ?></div>
                    <div><?php echo $_SESSION['admin']['nvien_email'] ?></div>
                </div>
                <a class="logout" href="./assets/pagelayout/adminlogout.php">Đăng xuất</a>
            </div>
            <div class="manage-page-menu">
                <div class="manage-page-menu-item manage-item-active">
                    <span>Quản lý đơn hàng</span>
                </div>
                <div class="manage-page-menu-item">
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
                    <span>Quản lý khách hàng</span>
                </div>
                <div class="manage-page-menu-item">
                    <span>Thống kê</span>
                </div>
            </div>
        </div>
        <div class="manage-content scrollable">
            <div class="grid__column-12">
                <div class="tab-product-view product-view-active">
                    <div class="grid__row">
                        <span class="adminpage-header">Danh sách đơn hàng</span>
                    </div>
                    <div class="grid__row adminpage-container">
                        
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-05-10 adminpage-list-id">ID</div>
                            <div class="grid__column-2-10 adminpage-list-name">Khách hàng</div>
                            <div class="grid__column-15-10 adminpage-list-quantity">Ngày đặt</div>
                            <div class="grid__column-2-10 adminpage-list-price">Điện thoại</div>
                            <div class=" grid__column-15-10 adminpage-list-img">Tổng tiền</div>
                            <div class="grid__column-15-10 adminpage-list-price">Trạng thái</div>
                            <div class="grid__column-1-10 adminpage-list-btn"></div>
                        </div>
                        <?php
                            $sql_hd = "SELECT donhang.mahd, donhang.mand, donhang.ngaydh, donhang.diachi, donhang.pttt, donhang.trangthai
                            FROM donhang";
                            $query_hd = mysqli_query($connect, $sql_hd);
                            while($row_hd = mysqli_fetch_assoc($query_hd)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-05-10 adminpage-list-id"><?php echo $row_hd['mahd'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-name"><?php 
                            $mand = $row_hd['mand'];
                            $sql_user = "SELECT * FROM nguoidung WHERE mand = $mand";
                            $query_user = mysqli_query($connect, $sql_user);
                            $row_user = mysqli_fetch_assoc($query_user);
                            echo $row_user['tennd']; ?></div>
                            <div class="grid__column-15-10 adminpage-list-quantity"><?php echo $row_hd['ngaydh'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-price"><?php echo $row_user['sdt'] ?></div>
                            <div class=" grid__column-15-10 adminpage-list-img"><?php 
                            $mahd = $row_hd['mahd'];
                            $sql_dongdh = "SELECT dongdh.slmua, sach.tensach, sach.dongia
                            FROM dongdh
                            inner join sach on dongdh.masach = sach.masach
                            WHERE mahd = $mahd";
                            $query_dongdh = mysqli_query($connect, $sql_dongdh);
                            $tongtien = 0;
                            while($row_dongdh = mysqli_fetch_assoc($query_dongdh)){ 
                                $tongtien += $row_dongdh['dongia']*$row_dongdh['slmua'];
                            }
                            echo "₫".number_format($tongtien, 0, ",", "."); ?></div>
                            <div class="grid__column-15-10 adminpage-list-price"><?php echo $row_hd['trangthai'] ?></div>
                            <div class="grid__column-1-10 adminpage-list-btn">
                                <a href="index.php?page_layout=xulydh&id=<?php echo $row_hd['mahd']; ?>" class="manage-btn">Xử lý</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-product-view">
                    <div class="grid__row">
                        <span class="adminpage-header">Danh sách sản phẩm</span>
                    </div>
                    <div class="grid__row adminpage-container">
                        <a href="index.php?page_layout=themsp" class="adminpage-btn">Thêm sản phẩm</a>
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-05-10 adminpage-list-id">ID</div>
                            <div class="grid__column-25-10 adminpage-list-name">Tên sách</div>
                            <div class="grid__column-15-10 adminpage-list-name">Tác giả</div>
                            <div class="grid__column-1-10 adminpage-list-quantity">Số lượng</div>
                            <div class=" grid__column-15-10 adminpage-list-img">Ảnh</div>
                            <div class="grid__column-15-10 adminpage-list-price">Đơn giá</div>
                            <div class="grid__column-15-10 adminpage-list-btn"></div>
                        </div>
                        <?php
                            $sql1 = "SELECT sach.masach, sach.tensach, sach.dongia, sach.hinhanh, sach.tacgia, sach.slton 
                            FROM sach";
                            $query1 = mysqli_query($connect, $sql1);
                            while($row = mysqli_fetch_assoc($query1)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-05-10 adminpage-list-id"><?php echo $row['masach'] ?></div>
                            <div class="grid__column-25-10 adminpage-list-name"><?php echo $row['tensach'] ?></div>
                            <div class="grid__column-15-10 adminpage-list-name"><?php echo $row['tacgia'] ?></div>
                            <div class="grid__column-1-10 adminpage-list-quantity"><?php echo $row['slton'] ?></div>
                            <div class=" grid__column-15-10 adminpage-list-img">
                                <img src="assets/img/<?php echo $row['hinhanh'] ?>" alt="">
                            </div>
                            <div class="grid__column-15-10 adminpage-list-price"><?php  echo number_format($row['dongia'], 0, ",", ".")."vnđ"  ?></div>
                            <div class="grid__column-15-10 adminpage-list-btn">
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
                        <a href="index.php?page_layout=themtl" class="adminpage-btn">Thêm thể loại</a>
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-1-10 adminpage-list-id">ID</div>
                            <div class="grid__column-4-10 adminpage-list-name">Tên thể loại</div>
                            <div class="grid__column-3-10 adminpage-list-quantity">Phân loại</div>
                            <div class="grid__column-2-10 adminpage-list-btn"></div>
                        </div>
                        <?php
                            $sql_theloai = "SELECT theloai.matheloai, theloai.tentheloai, theloai.maloai, phanloai.maloai, phanloai.tenloai 
                            FROM theloai
                            inner join phanloai on theloai.maloai = phanloai.maloai";
                            $query_theloai = mysqli_query($connect, $sql_theloai);
                            while($row_theloai = mysqli_fetch_assoc($query_theloai)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-1-10 adminpage-list-id"><?php echo $row_theloai['matheloai'] ?></div>
                            <div class="grid__column-4-10 adminpage-list-name"><?php echo $row_theloai['tentheloai'] ?></div>
                            <div class="grid__column-3-10 adminpage-list-quantity"><?php echo $row_theloai['tenloai'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-btn">
                                <a href="index.php?page_layout=suatl&id=<?php echo $row_theloai['matheloai'] ?>" class="manage-btn">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoatl&id=<?php echo $row_theloai['matheloai'] ?> " class="manage-btn">Xóa</a>
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
                        <a href="index.php?page_layout=thempl" class="adminpage-btn">Thêm phân loại</a>
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-2-10 adminpage-list-id">ID</div>
                            <div class="grid__column-5-10 adminpage-list-name">Tên loại</div>
                            <div class="grid__column-3-10 adminpage-list-btn"></div>
                        </div>
                        <?php
                            $sql_phanloai = "SELECT * 
                            FROM phanloai";
                            $query_phanloai = mysqli_query($connect, $sql_phanloai);
                            while($row_phanloai = mysqli_fetch_assoc($query_phanloai)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-2-10 adminpage-list-id"><?php echo $row_phanloai['maloai'] ?></div>
                            <div class="grid__column-5-10 adminpage-list-name"><?php echo $row_phanloai['tenloai'] ?></div>
                            <div class="grid__column-3-10 adminpage-list-btn">
                                <a href="index.php?page_layout=suapl&id=<?php echo $row_phanloai['maloai'] ?>" class="manage-btn">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoapl&id=<?php echo $row_phanloai['maloai'] ?> " class="manage-btn">Xóa</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-product-view">
                    <div class="grid__row">
                        <span class="adminpage-header">Danh sách hoá đơn</span>
                    </div>
                    <div class="grid__row adminpage-container">
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-1-10 adminpage-list-id">ID</div>
                            <div class="grid__column-2-10 adminpage-list-name">Khách hàng</div>
                            <div class="grid__column-2-10 adminpage-list-quantity">Ngày bán</div>
                            <div class=" grid__column-3-10 adminpage-list-img">Địa chỉ</div>
                            <div class="grid__column-2-10 adminpage-list-price">PTTT</div>
                        </div>
                        <?php
                            $sql1 = "SELECT hoadon.mahd, hoadon.ngayban, hoadon.diachi, hoadon.pttt, nguoidung.tennd 
                            FROM hoadon
                            inner join nguoidung on hoadon.mand = nguoidung.mand";
                            $query1 = mysqli_query($connect, $sql1);
                            while($row = mysqli_fetch_assoc($query1)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-1-10 adminpage-list-id"><?php echo $row['mahd'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-name"><?php echo $row['tennd'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-quantity"><?php echo $row['ngayban'] ?></div>
                            <div class=" grid__column-3-10 adminpage-list-img">
                                <?php echo $row['diachi'] ?>
                            </div>
                            <div class="grid__column-2-10 adminpage-list-price"><?php  echo $row['pttt']  ?></div>
                            
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-product-view">
                    <div class="grid__row">
                        <span class="adminpage-header">Danh sách khách hàng</span>
                    </div>
                    <div class="grid__row adminpage-container">
                        <a href="index.php?page_layout=themnd" class="adminpage-btn">Thêm khách hàng</a>
                        <div class="grid__row adminpage-list-header">
                            <div class="grid__column-05-10 adminpage-list-id">ID</div>
                            <div class="grid__column-1-10 adminpage-list-name">Ảnh</div>
                            <div class="grid__column-15-10 adminpage-list-name">Tên</div>
                            <div class="grid__column-15-10 adminpage-list-quantity">Tên đăng nhập</div>
                            <div class=" grid__column-2-10 adminpage-list-img">Email</div>
                            <div class="grid__column-1-10 adminpage-list-price">Mật khẩu</div>
                            <div class="grid__column-1-10 adminpage-list-price">Điện thoại</div>
                            <div class="grid__column-15-10 adminpage-list-btn"></div>
                        </div>
                        <?php
                            $sql_nd = "SELECT * FROM nguoidung";
                            $query_nd = mysqli_query($connect, $sql_nd);
                            while($row_nd = mysqli_fetch_assoc($query_nd)){
                        ?>
                        <div class="grid__row adminpage-list">
                            <div class="grid__column-05-10 adminpage-list-id"><?php echo $row_nd['mand'] ?></div>
                            <div class=" grid__column-1-10">
                                <img class="account-img" src="assets/img/<?php echo $row_nd['anhnd'] ?>" alt="">
                            </div>
                            <div class="grid__column-15-10 adminpage-list-name"><?php echo $row_nd['tennd'] ?></div>
                            <div class="grid__column-15-10 adminpage-list-quantity"><?php echo $row_nd['tendangnhap'] ?></div>
                            <div class="grid__column-2-10 adminpage-list-price"><?php echo $row_nd['email'] ?></div>
                            <div class="grid__column-1-10 adminpage-list-price"><?php echo $row_nd['matkhau'] ?></div>
                            <div class="grid__column-1-10 adminpage-list-price"><?php echo $row_nd['sdt'] ?></div>
                            <div class="grid__column-15-10 adminpage-list-btn">
                                <a href="index.php?page_layout=suand&id=<?php echo $row_nd['mand'] ?>" class="manage-btn">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoasp&id=<?php echo $row_nd['mand'] ?> " class="manage-btn">Xóa</a>
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
                        <div class="thongke-content">
                            <div class="first-row">
                                <div class="tong-column">
                                    <div class="tongsp-text">
                                        <?php
                                            $sql_slsp = "SELECT SUM(soluong) FROM donghd;";
                                            $query_slsp = mysqli_query($connect, $sql_slsp);
                                            $result = mysqli_fetch_row($query_slsp);
                                            $sumQuantity = $result[0];
                                        ?>
                                        <div style="font-size: 1.9rem;"><?php echo $sumQuantity ?></div>
                                        <div>Sản phẩm đã được bán</div>
                                    </div>
                                    <img src="assets/img/box.png" alt="">
                                </div>
                                <div class="tong-column">
                                    <div class="tongsp-text">
                                        <?php
                                            $sql_slkh = "SELECT DISTINCT mand FROM hoadon";
                                            $query_slkh = mysqli_query($connect, $sql_slkh);
                                        ?>
                                        <div style="font-size: 1.9rem;"><?php echo $query_slkh->num_rows; ?></div>
                                        <div>Khách đã mua hàng</div>
                                    </div>
                                    <img src="assets/img/guests.png" alt="">
                                </div>
                                <div class="tong-column">
                                    <div class="tongsp-text">
                                        <?php
                                            $sql_slhd = "SELECT mahd FROM hoadon;";
                                            $query_slhd = mysqli_query($connect, $sql_slhd);
                                        ?>
                                        <div style="font-size: 1.9rem;"><?php echo $query_slhd->num_rows; ?></div>
                                        <div>Đơn hàng đã được bán</div>
                                    </div>
                                    <img src="assets/img/order-delivery.png" alt="">
                                </div>
                            </div>
                            <div class="second-row">
                                <div class="tongquy-column">
                                    <div class="tongquy-column-header">Quý 1 năm 2023</div>
                                    <?php
                                        $sql_quy1 = "SELECT *
                                        FROM hoadon
                                        WHERE YEAR(ngayban) = 2023 AND QUARTER(ngayban) = 1";
                                        $query_quy1 = mysqli_query($connect, $sql_quy1);
                                        $row_quy1 = mysqli_fetch_assoc($query_quy1);
                                    ?>
                                    <div class="tongquy-container">
                                        <div class="tongquy-dh">
                                            <div>Đơn hàng</div>
                                            <div><?php echo $query_quy1->num_rows; ?></div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Sản phẩm đã bán</div>
                                            <div>10</div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Tổng doanh thu quý</div>
                                            <div>200000</div>
                                        </div>
                                        <div class="tongquy-dtpl">
                                            <div style="font-weight: 700;">Doanh thu theo từng phân loại sách</div>
                                            <div class="doanhthu-pl">
                                                <div>tên phân loại</div>
                                                <div>doanh thu</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tongquy-column">
                                    <div class="tongquy-column-header">Quý 2 năm 2023</div>
                                    <?php
                                        $sql_quy1 = "SELECT *
                                        FROM hoadon
                                        WHERE YEAR(ngayban) = 2023 AND QUARTER(ngayban) = 1";
                                        $query_quy1 = mysqli_query($connect, $sql_quy1);
                                        $row_quy1 = mysqli_fetch_assoc($query_quy1);
                                    ?>
                                    <div class="tongquy-container">
                                        <div class="tongquy-dh">
                                            <div>Đơn hàng</div>
                                            <div><?php echo $query_quy1->num_rows; ?></div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Sản phẩm đã bán</div>
                                            <div>10</div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Tổng doanh thu quý</div>
                                            <div>200000</div>
                                        </div>
                                        <div class="tongquy-dtpl">
                                            <div style="font-weight: 700;">Doanh thu theo từng phân loại sách</div>
                                            <div class="doanhthu-pl">
                                                <div>tên phân loại</div>
                                                <div>doanh thu</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="third-row">
                                <div class="tongquy-column">
                                    <div class="tongquy-column-header">Quý 3 năm 2023</div>
                                    <?php
                                        $sql_quy1 = "SELECT *
                                        FROM hoadon
                                        WHERE YEAR(ngayban) = 2023 AND QUARTER(ngayban) = 1";
                                        $query_quy1 = mysqli_query($connect, $sql_quy1);
                                        $row_quy1 = mysqli_fetch_assoc($query_quy1);
                                    ?>
                                    <div class="tongquy-container">
                                        <div class="tongquy-dh">
                                            <div>Đơn hàng</div>
                                            <div><?php echo $query_quy1->num_rows; ?></div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Sản phẩm đã bán</div>
                                            <div>10</div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Tổng doanh thu quý</div>
                                            <div>200000</div>
                                        </div>
                                        <div class="tongquy-dtpl">
                                            <div style="font-weight: 700;">Doanh thu theo từng phân loại sách</div>
                                            <div class="doanhthu-pl">
                                                <div>tên phân loại</div>
                                                <div>doanh thu</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tongquy-column">
                                    <div class="tongquy-column-header">Quý 4 năm 2023</div>
                                    <?php
                                        $sql_quy1 = "SELECT *
                                        FROM hoadon
                                        WHERE YEAR(ngayban) = 2023 AND QUARTER(ngayban) = 1";
                                        $query_quy1 = mysqli_query($connect, $sql_quy1);
                                        $row_quy1 = mysqli_fetch_assoc($query_quy1);
                                    ?>
                                    <div class="tongquy-container">
                                        <div class="tongquy-dh">
                                            <div>Đơn hàng</div>
                                            <div><?php echo $query_quy1->num_rows; ?></div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Sản phẩm đã bán</div>
                                            <div>10</div>
                                        </div>
                                        <div class="tongquy-sp">
                                            <div>Tổng doanh thu quý</div>
                                            <div>200000</div>
                                        </div>
                                        <div class="tongquy-dtpl">
                                            <div style="font-weight: 700;">Doanh thu theo từng phân loại sách</div>
                                            <div class="doanhthu-pl">
                                                <div>tên phân loại</div>
                                                <div>doanh thu</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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