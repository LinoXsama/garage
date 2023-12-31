<?php
    session_start();
    
    require_once 'config/db_connect.php';
    require_once 'functions.php';
?>

<?php
    if(isset($_POST['UPLOAD'])) 
    {  
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        
        $query_status1 = $query_status2 = $query_status3 = $query_status4 = false;

        $car = select('cars', 'cars_id', $_SESSION['CAR_ID']);
        $row = mysqli_fetch_assoc($car);

        $cars_name = "{$row['cars_brand']} {$row['cars_model']}";
        
        // THUMBNAIL - START
        if(!empty($_FILES['CARS_THUMBNAIL_IMG']['name']))
        {
            $thumbnail_name = $_FILES['CARS_THUMBNAIL_IMG']['name'];
            $thumbnail_TmpName = $_FILES['CARS_THUMBNAIL_IMG']['tmp_name'];
            $thumbnail_error = $_FILES['CARS_THUMBNAIL_IMG']['error'];
            $thumbnail_SizeInBytes = $_FILES['CARS_THUMBNAIL_IMG']['size'];
            $thumbnail_ext = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

            if(in_array($thumbnail_ext, $allowed_ext))
            {
                if($thumbnail_error === 0) 
                {
                        $fileSizeInMegaBytes = round($thumbnail_SizeInBytes / (1024 * 1024), 2);

                        if($fileSizeInMegaBytes <= 5) 
                        {
                            $img_uniqid = uniqid();

                            $fileNewName = $img_uniqid . '.' . 'miniature' . '.' . $thumbnail_ext;

                            $file_destination = 'img/' . $fileNewName;

                            move_uploaded_file($thumbnail_TmpName, $file_destination);

                            $img_alt_text = "{$cars_name} {$img_uniqid} miniature";

                            $query_status1 = update('cars', 'cars_id', $_SESSION['CAR_ID'], 'cars_main_img', $file_destination, 'cars_alt_text', $img_alt_text);

                            if(!$query_status1)
                            {
                                $_SESSION['ERRORS']['ERROR_THUMBNAIL'] = "L'image de la miniature n'a pas pu être ajoutée !";
                            }
                            else
                            {
                                $_SESSION['SUCCESS']['SUCCESS_THUMBNAIL'] = "L'image de la miniature a bien été ajoutée !";
                            }
                        } 
                        else 
                        {
                            $_SESSION['ERRORS']['ERROR_THUMBNAIL'] = "La taille de l'image de la miniature est supérieure à 5 Mo. Elle est de " . $fileSizeInMegaBytes . ' Mo';
                        }
                    } 
                    else 
                    {
                        $_SESSION['ERRORS']['ERROR_THUMBNAIL'] = "Il y a un problème avec l'image de la miniature !";
                    }
                } 
                else 
                {
                    $_SESSION['ERRORS']['ERROR_THUMBNAIL'] = $thumbnail_ext ." n'est pas une extension valide pour l'image de la miniature : jpg, jpeg ou png uniquement !";
                }
            }
        // THUMBNAIL - END

        // IMG1 - START
            if(!empty($_FILES['CARS_IMG1']['name']))
            {
                $img1_name = $_FILES['CARS_IMG1']['name'];
                $img1_TmpName = $_FILES['CARS_IMG1']['tmp_name'];
                $img1_error = $_FILES['CARS_IMG1']['error'];
                $img1_SizeInBytes = $_FILES['CARS_IMG1']['size'];
                $img1_ext = pathinfo($img1_name, PATHINFO_EXTENSION);

                if(in_array($img1_ext, $allowed_ext))
                {
                    if($img1_error === 0) 
                    {
                        $fileSizeInMegaBytes = round($img1_SizeInBytes / (1024 * 1024), 2);

                        if($fileSizeInMegaBytes <= 5)
                        {
                            $img_uniqid = uniqid();

                            $fileNewName = $img_uniqid . '.' . 'image1' . '.' . $img1_ext;

                            $file_destination = 'img/' . $fileNewName;

                            move_uploaded_file($img1_TmpName, $file_destination);

                            $img_alt_text = "{$cars_name} {$img_uniqid} image1";

                            $query_status2 = update('cars', 'cars_id', $_SESSION['CAR_ID'], 'cars_gallery_img1', $file_destination, 'cars_alt_text_img1', $img_alt_text);

                            if(!$query_status2)
                            {
                                $_SESSION['ERRORS']['ERROR_IMG1'] = "L'image 1 n'a pas pu être ajoutée";
                            }
                            else
                            {
                                $_SESSION['SUCCESS']['SUCCESS_IMG1'] = "L'image 1 a bien été ajoutée !";
                            }
                        } 
                        else
                        {
                            $_SESSION['ERRORS']['ERROR_IMG1'] = "La taille de l'image 1 est supérieure à 5 Mo. Elle est de " . $fileSizeInMegaBytes . ' Mo';
                        }
                    } 
                    else 
                    {
                        $_SESSION['ERRORS']['ERROR_IMG1'] = "Il y a un problème avec l'image 1 !";
                    }
                }
                else
                {
                    $_SESSION['ERRORS']['ERROR_IMG1'] = $img1_ext ." n'est pas une extension valide pour l'image 1 : jpg, jpeg ou png uniquement !";
                }
            }
        // IMG1 - END

        // IMG2 - START
            if(!empty($_FILES['CARS_IMG2']['name']))
            {
                $img2_name = $_FILES['CARS_IMG2']['name'];
                $img2_TmpName = $_FILES['CARS_IMG2']['tmp_name'];
                $img2_error = $_FILES['CARS_IMG2']['error'];
                $img2_SizeInBytes = $_FILES['CARS_IMG2']['size'];
                $img2_ext = pathinfo($img2_name, PATHINFO_EXTENSION);

                if(in_array($img2_ext, $allowed_ext))
                {
                    if($img2_error === 0) 
                    {
                        $fileSizeInMegaBytes = round($img2_SizeInBytes / (1024 * 1024), 2);
        
                        if($fileSizeInMegaBytes <= 5) 
                        {
                            $img_uniqid = uniqid();

                            $fileNewName = $img_uniqid . '.' . 'image2' . '.' .$img2_ext;
        
                            $file_destination = 'img/' . $fileNewName;
        
                            move_uploaded_file($img2_TmpName, $file_destination);

                            $img_alt_text = "{$cars_name} {$img_uniqid} image2";
        
                            $query_status3 = update('cars', 'cars_id', $_SESSION['CAR_ID'], 'cars_gallery_img2', $file_destination, 'cars_alt_text_img2', $img_alt_text);
        
                            if(!$query_status3)
                            {
                                $_SESSION['ERRORS']['ERROR_IMG2'] = "L'image 2 n'a pas pu être ajoutée";
                            }
                            else
                            {
                                $_SESSION['SUCCESS']['SUCCESS_IMG2'] = "L'image 2 a bien été ajoutée !";
                            }
                        } 
                        else 
                        {
                            $_SESSION['ERRORS']['ERROR_IMG2'] = "La taille de l'image 2 est supérieure à 5 Mo. Elle est de " . $fileSizeInMegaBytes . ' Mo';
                        }
                    } 
                    else 
                    {
                        $_SESSION['ERRORS']['ERROR_IMG2'] = "Il y a un problème avec l'image 2 !";
                    }
                } 
                else 
                {
                    $_SESSION['ERRORS']['ERROR_IMG2'] = $img2_ext ." n'est pas une extension valide pour l'image 2 : jpg, jpeg ou png uniquement !";
                }
            }
        // IMG2 - END

        // IMG3 - START
            if(!empty($_FILES['CARS_IMG3']['name']))
            {
                $img3_name = $_FILES['CARS_IMG3']['name'];
                $img3_TmpName = $_FILES['CARS_IMG3']['tmp_name'];
                $img3_error = $_FILES['CARS_IMG3']['error'];
                $img3_SizeInBytes = $_FILES['CARS_IMG3']['size'];
                $img3_ext = pathinfo($img3_name, PATHINFO_EXTENSION);

                if(in_array($img3_ext, $allowed_ext))
                {
                    if($img3_error === 0) 
                    {
                        $fileSizeInMegaBytes = round($img3_SizeInBytes / (1024 * 1024), 2);

                        if($fileSizeInMegaBytes <= 5) 
                        {
                            $img_uniqid = uniqid();

                            $fileNewName = $img_uniqid . '.' . 'image3' . '.'. $img3_ext;

                            $file_destination = 'img/' . $fileNewName;

                            move_uploaded_file($img3_TmpName, $file_destination);

                            $img_alt_text = "{$cars_name} {$img_uniqid} image3";

                            $query_status4 = update('cars', 'cars_id', $_SESSION['CAR_ID'], 'cars_gallery_img3', $file_destination, 'cars_alt_text_img3', $img_alt_text);

                            if(!$query_status4)
                            {
                                $_SESSION['ERRORS']['ERROR_IMG3'] = "L'image 3 n'a pas pu être ajoutée";
                            }
                            else
                            {
                                $_SESSION['SUCCESS']['SUCCESS_IMG3'] = "L'image 3 a bien été ajoutée !";
                            }
                        } 
                        else 
                        {
                            $_SESSION['ERRORS']['ERROR_IMG3'] = "La taille de l'image 3 est supérieure à 5 Mo. Elle est de " . $fileSizeInMegaBytes . ' Mo';
                        }
                    } 
                    else 
                    {
                        $_SESSION['ERRORS']['ERROR_IMG3'] = "Il y a un problème avec l'image 3 !";
                    }
                } 
                else 
                {
                    $_SESSION['ERRORS']['ERROR_IMG3'] = $img3_ext ." n'est pas une extension valide pour l'image 3 : jpg, jpeg ou png uniquement !";
                }
            }
        // IMG3 - END

        if($query_status1 & $query_status2 & $query_status3 & $query_status4)
        {
            unset($_SESSION['SUCCESS']);
        
            $_SESSION['IMG_SUCCESS_ALL'] = 'Toutes les images ont bien été importées !';
        }

        if(empty($_FILES['CARS_THUMBNAIL_IMG']['name']) & empty($_FILES['CARS_IMG1']['name']) & empty($_FILES['CARS_IMG2']['name']) & empty($_FILES['CARS_IMG3']['name']))
        {
            $_SESSION['EMPTY_FORM'] = "Vous devez choisir au moins une image à enregistrer !";
        }

        header("Location: edit_img.php");
        exit;
    }
?>