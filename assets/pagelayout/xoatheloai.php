<?php
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM theloai WHERE matheloai = $id";
    $query = mysqli_query($connect, $sql_delete);
    echo "<script>window.location.href='index.php?page_layout=managepage'</script>";
?>