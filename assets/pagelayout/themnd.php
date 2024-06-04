<?php 
    require_once './assets/config/db.php';

    if(isset($_POST['add-btn'])){
        $tennd = $_POST['user-name'];
        $tendn = $_POST['user-tendn'];
        $email = $_POST['user-email'];

        $img = $_FILES['user-img']['name'];
        $img_tmp = $_FILES['user-img']['tmp_name'];

        $matkhau = $_POST['user-pass'];
        $sdt = $_POST['user-sdt'];

        $sql_insert = "INSERT INTO nguoidung (tennd, tendangnhap, email, matkhau, sdt, anhnd) VALUES('$tennd', '$tendn', '$email', '$matkhau', '$sdt', '$img')";
        $query_insert = mysqli_query($connect, $sql_insert);
        move_uploaded_file($img_tmp, 'assets/img/'.$img);
        echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-10 adminpage-derectory">
                <div class="admminpage-derectory">
                    <a href="index.php?page_layout=managepage">Quản lý khách hàng</a>
                    <span> > </span>
                    <span> Thêm mới khách hàng </span>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Thêm mới khách hàng</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên khách hàng</span>
                            <input class="add-input" name="user-name" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên đăng nhập</span>
                            <input class="add-input" name="user-tendn" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Email</span>
                            <input class="add-input" name="user-email" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Ảnh</span>
                            <input name="user-img" type="file" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Mật khẩu</span>
                            <input class="add-input" name="user-pass" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Số điện thoại</span>
                            <input class="add-input" name="user-sdt" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <button class="add-btn" name="add-btn" type="submit">Thêm người dùng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
