<?php
    session_start();

    $_SESSION['car_to_detail'] = intval($_GET['car_id']);

    header('Location: detail.php');
    exit;
?>