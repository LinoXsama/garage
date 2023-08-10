<?php
    $page_title = "Panneau d'administration";
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<?php
    session_start();
    
    $_SESSION['email'] = '';
    $_SESSION['password'] = '';
    $_SESSION['password_confirmation'] = '';

    $signup_errors = array
    (
        'empty_email' => '',
        'invalid_email' => '',
        'taken_email' => '',
        'empty_password' => '',
        'invalid_password' => '',
        'unconfirmed_password' => '',
        'connection_error' => ''
    );

    $email_status = '';
    $password_status = '';
    $registration_status = '';
?>

<?php
    if(isset($_POST['add_user']))
    {
        $_SESSION['email'] = htmlspecialchars($_POST['user_email']);
        $_SESSION['password'] = htmlspecialchars($_POST['user_pwd']);
        $_SESSION['password_confirmation'] = htmlspecialchars($_POST['user_pwd_cf']);

        // Vérification de l'adresse mail
        if(empty($_SESSION['email']))
        {
            $signup_errors['empty_email'] = "Aucune adresse mail n'a été renseignée";
        }
        elseif(is_email_invalid($_SESSION['email']))
        {
            $signup_errors['invalid_email'] = 'Le format de cette adresse mail est invalide';
        }
        elseif(does_email_exist($conn, $_SESSION['email']))
        {
            $signup_errors['taken_email'] = 'Cette adresse mail est déjà associée à un utilisateur';
        }
        else // Si l'email respecte tous les critères
        {
            $email_status = true;
        }

        // Vérification du mot de passe
        if(empty($_SESSION['password']))
        {
            $signup_errors['empty_password'] = "Aucun mot de passe n'a été renseigné";
        }
        elseif(is_password_invalid($_SESSION['password']))
        {
            $signup_errors['invalid_password'] = 'Le mot de passe doit comporter au moins 8 caractères: des lettres minuscules, majuscules et des caractères spéciaux ou accentués';
        }
        
        if($_SESSION['password_confirmation'] != $_SESSION['password'])
        {
            $signup_errors['unconfirmed_password'] = 'Les deux mots ne sont pas identiques';
        }
        else // Si le mot de passe respecte tous les critères
        {
            $password_status = true;
        }

        if($email_status && $password_status)
        {
            $registration_status = user_registration($conn, $_SESSION['email'], $_SESSION['password']);

            if($registration_status['return'])
            {
                echo 'Utilisateur créé avec succès !';
            }
            else 
            {
                $signup_errors['connection_error'] = "Echec de la création du compte utilisateur";
            }
        }

    }
?>

<main>

            <div class="container mt-3 mb-4" style="border: 1px solid red";>

            <?php
                if(isset($_SESSION['msg']))
                {
                    echo 
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '. $_SESSION['msg'] .'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            ?>

                <a href="add_user.php" class="btn btn-dark mb-3">Ajouter un utilisateur</a>

                <h3 class="text-center mb-3" style="border: 1px solid crimson";>Liste des utilisateurs</h3>

                <table class="table table-hover text-center" style="border: 1px solid crimson";>
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
                            // Récupération des données des employés depuis la base de données
                            $data = select('crud', 'user_type', 'employee');

                            while($row = mysqli_fetch_assoc($data))
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
                                        <a href="#" class="link-dark "><i id="<?= $row['id']; ?>" class="fa-solid fa-pen-to-square fs-5 me-3 edition"></i></a>

                                        <!-- Fonts awesome Icons -->
                                        <a href="delete.php" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>

</main>

<?php include('templates/footer.php'); ?>


