<?php 
    require_once './assets/config/db.php';

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];

        $sql_insert = "INSERT INTO phanloai (tenloai) VALUES('$ten')";
        $query_insert = mysqli_query($connect, $sql_insert);
        echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-10 adminpage-derectory">
                <div class="admminpage-derectory">
                    <a href="index.php?page_layout=home">Trang chủ</a>
                    <span> > </span>
                    <a href="index.php?page_layout=quanlysp">Quản lý phân loại</a>
                    <span> > </span>
                    <span> Thêm mới phân loại </span>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Thêm mới phân loại</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên phân loại</span>
                            <input class="add-input" name="prod-name" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <button class="add-btn" name="add-btn" type="submit">Thêm phân loại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
