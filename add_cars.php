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

<?php
    if(isset($_POST['ADD_CAR']))
    {
        require_once 'config/db_connect.php';

        $cars_owner = htmlspecialchars($conn->real_escape_string($_POST['CARS_OWNER']));
        $cars_brand_name = htmlspecialchars($conn->real_escape_string($_POST['CARS_BRAND_NAME']));
        $cars_model_name = htmlspecialchars($conn->real_escape_string($_POST['CARS_MODEL_NAME']));
        $cars_release_year = htmlspecialchars($conn->real_escape_string($_POST['CARS_RELEASE_YEAR']));
        $cars_power = htmlspecialchars($conn->real_escape_string($_POST['CARS_POWER']));
        $cars_engine_type = htmlspecialchars($conn->real_escape_string($_POST['CARS_ENGINE_TYPE']));
        $cars_km = htmlspecialchars($conn->real_escape_string($_POST['CARS_KM']));
        $cars_price = htmlspecialchars($conn->real_escape_string($_POST['CARS_PRICE']));
        $cars_thumbnail_img = htmlspecialchars($conn->real_escape_string($_POST['CARS_THUMBNAIL_IMG']));
        $cars_transmission_type = htmlspecialchars($conn->real_escape_string($_POST['CARS_TRANSMISSION_TYPE']));
        $cars_doors_number = htmlspecialchars($conn->real_escape_string($_POST['CARS_DOORS_NUMBER']));
        $cars_seats_material = htmlspecialchars($conn->real_escape_string($_POST['CARS_SEATS_MATERIAL']));
        $cars_color = htmlspecialchars($conn->real_escape_string($_POST['CARS_COLOR']));
        $cars_warranty = htmlspecialchars($conn->real_escape_string($_POST['CARS_WARRANTY']));
        $cars_equipment1 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT1']));
        $cars_equipment2 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT2']));
        $cars_equipment3 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT3']));
        $cars_equipment4 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT4']));
        $cars_equipment5 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT5']));
        $cars_equipment6 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT6']));
        $cars_equipment7 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT7']));
        $cars_equipment8 = htmlspecialchars($conn->real_escape_string($_POST['CARS_EQUIPMENT8']));

        if(!empty($cars_owner) & !empty($cars_brand_name))
        {

        }

        $query_status = insert();

        if($query_status)
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            $_SESSION['alert_type'] = 'success';

            header('Location: admin_panel.php');
        }
        else
        {
            $_SESSION['msg'] = "Echec de l'ajout de l'utilisateur !";
            $_SESSION['alert_type'] = 'danger';

            header('Location: admin_panel.php');
        }
    }
?>

<main class="container">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Ajouter un nouveau véhicule</h5>
                        </div>
                        <div class="card-body">

                        <form action="traitement_formulaire.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label">Nom du propriétaire</label>
                            <input class="form-control" type="text" name="CARS_OWNER" placeholder="Mercedes">
                            
                            <label class="form-label">Nom de la marque</label>
                            <input class="form-control" type="text" name="CARS_BRAND_NAME" placeholder="Mercedes">

                            <label class="form-label">Nom du modèle</label>
                            <input class="form-control" type="text" name="CARS_MODEL_NAME"placeholder="Einsten">

                            <label class="form-label">Année de mise en circulation</label>
                            <input class="form-control" type="text" name="CARS_RELEASE_YEAR" placeholder="nom@example.com">

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