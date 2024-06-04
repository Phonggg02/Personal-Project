<?php
    $connect  = mysqli_connect('localhost','root','','qlbansach');
    if ($connect) {
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }
    else {
        echo "kết nối thất bại";
    }
?>