<?php
    require_once 'functions.php';
    require_once 'config/db_connect.php';

    if(isset($_GET['id']))
    {
        $cars_id = $conn->real_escape_string(($_GET['id']));

        $query_status = delete('cars', 'cars_id', $cars_id);

        session_start();

        if($query_status)
        {
            $_SESSION['msg'] = "Le véhicule a bien été supprimé !";
            $_SESSION['alert_type'] = 'success';

            header("Location: cars_mg.php");
        }
        else
        {
            $_SESSION['msg'] = "Échec de la suppression du véhicule !";
            $_SESSION['alert_type'] = 'danger';

            header("Location: cars_mg.php");
        }
    }
?>