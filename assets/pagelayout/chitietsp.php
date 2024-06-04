<?php 
    require_once './assets/config/db.php';
    $id = $_GET['id'];

    $sql1 = "SELECT sach.masach, sach.tensach, sach.tacgia, sach.matheloai, sach.maloai, sach.dongia, sach.hinhanh, sach.mota, sach.sotrang, theloai.matheloai, theloai.tentheloai, phanloai.maloai, phanloai.tenloai 
    FROM sach 
    inner join theloai on sach.matheloai = theloai.matheloai 
    inner join phanloai on sach.maloai = phanloai.maloai
    WHERE sach.masach = $id";
    $query1 = mysqli_query($connect, $sql1);
    $row = mysqli_fetch_assoc($query1);

    if(isset($_POST['add-cart'])){
        $masach = $row['masach'];
        $soluong = $_POST['pro_sl'];
        $mand = $_SESSION['login']['user_id'];
        
        $sql_dh = "INSERT INTO giohang (mand, masach, slmua) VALUES($mand, $masach, $soluong)";
        $query_dh = mysqli_query($connect, $sql_dh);

        if($query_dh){
            echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
            echo "<script>window.location.href='index.php?page_layout=cart'</script>";
        }
    }
?>
<form action="" method="post">
    <div class="grid grid-product-detials"> 
        <div class="product-details-row">
            <div class="grid__column-10 derectory-row">
                <div class="derectory">
                    <a href="index.php?page_layout=home">Trang chủ</a>
                    <span> > </span>
                    <a href=""> <?php echo $row['tenloai']; ?> </a>
                    <span> > </span>
                    <a href=""> <?php echo $row['tentheloai']; ?> </a>
                </div>
            </div>
            <div class="grid__column-10 product-details">
                <div class="grid__row">
                    <div class="grid__column-4-10 margin-row">
                        <img class="product-details-img" src="./assets/img/<?php echo $row['hinhanh']; ?>" alt="">
                    </div>
                    <div class="grid__column-6-10 margin-row details">
                        <span class="product-details-name"><?php echo $row['tensach']; ?></span>
                        <span class="product-details-author">Tác giả: <?php echo $row['tacgia']; ?></span>
                        <span class="product-details-genre">Thể loại: <?php echo $row['tentheloai']; ?></span>
                        <div class="product-details-price">
                            <span class="details-sale-price">
                                86.400đ
                            </span>
                            <div class="details-price-view">
                                <span class="details-price">
                                    <?php  echo "₫".number_format($row['dongia'], 0, ",", ".")  ?>
                                </span>
                                <div class="sale-sticker">
                                    <h2>- 20%</h2>
                                </div>
                            </div>
                        </div>
                        <div class="transport">
                            <div class="transport-header">Giao hàng</div>
                            <img src="./assets/img/shipped.png" alt="" class="transport-icon">
                            <span class="transport-text">Giao hàng tới:</span>
                        </div>
                        <div class="policy">
                            <div class="policy-header">Chính sách đổi trả</div>
                            <span class="policy-text">Đổi trả sản phẩm trong 30 ngày</span>
                            <a href="" class="policy-see-more">Xem thêm</a>
                        </div>
                        <div class="quantity">
                            <div class="quantity-header">Số lượng</div>
                            <div class="quantity-input">
                                <button id="decrement5" class="decrement5" onclick="stepper(this)"> -5 </button>
                                <button id="decrement" class="decrement" onclick="stepper(this)"> - </button>
                                <input type="number" class="number" name="pro_sl" value="1" min="1" max="99" step="1" id="my-input">
                                <button id="increment" class="increment" onclick="stepper(this)"> + </button>
                                <button id="increment5" class="increment5" onclick="stepper(this)"> +5 </button>
                            </div>
                        </div>
                        <div class="order-btn-view">
                            <input type="hidden" name="pro_name" value="<?php echo $row['tensach']; ?>">
                            <input type="hidden" name="pro_img" value="<?php echo $row['hinhanh']; ?>">
                            <input type="hidden" name="pro_price" value="<?php echo $row['dongia']; ?>">
                            <button id="add-cart" class="add-cart-btn" name="add-cart" type="submit">
                                <img src="./assets/img/cart.png" alt="">
                                Thêm vào giỏ hàng
                            </button>
                            <button class="order-btn" name="order" type="submit">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid__column-10 product-details">
                <div class="grid__row second-div-details">
                    <div class="header-second-div-details">Thông tin sản phẩm</div>
                    <div class="second-div-details-name">
                        <span>Tên sách: </span>
                        <div><?php echo $row['tensach']; ?></div>
                    </div>
                    <div class="second-div-details-author">
                        <span>Tác giả:</span>
                        <div><?php echo $row['tacgia']; ?></div>
                    </div>
                    <div class="second-div-details-genre">
                        <span>Thể loại: </span>
                        <div><?php echo $row['tentheloai']; ?></div>
                    </div>
                    <div class="second-div-details-pages">
                        <span>Số trang: </span>
                        <div><?php echo $row['sotrang']; ?></div>
                    </div>
                    <div class="second-div-details-description">
                        <div>Mô tả</div>
                        <p><?php echo $row['mota']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-notification" id="notification">Thêm vào giỏ hàng thành công!</div>
    </div>
</form>

<script src="./assets/javascript.js" ></script>