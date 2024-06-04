<?php 
    
    require_once './assets/config/db.php';
    if(isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])){
        $_SESSION['fullname'] = $_POST['fullname'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pass'] = $_POST['pass'];
    }
    if(isset($_POST['reg-btn'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql_checkemail = "SELECT * FROM nguoidung WHERE email = '$email'";
        $query_checkemail = mysqli_query($connect, $sql_checkemail);
        if(isset($_POST['policy-checkbox']) && $_POST['policy-checkbox'] == '1'){
            if($query_checkemail->num_rows > 0){
                $error = "Email đăng ký tài khoản đã tồn tại";
            } else {
                $sql_adduser = "INSERT INTO nguoidung (tennd, tendangnhap, email, matkhau) VALUES ('".$_POST['fullname']."', '".$_POST['username']."', '".$_POST['email']."','".$_POST['pass']."')";
                $query_adduser = mysqli_query($connect, $sql_adduser);
                $_SESSION['fullname'] = null;
                $_SESSION['username'] = null;
                $_SESSION['email'] = null;
                $_SESSION['pass'] = null;
                if ($query_adduser) {
                    echo '<script>alert("Đăng ký tài khoản thành công");</script>';
                    echo "<script>window.location.href='index.php?page_layout=login'</script>";
                }
            }
        } else { $error = "Vui lòng check đồng ý với điều khoản"; }
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
                                <span>Đăng ký</span>
                            </div>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="fullname" class="log-form-input" placeholder="Nhập họ tên đầy đủ của bạn" value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>"  required>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="username" class="log-form-input" placeholder="Nhập tên tài khoản" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="email" class="log-form-input" placeholder="Nhập địa chỉ email của bạn" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                        </div>
                        <div class="grid__row margin-row">
                            <input type="text" name="pass" class="log-form-input" placeholder="Tạo mật khẩu" value="<?php echo isset($_SESSION['pass']) ? $_SESSION['pass'] : ''; ?>" required>
                        </div>
                        <div class="grid__row margin-row align-center">
                            <input class="policy-register-checkbox" type="checkbox" name="policy-checkbox" value="1">
                            <span class="policy-register-text">Tôi đã đọc và đồng ý với</span>
                            <a class="policy-register-link" href="index.php?page_layout=login">Điều khoản và chính sách bảo mật</a>
                        </div>
                        <div style="color: red; font-size: 1.3rem" class="grid__row margin-row align-center">
                            <?Php if(isset($error) && $error!=""){
                                echo $error;
                            } ?>
                        </div>
                        <div class="grid__row margin-row">
                            <button class="log-btn" name="reg-btn" type="submit">Đăng ký</button>
                        </div>
                        <div class="grid__row margin-row align-center">
                            <span class="account-text">Bạn đã có tài khoản?</span>
                            <a class="account-link" href="index.php?page_layout=login">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>