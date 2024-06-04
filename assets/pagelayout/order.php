<?php 
    require_once './assets/config/db.php';
    $user_id = $_SESSION['login']['user_id'];

?>
<div class="order-page">
    <div class="order-page-derectory derectory">
        <a href="index.php?page_layout=home">Trang chủ</a>
        <span> > </span>
        <span> Đơn hàng </span>
    </div>
    <div class="order-page-header">
        <div class="grid__row header-row">
            <img src="assets/img/order.png" alt="">
            <div class="order-header">Đơn Hàng Của Bạn</div>
        </div>
    </div>
    <?php 
        $sql_order = "SELECT * FROM donhang WHERE mand = $user_id";
        $query_order = mysqli_query($connect, $sql_order);
        while($row_order = mysqli_fetch_assoc($query_order)){
    ?>
    <div class="order-page-container">
        <div class="order-success-view">
            <div class="order-date">Đơn hàng ngày: <?php echo $row_order['ngaydh'] ?></div>
            <div>
                <!-- <img class="order-shipped-icon" src="assets/img/shipped.png" alt=""> -->
                <div><?php if($row_order['trangthai']=="chưa xử lý"){
                    echo "Đơn hàng đang chờ xác nhận";
                } elseif($row_order['trangthai']=="đã xử lý"){
                    echo "Đơn hàng đã được xác nhận";
                } elseif($row_order['trangthai']=="đang giao"){
                    echo "Đang giao hàng";
                } ?></div>
            </div>
        </div>
        <?php 
            $mahd = $row_order['mahd'];
            $sql_dhd = "SELECT dongdh.masach, dongdh.slmua, sach.hinhanh, sach.tensach, sach.dongia 
            FROM dongdh 
            inner join sach on sach.masach = dongdh.masach
            WHERE mahd = $mahd";
            $query_dhd = mysqli_query($connect, $sql_dhd);
            $tongtien =0;
            while($row_dhd = mysqli_fetch_assoc($query_dhd)){
                $tongtien += $row_dhd['dongia']*$row_dhd['slmua'];
        ?>
        <div class="grid__colum-12">
            <div class="grid__row order-item">
                <div class="grid__column-1-10">
                    <img class="order-item-img" src="assets/img/<?php echo $row_dhd['hinhanh'];?>" alt="">
                </div>
                <div class="grid__column-4-10 order-item-name">
                    <div><?php echo $row_dhd['tensach'];?></div>
                </div>
                <div class="grid__column-2-10 order-item-quantity">
                    <div style="font-weight: 500;">Số lượng: <?php echo $row_dhd['slmua'];?></div>
                </div>
                <div class="grid__column-2-10 order-item-quantity">
                    <div style="font-weight: 500;"><?php echo "₫".number_format($row_dhd['dongia'], 0, ",", ".") ?></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="grid__column-12">
            <div class="order-item-tongtien">
                <div>Tổng tiền đơn hàng:</div>
                <div class="price-text"><?php echo "₫".number_format($tongtien, 0, ",", ".") ?></div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>