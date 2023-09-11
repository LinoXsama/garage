<?php

session_start();

require_once 'functions.php';
require_once 'config/db_connect.php';

if(isset($_POST['CONTACT_FORM'])) 
{
    $_SESSION['NAME'] = htmlspecialchars($conn->real_escape_string($_SESSION['NAME']));
    $_SESSION['EMAIL'] = htmlspecialchars($conn->real_escape_string($_SESSION['EMAIL']));
    $_SESSION['PHONE'] = htmlspecialchars($conn->real_escape_string($_SESSION['PHONE']));
    $_SESSION['COMMENT'] = $conn->real_escape_string($_POST['COMMENT']);

    if(!empty($_SESSION['NAME']) & !empty($_SESSION['EMAIL']) & !empty($_SESSION['PHONE']) & !empty($_SESSION['COMMENT']))
    {
        if(isset($_SESSION['CAR_TO_DETAIL']))
        {
            $car_id = $_SESSION['CAR_TO_DETAIL'];
        }
        else
        {
            $car_id = '';
        }

        $query_status = insert('contacts', 'name', $_SESSION['NAME'], 'email', $_SESSION['EMAIL'], 'phone', $_SESSION['PHONE'], 'msg', $_SESSION['COMMENT'], 'car_id', $car_id);

        if($query_status)
        {
            $_SESSION['msg'] = "Votre demande d'informations a bien été prise en compte !";
            $_SESSION['alert_type'] = 'success';

            header('Location: details.php');
            exit;
        }
        else
        {
            $_SESSION['msg'] = "Une erreur est survenue. Votre demande n'a pu être prise en compte !";
            $_SESSION['alert_type'] = 'danger';

            header('Location: details.php');
            exit;
        }
    }
}
?>
