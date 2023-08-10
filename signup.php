<?php
    $page_title = 'Signup page';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'config/db_connect.php';
    require_once 'check_signup.php';
?>

<?php
    session_start();

    // Ces variables servent à stocker l'email et le mot de passe du formulaire
    $_SESSION['email'] = '';
    $_SESSION['password'] = '';

    // Tableau contenant les différents variables qui serviront 
    // à afficher les erreurs à l'utilisateur 
    $signup_errors = array
    (
        'empty_email' => '',
        'invalid_email' => '',
        'email_already_exists' => '',
        'empty_password' => '',
        'invalid_password' => '',
        'confirmed_password' => '',
        'connection_error' => ''
    );

    // Les deux premières, $email_status et $password_status serviront 
    // à stocker des valeurs booléennes qui définiront l'état du mail et du password.
    // $registration_status stockera un tableau de 4 éléments. Le premier sera un
    // mysqli_stmt object, les 3 autres seront des valeurs booléennes. 
    $email_status = ''; 
    $password_status = '';
    $registration_status = '';
?>

<?php

if (isset($_POST['signup'])) 
{
    // Récupérer les informations du formulaire signup de manière sécurisée 

    $_SESSION['email'] = htmlspecialchars($_POST['email']);
    $_SESSION['password'] = htmlspecialchars($_POST['password']);
    $_SESSION['cf_password'] = htmlspecialchars($_POST['confirm_password']);

    // Vérfier si l'email est vide, 
    // si elle n'est pas vide, on vérifie si le format de l'adresse mail est invalide 
    // si le format n'est pas valide, on vérifie si l'adresse email existe déjà dans
    // la base de données.

    if (empty($_SESSION['email'])) 
    {
        $signup_errors['empty_email'] = "L'adresse mail n'a pas été renseignée !";
    } 
    elseif (is_email_invalid($_SESSION['email'])) 
    {
        $signup_errors['invalid_email'] = "L'adresse mail est invalide";
    }
    elseif (does_email_exist($conn, $_SESSION['email'])) {
        $signup_errors['email_already_exists'] = "L'adresse mail existe déjà";
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
        $signup_errors['invalid_password'] = "L'adresse mail doit comporter au moins 8 caractères pouvant être des lettres minuscules, majuscules ainsi que des caractères spéciaux !";
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
        $registration_status = user_registration($conn, $_SESSION['email'], $_SESSION['$password']);

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


<main>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-align">Créer un compte</h5>
                        </div>
                        <div class="card-body">
                            <form action="signup.php" method="POST">

                                <div class="form-group mb-3">

                                    <?php
                                        if($signup_errors['connection_error']) {
                                            echo '<p class="text-danger">' .$signup_errors['connection_error']. '</p>';
                                        }
                                    ?>

                                    <?php
                                        if($signup_errors['empty_email']) 
                                        {
                                            echo '<p class="text-danger">' .$signup_errors['empty_email']. '</p>';
                                        }
                                        elseif($signup_errors['invalid_email']) 
                                        {
                                            echo '<p class="text-danger">' .$signup_errors['invalid_email']. '</p>';
                                        }
                                    ?>
                    
                                    <label for="em">Enter your email</label>
                                    <input id="em" class="form-control" type="text" name="email" value="">

                                </div>

                                <div class="form-group mb-3">
                                    <p>
                                        <?php
                                            if($signup_errors['empty_password']) {
                                                echo '<p class="text-danger">'. $signup_errors['empty_password'] .'</p>';
                                            } elseif($signup_errors['invalid_password']) {
                                                echo '<p class="text-danger">'. $signup_errors['invalid_password'] .'</p>';
                                            } 
                                        ?>
                                    </p>
                                    <label for="pwd">Enter your password</label>
                                    <input id="pwd" class="form-control" type="password" name="password" value="">
                                </div>

                                <div class="form-group mb-3">
                                    <?php
                                        if($signup_errors['confirmed_password']) {
                                            echo '<p class="text-danger">'. $signup_errors['confirmed_password'] .'</p>';
                                        }
                                    ?>
                                    <label for="confirm_pwd">Confirm your password</label>
                                    <input id="confirm_pwd" class="form-control" type="password" name="confirm_password" value="">
                                </div>

                                <div class="form-group mb-3">
                                    <button class="btn btn-primary" type="submit" name="signup" value="Signup">SE CONNECTER</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include('templates/footer.php'); ?>
