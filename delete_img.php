<?php
    require_once 'config/db_connect.php';
    require_once 'functions.php';

    session_start();

    if(isset($_GET['id']))
    {
        $car_id = $conn->real_escape_string(($_GET['id']));
        $alt_text = $conn->real_escape_string(($_GET['alt_text']));
        $path = $conn->real_escape_string(($_GET['path']));

        $pieces = explode(" ", $alt_text);
        $key_word = end($pieces);
        
        if($key_word === 'miniature')
        {
            if(file_exists($path)) 
            {
                if(unlink($path)) 
                {
                    $query_status = update('cars', 'cars_id',  $car_id, 'cars_main_img', '', 'cars_alt_text', '');
                } 
            }
        }
        else if($key_word === 'image1')
        {
            if(file_exists($path)) 
            {
                if(unlink($path)) 
                {
                    $query_status = update('cars', 'cars_id',  $car_id, 'cars_gallery_img1', '', 'cars_alt_text_img1', '');
                } 
            }
        }
        else if($key_word === 'image2')
        {
            if(file_exists($path)) 
            {
                if(unlink($path)) 
                {
                    $query_status = update('cars', 'cars_id',  $car_id, 'cars_gallery_img2', '', 'cars_alt_text_img1', '');
                } 
            }
        }
        else if($key_word === 'image3')
        {
            if(file_exists($path)) 
            {
                if(unlink($path)) 
                {
                    $query_status = update('cars', 'cars_id',  $car_id, 'cars_gallery_img3', '', 'cars_alt_text_img3', '');
                } 
            }
        }
        

        

        if($query_status)
        {
            $_SESSION['msg'] = "L'image a bien été supprimé !";
            $_SESSION['alert_type'] = 'success';

            header("Location: edit_img.php");
            exit;
        }
        else
        {
            $_SESSION['msg'] = "Echec de la suppression de l'image";
            $_SESSION['alert_type'] = 'danger';

            header("Location: edit_img.php");
            exit;
        }
    }
?>