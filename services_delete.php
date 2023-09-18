<?php
    require_once 'functions.php';
    require_once 'config/db_connect.php';

    if(isset($_GET['id']))
    {
        $service_id = $conn->real_escape_string(($_GET['id']));

        $query_status = delete('services', 'service_id', $service_id);

        session_start();

        if($query_status)
        {
            $_SESSION['msg'] = "Le service a bien été supprimé !";
            $_SESSION['alert_type'] = 'success';

            header("Location: services_mg.php");
        }
        else
        {
            $_SESSION['msg'] = "Échec de la suppression du service !";
            $_SESSION['alert_type'] = 'danger';

            header("Location: services_mg.php");
        }
    }
?>