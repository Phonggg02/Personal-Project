<?php 
    $id = $_GET['id'];
    require_once './assets/config/db.php';

    $sql_phanloai = "SELECT * FROM phanloai";
    $query_phanloai = mysqli_query($connect, $sql_phanloai);

    $sql_chitiet = "SELECT * FROM theloai WHERE matheloai = $id";
    $query_chitiet = mysqli_query($connect, $sql_chitiet);
    $row_chitiet = mysqli_fetch_assoc($query_chitiet);

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];
        $phanloai = $_POST['prod-classify'];

        $sql_update = "UPDATE theloai SET tentheloai = '$ten', maloai = $phanloai WHERE matheloai = $id";
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
                            <input class="add-input" name="prod-name" type="text" required value="<?php echo $row_chitiet['tentheloai'] ?>">
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row classify">
                            <span>Phân loại</span>
                            <select class="add-select" name="prod-classify" id="">
                                <?php while($row_phanloai = mysqli_fetch_assoc($query_phanloai)){ 
                                    $selected_phanloai = ($row_phanloai['maloai'] == $row_chitiet['maloai']) ? 'selected' : '';
                                    echo '<option value="' . $row_phanloai['maloai'] . '" ' . $selected_phanloai . '>' . $row_phanloai['tenloai'] . '</option>';
                                }?>
                            </select>
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
