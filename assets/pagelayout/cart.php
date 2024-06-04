<?php 
    require_once './assets/config/db.php';
    $user_id = $_SESSION['login']['user_id'];

    
    $sql_user = "SELECT * FROM nguoidung WHERE mand = $user_id";
    $query_user = mysqli_query($connect, $sql_user);
    $row_user = mysqli_fetch_assoc($query_user);

    $sql_address = "SELECT * FROM donhang WHERE mand = $user_id";
    $query_address = mysqli_query($connect, $sql_address);
    $row_address = mysqli_fetch_assoc($query_address);

    $sql_cart = "SELECT giohang.madh, giohang.slmua, sach.hinhanh, sach.tensach, sach.dongia 
    FROM giohang 
    inner join sach on giohang.masach = sach.masach
    WHERE mand = $user_id";
    $query_cart = mysqli_query($connect, $sql_cart);
?>
<form action="" method="post">
<div class="cart-page-container">
    <div class="cart-page-derectory derectory">
        <a href="index.php?page_layout=home">Trang chủ</a>
        <span> > </span>
        <span> Giỏ hàng </span>
    </div>
    <div class="product-row">
        <div class="grid__column-12 cart-empty-view">
            <div class="cart-empty">
                <img src="assets/img/empty-cart.png" alt="">
                <div>Chưa có sản phẩm nào trong giỏ hàng</div>
            </div>
            <div class="cart-pro">
                <div class="pro-row header-row">
                    <div class="grid__column-2-10 adminpage-list-img">
                        <span>Sản phẩm</span>
                    </div>
                    <div class="grid__column-3-10">
                    </div>
                    <div class="grid__column-2-10">
                        <span>Đơn giá</span>
                    </div>
                    <div class="grid__column-2-10">
                        <span>Số lượng</span>
                    </div>
                    <div class="grid__column-2-10">
                        <span>Số tiền</span>
                    </div>
                    <div class="grid__column-1-10">
                    </div>
                </div>
                <?php
                    $tongtien = 0;
                    while($row_cart = mysqli_fetch_assoc($query_cart)){ 
                        $sotien = $row_cart['dongia']*$row_cart['slmua'];
                        $tongtien += $sotien;
                ?>
                <div class="pro-row">
                    <div class="grid__column-2-10 adminpage-list-img">
                        <img src="assets/img/<?php echo $row_cart['hinhanh'] ?>" alt="">
                    </div>
                    <div class="grid__column-3-10">
                        <span><?php echo $row_cart['tensach'] ?></span>
                    </div>
                    <div class="grid__column-2-10">
                        <span class="price-text"><?php  echo "₫".number_format($row_cart['dongia'], 0, ",", ".")  ?></span>
                    </div>
                    <div class="grid__column-2-10">
                        <span><?php echo $row_cart['slmua'] ?></span>
                    </div>
                    <div class="grid__column-2-10">
                        <span class="price-text"><?php echo "₫".number_format($row_cart['dongia']*$row_cart['slmua'], 0, ",", ".") ?></span>
                    </div>
                    <div class="grid__column-1-10">
                        <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="index.php?page_layout=xoacart&id=<?php echo $row_cart['madh']; ?> " class="manage-btn">Xóa</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php if($query_cart -> num_rows >0){ ?>
                <script>
                    document.querySelector(".cart-empty").style.display = "none";
                </script>
            <?php    
            } else { ?>
                <script>
                    document.querySelector(".cart-pro").style.display = "none";
                </script> 
            <?php    
                }
            ?>
        </div>
    </div>
    <div class="pay-row">
        <div class="transport-infor">
            <div class="transport-infor-header">
                <img src="assets/img/place.png" alt="">
                Thông tin nhận hàng
            </div>
            <div class="transport-infor-container">
                <div class="infor-name-phonenum">
                    <div class="infor-name">
                        <!-- <div>Tên người nhận</div> -->
                        <input type="text" name="tenngnhan" placeholder="Nhập tên người nhận hàng" value="<?php echo $row_user['tennd'] ?>">
                    </div>
                    <div class="infor-phone-number">
                        <!-- <div>Số điện thoại</div> -->
                        <input type="text" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo $row_user['sdt'] ?>">
                        
                    </div>
                </div>
                <div class="infor-address">
                    <!-- <div>Địa chỉ nhận hàng</div> -->
                    <input type="text" name="diachi" placeholder="Nhập địa chỉ cụ thể của bạn" value="<?php echo isset($row_address['diachi']) ? $row_address['diachi'] : ''; ?>">
                </div>
            </div>
            <div style="color: red; font-size: 1.3rem" class="margin-row align-center">
                <?Php if(isset($error) && $error!=""){
                    echo $error;
                } ?>
            </div>
       </div>
       <div class="pay-price">
            <div class="grid__column-8-10 header-text">
                Phương thức thanh toán:
            </div>
            <div class="grid__column-4-10 price-text">
                <select name="pttt" class="payment-method" id="">
                    <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    <option value="Thẻ tín dụng/thẻ ghi nợ">Thẻ tín dụng/thẻ ghi nợ</option>
                </select>
            </div>
       </div>
       <div class="pay-price">
            <div class="grid__column-8-10 header-text">
                Tổng thanh toán:
            </div>
            <div class="grid__column-4-10 price-text">
                <?php echo "₫".number_format($tongtien, 0, ",", ".") ?>
            </div>
       </div>
       <div class="order-row">
            <div class="grid__column-8-10 header-text">
                Đồng ý đặt hàng đồng nghĩa với việc bạn đồng ý với Điều khoản của chúng tôi
            </div>
            <div class="grid__column-4-10 price-text">
                <button name="order-btn" type="submit">Đặt hàng</button>
            </div>
       </div>
    </div>
</div>
<?php
     if(isset($_POST['order-btn'])){
        $ngayban = date('Y/m/d');
        $tenngnhan = $_POST['tenngnhan'];
        $diachi = $_POST['diachi'];
        $pttt = $_POST['pttt'];

        $phoneNumber = preg_replace('/[^0-9]/', '', $_POST['sdt']);

        if (strlen($phoneNumber) === 10) {
            $sdt = $_POST['sdt'];
                $sql_themhd = "INSERT INTO donhang (ngaydh, mand, diachi, pttt) VALUES('$ngayban', $user_id, '$diachi', '$pttt')";
                $query_themhd = mysqli_query($connect, $sql_themhd);

                if($query_themhd){
                    $sql_mahd = "SELECT mahd FROM donhang ORDER BY mahd DESC LIMIT 1";
                    $query_mahd = mysqli_query($connect, $sql_mahd);

                    if($query_mahd -> num_rows >0){
                        $row_mahd = mysqli_fetch_assoc($query_mahd);
                        $mahd = $row_mahd['mahd'];

                        $sql_get = "SELECT giohang.slmua, giohang.masach  
                        FROM giohang
                        WHERE mand = $user_id";
                        $query_get = mysqli_query($connect, $sql_get);

                        while($row_get = mysqli_fetch_assoc($query_get)){
                            $masach = $row_get['masach'];
                            $sl = $row_get['slmua'];

                            $sql_dongdh = "INSERT INTO dongdh (mahd, masach, slmua) VALUES($mahd, $masach, $sl)";
                            $query_dongdh = mysqli_query($connect, $sql_dongdh);

                            echo '<script>alert("Đặt hàng thành công");</script>';
                            echo "<script>window.location.href='index.php?page_layout=order'</script>";
                        }
                    } else { echo '<script>alert("Lấy mã hóa đơn thất bại");</script>';}
                }
        } else {
                echo '<script>alert("Số điện thoại không hợp lệ");</script>';
            }
    }
?>
</form>