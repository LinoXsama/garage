<?php
    $page_title = "Gestion des utilisateurs";

    session_start();

    if(!isset($_SESSION['user_id']))
    {
        header('Location: login.php');
        exit;
    }
    else
    {
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main id="main-admin-panel">

    <div class="container mt-3 mb-4">

        <?php
            if(isset($_SESSION['msg']))
            {
                echo
                '<div class="alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
                    '. $_SESSION['msg'] .'
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>';

                unset($_SESSION['msg']);
            }
        ?>

<h3 class="text-center mb-3">Liste des utilisateurs</h3>

<a href="add_user.php" class="btn btn-dark mb-3 responsive-font roboto">Ajouter un utilisateur</a>

            <table class="custom-table table-responsive table-striped table table-hover table-striped">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Adresse email</th>
                        <th>Mot de passe</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        // Récupération de la liste des utilisateurs employés depuis la base de données

                        $employees = select('crud', 'user_type', 'employee');

                        while($row = mysqli_fetch_assoc($employees))
                        {
                    ?>

                            <tr class="table-primary roboto">
                                <td data-label="ID" class="responsive-font"><?= $row['id']; ?></td>
                                <td data-label="Prénom" class="responsive-font"><?= $row['first_name']; ?></td>
                                <td data-label="Nom" class="responsive-font"><?= $row['last_name']; ?></td>
                                <td data-label="Email" class="responsive-font"><?= $row['email']; ?></td>
                                <td data-label="Password" class="responsive-font"><?= $row['password']; ?></td>
                                <td data-label="Actions">
                                    <!-- Fonts awesome Icons -->
                                    <a href="edit_user_transition.php?id=<?= $row['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

                                    <!-- Fonts awesome Icons -->
                                    <span class="link-dark"><i id="<?= $row['id']; ?>" name="<?= "{$row['first_name']} {$row['last_name']}"; ?>" class="user-item cp fa-solid fa-trash fs-5"></i></span>
                                </td>
                            </tr>

                    <?php
                        }
                    ?>

                </tbody>

            </table>

        <!-- MODAL POUR LA CONFIRMATION DE SUPPRESSION DE L'UTILISATEUR SELECTIONNE - START -->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white responsive-font2">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p class="responsive-font roboto">Voulez-vous vraiment supprimer l'utilisateur <strong><span class="user-name"></span></strong> ?</p>
                        </div>

                        <div class="modal-footer">
                            <a class="responsive-font btn btn-danger delete-btn roboto">OUI</a>
                            <button type="button" class="responsive-font btn btn-secondary roboto" data-dismiss="modal">NON</button>
                        </div>

                    </div>
                </div>
            </div>
        <!-- MODAL POUR LA CONFIRMATION DE SUPPRESSION DE L'UTILISATEUR SELECTIONNE - END -->


</main>

<?php include('templates/footer.php'); ?>

<?php
    }
?>