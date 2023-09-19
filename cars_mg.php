<?php
    $page_title = "Gestion des véhicules";
    
    session_start();

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

<main id="main-cars-mg">

<?php
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

<h4 class="text-center mt-3 mb-3">Liste des véhicules</h4>

    <div class="container mt-3 mb-4">

        <a href="add_cars.php" class="btn btn-dark mb-3 responsive-font">Ajouter un véhicule</a>

        <table class="table table-hover text-center table-striped custom-table table-responsive">

            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Propriétaire</th>
                    <th>Prix</th>
                    <th>Ajouté le</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    // Récupération de la liste des messages

                    $vehicles = select('cars');

                    while($row = mysqli_fetch_assoc($vehicles))
                    {
                ?>

                        <tr class="table-warning">
                            <td data-label="ID"><?= $row['cars_id']; ?></td>
                            <td data-label="Marque"><?= $row['cars_brand']; ?></td>
                            <td data-label="Modèle"><?= $row['cars_model']; ?></td>
                            <td data-label="Proprio"><span class="border-radius bg-primary py-1 px-1 text-white responsive-font"><?= $row['cars_owner']; ?></span></td>
                            <td data-label="Prix"><?= $row['cars_price']; ?> €</td>
                            <td data-label="Ajouté le"><?= date('d/m/Y', strtotime($row['cars_post_date'])); ?></td>
                            <td data-label="Actions">
                                <a class="link-dark" href="vehicles_mg_transition.php?id=<?= $row['cars_id']; ?>"><i class="fa-solid fa-car fs-5"></i></a> &nbsp;

                                <a class="link-dark" href="edit_gallery_transition.php?id=<?= $row['cars_id']; ?>"><i class="fa-solid fa-image fs-5"></i></a> &nbsp;
    
                                <!-- Fonts awesome Icons -->
                                <span class="link-dark"><i id="<?= $row['cars_id']; ?>" name="<?= "{$row['cars_brand']} {$row['cars_model']}"; ?>" data-target="<?= $row['cars_owner']; ?>" class="fa-solid fa-trash fs-5 cars-item cp"></i></span>
                            </td>
                        </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>
            
        <!-- MODAL DE LA CONFIRMATION DE SUPPRESSION D'UN VEHICULE - START -->
            <div class="modal fade" id="cars-delete-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white responsive-font">Confirmation de suppression</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p class="responsive-font">Voulez-vous vraiment supprimer le véhicule <strong>N°<span class="cars-id"></span></strong> : <strong><span class="cars-name"></span></strong> de <strong><span class="cars-owner"></span></strong> ?</p>
                            </div>

                            <div class="modal-footer">
                                <a class="btn btn-danger delete-btn responsive-font">OUI</a>
                                <a type="button" class="btn btn-secondary responsive-font" data-dismiss="modal">NON</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <!-- MODAL DE LA CONFIRMATION DE SUPPRESSION D'UN VEHICULE - END -->


</main>

<?php require_once 'templates/footer.php'; ?>

<?php
    }
?>