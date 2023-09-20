<?php
    $page_title = "Gestion des demandes";
    
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

<main id="main-comments-mg">

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

    <a href="contact_user.php" class="btn btn-dark mb-3 responsive-font">Ajouter un message</a>

        <table class="comments-mg-table custom-table table table-hover text-center table-striped">

            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Date</th>
                    <th>Auteur</th>
                    <th>Adresse email</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Message</th>
                    <th>Publication</th>
                    <th>Note</th>
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
                            <td data-label="ID" class="responsive-font"><?= $row['msg_id']; ?></td>
                            <td data-label="Posté le" class="responsive-font"><?= date('d/m/Y', strtotime($row['msg_date'])); ?></td>
                            <td data-label="Auteur" class="responsive-font"><?= $row['name']; ?></td>
                            <td data-label="Email" class="responsive-font"><?= $row['email']; ?></td>
                            <td data-label="Téléphone" class="responsive-font"><?= $row['phone']; ?></td>
                            <td data-label="Objet" class="responsive-font"><?= ($row['car_id'] !== 0) ? 'VEHICULE' : 'INFORMATION'; ?></td>
                            <td data-label="Message" class="responsive-font table-primary"><?= $row['msg']; ?></td>
                            <td>
                            <form action="publication_formulaire.php" method="POST">
                                <input type="radio" name="STATUS" value="OUI" <?= (isset($row['publication']) && $row['publication'] === 'OUI') ? 'checked' : '' ?>>
                                <label">OUI</label>

                                <input type="radio" name="STATUS" value="NON" <?= (isset($row['publication']) && $row['publication'] === 'NON') ? 'checked' : '' ?>>
                                <label>NON</label>
                                
                                <input type="hidden" name="MSG_ID" value="<?= $row['msg_id']; ?>">
                                <input type="hidden" name="AUTHOR" value="<?= $row['name']; ?>">
                                <input type="hidden" name="MSG_DATE" value="<?= $row['msg_date']; ?>">

                                <input type="submit" name="PUBLICATION">
                            </form>
                            <td data-label="Note" class="responsive-font"><?= $row['rating']; ?> / 5</td>
                            </td>
                            <td data-label="Actions" class="responsive-font">
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

<?php
    } 
 ?>