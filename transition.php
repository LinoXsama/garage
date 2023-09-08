<?php
    session_start();

    $_SESSION['user_to_edit'] = intval($_GET['id']);

    header('Location: edit_user.php');
    exit;
?>