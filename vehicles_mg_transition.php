<?php
    session_start();

    require_once 'config/db_connect.php';

    $_SESSION['CAR_TO_DETAIL'] = $conn->real_escape_string($_GET['id']);
    
    header('Location: details_admin.php');
    exit;
?>