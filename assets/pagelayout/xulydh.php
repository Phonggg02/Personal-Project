<?php 
    $id = $_GET['id'];
    require_once './assets/config/db.php';

    $sql_chitiet = "SELECT  donhang.mahd, donhang.mand, donhang.diachi, donhang.pttt, donhang.trangthai, donhang.ngaydh, nguoidung.tennd, nguoidung.sdt
    FROM donhang
    inner join nguoidung on donhang.mand = nguoidung.mand 
    WHERE mahd= $id";
    $query_chitiet = mysqli_query($connect, $sql_chitiet);
    $row_chitiet = mysqli_fetch_assoc($query_chitiet);

    if(isset($_POST['update-btn'])){
        $trangthai = $_POST['trangthai'];

        $sql_update = "UPDATE donhang SET trangthai = '$trangthai' WHERE mahd = $id";
        $query_update = mysqli_query($connect, $sql_update);
        echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
    }

    if(isset($_POST['add-btn'])){
        $ngayban = $row_chitiet['ngaydh'];
        $mangdung = $row_chitiet['mand'];
        $diachi = $row_chitiet['diachi'];
        $pttt = $row_chitiet['pttt'];

        $sql_hd = "INSERT INTO hoadon (ngayban, mand, diachi, pttt) VALUES('$ngayban', $mangdung, '$diachi', '$pttt')";
        $query_hd = mysqli_query($connect, $sql_hd);

        if($query_hd){
            $sql_mahd = "SELECT mahd, mand FROM hoadon ORDER BY mahd DESC LIMIT 1";
            $query_mahd = mysqli_query($connect, $sql_mahd);

            if($query_mahd -> num_rows >0){
                $row_mahd = mysqli_fetch_assoc($query_mahd);
                $mahd = $row_mahd['mahd'];
                $mand = $row_mahd['mand'];

                $madh = $row_chitiet['mahd'];
                $sql_get = "SELECT dongdh.slmua, dongdh.masach  
                FROM dongdh
                WHERE mahd = $madh";
                $query_get = mysqli_query($connect, $sql_get);

                while($row_get = mysqli_fetch_assoc($query_get)){
                    $masach = $row_get['masach'];
                    $sl = $row_get['slmua'];

                    $sql_donghd = "INSERT INTO donghd (mahd, masach, soluong) VALUES($mahd, $masach, $sl)";
                    $query_donghd = mysqli_query($connect, $sql_donghd);
                }
            } else { echo '<script>alert("Lấy mã hóa đơn thất bại");</script>';}

            $sql_deldongdh = "DELETE FROM dongdh WHERE mahd = $id";
            $query_deldongdh = mysqli_query($connect, $sql_deldongdh);

            $sql_delete = "DELETE FROM donhang WHERE mahd = $id";
            $query_delete = mysqli_query($connect, $sql_delete);
        }
        echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-10 adminpage-derectory">
                <div class="admminpage-derectory">
                    <a href="index.php?page_layout=managepage">Quản lý đơn hàng</a>
                    <span> > </span>
                    <span> Xử lý đơn hàng </span>
                </div>
            </div>
        </div>
        <div class="grid__row center-align">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Xác nhận thông tin đơn hàng</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <?php
                            $sql_dongdh = "SELECT dongdh.slmua, sach.masach, sach.tensach, sach.hinhanh 
                            FROM dongdh 
                            inner join sach on dongdh.masach = sach.masach
                            WHERE mahd = $id";
                            $query_dongdh = mysqli_query($connect, $sql_dongdh);
                            while($row_dongdh = mysqli_fetch_assoc($query_dongdh)){
                        ?>
                        <div class="pro-row-noboder">
                            <div class="grid__column-2-10 adminpage-list-img">
                                <img src="assets/img/<?php echo $row_dongdh['hinhanh'] ?>" alt="">
                            </div>
                            <div class="grid__column-4-10">
                                <span class="span-infor"><?php echo $row_dongdh['tensach'] ?></span>
                            </div>
                            
                            <div class="grid__column-4-10">
                                <span class="span-infor">Số lượng: <?php echo $row_dongdh['slmua'] ?></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="grid__column-10">
                            <div class="addproduct-row">
                                <span class="span-header">Thông tin khách hàng</span>
                            </div>
                        </div>
                        <div class="grid__row">
                            <div class="grid__column-5-10">
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span class="span-infor">Tên khách hàng: <?php echo $row_chitiet['tennd'] ?></span>
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span class="span-infor">Số điện thoại: <?php echo $row_chitiet['sdt'] ?></span>
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span class="span-infor">Địa chỉ giao hàng: <?php echo "<br>".$row_chitiet['diachi'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid__column-5-10">
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span class="span-infor">Ngày đặt hàng: <?php echo $row_chitiet['ngaydh'] ?></span>
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span class="span-infor">Phương thức thanh toán: <?php echo "<br>".$row_chitiet['pttt'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-10">
                            <div class="addproduct-row">
                                <span class="span-infor">
                                    Trạng thái đơn hàng:
                                </span>
                                <select class="add-select" name="trangthai" id="">
                                    <option value="chưa xử lý" <?php if ($row_chitiet['trangthai'] == 'chưa xử lý') echo 'selected'; ?>>Chưa xử lý</option>
                                    <option value="đã xử lý" <?php if ($row_chitiet['trangthai'] == 'đã xử lý') echo 'selected'; ?>>Đã xử lý</option>
                                    <option value="đang giao" <?php if ($row_chitiet['trangthai'] == 'đang giao') echo 'selected'; ?>>Đang giao</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid__column-10">
                            <div class="addproduct-row">
                                <button class="add-btn" name="update-btn" type="submit">Cập nhật</button>
                                <button class="add-btn" name="add-btn" type="submit">Đã thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>
