<?php
session_start();

require_once 'functions.php';

if(isset($_POST['SIGNUP'])) 
{
    // Récupérer les informations du formulaire signup de manière sécurisée 

    $lname = htmlspecialchars($_POST['last_name']);
    $fname = htmlspecialchars($_POST['first_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cfpassword = htmlspecialchars($_POST['confirm_password']);

    // Vérfier si l'email est vide, 
    // si elle n'est pas vide, on vérifie si le format de l'adresse mail est invalide 
    // si le format n'est pas valide, on vérifie si l'adresse email existe déjà dans
    // la base de données.

    if(empty($email)) 
    {
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse email n'a pas été renseignée !";
    } 
    elseif(is_email_invalid($email)) 
    {
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse email est invalide !";
    }
    elseif(does_email_exist($email)) 
    {
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse email existe déjà";
    }
    

    // Vérifier si le mot de passe est vide,
    // s'il n'est pas vide, on vérifie s'il est invalide
    // s'il n'est pas invalide, on vérifie si le mot de passe est 
    // différent de la confirmation du mot de passe.

    if(empty($password))
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Le mot de passe n'a pas été renseigné !";
    }
    elseif(is_password_invalid($password))
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Le mot de passe doit comporter au moins 8 caractères pouvant être des lettres minuscules, majuscules ainsi que des caractères spéciaux !";
    }
    elseif($password != $cfpassword) 
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Les mots de passe ne sont pas identiques";
    }

    if(!isset($_SESSION['SIGNUP_EMAIL_ERRORS']) && !isset($_SESSION['SIGNUP_PASSWORD_ERRORS'])) 
    {
        $registration_status = user_registration($fname, $lname, $email, $password);

        if($registration_status['return']) 
        {
            $_SESSION['SIGNUP_SUCCESS'] = "L'utilisateur a bien été créé !";
            header("Location: login.php");
            exit;
        }
        else 
        {
            $_SESSION['CONNECTION_ERROR'] = 'Echec de la création du compte utilisateur';
            header('Location: signup.php');
            exit;
        }
    }

    header('Location: signup.php');
    exit;
}
?>
