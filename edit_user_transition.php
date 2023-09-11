<?php
    session_start();

    require_once 'config/db_connect.php';

    $_SESSION['user_to_edit'] = $conn->real_escape_string($_GET['id']);

    header('Location: edit_user.php');
    exit;
?>