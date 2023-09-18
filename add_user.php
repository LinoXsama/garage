<?php
    $page_title = "Ajouter un nouvel utilisateur";

    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';

    if(!isset($_SESSION['user_id']))
    {
        header('Location: login.php');
        exit;
    }
    else
    {
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

<main class="container">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center responsive-font">Ajouter un nouvel utilisateur</h5>
                        </div>
                        <div class="card-body">

                        <form action="add_user_formulaire.php" method="POST" class="mt-3 mb-3">
                            
                            <label class="form-label responsive-font">Prénom</label>
                            <input class="form-control" type="text" name="first_name" placeholder="Albert">

                            <label class="form-label responsive-font">Nom</label>
                            <input class="form-control" type="text" name="last_name"placeholder="Einsten">

                            <label class="form-label responsive-font">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="nom@example.com">

                            <label class="form-label responsive-font">Mot de passe</label>
                            <input class="form-control" type="text" name="password">

                            <div class="mt-4">
                                <button type="submit" name="SAVE" class="btn btn-success responsive-font">ENREGISTRER</button>
                                <a href="admin_panel.php" class="btn btn-danger ctm-btn responsive-font">RETOUR</a>
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