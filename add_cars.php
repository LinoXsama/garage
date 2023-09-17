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
    <!-- GESTION DES MESSAGES D'ERREURS - START -->
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

        if(isset($_SESSION['ERRORS_ADD_CARS'])) 
        {
            echo '<div class="container mt-3">';
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

            echo '<ul>';
            foreach ($_SESSION['ERRORS_ADD_CARS'] as $error) 
            {
                echo '<li>' .$error. '</li>';
            }
            echo '<ul>';

                echo '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            echo '</div>';
            
            unset($_SESSION['ERRORS_ADD_CARS']); 
        }
    ?>
    <!-- GESTION DES MESSAGES D'ERREURS - END -->

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Ajouter un nouveau véhicule</h5>
                        </div>
                        <div class="card-body">
                            <?php
                                $KM = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Kilométrage'));
                                $PRICE = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Prix'));
                                $YEAR = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Années'));
                            ?>
                        <strong><span class="text-danger responsive-font">Plage km: <?= "[{$KM['sliders_min_value1']} : {$KM['sliders_max_value2']}]"; ?></span><br /></strong>
                        <strong><span class="text-secondary responsive-font">Plage prix: <?= "[{$PRICE['sliders_min_value1']} : {$PRICE['sliders_max_value2']}]"; ?></span><br /></strong>
                        <strong><span class="text-primary responsive-font">Plage année: <?= "[{$YEAR['sliders_min_value1']} : {$YEAR['sliders_max_value2']}]"; ?></span><br /></strong>

                        <form action="formulaire_add_cars.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label responsive-font">Propriétaire du véhicule</label>
                            <input class="form-control" type="text" name="CARS_OWNER" placeholder="John Doe">
                            
                            <label class="form-label responsive-font">Nom de la marque</label>
                            <input class="form-control" type="text" name="CARS_BRAND_NAME" placeholder="Renault">

                            <label class="form-label responsive-font">Nom du modèle</label>
                            <input class="form-control" type="text" name="CARS_MODEL_NAME"placeholder="Mégane">

                            <label class="form-label responsive-font">Année de mise en circulation</label>
                            <input class="form-control" type="text" name="CARS_RELEASE_YEAR" placeholder="2019">

                            <label class="form-label responsive-font">Puissance</label>
                            <input class="form-control" type="text" name="CARS_POWER" placeholder="120">

                            <label class="form-label responsive-font">Type de moteur</label>
                            <input class="form-control" type="text" name="CARS_ENGINE_TYPE" placeholder="Diesel">

                            <label class="form-label responsive-font">Kilométrage</label>
                            <input class="form-control" type="text" name="CARS_KM" placeholder="4520">

                            <label class="form-label responsive-font">Prix</label>
                            <input class="form-control" type="text" name="CARS_PRICE" placeholder="6500">

                            <label class="form-label responsive-font">Type de transmission</label>
                            <input class="form-control" type="text" name="CARS_TRANSMISSION_TYPE" placeholder="Manuelle">

                            <label class="form-label responsive-font">Nombres de portes</label>
                            <input class="form-control" type="text" name="CARS_DOORS_NUMBER" placeholder="5">

                            <label class="form-label responsive-font">Matériaux des sièges</label>
                            <input class="form-control" type="text" name="CARS_SEATS_MATERIAL" placeholder="Cuir">

                            <label class="form-label responsive-font">Couleur</label>
                            <input class="form-control" type="text" name="CARS_COLOR" placeholder="Rouge Cramoisi">

                            <label class="form-label responsive-font">Garrantie</label>
                            <input class="form-control" type="text" name="CARS_WARRANTY" placeholder="Etendue sur 12 mois">

                            <label class="form-label responsive-font">1er équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT1" placeholder="Radio">

                            <label class="form-label responsive-font">2nd équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT2" placeholder="Ecran tactile 9 pouces">

                            <label class="form-label responsive-font">3ème équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT3" placeholder="GPS">

                            <label class="form-label responsive-font">4ème équipement multimédia</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT4" placeholder="2 Ports USB">

                            <label class="form-label responsive-font">1er équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT5" placeholder="Climatisation">

                            <label class="form-label responsive-font">2nd équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT6" placeholder="Sièges chauffants">

                            <label class="form-label responsive-font">3ème équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT7" placeholder="Repose-tête">

                            <label class="form-label responsive-font">4ème équipement confort</label>
                            <input class="form-control" type="text" name="CARS_EQUIPMENT8" placeholder="Rétroviseurs électroniques">

                            <div class="mt-4">
                                <button type="submit" name="ADD_CAR" class="btn btn-success responsive-font">ENREGISTRER</button>
                                <a href="cars_mg.php" class="btn btn-danger ctm-btn responsive-font">RETOUR</a>
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