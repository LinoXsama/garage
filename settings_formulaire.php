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

        // VERIFICATION DE LA COHERENCE DU CRITERE KILOMETRAGE - START
                if(!empty($km1) && !empty($km2))
                {
                    if($km1 >= $km2)
                    {
                        $_SESSION['PROBLEMS_KM']['KM1_KM2'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(!empty($km1) && !empty($km3))
                {
                    if($km1 >= $km3)
                    {
                        $_SESSION['PROBLEMS_KM']['KM1_KM3'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le minimum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($km1) && !empty($km4))
                {
                    if($km1 >= $km4)
                    {
                        $_SESSION['PROBLEMS_KM']['KM1_KM4'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($km2) && !empty($km3))
                {
                    if($km2 >= $km3)
                    {
                        $_SESSION['PROBLEMS_KM']['KM2_KM3'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le maximum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($km2) && !empty($km4))
                {
                    if($km2 >= $km4)
                    {
                        $_SESSION['PROBLEMS_KM']['KM2_KM4'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le maximum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($km3) && !empty($km4))
                {
                    if($km3 >= $km4)
                    {
                        $_SESSION['PROBLEMS_KM']['KM3_KM4'] = 'INCOHÉRENCE - KILOMÉTRAGE: Le minimum du slider 2 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(empty($year1) && empty($year2) && empty($year3) && empty($year4))
                {
                    $_SESSION['PROBLEMS_KM']['EMPTY'] = 'VIDE - KILOMÉTRAGE: Vous devez saisir au moins une valeur afin de soumettre le formulaire !';
                }
        // VERIFICATION DE LA COHERENCE DU CRITERE KILOMETRAGE - END

        // VERIFICATION DE LA COHERENCE DU CRITERE PRIX - START
                if(!empty($price1) && !empty($price2))
                {
                    if($price1 >= $price2)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE1_PRICE2'] = 'INCOHÉRENCE - PRIX: Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(!empty($price1) && !empty($price3))
                {
                    if($price1 >= $price3)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE1_PRICE3'] = 'INCOHÉRENCE - PRIX: Le minimum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($price1) && !empty($price4))
                {
                    if($price1 >= $price4)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE1_PRICE4'] = 'INCOHÉRENCE - PRIX: Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($price2) && !empty($price3))
                {
                    if($price2 >= $price3)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE2_PRICE3'] = 'INCOHÉRENCE - PRIX: Le maximum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($price2) && !empty($price4))
                {
                    if($price2 >= $price4)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE2_PRICE4'] = 'INCOHÉRENCE - PRIX: Le maximum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($price3) && !empty($price4))
                {
                    if($price3 >= $price4)
                    {
                        $_SESSION['PROBLEMS_PRICE']['PRICE3_PRICE4'] = 'INCOHÉRENCE - PRIX: Le minimum du slider 2 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(empty($price1) && empty($price2) && empty($price3) && empty($price4))
                {
                    $_SESSION['PROBLEMS_PRICE']['EMPTY'] = 'VIDE - PRIX: Vous devez saisir au moins une valeur afin de soumettre le formulaire !';
                }
        // VERIFICATION DE LA COHERENCE DU CRITERE PRIX - END

        // VERIFICATION DE LA COHERENCE DU CRITERE ANNÉE - START
                if(!empty($year1) && !empty($year2))
                {
                    if($year1 >= $year2)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR1_YEAR2'] = 'INCOHÉRENCE - ANNÉE: Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(!empty($year1) && !empty($year3))
                {
                    if($year1 >= $year3)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR1_YEAR3'] = 'INCOHÉRENCE - ANNÉE : Le minimum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($year1) && !empty($year4))
                {
                    if($year1 >= $year4)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR1_YEAR4'] = 'INCOHÉRENCE - ANNÉE : Le minimum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($year2) && !empty($year3))
                {
                    if($year2 >= $year3)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR2_YEAR3'] = 'INCOHÉRENCE - ANNÉE : Le maximum du slider 1 ne peut pas être supérieur ou égal au minimum du slider 2';
                    }
                }

                if(!empty($year2) && !empty($year4))
                {
                    if($year2 >= $year4)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR2_YEAR4'] = 'INCOHÉRENCE - ANNÉE : Le maximum du slider 1 ne peut pas être supérieur ou égal au maximum du slider 2';
                    }
                }

                if(!empty($year3) && !empty($year4))
                {
                    if($year3 >= $year4)
                    {
                        $_SESSION['PROBLEMS_YEAR']['YEAR3_YEAR4'] = 'INCOHÉRENCE - ANNÉE : Le minimum du slider 2 ne peut pas être supérieur ou égal au maximum de ce même slider';
                    }
                }

                if(empty($year1) && empty($year2) && empty($year3) && empty($year4))
                {
                    $_SESSION['PROBLEMS_YEAR']['EMPTY'] = 'VIDE - ANNÉE : Vous devez saisir au moins une valeur afin de soumettre le formulaire !';
                }
        // VERIFICATION DE LA COHERENCE DU CRITERE ANNÉE - END

        if(!isset($_SESSION['PROBLEMS_KM']))
        {
                // KM - START
                    if(!empty($km1))
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
        
                    if(!empty($km2))
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
        
                    if(!empty($km3))
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
        
                    if(!empty($km4))
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
        }

        if(!isset($_SESSION['PROBLEMS_PRICE']))
        {
            // PRICE - START
                    if(!empty($price1))
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
        
                    if(!empty($price2))
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
        
                    if(!empty($price3))
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
        
                    if(!empty($price4))
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
        }

        if(!isset($_SESSION['PROBLEMS_YEAR']))
        {
            // YEAR - START
                    if(!empty($year1))
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
        
                    if(!empty($year2))
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
        
                    if(!empty($year3))
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
        
                    if(!empty($year4))
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
            // YEAR - END
        }
        

        header('Location: settings.php');
        exit;
    }
?>

