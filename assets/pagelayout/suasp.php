<?php 
    $id = $_GET['id'];
    require_once './assets/config/db.php';
    $sql_theloai = "SELECT * FROM theloai";
    $query_theloai = mysqli_query($connect, $sql_theloai);

    $sql_phanloai = "SELECT * FROM phanloai";
    $query_phanloai = mysqli_query($connect, $sql_phanloai);

    $sql_chitiet = "SELECT * FROM sach WHERE masach = $id";
    $query_chitiet = mysqli_query($connect, $sql_chitiet);
    $row_chitiet = mysqli_fetch_assoc($query_chitiet);

    if(isset($_POST['add-btn'])){
        $ten = $_POST['prod-name'];
        $tacgia = $_POST['prod-author'];
        $theloai = $_POST['prod-genre'];
        $phanloai = $_POST['prod-classify'];
        $mota = $_POST['prod-description'];

        if($img = $_FILES['prod-img']['name']==''){
            $img = $row_chitiet['hinhanh'];
        } else {
            $img = $_FILES['prod-img']['name'];
            $img_tmp = $_FILES['prod-img']['tmp_name'];
            move_uploaded_file($img_tmp, 'assets/img/'.$img);
        }

        $sotrang = $_POST['prod-pages'];
        $dongia = $_POST['prod-price'];
        $slton = $_POST['prod-quantity'];

        $sql_update = "UPDATE sach SET tensach = '$ten', mota = '$mota', tacgia = '$tacgia', matheloai = $theloai, maloai = $phanloai, hinhanh = '$img', sotrang = $sotrang, dongia = '$dongia', slton = $slton WHERE masach = $id";
        $query_update = mysqli_query($connect, $sql_update);
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
        <div class="grid__row center-align">
            <div class="grid__column-10 adminpage-product-view">
                <div class="grid__row">
                    <span class="adminpage-header">Sửa thông tin sản phẩm</span>
                </div>
                <div class="grid__row">
                    <div class="grid__column-10">
                        <div class="addproduct-row padding-row">
                                <span>Tên sản phẩm</span>
                                <input class="add-input" name="prod-name" type="text" required value="<?php echo $row_chitiet['tensach'] ?>">
                            </div>
                        </div>
                        <div class="grid__column-10">
                            <div class="addproduct-row padding-row">
                                <span>Tên tác giả</span>
                                <input class="add-input" name="prod-author" type="text" required value="<?php echo $row_chitiet['tacgia'] ?>">
                            </div>
                        </div>
                        <div class="grid__column-5-10">
                            <div class="grid__column-10 genre-input-row">
                                <div class="grid__column-5-10">
                                    <div class="addproduct-row">
                                        <span>Thể loại</span>
                                        <select class="add-select" name="prod-genre" id="">
                                            <?php while($row_theloai = mysqli_fetch_assoc($query_theloai)){ 
                                                $selected_theloai = ($row_theloai['matheloai'] == $row_chitiet['matheloai']) ? 'selected' : '';
                                                echo '<option value="' . $row_theloai['matheloai'] . '" ' . $selected_theloai . '>' . $row_theloai['tentheloai'] . '</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid__column-5-10">
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
                            </div>
                            <div class="grid__column-10">
                                <div class="addproduct-row">
                                    <span>Số trang</span>
                                    <input class="add-input" name="prod-pages" type="number" required value="<?php echo $row_chitiet['sotrang'] ?>">
                                </div>
                            </div>
                            <div class="grid__column-10">
                                <div class="addproduct-row">
                                    <span>Đơn giá</span>
                                    <input class="add-input" name="prod-price" type="text" required value="<?php echo $row_chitiet['dongia'] ?>">
                                </div>
                            </div>
                            <div class="grid__column-10">
                                <div class="addproduct-row">
                                    <span>Số lượng tồn</span>
                                    <input class="add-input" name="prod-quantity" type="number" required value="<?php echo $row_chitiet['slton'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-5-10">
                            <div class="grid__column-10">
                                <div class="addproduct-row">
                                    <span>Ảnh sản phẩm</span>
                                    <img src="assets/img/<?php echo $row_chitiet['hinhanh'] ?>" alt="">
                                    <span>Chọn ảnh mới</span>
                                    <input name="prod-img" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-10">
                            <div class="addproduct-row padding-row">
                                <span>Mô tả</span>
                                <textarea class="add-area" name="prod-description"><?php echo $row_chitiet['mota'] ?></textarea>
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
                                <button class="add-btn" name="add-btn" type="submit">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>
