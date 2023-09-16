<?php
    require_once 'config/db_connect.php';
    require_once 'functions.php';

    session_start();
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
        $year1 = htmlspecialchars($conn->real_escape_string($_POST['YEAR1']));
        $year2 = htmlspecialchars($conn->real_escape_string($_POST['YEAR2']));

        // KM - START

        if(isset($km1) & !empty($km1) & is_int($km1))
        {
            update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_min_value1', $km1, 'sliders_default_value1', $km1);
        }

        if(isset($km2) & !empty($km2) & is_int($km2))
        {
            update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_max_value1', $km2);
        }

        if(isset($km3) & !empty($km3) & is_int($km3))
        {
            update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_min_value2', $km3, 'sliders_default_value2', $km3);
        }

        if(isset($km4) & !empty($km4) & is_int($km4))
        {
            update('sliders_filters', 'filters_name', 'Kilométrage', 'sliders_max_value1', $km4);
        }

        // KM - END

        // PRICE - START

        if(isset($price1) & !empty($price1) & is_int($price1))
        {
            update('sliders_filters', 'filters_name', 'Prix', 'sliders_min_value1', $price1, 'sliders_default_value1', $price1);
        }

        if(isset($price2) & !empty($price2) & is_int($price2))
        {
            update('sliders_filters', 'filters_name', 'Prix', 'sliders_max_value1', $price2);
        }

        if(isset($price3) & !empty($price3) & is_int($price3))
        {
            update('sliders_filters', 'filters_name', 'Prix', 'sliders_min_value2', $price3, 'sliders_default_value2', $price3);
        }

        if(isset($price4) & !empty($price4) & is_int($price4))
        {
            update('sliders_filters', 'filters_name', 'Prix', 'sliders_max_value1', $price4);
        }

        // PRICE - END

        // YEAR - START

        if(isset($year1) & !empty($year1) & is_int($year1))
        {
            update('sliders_filters', 'filters_name', 'Année', 'sliders_min_value1', $year1, 'sliders_default_value1', $year1);
        }

        if(isset($year2) & !empty($year2) & is_int($year2))
        {
            update('sliders_filters', 'filters_name', 'Année', 'sliders_max_value1', $year2);
        }

        if(isset($year3) & !empty($year3) & is_int($year3))
        {
            update('sliders_filters', 'filters_name', 'Année', 'sliders_min_value2', $year3, 'sliders_default_value2', $year3);
        }

        if(isset($year4) & !empty($year4) & is_int($year4))
        {
            update('sliders_filters', 'filters_name', 'Année', 'sliders_max_value1', $year4);
        }

        // YEAR - END
    }
?>