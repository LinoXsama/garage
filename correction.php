<?php

if (isset($_POST['signup'])) 
{
    // Récupérer les informations du formulaire signup de manière sécurisée 

    $_SESSION['lname'] = htmlspecialchars($_POST['last_name']);
    $_SESSION['fname'] = htmlspecialchars($_POST['first_name']);
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
    $_SESSION['password'] = htmlspecialchars($_POST['password']);
    $_SESSION['cf_password'] = htmlspecialchars($_POST['confirm_password']);

    // Vérfier si l'email est vide, 
    // si elle n'est pas vide, on vérifie si le format de l'adresse mail est invalide 
    // si le format n'est pas valide, on vérifie si l'adresse email existe déjà dans
    // la base de données.

    if (empty($_SESSION['email'])) 
    {
        $_SESSION['SINGUP_EMAIL_ERRORS'] = "L'adresse mail n'a pas été renseignée !";
    } 
    elseif (is_email_invalid($_SESSION['email'])) 
    {
        $_SESSION['SINGUP_EMAIL_ERRORS'] = "L'adresse mail est invalide !";
    }
    elseif (does_email_exist($_SESSION['email'])) {
        $_SESSION['SINGUP_EMAIL_ERRORS'] = "L'adresse mail existe déjà";
    }
    else {
        $email_status = true;
    }

    // Vérifier si le mot de passe est vide,
    // s'il n'est pas vide, on vérifie s'il est invalide
    // s'il n'est pas invalide, on vérifie si le mot de passe est 
    // différent de la confirmation du mot de passe.

    if(empty($_SESSION['password']))
    {
        $signup_errors['empty_password'] = "Le mot de passe n'a pas été renseigné !";
    }
    elseif(is_password_invalid($_SESSION['password']))
    {
        $signup_errors['invalid_password'] = "Le mot de passe doit comporter au moins 8 caractères pouvant être des lettres minuscules, majuscules ainsi que des caractères spéciaux !";
    }
    elseif($_SESSION['password'] != $_SESSION['cf_password']) 
    {
        $signup_errors['confirmed_password'] = "Les mots de passe ne sont pas identiques";
    }
    else {
        $password_status = true;
    }

    if($email_status && $password_status) 
    {
        $registration_status = user_registration($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['password']);

        if($registration_status['return']) 
        {
            header("Location: login.php");
        }
        else 
        {
            $signup_errors['connection_error'] = 'Echec de la création du compte utilisateur';
        }
    }

}

?>