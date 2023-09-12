<?php
    $page_title = "Gestion des demandes";
    
    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

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
        <table class="table table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Propriétaire</th>
                    <th>Prix</th>
                    <th>Ajouté le</th>
                    <th>Ajouté par</th>
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

                        <tr>
                            <td><?= $row['cars_id']; ?></td>
                            <td><?= $row['cars_brand']; ?></td>
                            <td><?= $row['cars_brand']; ?></td>
                            <td><?= $row['cars_owner']; ?></td>
                            <td><?= $row['cars_price']; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['cars_post_date'])); ?></td>
                            <td><?=  $row['cars_author']; ?></td>
                            <td id="bg-peach"><?= $row['msg']; ?></td>
                            <td>
                                <a class="link-dark" href="comments_mg_transition.php?id=<?= $row['car_id']; ?>"><i class="fa-solid fa-eye fs-5"></i></a> &nbsp;;
    
                                <!-- Fonts awesome Icons -->
                                <span class="link-dark"><i id="<?= $row['cars_id']; ?>" name="<?= "{$row['cars_brand']} {$row['cars_model']}"; ?>" data-target="<?= date('d/m/Y', strtotime($row['msg_date'])); ?>" class="fa-solid fa-trash fs-5 msg-item"></i></span>
                            </td>
                        </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>

        <div class="modal fade" id="msg-delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer le message <strong>N°<span class="msg-id"></span></strong> de <strong><span class="msg-author"></span></strong> du <strong><span class="msg-date"></span></strong> ?</p>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-danger delete-btn">OUI</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                        </div>

                    </div>
                </div>
            </div>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>