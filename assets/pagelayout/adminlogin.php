<?php
    require_once './assets/config/db.php';
    if(isset($_POST['login-btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql_log = "SELECT * FROM nhanvien WHERE email = '$email' and pass = '$pass'";
        $query_log = mysqli_query($connect, $sql_log);
        if($query_log){
            $row_user = mysqli_fetch_assoc($query_log);
            if($row_user['permission']==1){
                $_SESSION['admin']['nvien_email'] = $row_user['email'];
                $_SESSION['admin']['nvien_img'] = $row_user['anhnv'];
                $_SESSION['admin']['nvien_name'] = $row_user['tennv'];

                echo '<script>alert("Đăng nhập thành công");</script>';
                echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
            } else { echo '<script>alert("Đăng nhập thất bại");</script>';
                     echo "<script>window.location.href='index.php?page_layout=adminlogin'</script>"; }
        }
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
                        <div class="grid__row admin-log-row">
                            <a class="back-loginform-link" href="index.php?page_layout=login">
                                Trở lại
                                <img class="back-loginform-img" src="assets/img/right-arrow.png" alt="">
                            </a>
                        </div>
                        <div class="grid__row margin-row">
                            <div class="login-form-header">
                                <span> Đăng nhập bằng quyền Admin</span>
                            </div>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="email" class="log-form-input" placeholder="Địa chỉ email admin">
                        </div>
                        <div class="grid__row margin-row input-wrapper">
                            <input type="password" name="pass" class="log-form-input" placeholder="Nhập mật khẩu" id="password">
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
                        <div class="grid__row margin-row">
                            <button class="log-btn" name="login-btn" type="submit">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
