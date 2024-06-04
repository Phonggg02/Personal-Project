<?php 
    session_start();
    unset($_SESSION['login']['user_email']);
    unset($_SESSION['login']['user_img']);
    unset($_SESSION['login']['user_name']);
    header('Location: /index.php?page_layout=login');
    exit;
?>