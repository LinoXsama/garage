<?php
    $page_title = "Gestion des demandes";
    
    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

<?php
    if(isset($_SESSION['MSG_ADD_SERVICES']))
    {
        echo
            '<div class="container mt-3">
                <div class="alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
            '. $_SESSION['MSG_ADD_SERVICES'] .'
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';

        unset($_SESSION['MSG_ADD_SERVICES']);
    }

    if(isset($_SESSION['MSG_EDIT_SERVICES']))
    {
        echo
            '<div class="container mt-3">
                <div class="alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
            '. $_SESSION['MSG_EDIT_SERVICES'] .'
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';

        unset($_SESSION['MSG_EDIT_SERVICES']);
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

<h4 class="text-center mt-3 mb-3">Liste des services</h4>

    <div class="container mt-3 mb-4">

        <a href="services_add.php" class="btn btn-dark mb-3 responsive-font">Ajouter un service</a>

        <table class="table table-hover text-center table-striped custom-table table-responsive">

            <thead class="table-dark">
                <tr>
                    <th>Nom du service</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    // Récupération de la liste des services
                    $service = select('services');

                    while($row = mysqli_fetch_assoc($service))
                    {
                ?>

                        <tr>
                            <td data-label="Nom"><?= $row['service_name']; ?></td>
                            <td data-label="Description"><?= $row['service_description']; ?></td>
                            <td data-label="Actions">
                                <a class="link-dark" href="services_edit_transition.php?id=<?= $row['service_id']; ?>"><i class="fa-solid fa-edit fs-5"></i></a> &nbsp;
    
                                <!-- Fonts awesome Icons -->
                                <span class="link-dark"><i id="<?= $row['service_id']; ?>" name="<?= $row['service_name']; ?>" class="fa-solid fa-trash fs-5 service-item"></i></span>
                            </td>
                        </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>

        <div class="modal fade" id="service-delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white responsive-font">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p class="responsive-font">Voulez-vous vraiment supprimer le service </strong><span class="service-name"></span></strong> ?</p>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-danger delete-btn responsive-font">OUI</a>
                            <a type="button" class="btn btn-secondary responsive-font" data-dismiss="modal">NON</a>
                        </div>

                    </div>
                </div>
            </div>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>