<?php 
    require_once './assets/config/db.php';
    $sql_theloai = "SELECT * FROM theloai";
    $query_theloai = mysqli_query($connect, $sql_theloai);

    $sql_phanloai = "SELECT * FROM phanloai";
    $query_phanloai = mysqli_query($connect, $sql_phanloai);

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];
        $tacgia = $_POST['prod-author'];
        $theloai = $_POST['prod-genre'];
        $phanloai = $_POST['prod-classify'];
        $mota = $_POST['prod-description'];

        $img = $_FILES['prod-img']['name'];
        $img_tmp = $_FILES['prod-img']['tmp_name'];

        $sotrang = $_POST['prod-pages'];
        $dongia = $_POST['prod-price'];
        $slton = $_POST['prod-quantity'];

        $sql_insert = "INSERT INTO sach (tensach, mota, tacgia, matheloai, maloai, hinhanh, sotrang, dongia, slton) VALUES('$ten', '$mota', '$tacgia', $theloai, $phanloai, '$img', $sotrang, '$dongia', $slton)";
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
                    <a href="index.php?page_layout=managepage">Quản lý sản phẩm</a>
                    <span> > </span>
                    <span> Thêm mới sản phẩm </span>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Thêm mới sản phẩm</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên sản phẩm</span>
                            <input class="add-input" name="prod-name" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Tên tác giả</span>
                            <input class="add-input" name="prod-author" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10 genre-input-row">
                        <div class="grid__column-5-10">
                            <div class="addproduct-row">
                                <span>Thể loại</span>
                                <select class="add-select" name="prod-genre" id="">
                                    <?php while($row_theloai = mysqli_fetch_assoc($query_theloai)){ ?>
                                    <option value="<?php echo $row_theloai['matheloai']; ?>"><?php echo $row_theloai['tentheloai']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="grid__column-5-10">
                            <div class="addproduct-row classify">
                                <span>Phân loại</span>
                                <select class="add-select" name="prod-classify" id="">
                                    <?php while($row_phanloai = mysqli_fetch_assoc($query_phanloai)){ ?>
                                    <option value="<?php echo $row_phanloai['maloai']; ?>"><?php echo $row_phanloai['tenloai']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Mô tả</span>
                            <textarea class="add-area" name="prod-description"></textarea>
                        </div>
                        <script>
                            const textArea = document.querySelector("textarea");
                            textArea.addEventListener("keyup", e => {
                                textArea.style.height = "auto";
                                let scHeight = e.target.scrollHeight;
                                textArea.style.height = `${scHeight}px`;
                            });
                        </script>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Ảnh sản phẩm</span>
                            <input name="prod-img" type="file" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Số trang</span>
                            <input class="add-input" name="prod-pages" type="number" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Đơn giá</span>
                            <input class="add-input" name="prod-price" type="text" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <div class="addproduct-row">
                            <span>Số lượng tồn</span>
                            <input class="add-input" name="prod-quantity" type="number" required>
                        </div>
                    </div>
                    <div class="grid__column-10">
                        <button class="add-btn" name="add-btn" type="submit">Thêm sản phẩm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
