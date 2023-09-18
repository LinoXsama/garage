<?php
    require_once 'functions.php';

    session_start();
?>

<?php
    if(isset($_POST['EDIT_SERVICES']))
    {
        $service_name = $_POST['SERVICE_NAME'];
        $service_description = $_POST['SERVICE_DESCRIPTION'];

        if(empty($service_name) || empty($service_description))
        {
            if(empty($service_name))
            {
                $_SESSION['ERRORS_EDIT_SERVICES']['NAME'] = "Vous n'avez pas entré le nom du service !";
            }

            if(empty($service_description))
            {
                $_SESSION['ERRORS_EDIT_SERVICES']['DESCRIPTION'] = "Vous n'avez pas entré la description du service !";
            }

            if(isset($_SESSION['ERRORS_EDIT_SERVICES']['NAME']) && isset($_SESSION['ERRORS_EDIT_SERVICES']['DESCRIPTION']))
            {
                unset($_SESSION['ERRORS_EDIT_SERVICES']);

                $_SESSION['EMPTY_EDIT_SERVICES'] = "Tous les champs sont vides !";
            }
        }

        if(isset($_SESSION['ERRORS_EDIT_SERVICES']) || isset($_SESSION['EMPTY_EDIT_SERVICES']))
        {
            header('Location: services_edit.php');
            exit;
        }
        else
        {
            $query_status = update('services', 'service_id', $_SESSION['SERVICE_ID'], 'service_name', $service_name, 'service_description', $service_description);

            if($query_status)
            {
                $_SESSION['MSG_EDIT_SERVICES'] = "Le service a bien été modifié !";
                $_SESSION['alert_type'] = 'success';
            }
            else
            {
                $_SESSION['MSG_EDIT_SERVICES'] = "Une erreur est survenue. Le service n'a pas pu être modifié !";
                $_SESSION['alert_type'] = 'danger';
            }

            header('Location: services_mg.php');
            exit;
        }
    }
?>