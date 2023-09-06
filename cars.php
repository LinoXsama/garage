<?php
    $page_title = 'Nos véhicules';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

    <!-- BARRE DE RECHERCHE - START -->
    <div id="search" class="container mt-4 d-flex justify-content-center">
        <form role="search">
            <input
                id="search-bar"
                class="form-control form-control-dark"
                type="search"
                placeholder="Cherchez par marque, modèle, année de sortie, nombre de chevaux"
                aria-label="Search"
                oninput="search_bar()"
            />
        </form>
    </div>
    <!-- BARRE DE RECHERCHE - END -->

    <!-- FILTRES DE RECHERCHE PAR CRITERES : KILOMETRAGE, PRIX, ANNEES - START -->
    <div class="container mt-2">
        <form class="d-flex justify-content-around">

            <?php
                // GESTION DYNAMIQUE DES FILTRES 
                $filters = select('sliders_filters');

                while($row = mysqli_fetch_assoc($filters))
                {
            ?>
                    <!-- MODELE D'UN FILTRE - START -->
                    <div>
                        <label class="d-block"><?= $row['filters_name']; ?></label>
                        <div class="d-flex">
                            <input 
                                type="range"
                                min="<?= $row['sliders_min_value1']; ?>"
                                max="<?= $row['sliders_max_value1']; ?>"
                                step="1"
                                value="<?= $row['sliders_default_value1']; ?>"
                                id="<?= $row['sliders_id1']; ?>"
                                class="d-inline-block"
                                oninput="search_sliders()"
                            />
                            <input 
                                type="range"
                                min="<?= $row['sliders_min_value2']; ?>"
                                max="<?= $row['sliders_max_value2']; ?>"
                                step="1"
                                value="<?= $row['sliders_default_value2']; ?>"
                                id="<?= $row['sliders_id2']; ?>"
                                class="d-inline-block"
                                oninput="search_sliders()"
                            />
                        </div>
                        <div class="ctn d-flex justify-content-between">
                            <span>
                                <span id="<?= $row['limit1']; ?>"><?= $row['sliders_min_value1']; ?></span> <?= $row['unit']; ?> - <span id="<?= $row['limit2']; ?>"><?= $row['sliders_max_value2']; ?></span> <?= $row['unit']; ?>
                            </span>
                            <button class="reset-button" value="<?= $row['button_value']; ?>" onclick="reset()">Réinitialiser</button>
                        </div>
                    </div>
                    <!-- MODELE D'UN FILTRE - END -->
            <?php
                }
            ?>

        </form>
    </div>
    <!-- FILTRES DE RECHERCHE PAR CRITERES : KILOMETRAGE, PRIX, ANNEES - END -->

    <div id="cars-container" class="container mt-4 mb-4 pt-4">

        <div class="row row-cols-1 row-cols-md-3 g-4 pb-4">

            <?php
                $cars = select('cars');

                while($row = mysqli_fetch_assoc($cars))
                {
            ?>

                <!-- Modèle de la fiche de présentation d'un véhicule - START -->
                <div class="car col">
                    <div class="card h-100 shadow custom-card">
                        <span class="btn btn-dark" id="price-tag"><span class="price"><?= "{$row['cars_price']} "; ?></span>€</span>
                        <img src="<?= $row['cars_image_path']; ?>" alt="" class="card-img-top w-100 custom-bg gallery-item" />
                        <div class="card-body">
                            <h4 class="card-title"><?= "{$row['cars_brand']} {$row['cars_model']} {$row['cars_release_year']} {$row['cars_power']} "; ?>CH</h4>
                            <ul class="card-text list-unstyled">
                                <li><span>Année : </span><span class="release-year"><?= $row['cars_release_year']; ?></span></li>
                                <li><span>Type de moteur : </span><?= $row['cars_engine_type']; ?></li>
                                <li><span>Kilométrage : <span class="kilometrage"><?= "{$row['cars_km']} "; ?></span>km</span></li>
                            </ul>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <h4 class="custom-highlight"><?= "{$row['cars_price']} "; ?>€</h4>
                            </div>
                            <div class="float-end">
                                <a href="#" class="btn btn-dark rounded-3 custom-btn">DÉTAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modèle de la fiche de présentation d'un véhicule - END -->
            
            <?php
                }
            ?>

        </div>

    </div>

    <!-- MODAL - START -->
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Galérie d'images</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="" alt="" class="img-fluid modal-img" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
        </div>
    <!-- MODAL - END -->

</main>

<?php require_once 'templates/footer.php'; ?>

