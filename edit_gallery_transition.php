<?php
    session_start();

    require_once 'config/db_connect.php';

    $_SESSION['CAR_ID'] = $conn->real_escape_string($_GET['id']);
    
    header('Location: upload_img.php');
    exit;
?>