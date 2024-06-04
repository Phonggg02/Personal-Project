<?php 
    require_once './assets/config/db.php';
    if(isset($_POST['login-btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql_log = "SELECT * FROM nguoidung WHERE email = '$email' and matkhau = '$pass'";
        $query_log = mysqli_query($connect, $sql_log);
        if($query_log){
            $row_user = mysqli_fetch_assoc($query_log);
            $_SESSION['login']['user_email'] = $row_user['email'];
            $_SESSION['login']['user_img'] = $row_user['anhnd'];
            $_SESSION['login']['user_name'] = $row_user['tennd'];
            $_SESSION['login']['user_id'] = $row_user['mand']; 
            
            echo '<script>
                var successAlert = document.createElement("div");
                successAlert.textContent = "Đăng nhập thành công";
                successAlert.classList.add("custom-alert", "success-alert");
                document.body.appendChild(successAlert);

                setTimeout(function() {
                    successAlert.style.opacity = "0";
                    successAlert.addEventListener("transitionend", function() {
                        successAlert.remove();
                        window.location.href = "index.php?page_layout=home";
                    });
                }, 3000);
            </script>';
        } else {
            echo '<script>
                var errorAlert = document.createElement("div");
                errorAlert.textContent = "Đăng nhập thất bại";
                errorAlert.classList.add("custom-alert", "error-alert");
                document.body.appendChild(errorAlert);

                setTimeout(function() {
                    errorAlert.style.opacity = "0";
                    errorAlert.addEventListener("transitionend", function() {
                        errorAlert.remove();
                        window.location.href = "index.php?page_layout=login";
                    });
                }, 1000);
            </script>'; }
    }
?>
<form action="" method="post">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-10 bacground-row login-form">
                <div class="grid__row">
                    <div class="grid__column-6-10 align-center">
                        <img class="login-form-logo" src="assets/img/logo.jpg" alt="">
                    </div>
                    <div class="grid__column-4-10 border-row">
                        <div class="grid__row margin-row">
                            <div class="login-form-header">
                                <span>Đăng nhập</span>
                            </div>
                        </div>
                        <div class="grid__row admin-log-row">
                            <a href="index.php?page_layout=adminlogin">Đăng nhập bằng quyền admin</a>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="email" class="log-form-input" placeholder="Địa chỉ email của bạn">
                        </div>
                        <div class="grid__row margin-row input-wrapper">
                            <input type="password" name="pass" class="log-form-input" placeholder="Mật khẩu" id="password">
                            <img src="assets/img/hidden.png" alt="" id="eyeicon">
                        </div>
                        <script>
                            let password = document.getElementById('password');
                            let eyeicon = document.getElementById('eyeicon');

                            eyeicon.onclick = function(){
                                if(password.type == "password"){
                                    password.type = "text"
                                    eyeicon.src ="assets/img/eye.png"
                                    eyeicon.style.filter = 'invert(53%) sepia(64%) saturate(2816%) hue-rotate(163deg) brightness(107%) contrast(102%)';
                                } else {
                                    password.type = "password"
                                    eyeicon.src ="assets/img/hidden.png"
                                    eyeicon.style.filter = 'none';
                                }
                            }
                        </script>
                        <div class="grid__row margin-row right-align">
                            <a href="" class="forget-pas-link">Quên mật khẩu</a>
                        </div>
                        <div class="grid__row loginform-row-text">
                            <div class="line"></div>
                            <span class="">Hoặc</span>
                            <div class="line"></div>
                        </div>
                        <div class="grid__row loginform-row-text">
                            <button class="fb-btn">
                                <img class="icon-logo" src="assets/img/facebook.png" alt="">
                                <span>Facebook</span>
                            </button>
                            <button class="fb-btn">
                                <img class="icon-logo" src="assets/img/google.png" alt="">
                                <span>Google</span>
                            </button>
                        </div>
                        <div class="grid__row margin-row">
                            <button class="log-btn" name="login-btn" type="submit" id="log-btn">Đăng nhập</button>
                        </div>
                        <div class="grid__row margin-row align-center">
                            <span class="account-text">Bạn chưa có tài khoản?</span>
                            <a class="account-link" href="index.php?page_layout=register">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>