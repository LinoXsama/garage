<?php
    $page_title = 'Signup page';

    session_start();
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar_visitor.php';
    require_once 'config/db_connect.php';
    require_once 'functions.php';
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
                            <form action="correction.php" method="POST">

                                <div class="form-group mb-3">

                                    <label for="nom" class="mb-1">Nom</label>
                                    <input id="nom" class="form-control" type="text" name="last_name" placeholder="Alexandre">

                                    <label for="prenom" class="mb-1">Prénom</label>
                                    <input id="prenom" class="form-control" type="text" name="first_name" placeholder="Legrand">
                    
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

<?php include('templates/footer.php'); ?>
