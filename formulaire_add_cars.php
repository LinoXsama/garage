<?php

    session_start();

    require_once 'functions.php';
    require_once 'config/db_connect.php';

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

        if(!empty($cars_owner) & !empty($cars_brand_name) & !empty($cars_model_name) & !empty($cars_release_year) & !empty($cars_power) & !empty($cars_engine_type) & !empty($cars_km) & !empty($cars_price) & !empty($cars_thumbnail_img) & !empty($cars_transmission_type) & !empty($cars_doors_number) & !empty($cars_seats_material) & !empty($cars_color) & !empty($cars_warranty) & !empty($cars_equipment1) & !empty($cars_equipment2) & !empty($cars_equipment3) & !empty($cars_equipment4) & !empty($cars_equipment5) & !empty($cars_equipment6) & !empty($cars_equipment7) & !empty($cars_equipment8))
        {
            $query = "INSERT INTO `cars`(`cars_owner`,`cars_brand`, `cars_model`, `cars_release_year`, `cars_power`, `cars_engine_type`, `cars_km`, `cars_price`, `cars_main_img`, `cars_transmission_type`)"

            if()
            {
                $_SESSION['msg'] = 'Véhicule ajouté avec succès !';
                $_SESSION['alert_type'] = 'success';

                header('Location: cars_mg.php');
                exit;
            }
            else
            {
                $_SESSION['msg'] = "Echec de l'ajout du véhicule !";
                $_SESSION['alert_type'] = 'danger';

                header('Location: cars_mg.php');
                exit;
            }
        }
        else
        {
            $_SESSION['msg'] = "Vous devez remplir tous les champs du formulaire afin d'enregistrer le véhicule !";
            $_SESSION['alert_type'] = 'warning';
    
            header('Location: add_cars.php');
            exit;
        }
    }
?>