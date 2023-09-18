<?php

    session_start();

    // if(!isset($_SESSION['user_id']))
    // {
    //     header('Location: login.php');
    //     exit;
    // }
    // else
    // {
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
?>

<main class="container">
    <!-- GESTION DES MESSAGES D'ERREURS - START -->
        <?php
            if(isset($_SESSION['ERRORS_ADD_SERVICES'])) 
            {
                echo '<div class="container mt-3">';
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

                echo '<ul>';
                foreach ($_SESSION['ERRORS_ADD_SERVICES'] as $error) 
                {
                    echo '<li>' .$error. '</li>';
                }
                echo '<ul>';

                    echo '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                echo '</div>';
                
                unset($_SESSION['ERRORS_ADD_SERVICES']); 
            }

            if(isset($_SESSION['EMPTY_ADD_SERVICES']))
            {
                echo
                    '<div class="container mt-3">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    '. $_SESSION['EMPTY_ADD_SERVICES'] .'
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>';

                unset($_SESSION['EMPTY_ADD_SERVICES']);
            }
        ?>
    <!-- GESTION DES MESSAGES D'ERREURS - END -->

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Ajouter un nouveau service</h5>
                        </div>
                        <div class="card-body">

                        <form action="services_add_formulaire.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label responsive-font">Nom du service</label>
                            <input class="form-control" type="text" name="SERVICE_NAME" placeholder="Ex : Réparation">
                            
                            <label class="form-label responsive-font">Description du service</label>
                            <input class="form-control" type="text" name="SERVICE_DESCRIPTION" placeholder="Ex : Nous réparons vos...">

                            <div class="mt-4">
                                <button type="submit" name="ADD_SERVICES" class="btn btn-success responsive-font">ENREGISTRER</button>
                                <a href="services_mg.php" class="btn btn-danger ctm-btn responsive-font">RETOUR</a>
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

<?php
    // }
?>