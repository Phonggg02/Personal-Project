<?php 
    $id = $_GET['id'];
    require_once './assets/config/db.php';

    $sql_chitiet = "SELECT * FROM phanloai WHERE maloai = $id";
    $query_chitiet = mysqli_query($connect, $sql_chitiet);
    $row_chitiet = mysqli_fetch_assoc($query_chitiet);

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];

        $sql_update = "UPDATE phanloai SET tenloai = '$ten' WHERE maloai = $id";
        $query_update = mysqli_query($connect, $sql_update);
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
                    <a href="index.php?page_layout=managepage">Quản lý thể loại</a>
                    <span> > </span>
                    <span> Sửa thông tin thể loại </span>
                </div>
            </div>
        </div>
        <div class="grid__row center-align">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Sửa thông tin thể loại</span>
                </div>
                <div class="grid__row">
                <div class="grid__column-10">
                    <div class="addproduct-row ">
                            <span>Tên sản phẩm</span>
                            <input class="add-input" name="prod-name" type="text" required value="<?php echo $row_chitiet['tenloai'] ?>">
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
</form>
