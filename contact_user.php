
<?php
    $page_title = 'Contact interne';

    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('Location: login.php');
        exit;
    }
    else
    {

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'config/db_connect.php';
    require_once 'functions.php';

?>

<?php

        if(isset($_SESSION['msg']))
        {
            echo
                '<div class="container mt-3">
                    <div class="alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
                '. $_SESSION['msg'] .'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';

            unset($_SESSION['msg']);
        }
    ?>
    
<main id="main-contact-user">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-1 text-center">Contactez-nous</h5>
                        </div>
                        <div class="card-body">

                            <form action="traitement_formulaire.php" method="POST">

                                <div class="form-group my-3 mx-3" >
                                    <input type="text" name="NAME" placeholder="Vos nom et prénom" class="form-control my-3">
                                    <input type="text" name="EMAIL" placeholder="Votre adresse email" class="form-control mb-3">
                                    <input type="text" name="PHONE" placeholder="Votre numéro de téléphone" class="form-control">

                                    <textarea rows="4" name="COMMENT" placeholder="Rédigez votre message ici..." class="form-control my-3"></textarea>
                                    
                                    <label>Qu'avez vous pensé de nos services ? <strong><span class="note"></span> / 5</strong></label>
                                        <div class="container d-flex justify-content-center">
                                            <div 
                                                class="rateyo" 
                                                id="rating"
                                                data-rateyo-rating="1"
                                                data-rateyo-score="1">
                                            </div>
                                            
                                            <span class="result" style="display:none"></span>
                                            <input type="hidden" name="rating">
                                        </div>
                                        
                                    <div class="text-center my-4">
                                        <button type="submit" name="CONTACT_FORM" value="contact_user.php" class="btn btn-primary">SOUMETTRE</button>
                                    </div>
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
    }
 ?>