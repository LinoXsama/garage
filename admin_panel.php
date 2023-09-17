<?php
    $page_title = "Panneau d'administration";

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

<main>

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

        <a href="add_user.php" class="btn btn-dark mb-3">Ajouter un utilisateur</a>
        <h3 class="text-center mb-3">Liste des utilisateurs</h3>

       
            <div class="table-responsive">

            <table class="table table-hover custom-table">

                <thead class="table-dark">
                    <tr>
                        <th data-label="ID">ID</th>
                        <th data-label="Prénom">Prénom</th>
                        <th data-label="Nom">Nom</th>
                        <th data-label="Email">Adresse email</th>
                        <th data-label="Password">Mot de passe</th>
                        <th data-label="Actions">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        // Récupération de la liste des utilisateurs employés depuis la base de données

                        $employees = select('crud', 'user_type', 'employee');

                        while($row = mysqli_fetch_assoc($employees))
                        {
                    ?>

                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['first_name']; ?></td>
                                <td><?= $row['last_name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['password']; ?></td>
                                <td>
                                    <!-- Fonts awesome Icons -->
                                    <a href="edit_user_transition.php?id=<?= $row['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

                                    <!-- Fonts awesome Icons -->
                                    <span class="link-dark"><i id="<?= $row['id']; ?>" name="<?= "{$row['first_name']} {$row['last_name']}"; ?>" class="user-item fa-solid fa-trash fs-5"></i></span>
                                </td>
                            </tr>

                    <?php
                        }
                    ?>

                </tbody>

            </table>
        </div>
      

        <!-- MODAL POUR LA CONFIRMATION DE SUPPRESSION DE L'UTILISATEUR SELECTIONNE - START -->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer l'utilisateur <strong><span class="user-name"></span></strong> ?</p>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-danger delete-btn">OUI</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
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