<?php
    require_once 'functions.php';
    require_once 'config/db_connect.php';

    if(isset($_GET['id']))
    {
        $user_id = $conn->real_escape_string(($_GET['id']));

        $query_status = delete('crud', 'id', $user_id);

        session_start();

        if($query_status)
        {
            $_SESSION['msg'] = "L'utilisateur a bien été supprimé !";
            $_SESSION['alert_type'] = 'success';

            header("Location: admin_panel.php");
        }
        else
        {
            $_SESSION['msg'] = "Échec de la suppression de l'utilisateur !";
            $_SESSION['alert_type'] = 'danger';

            header("Location: admin_panel.php");
        }
    }
?>