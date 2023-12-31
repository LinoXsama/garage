<?php 
    session_start();

    $page_title = "Ajouter des images"

    if(!isset($_SESSION['user_id']))
    {
        header('Location: login.php');
        exit;
    }
    else
    {

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<!-- GESTION DES NOTIFICATIONS - START -->
    <?php
            if(isset($_SESSION['IMG_SUCCESS_ALL']))
            {
                echo
                    '<div class="container mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                    '. $_SESSION['IMG_SUCCESS_ALL'] .'
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>';

                unset($_SESSION['IMG_SUCCESS_ALL']);
            }

            if(isset($_SESSION['EMPTY_FORM']))
            {  
                echo 
                    '<div class="container mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            '. $_SESSION['EMPTY_FORM'] .'
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>';
                unset($_SESSION['EMPTY_FORM']);
            }

            if(isset($_SESSION['ERRORS']))
            {
                foreach ($_SESSION['ERRORS'] as $error) {
                    echo '
                        <div class="container mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                '. $error .'
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>';
                }

                unset($_SESSION['ERRORS']);
            }

            if(isset($_SESSION['SUCCESS']))
            {
                foreach ($_SESSION['SUCCESS'] as $success) {
                    echo '
                        <div class="container mt-3">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                '. $success .'
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>';
                }

                unset($_SESSION['SUCCESS']);
            }

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
<!-- GESTION DES NOTIFICATIONS - END -->

<main>

    <?php
    if(isset($_SESSION['CAR_ID']))
    {
        $car = select('cars', 'cars_id', $_SESSION['CAR_ID']);

        $row = mysqli_fetch_assoc($car);
    ?>
    
    <h4 class="text-center mt-3">Images actuelles du véhicule N° <?= "{$row['cars_id']} : {$row['cars_brand']} {$row['cars_model']} de {$row['cars_owner']}"; ?></h4>

    <div class="gallery">
        <div class="container-lg">

            <div class="row gy-4 row-cols-1 -row-cols-sm-2 row-cols-md-3">
                <div class="col">
                    <img id="<?= $row['cars_id']; ?>" src="<?= $row['cars_main_img']; ?>" alt="<?= $row['cars_alt_text']; ?>" class="cars-gallery-item cp shadow bg-warning deletable-img" />
                </div>
                <div class="col">
                    <img id="<?= $row['cars_id']; ?>" src="<?= $row['cars_gallery_img1']; ?>" alt="<?= $row['cars_alt_text_img1']; ?>" class="cars-gallery-item cp shadow deletable-img" />
                </div>
                <div class="col">
                    <img id="<?= $row['cars_id']; ?>" src="<?= $row['cars_gallery_img2']; ?>" alt="<?= $row['cars_alt_text_img2']; ?>" class="cars-gallery-item cp shadow deletable-img" />
                </div>
                <div class="col">
                    <img id="<?= $row['cars_id']; ?>" src="<?= $row['cars_gallery_img3']; ?>" alt="<?= $row['cars_alt_text_img3']; ?>" class="cars-gallery-item cp shadow deletable-img" />
                </div>
            </div>
        </div>

    </div>

    <?php
    }
    ?>

    <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5 class="pt-2 text-align text-center">Ajouter des images d'un véhicule</h5>
                            </div>
                            <div class="card-body">

                                <form action="formulaire_upload_img.php" method="POST" enctype="multipart/form-data">

                                    <label class="form-label">Image de la miniature</label>
                                    <input class="form-control" type="file" name="CARS_THUMBNAIL_IMG">

                                    <label class="form-label">1ère image de la galérie</label>
                                    <input class="form-control" type="file" name="CARS_IMG1">

                                    <label class="form-label">2ème image de la galérie</label>
                                    <input class="form-control" type="file" name="CARS_IMG2">

                                    <label class="form-label">3ème image de la galérie</label>
                                    <input class="form-control" type="file" name="CARS_IMG3">

                                    <button class="btn btn-primary mt-4" type="submit" name="UPLOAD">ENREGISTRER</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- MODAL DE LA CONFIRMATION DE SUPPRESSION D'UNE IMAGE - START -->
    <div class="modal fade" id="img-delete-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white responsive-font">Confirmez-vous la suppression de l'image ?</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <img src="" alt="" class="img-fluid delete-preview-img" />
                            </div>

                            <div class="modal-footer">
                                <a class="btn btn-danger delete-btn responsive-font">OUI</a>
                                <a type="button" class="btn btn-secondary responsive-font" data-dismiss="modal">NON</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <!-- MODAL DE LA CONFIRMATION DE SUPPRESSION D'UNE IMAGE - END -->

</main>

<?php include('templates/footer.php'); ?>

<?php 
    } 
?>