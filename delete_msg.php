<?php
    require_once 'functions.php';
    require_once 'config/db_connect.php';

    if(isset($_GET['id']))
    {
        $msg_id = $conn->real_escape_string(($_GET['id']));

        $query_status = delete('contacts', 'msg_id', $msg_id);

        session_start();

        if($query_status)
        {
            $_SESSION['msg'] = "Le message a bien été supprimé !";
            $_SESSION['alert_type'] = 'success';

            header("Location: comments_mg.php");
        }
        else
        {
            $_SESSION['msg'] = "Échec de la suppression du message !";
            $_SESSION['alert_type'] = 'danger';

            header("Location: comments_mg.php");
        }
    }
?>