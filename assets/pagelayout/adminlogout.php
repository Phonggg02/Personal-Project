<?php 
    session_start();
    unset($_SESSION['admin']['nvien_email']);
    unset($_SESSION['admin']['nvien_img']);
    unset($_SESSION['admin']['nvien_name']);
    header('Location: /index.php?page_layout=login');
    exit;
?>