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

<h4 class="text-center mt-3 mb-3">Liste des messages</h4>

    <div class="container mt-3 mb-4">
        <table class="table table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Date</th>
                    <th>Auteur</th>
                    <th>Adresse email</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    // Récupération de la liste des messages

                    $messages = select('contacts');

                    while($row = mysqli_fetch_assoc($messages))
                    {
                ?>

                        <tr>
                            <td><?= $row['msg_id']; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['msg_date'])); ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= ($row['car_id'] !== 0) ? 'VEHICULE' : 'INFORMATION'; ?></td>
                            <td><span class="bg-primary text-white px-1 py-1 border-radius"><?= $row['msg']; ?></span></td>
                            <td>
                                <?php
                                    if($row['car_id'] !== 0)
                                    {
                                        // Fonts awesome Icons
                                        echo '<a class="link-dark" href="comments_mg_transition.php?id=' .$row['car_id']. '"' .'><i class="fa-solid fa-car fs-5"></i></a>';
                                    }
                                ?>
                                <!-- Fonts awesome Icons -->
                                &nbsp;&nbsp;<span class="link-dark"><i id="<?= $row['msg_id']; ?>" name="<?= $row['name']; ?>" data-target="<?= date('d/m/Y', strtotime($row['msg_date'])); ?>" class="fa-solid fa-trash fs-5 msg-item"></i></span>
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