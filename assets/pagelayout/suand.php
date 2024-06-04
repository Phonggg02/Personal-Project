<?php 
    $id = $_GET['id'];
    require_once './assets/config/db.php';

    $sql_chitiet = "SELECT * FROM nguoidung WHERE mand = $id";
    $query_chitiet = mysqli_query($connect, $sql_chitiet);
    $row_chitiet = mysqli_fetch_assoc($query_chitiet);

    if(isset($_POST['add-btn'])){
        $tennd = $_POST['tennd'];
        $tendn = $_POST['tendn'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $pass = $_POST['pass'];

        if($img = $_FILES['anhnd']['name']==''){
            $img = $row_chitiet['anhnd'];
        } else {
            $img = $_FILES['anhnd']['name'];
            $img_tmp = $_FILES['anhnd']['tmp_name'];
            move_uploaded_file($img_tmp, 'assets/img/'.$img);
        }

        $sql_update = "UPDATE nguoidung SET tennd = '$tennd', tendangnhap = '$tendn', email = '$email', sdt = $sdt, matkhau = '$pass', anhnd = '$img' WHERE mand = $id";
        $query_update = mysqli_query($connect, $sql_update);
        echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-10 adminpage-derectory">
                <div class="admminpage-derectory">
                    <a href="index.php?page_layout=managepage">Quản lý người dùng</a>
                    <span> > </span>
                    <span> Sửa thông tin người dùng </span>
                </div>
            </div>
        </div>
        <div class="grid__row center-align">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Sửa thông tin người dùng</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="grid__row">
                            <div class="grid__column-5-10">
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Tên người dùng</span>
                                        <input class="add-input" name="tennd" type="text" required value="<?php echo $row_chitiet['tennd'] ?>">
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Tên đăng nhập</span>
                                        <input class="add-input" name="tendn" type="text" required value="<?php echo $row_chitiet['tendangnhap'] ?>">
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Email người dùng</span>
                                        <input class="add-input" name="email" type="text" required value="<?php echo $row_chitiet['email'] ?>">
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Số điện thoại</span>
                                        <input class="add-input" name="sdt" type="text" required value="<?php echo $row_chitiet['sdt'] ?>">
                                    </div>
                                </div>
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Mật khẩu</span>
                                        <input class="add-input" name="pass" type="text" required value="<?php echo $row_chitiet['matkhau'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="grid__column-5-10">
                                <div class="grid__column-10">
                                    <div class="addproduct-row">
                                        <span>Ảnh người dùng</span>
                                        <img src="assets/img/<?php echo $row_chitiet['anhnd'] ?>" alt="">
                                        <span>Chọn ảnh mới</span>
                                        <input name="anhnd" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-10">
                            <div class="addproduct-row">
                                <button class="add-btn" name="add-btn" type="submit">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>
