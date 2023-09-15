<?php
    session_start();

    require_once 'config/db_connect.php';
    require_once 'functions.php';

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

        $cars_thumbnail_alt_text = "{$cars_brand_name} {$cars_model_name} miniature";
        $cars_img1_alt_text = "{$cars_brand_name} {$cars_model_name} image 1";
        $cars_img2_alt_text = "{$cars_brand_name} {$cars_model_name} image 2";
        $cars_img3_alt_text = "{$cars_brand_name} {$cars_model_name} image 3";

        if(!empty($cars_owner) & !empty($cars_brand_name) & !empty($cars_model_name) & !empty($cars_release_year) & !empty($cars_power) & !empty($cars_engine_type) & !empty($cars_km) & !empty($cars_price) & !empty($cars_transmission_type) & !empty($cars_doors_number) & !empty($cars_seats_material) & !empty($cars_color) & !empty($cars_warranty) & !empty($cars_equipment1) & !empty($cars_equipment2) & !empty($cars_equipment3) & !empty($cars_equipment4) & !empty($cars_equipment5) & !empty($cars_equipment6) & !empty($cars_equipment7) & !empty($cars_equipment8))
        {
            $query = "INSERT INTO `cars`(`cars_owner`,`cars_brand`, `cars_model`, `cars_release_year`, `cars_power`, `cars_engine_type`, `cars_km`, `cars_price`, `cars_transmission_type`, `cars_doors_number`, `cars_seats_material`, `cars_color`, `cars_warranty`, `cars_equipment1`, `cars_equipment2`, `cars_equipment3`, `cars_equipment4`, `cars_equipment5`, `cars_equipment6`, `cars_equipment7`, `cars_equipment8`, `cars_alt_text`, `cars_alt_text_img1`, `cars_alt_text_img2`, `cars_alt_text_img3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            if($stmt) 
            {
                $stmt->bind_param("sssssssssssssssssssssssss", $cars_owner, $cars_brand_name, $cars_model_name, $cars_release_year, $cars_power, $cars_engine_type, $cars_km, $cars_price, $cars_transmission_type, $cars_doors_number, $cars_seats_material, $cars_color, $cars_warranty, $cars_equipment1, $cars_equipment2, $cars_equipment3, $cars_equipment4, $cars_equipment5, $cars_equipment6, $cars_equipment7, $cars_equipment8, $cars_thumbnail_alt_text, $cars_img1_alt_text, $cars_img2_alt_text, $cars_img3_alt_text);
                $stmt->execute();

                if(($stmt->affected_rows) > 0)
                {
                    $conn->close();
                    $stmt->close();

                    $_SESSION['msg'] = 'Véhicule ajouté avec succès !';
                    $_SESSION['alert_type'] = 'success';

                    header('Location: cars_mg.php');
                    exit;
                }
                else
                {
                    $conn->close();
                    $stmt->close();

                    $_SESSION['msg'] = "Échec de l'ajout du véhicule !";
                    $_SESSION['alert_type'] = 'danger';
    
                    header('Location: cars_mg.php');
                    exit;
                }
            }
            else
            {
                $conn->close();

                $_SESSION['msg'] = "Échec de l'ajout du véhicule !";
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