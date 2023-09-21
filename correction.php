<?php
session_start();

require_once 'check_signup.php';

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
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse mail n'a pas été renseignée !";
    } 
    elseif (is_email_invalid($email)) 
    {
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse mail est invalide !";
        
    }
    elseif (does_email_exist($email)) {
        $_SESSION['SIGNUP_EMAIL_ERRORS'] = "L'adresse mail existe déjà";
        
    }
    else{
        $email_status = true;
    }

    // Vérifier si le mot de passe est vide,
    // s'il n'est pas vide, on vérifie s'il est invalide
    // s'il n'est pas invalide, on vérifie si le mot de passe est 
    // différent de la confirmation du mot de passe.

    if(empty($password))
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Le mot de passe n'a pas été renseigné !";
        header('Location: correctionf.php');
        exit;
    }
    elseif(is_password_invalid($password))
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Le mot de passe doit comporter au moins 8 caractères pouvant être des lettres minuscules, majuscules ainsi que des caractères spéciaux !";
        header('Location: correctionf.php');
        exit;
    }
    elseif($password != $cfpassword) 
    {
        $_SESSION['SIGNUP_PASSWORD_ERRORS'] = "Les mots de passe ne sont pas identiques";
        header('Location: correctionf.php');
        exit;
    }
    else {
        $password_status = true;
    }

    if($email_status && $password_status) 
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
            header('Location: correctionf.php');
            exit;
        }
    }
    else
    {
        $_SESSION['CONNECTION_ERROR'] = 'Echec de la création du compte utilisateur';
        header('Location: correctionf.php');
        exit;
    }
}

?>

<main>
    <!-- GESTION DES NOTIFICATIONS -->
    <?php
        // A AFFICHER S'IL Y A UNE ERREUR DANS LE MOT DE PASSE - START
        if(isset($_SESSION['SIGNUP_PASSWORD_ERRORS']))
        {
            echo
                '<div class="container mt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                '. $_SESSION['SIGNUP_PASSWORD_ERRORS'] .'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        
            unset($_SESSION['SIGNUP_PASSWORD_ERRORS']);
        }
        // A AFFICHER S'IL Y A UNE ERREUR DANS LE MOT DE PASSE - END

        // A AFFICHER S'IL Y A UNE ERREUR DANS L'ADRESSE MAIL - START
        if(isset($_SESSION['SIGNUP_EMAIL_ERRORS']))
        {
            echo
                '<div class="container mt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                '. $_SESSION['SIGNUP_EMAIL_ERRORS'] .'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        
            unset($_SESSION['SIGNUP_EMAIL_ERRORS']);
        }
        // A AFFICHER S'IL Y A UNE ERREUR DANS L'ADRESSE MAIL - END

        // A AFFICHER SI LA CREATION DE L'UTILISATEUR ECHOUE - START
        if(isset($_SESSION['CONNECTION_ERROR']))
        {
            echo
                '<div class="container mt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                '. $_SESSION['CONNECTION_ERROR'] .'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        
            unset($_SESSION['CONNECTION_ERROR']);
        }
        // A AFFICHER SI LA CREATION DE L'UTILISATEUR ECHOUE - END
    ?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-align text-center">Créer un compte administrateur</h5>
                        </div>
                        <div class="card-body">
                            <form action="signup.php" method="POST">

                                <div class="form-group mb-3">

                                    <label for="nom" class="mb-1">Nom</label>
                                    <input id="nom" class="form-control" type="text" name="last_name" placeholder="Alexandre" required>

                                    <label for="prenom" class="mb-1">Prénom</label>
                                    <input id="prenom" class="form-control" type="text" name="first_name" placeholder="Legrand" required>
                    
                                    <label for="em" class="mb-1">Enter your email</label>
                                    <input id="em" class="form-control" type="text" name="email" placeholder="example@gmail.com">

                                </div>

                                <div class="form-group mb-3">
                                    <label for="pwd" class="mb-1">Enter your password</label>
                                    <input id="pwd" class="form-control" type="password" name="password">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirm_pwd" class="mb-1">Confirm your password</label>
                                    <input id="confirm_pwd" class="form-control" type="password" name="confirm_password">
                                </div>

                                <div class="form-group mb-3 text-center">
                                    <button class="btn btn-primary" type="submit" name="SIGNUP">CREER LE COMPTE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


