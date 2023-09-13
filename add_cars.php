<?php
    $page_title = "Ajouter d'un nouveau véhicule";

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
    require_once 'functions.php';
?>

<main class="container">

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

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Ajouter un nouveau véhicule</h5>
                        </div>
                        <div class="card-body">

                        <form action="formulaire_add_cars.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label">Nom du propriétaire</label>
                            <input class="form-control" type="text" name="CARS_OWNER" placeholder="Mercedes">
                            
                            <label class="form-label">Nom de la marque</label>
                            <input class="form-control" type="text" name="CARS_BRAND_NAME" placeholder="Mercedes">

                            <label class="form-label">Nom du modèle</label>
                            <input class="form-control" type="text" name="CARS_MODEL_NAME"placeholder="4 MATIC">

                            <label class="form-label">Année de mise en circulation</label>
                            <input class="form-control" type="text" name="CARS_RELEASE_YEAR" placeholder="2020">

                            <label class="form-label">Puissance</label>
                            <input class="form-control" type="text" name="CARS_POWER">

                            <label class="form-label">Type de moteur</label>
                            <input class="form-control" type="text" name="CARS_ENGINE_TYPE">

                            <label class="form-label">Kilométrage</label>
                            <input class="form-control" type="text" name="CARS_KM">

                            <label class="form-label">Prix</label>
                            <input class="form-control" type="text" name="CARS_PRICE">

                            <label class="form-label">Image de la miniature</label>
                            <input class="form-control" type="text" name="CARS_THUMBNAIL_IMG">

                            <label class="form-label">1ère image de la galérie</label>
                            <input class="form-control" type="text" name="CARS_IMG1">

                            <label class="form-label">1nde image de la galérie</label>
                            <input class="form-control" type="text" name="CARS_IMG2">

                            <label class="form-label">3ème image de la galérie</label>
                            <input class="form-control" type="text" name="CARS_IMG3">

                            <label class="form-label">Type de transmission</label>
                            <input class="form-control" type="text" name="CARS_TRANSMISSION_TYPE">

                            <label class="form-label">Nombres de portes</label>
                            <input class="form-control" type="text" name="CARS_DOORS_NUMBER">

                            <label class="form-label">Matériaux des sièges</label>
                            <input class="form-control" type="text" name="CARS_SEATS_MATERIAL">

                            <label class="form-label">Couleur</label>
                            <input class="form-control" type="text" name="CARS_COLOR">

                            <label class="form-label">Garrantie</label>
                            <input class="form-control" type="text" name="CARS_WARRANTY">

                            <label class="form-label">1er équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT1">

                            <label class="form-label">2nd équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT2">

                            <label class="form-label">3ème équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT3">

                            <label class="form-label">4ème équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT4">

                            <label class="form-label">1er équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT5">

                            <label class="form-label">2nd équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT6">

                            <label class="form-label">3ème équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT7">

                            <label class="form-label">4ème équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT8">

                            <div class="mt-4">
                                <button type="submit" name="ADD_CAR" class="btn btn-success">ENREGISTRER</button>
                                <a href="cars_mg.php" class="btn btn-danger">ANNULER</a>
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