<?php
    require_once 'config/db_connect.php';
    require_once 'functions.php';

    session_start();

    $_SESSION['SUCCESS_SETTINGS'] = array();
    $_SESSION['ERRORS_SETTINGS'] = array();
?>

<?php
    if(isset($_POST['SETTINGS']))
    {
        $km1 = htmlspecialchars($conn->real_escape_string($_POST['KM1']));
        $km2 = htmlspecialchars($conn->real_escape_string($_POST['KM2']));
        $km3 = htmlspecialchars($conn->real_escape_string($_POST['KM3']));
        $km4 = htmlspecialchars($conn->real_escape_string($_POST['KM4']));
        $price1 = htmlspecialchars($conn->real_escape_string($_POST['PRICE1']));
        $price2 = htmlspecialchars($conn->real_escape_string($_POST['PRICE2']));
        $price3 = htmlspecialchars($conn->real_escape_string($_POST['PRICE3']));
        $price4 = htmlspecialchars($conn->real_escape_string($_POST['PRICE4']));
        $year1 = htmlspecialchars($conn->real_escape_string($_POST['YEAR1']));
        $year2 = htmlspecialchars($conn->real_escape_string($_POST['YEAR2']));
        $year3 = htmlspecialchars($conn->real_escape_string($_POST['YEAR3']));
        $year4 = htmlspecialchars($conn->real_escape_string($_POST['YEAR4']));

        // KM - START

        // $km = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Kilométrage'));

        if(isset($km1) & !empty($km1))
        {

            $query_km1 = update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_min_value1', $km1, 'sliders_default_value1', $km1);

            if($query_km1)
            {
                $_SESSION['SUCCESS_SETTINGS']['KM1'] = "Km limite 1 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['KM1'] = "Km limite 1 n'a pas pu être mise à jour !";
            }
        }

        if(isset($km2) & !empty($km2))
        {
            $query_km2 = update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_max_value1', $km2);

            if($query_km2)
            {
                $_SESSION['SUCCESS_SETTINGS']['KM2'] = "Km limite 2 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['KM2'] = "Km limite 2 n'a pas pu être mise à jour !";
            }
        }

        if(isset($km3) & !empty($km3))
        {
            $query_km3 = update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_min_value2', $km3);

            if($query_km3)
            {
                $_SESSION['SUCCESS_SETTINGS']['KM3'] = "Km limite 3 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['KM3'] = "Km limite 3 n'a pas pu être mise à jour !";
            }
        }

        if(isset($km4) & !empty($km4))
        {
            $query_km4 = update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_max_value2', $km4, 'sliders_default_value2', $km4);

            if($query_km4)
            {
                $_SESSION['SUCCESS_SETTINGS']['KM4'] = "Km limite 4 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['KM4'] = "Km limite 4 n'a pas pu être mise à jour !";
            }
        }

        // KM - END

        // PRICE - START

        if(isset($price1) & !empty($price1))
        {
            $query_price1 = update('sliders_filters', 'filters_name', 'Prix', 'sliders_min_value1', $price1, 'sliders_default_value1', $price1);

            if($query_price1)
            {
                $_SESSION['SUCCESS_SETTINGS']['PRICE1'] = "Prix limite 1 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['PRICE1'] = "Prix limite 1 n'a pas pu être mise à jour !";
            }
        }

        if(isset($price2) & !empty($price2))
        {
            $query_price2 = update('sliders_filters', 'filters_name', 'Prix', 'sliders_max_value1', $price2);

            if($query_price2)
            {
                $_SESSION['SUCCESS_SETTINGS']['PRICE2'] = "Prix limite 2 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['PRICE2'] = "Prix limite 2 n'a pas pu être mise à jour !";
            }
        }

        if(isset($price3) & !empty($price3))
        {
            $query_price3 = update('sliders_filters', 'filters_name', 'Prix', 'sliders_min_value2', $price3);

            if($query_price3)
            {
                $_SESSION['SUCCESS_SETTINGS']['PRICE3'] = "Prix limite 3 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['PRICE3'] = "Prix limite 3 n'a pas pu être mise à jour !";
            }
        }

        if(isset($price4) & !empty($price4))
        {
            $query_price4 = update('sliders_filters', 'filters_name', 'Prix', 'sliders_max_value1', $price4, 'sliders_default_value2', $price4);

            if($query_price4)
            {
                $_SESSION['SUCCESS_SETTINGS']['PRICE4'] = "Prix limite 4 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['PRICE4'] = "Prix limite 4 n'a pas pu être mise à jour !";
            }
        }

        // PRICE - END

        // YEAR - START

        if(isset($year1) & !empty($year1))
        {
            $query_year1 = update('sliders_filters', 'filters_name', 'Année', 'sliders_min_value1', $year1, 'sliders_default_value1', $year1);

            if($query_year1)
            {
                $_SESSION['SUCCESS_SETTINGS']['YEAR1'] = "Année limite 1 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['YEAR1'] = "Année limite 1 n'a pas pu être mise à jour !";
            }
        }

        if(isset($year2) & !empty($year2))
        {
            $query_year2 = update('sliders_filters', 'filters_name', 'Année', 'sliders_max_value1', $year2);

            if($query_year2)
            {
                $_SESSION['SUCCESS_SETTINGS']['YEAR2'] = "Année limite 2 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['YEAR2'] = "Année limite 2 n'a pas pu être mise à jour !";
            }
        }

        if(isset($year3) & !empty($year3))
        {
            $query_year3 = update('sliders_filters', 'filters_name', 'Année', 'sliders_min_value2', $year3);

            if($query_year3)
            {
                $_SESSION['SUCCESS_SETTINGS']['YEAR3'] = "Année limite 3 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['YEAR3'] = "Année limite 3 n'a pas pu être mise à jour !";
            }
        }

        if(isset($year4) & !empty($year4))
        {
            $query_year4 = update('sliders_filters', 'filters_name', 'Année', 'sliders_max_value1', $year4, 'sliders_default_value2', $year4);

            if($query_year4)
            {
                $_SESSION['SUCCESS_SETTINGS']['YEAR4'] = "Année limite 4 modifiée avec succès !";
            }
            else
            {
                $_SESSION['ERRORS_SETTINGS']['YEAR4'] = "Année limite 4 n'a pas pu être mise à jour !";
            }
        }

        header('Location: settings.php');
        exit;

        // YEAR - END

        // if($km1 > $km2 || $km1 > $km3 || $km1 > $km4)
        // {
        //     $_SESSION['msg'] = "La limite 1 doit être inférieure aux limites 2, 3 et 4 !";
        // }
        // else if($km2 > $km3 || $km2 > $km4)
        // {
        //     $_SESSION['msg'] = "La limite 2 doit être inférieure aux limites 3 et 4 !";
        // }
        // else if($km3 > $km4)
        // {
        //     $_SESSION['msg'] = "La limite 3 doit être inférieure à la limite 4 !";
        // }
    }
?>