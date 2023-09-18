<?php
    require_once 'config/db_connect.php';
    require_once 'functions.php';

    session_start();
?>

<?php
    if(isset($_POST['ADD_SERVICES']))
    {
        $service_name = htmlspecialchars($conn->real_escape_string($_POST['SERVICE_NAME']));
        $service_description = htmlspecialchars($conn->real_escape_string($_POST['SERVICE_DESCRIPTION']));

        if(empty($service_name) || empty($service_description))
        {
            if(empty($service_name))
            {
                $_SESSION['ERRORS_ADD_SERVICES']['NAME'] = "Vous n'avez pas entré le nom du service !";
            }

            if(empty($service_description))
            {
                $_SESSION['ERRORS_ADD_SERVICES']['DESCRIPTION'] = "Vous n'avez pas entré la description du service !";
            }

            if(isset($_SESSION['ERRORS_ADD_SERVICES']['NAME']) && isset($_SESSION['ERRORS_ADD_SERVICES']['DESCRIPTION']))
            {
                unset($_SESSION['ERRORS_ADD_SERVICES']);

                $_SESSION['EMPTY_ADD_SERVICES'] = "Tous les champs sont vides !";
            }
        }

        if(isset($_SESSION['ERRORS_ADD_SERVICES']) || isset($_SESSION['EMPTY_ADD_SERVICES']))
        {
            header('Location: services_add.php');
            exit;
        }
        else
        {
            $query_status = insert('services', 'service_name', $service_name, 'service_description', $service_description);

            if($query_status)
            {
                $_SESSION['MSG_ADD_SERVICES'] = "Le service a bien été ajouté !";
                $_SESSION['alert_type'] = 'success';

                header('Location: services_mg.php');
                exit;
            }
            else
            {
                $_SESSION['MSG_ADD_SERVICES'] = "Une erreur est survenue. Le service n'a pas pu être ajouté !";
                $_SESSION['alert_type'] = 'danger';

                header('Location: services_mg.php');
                exit;
            }

            
        }
    }
?>