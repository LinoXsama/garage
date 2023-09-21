<?php
    $page_title = "Détails admin";
    
    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';

?>

<main id="main-details">

    <?php
        if(isset($_SESSION['msg']))
        {
            echo
                '<div class="container">
                    <div class=" responsive-font alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
                '. $_SESSION['msg'] .'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';

            unset($_SESSION['msg']);
        }
    ?>

    <h4 class="text-center mt-3">Galérie d'images</h4>

    <div class="gallery">
        <div class="container-lg">

        <?php
            $car = select('cars', 'cars_id', $_SESSION['CAR_TO_DETAIL']);

            $row = mysqli_fetch_assoc($car);
        ?>
            <div class="row gy-4 row-cols-1 -row-cols-sm-2 row-cols-md-3">
                <div class="col">
                    <img src="<?= $row['cars_gallery_img1']; ?>" alt="<?= $row['cars_alt_text_img1']; ?>" class="cars-gallery-item shadow detail-item" />
                </div>
                <div class="col">
                    <img src="<?= $row['cars_gallery_img2']; ?>" alt="<?= $row['cars_alt_text_img2']; ?>" class="cars-gallery-item shadow detail-item" />
                </div>
                <div class="col">
                    <img src="<?= $row['cars_gallery_img3']; ?>" alt="<?= $row['cars_alt_text_img3']; ?>" class="cars-gallery-item shadow detail-item" />
                </div>
            </div>
        </div>

    </div>

    <h4 class="text-center mb-3">Détails du véhicule</h4>

    <div class="container">
        <div class="card shadow ml-3 mr-3 mb-5">
    
            <h4 class="card-header bg-peach"><?= "{$row['cars_brand']} {$row['cars_model']} - {$row['cars_power']}"; ?> CH</h4>

            <div class="card-body">

                <ul class="card-text list-unstyled">
                    <li><span class="bold">Marque : </span><?= $row['cars_brand']; ?></li>
                    <li><span class="bold">Modèle : </span><?= $row['cars_model']; ?></li>
                    <li><span class="bold">Année : </span><?= $row['cars_release_year']; ?></li>
                    <li><span class="bold">Type de moteur : </span><?= $row['cars_engine_type']; ?></li>
                    <li><span class="bold">Kilométrage : </span><?= $row['cars_km']; ?> Km</li>
                    <li><span class="bold">Boîte de vitesse : </span><?= $row['cars_transmission_type']; ?></li>
                    <li><span class="bold">Nombre de portes : </span><?= $row['cars_doors_number']; ?></li>
                    <li><span>Sellerie : </span><?= $row['cars_seats_material']; ?></li>
                    <li><span class="bold">Couleur : </span><?= $row['cars_color']; ?></li>
                    <li><span class="bold">Garantie : </span><?= $row['cars_warranty']; ?></li>
                    <li><span class="bold">Equipements</span> :
                        <ul>
                            <li><span class="bold">Multimédia</span> : 
                                <ul>
                                    <li><?= $row['cars_equipment1']; ?></li>
                                    <li><?= $row['cars_equipment2']; ?></li>
                                    <li><?= $row['cars_equipment3']; ?></li>
                                    <li><?= $row['cars_equipment4']; ?></li>
                                </ul>
                            </li>
                            <li><span class="bold">Confort</span> : 
                                <ul>
                                    <li><?= $row['cars_equipment5']; ?></li>
                                    <li><?= $row['cars_equipment6']; ?></li>
                                    <li><?= $row['cars_equipment7']; ?></li>
                                    <li><?= $row['cars_equipment8']; ?></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>

            
            <!-- MODAL D'APERCU DES IMAGES - START -->
                <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Aperçu de la photo</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <img src="" alt="" class="img-fluid detail-img" />
                            </div>

                        </div>
                    </div>
                </div>
        <!-- MODAL D'APERCU DES IMAGES - END -->

</main>

<?php require_once 'templates/footer.php'; ?>

