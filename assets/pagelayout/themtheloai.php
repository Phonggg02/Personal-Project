<?php 
    require_once './assets/config/db.php';

    $sql_phanloai = "SELECT * FROM phanloai";
    $query_phanloai = mysqli_query($connect, $sql_phanloai);

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];
        $phanloai = $_POST['prod-classify'];

        $sql_insert = "INSERT INTO theloai (tentheloai, maloai) VALUES('$ten',$phanloai)";
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
                    <a href="index.php?page_layout=quanlysp">Quản lý thể loại</a>
                    <span> > </span>
                    <span> Thêm mới thể loại </span>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Thêm mới thể loại</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên thể loại</span>
                            <input class="add-input" name="prod-name" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row classify">
                            <span>Phân loại</span>
                            <select class="add-select" name="prod-classify" id="">
                                <?php while($row_phanloai = mysqli_fetch_assoc($query_phanloai)){ ?>
                                <option value="<?php echo $row_phanloai['maloai']; ?>"><?php echo $row_phanloai['tenloai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <button class="add-btn" name="add-btn" type="submit">Thêm thể loại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
