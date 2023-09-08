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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                unset($_SESSION['msg']);
            }
        ?>

        <a href="add_user.php" class="btn btn-dark mb-3">Ajouter un utilisateur</a>
        <h3 class="text-center mb-3">Liste des utilisateurs</h3>

        <table class="table table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
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

                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['last_name']; ?></td>
                            <td><?= $row['first_name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td>
                                <!-- Fonts awesome Icons -->
                                <a href="transition.php?id=<?= $row['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

                                <!-- Fonts awesome Icons -->
                                <a href="delete.php?id=<?= $row['id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>

</main>

<?php include('templates/footer.php'); ?>

<?php
    }
?>