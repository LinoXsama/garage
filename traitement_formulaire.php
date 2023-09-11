<?php

session_start();

require_once 'functions.php';
require_once 'config/db_connect.php';


if(isset($_POST['CONTACT_FORM']) & $_POST['CONTACT_FORM'] === 'details.php') 
{
    $_SESSION['NAME'] = htmlspecialchars($conn->real_escape_string($_POST['NAME']));
    $_SESSION['EMAIL'] = htmlspecialchars($conn->real_escape_string($_POST['EMAIL']));
    $_SESSION['PHONE'] = htmlspecialchars($conn->real_escape_string($_POST['PHONE']));
    $_SESSION['COMMENT'] = $conn->real_escape_string($_POST['COMMENT']);

    if(!empty($_SESSION['NAME']) & !empty($_SESSION['EMAIL']) & !empty($_SESSION['PHONE']) & !empty($_SESSION['COMMENT']))
    {
        $query_status = insert('contacts', 'name', $_SESSION['NAME'], 'email', $_SESSION['EMAIL'], 'phone', $_SESSION['PHONE'], 'msg', $_SESSION['COMMENT'], 'car_id', $_SESSION['CAR_TO_DETAIL']);
        
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
    else 
    {
        $_SESSION['msg'] = "Vous devez remplir tous les champs du formulaire afin de soumettre votre demande d'informations !";
        $_SESSION['alert_type'] = 'warning';

        header('Location: details.php');
        exit;
    }
}
else if(isset($_POST['CONTACT_FORM']) & $_POST['CONTACT_FORM'] === 'contact.php')
{
    {
        $_SESSION['NAME'] = htmlspecialchars($conn->real_escape_string($_POST['NAME']));
        $_SESSION['EMAIL'] = htmlspecialchars($conn->real_escape_string($_POST['EMAIL']));
        $_SESSION['PHONE'] = htmlspecialchars($conn->real_escape_string($_POST['PHONE']));
        $_SESSION['COMMENT'] = $conn->real_escape_string($_POST['COMMENT']);
    
        if(!empty($_SESSION['NAME']) & !empty($_SESSION['EMAIL']) & !empty($_SESSION['PHONE']) & !empty($_SESSION['COMMENT']))
        {
            $query_status = insert('contacts', 'name', $_SESSION['NAME'], 'email', $_SESSION['EMAIL'], 'phone', $_SESSION['PHONE'], 'msg', $_SESSION['COMMENT']);
            
            if($query_status)
            {
                $_SESSION['msg'] = "Votre demande d'informations a bien été prise en compte !";
                $_SESSION['alert_type'] = 'success';
    
                header('Location: contact.php');
                exit;
            }
            else
            {
                $_SESSION['msg'] = "Une erreur est survenue. Votre demande n'a pu être prise en compte !";
                $_SESSION['alert_type'] = 'danger';
    
                header('Location: contact.php');
                exit;
            }
        }
        else 
        {
            $_SESSION['msg'] = "Vous devez remplir tous les champs du formulaire afin de soumettre votre demande d'informations !";
            $_SESSION['alert_type'] = 'warning';
    
            header('Location: contact.php');
            exit;
        }
    }
}
?>
