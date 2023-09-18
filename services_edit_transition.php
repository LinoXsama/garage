<?php
    session_start();

    require_once 'config/db_connect.php';

    $_SESSION['SERVICE_ID'] = $conn->real_escape_string($_GET['id']);
    
    header('Location: services_edit.php');
    exit;
?>