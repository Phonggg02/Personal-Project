<?php 
    session_start();
    require_once './assets/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ án Web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=REM:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <form action="" method="post">
        <!-- Phần đầu trang -->
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
    
                    <!-- Logo -->
                    <div class="header-logo">
                        <img class="header-logoimg" src="./assets/img/logo.jpg" alt="">
                    </div>
                    <!-- Ô tìm kiếm -->
                    <div class="search-view">
                        <div class="header-searchview">
                            <div class="header-inputwrap">
                                <input type="text" class="header-input" placeholder="Nhập để tìm sản phẩm" name="search-input">
                                <div class="header-history">
                                    <h3 class="history-header">Lịch sử tìm kiếm</h3>
                                    <ul class="history-list">
                                        <li class="history-item">
                                            <a href="">Tiểu thuyết</a>
                                        </li>
                                        <li class="history-item">
                                            <a href="">Giáo trình</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Button tìm kiếm -->
                            <button class="header-button" type="submit" name="search-btn">
                                <img class="search-icon" src="./assets/img/search_icon.png" alt="">
                            </button>
                        </div>
                    </div>
                    
                    <ul class="header__navbar-list">
    
                        <!-- Thông báo -->
                        <li class="header__navbar-item header__navbar-item--noti">
                            <a href="" class="header__navbar-link">
                                <img class="header__navbar-icon" src="./assets/img/bell_icon.png" alt="">
                                <span class="item-name">Thông báo</span>
                            </a> 
                            <div class="header__notifi">
                                <header class="header__notifi-header">
                                    <h3>Thông Báo Mới</h3>
                                </header>
                                <ul class="header__notifi-list">
                                    <li class="header__notifi-item">
                                        <a href="" class="header__notifi-link">
                                            <img src="./assets/img/anh.jpg" alt="" class="header__notifi-img">
                                            <div class="header__notifi-infor">
                                                <span class="header__notifi-name">Thông báo thông báo thông báo thông báo thông báo thông báo</span>
                                                <span class="header__notifi-desc"> Chi tiết thông báo chi tiết thông báo chi tiết thông báo</span>
                                            </div>
                                        </a>
                                    </li>
    
                                    <li class="header__notifi-item">
                                        <a href="" class="header__notifi-link">
                                            <img src="./assets/img/anh.jpg" alt="" class="header__notifi-img">
                                            <div class="header__notifi-infor">
                                                <span class="header__notifi-name">Thông báo thông báo thông báo thông báo thông báo thông báo</span>
                                                <span class="header__notifi-desc"> Chi tiết thông báo chi tiết thông báo chi tiết thông báo</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notifi-footer">
                                    <a href="" class="header__notifi-footer--btn">
                                        Xem tất cả
                                    </a>
                                </footer>
                            </div>
                        </li>
    
                        <!-- Giỏ hàng -->
                        <li class="header__navbar-item cart-item">
                            <a href="index.php?page_layout=cart" class="header__navbar-link">
                                <div class="header-cartwrap">
                                <img class="cart-logo" src="./assets/img/cart.png" alt="">
                                <span class="item-name">Giỏ hàng</span>
                            </a>
                        </li>
    
                        <!-- Trợ giúp -->
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-link">
                                <img class="header__navbar-icon" src="./assets/img/help_icon.png" alt="">
                                <span class="item-name">Trợ giúp</span>
                            </a>
                        </li>
    
                        <!-- Tài khoản -->
                        <?php 
                            if (isset($_SESSION['login']['user_email']) && $_SESSION['login']['user_email'] !=''){
                        ?>
                        <!-- Tài khoản đã đăng nhập -->
                        <li class="header__navbar-item header__navbar-userinfor">
                            <a href="" class="userinfor-link">
                                <img class="userinfor-img" src="assets/img/<?php echo $_SESSION['login']['user_img'] ?>" alt="">
                            </a>
                            <ul class="userinfor-list">
                                <li class="user-account-item">
                                    <a class="user-account" href="">
                                        <img class="user-account-img" src="assets/img/<?php echo $_SESSION['login']['user_img'] ?>" alt="">
                                        <div class="user-account-infor">
                                            <div><?php echo $_SESSION['login']['user_name'] ?></div>
                                            <div><?php echo $_SESSION['login']['user_email'] ?></div>
                                        </div>
                                    </a>
                                </li>
                                <div class="userinfor-list-line"></div>
                                <li class="userinfor-list-item">
                                    <a href="">Tài khoản của tôi</a>
                                </li>
                                <li class="userinfor-list-item">
                                    <a href="index.php?page_layout=order">Đơn hàng của tôi</a>
                                </li>
                                <li class="userinfor-list-item">
                                    <a href="./assets/pagelayout/logout.php">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        <script>
                            document.querySelector(".not-yet-signin").style.display = "none";
                        </script>
                        <?php } else { ?>
                        <!-- Tài khoản chưa đăng nhập -->
                        <li class="header__navbar-item not-yet-signin">
                            <a href="index.php?page_layout=login" class="header__navbar-link">
                                <img class="header__navbar-icon" src="./assets/img/user-icon.png" alt="">
                                <span class="item-name">Tài khoản</span>
                            </a>
                        </li>
                        <script>
                            document.querySelector(".header__navbar-userinfor").style.display = "none";
                        </script>
                        <?php } ?>
                    </ul>
                </nav>                  
            </div>
        </header>
        <div class="container">
            <?php
                if(isset($_GET['page_layout'])){
                    switch ($_GET['page_layout']){
                        case 'home':
                            require_once './assets/pagelayout/mainpage.php';
                            break;
                        case 'search':
                            require_once './assets/pagelayout/searchpage.php';
                            break;
                        case 'login':
                            require_once './assets/pagelayout/login.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'adminlogin':
                            require_once './assets/pagelayout/adminlogin.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'register':
                            require_once './assets/pagelayout/register.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'category':
                            require_once './assets/pagelayout/category.php';
                            break;
                        case 'chitietsp':
                            require_once './assets/pagelayout/chitietsp.php';
                            break;
                        case 'cart':
                            require_once './assets/pagelayout/cart.php';
                            break;
                        case 'order':
                            require_once './assets/pagelayout/order.php';
                            break;
                        case 'managepage':
                            require_once './assets/pagelayout/managepage.php';
                            break;
                        case 'xulydh':
                            require_once './assets/pagelayout/xulydh.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'quanlysp':
                            require_once './assets/pagelayout/quanlysp.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'themsp':
                            require_once './assets/pagelayout/themsp.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'suasp':
                            require_once './assets/pagelayout/suasp.php'; ?>
                            <script>
                                 document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;    
                        case 'xoasp':
                            require_once './assets/pagelayout/xoasp.php';
                            break;
                        case 'themtl':
                            require_once './assets/pagelayout/themtheloai.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'suatl':
                            require_once './assets/pagelayout/suatheloai.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'xoatl':
                            require_once './assets/pagelayout/xoatheloai.php';
                            break;
                        case 'thempl':
                            require_once './assets/pagelayout/themphanloai.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'suapl':
                            require_once './assets/pagelayout/suaphanloai.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'xoapl':
                            require_once './assets/pagelayout/xoaphanloai.php';
                            break;
                        case 'themnd':
                            require_once './assets/pagelayout/themnd.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break;
                        case 'suand':
                            require_once './assets/pagelayout/suand.php'; ?>
                            <script>
                                    document.querySelector(".search-view").style.display = "none";
                            </script>
                            <?php
                            break; 
                        case 'xoacart':
                            require_once './assets/pagelayout/xoacart.php';
                            break;
                        default:
                            require_once './assets/pagelayout/mainpage.php';
                            break;
                    }
                } else { require_once './assets/pagelayout/mainpage.php'; }
            ?>
        </div>        
        <!-- Phần cuối trang -->
        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-4 grid__column-4-footer">
                        <img class="footer-logo" src="./assets/img/logo.jpg" alt="">
                        <p class="text-column-4">Thegioisach.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống trên toàn quốc.</p>
                    </div>
                    <div class="grid__column-8 footer-column-8">
                        <div class="grid__column-3-8 grid__column-3-8-footer">
                            <h2>Dịch vụ</h2>
                            <span>Điều khoản sử dụng</span>
                            <span>Chính sách bảo mật thông tin cá nhân</span>
                            <span>Chính sách bảo mật thanh toán</span>
                            <span>Giới thiệu về Thegioisach</span>
                            <span>Hệ thống trung tâm và nhà sách</span>
                        </div>
                        <div class="grid__column-3-8 grid__column-3-8-footer">
                            <h2>Hỗ Trợ</h2>
                            <span>Chính sách đổi - trả - hoàn tiền</span>
                            <span>Chính sách bồi hoàn - bảo hành</span>
                            <span>Chính sách vận chuyển</span>
                            <span>Chính sách khách sỉ</span>
                            <span>Phương thức thanh toán và xuất hóa đơn</span>
                        </div>
                        <div class="grid__column-3-8 grid__column-3-8-footer">
                            <h2>Tài khoản của tôi</h2>
                            <span>Đăng nhập/Tạo mới tài khoản</span>
                            <span>Thay đổi địa chỉ khách hàng</span>
                            <span>Chi tiết tài khoản</span>
                            <span>Lịch sử mua hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </form>
    <?php
        if(isset($_POST['search-btn'])){
            $tt = $_POST['search-input'];
            echo "<script>window.location.href='index.php?page_layout=search&tt=$tt'</script>";
        }
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']){
                case 'managepage': ?>
                    <script>
                         document.querySelector(".header").style.display = "none";
                         document.querySelector(".footer").style.display = "none";
                         document.querySelector(".container").style.paddingBottom = 0;
                    </script>
                    <?php
                    break;
                }
            }
    ?>
</body>
</html>