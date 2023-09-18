<?php

session_start();

require_once 'functions.php';
require_once 'config/db_connect.php';

if(isset($_POST['CONTACT_FORM']) & $_POST['CONTACT_FORM'] === 'details.php') 
{
    $_SESSION['NAME'] = htmlspecialchars($conn->real_escape_string($_POST['NAME']));
    $_SESSION['EMAIL'] = htmlspecialchars($conn->real_escape_string($_POST['EMAIL']));
    $_SESSION['PHONE'] = htmlspecialchars($conn->real_escape_string($_POST['PHONE']));
    $_SESSION['COMMENT'] = $_POST['COMMENT'];
    $_SESSION['RATING'] = $_POST['rating'];
    $PUBLICATION = 'NON';

    if(!empty($_SESSION['NAME']) && !empty($_SESSION['EMAIL']) && !empty($_SESSION['PHONE']) && !empty($_SESSION['COMMENT']) && !empty($_SESSION['RATING']))
    {
        $query = "INSERT INTO `contacts`(`name`, `email`, `phone`, `msg`, `rating`, `publication`) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if($stmt) 
        {    
            $stmt->bind_param("ssssss", $_SESSION['NAME'], $_SESSION['EMAIL'], $_SESSION['PHONE'], $_SESSION['COMMENT'], $_SESSION['RATING'], $PUBLICATION);
            $stmt->execute();
        
            if($stmt->affected_rows > 0) 
            {
                $stmt->close();
                
                $_SESSION['msg'] = "Votre demande d'informations a bien été prise en compte !";
                $_SESSION['alert_type'] = 'success';

                header('Location: details.php');
                exit;
            } 
            else 
            {
                $stmt->close();

                $_SESSION['msg'] = "Votre demande n'a pas pu être prise en compte !";
                $_SESSION['alert_type'] = 'danger';

                header('Location: details.php');
                exit;
            }
        } 
        else 
        {
            $_SESSION['msg'] = "Problème technique : la requête a échoué !";
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
else if(isset($_POST['CONTACT_FORM']) && $_POST['CONTACT_FORM'] === 'contact.php')
{
    {
        $_SESSION['NAME'] = htmlspecialchars($conn->real_escape_string($_POST['NAME']));
        $_SESSION['EMAIL'] = htmlspecialchars($conn->real_escape_string($_POST['EMAIL']));
        $_SESSION['PHONE'] = htmlspecialchars($conn->real_escape_string($_POST['PHONE']));
        $_SESSION['COMMENT'] = $conn->real_escape_string($_POST['COMMENT']);
        $_SESSION['RATING'] = $_POST['rating'];
        $PUBLICATION = 'NON';
    
        if(!empty($_SESSION['NAME']) & !empty($_SESSION['EMAIL']) & !empty($_SESSION['PHONE']) & !empty($_SESSION['COMMENT']))
        {
            $query_status = insert('contacts', 'name', $_SESSION['NAME'], 'email', $_SESSION['EMAIL'], 'phone', $_SESSION['PHONE'], 'msg', $_SESSION['COMMENT'], 'publication', $PUBLICATION, 'rating', $_SESSION['RATING']);
            
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