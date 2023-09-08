<?php
    $page_title = "Modifier les données d'un utilisateur";

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';

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
    $user_id = intval($_GET['id']);

    if(isset($_POST['EDIT'])) 
    {
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        $mail = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $query_status = update('crud', 'id', $user_id, 'first_name', $fname, 'last_name', $lname, 'email', $mail, 'password', $pwd, 'pwd_hash', $hash);

        session_start();

        if($query_status)
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            $_SESSION['alert_type'] = 'success';

            header('Location: admin_panel.php');
        } 
        else
        {
            $_SESSION['msg'] = "Échec de l'ajout de l'utilisateur !";
            $_SESSION['alert_type'] = 'danger';

            header('Location: admin_panel.php');
        }
    }
?>

<main class="container">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Modifier les données d'un utilisateur</h5>
                        </div>
                        <div class="card-body">

                        <form action="edit_user.php?id=<?= $user_id; ?>" method="POST" class="mt-3 mb-3">

                            <?php
                                $user = select('crud', 'id', $user_id);

                                $row = mysqli_fetch_assoc($user);
                            ?>

                                <label class="form-label">Nom</label>
                                <input class="form-control" type="text" name="first_name" placeholder="Alexandre" value="<?= $row['last_name']; ?>">

                                <label class="form-label">Prénom</label>
                                <input class="form-control" type="text" name="last_name" placeholder="Deschamps" value="<?= $row['first_name']; ?>">

                                <label class="form-label">Adresse email</label>
                                <input class="form-control" type="email" name="email" placeholder="nom@example.com" value="<?= $row['email']; ?>">

                                <label class="form-label">Mot de passe</label>
                                <input class="form-control" type="text" name="password" value="<?= $row['password']; ?>">

                                <div class="mt-4">
                                    <button type="submit" name="EDIT" value="edit" class="btn btn-success">ENREGISTRER</button>
                                    <a href="admin_panel.php" class="btn btn-danger">ANNULER</a>
                                </div>
                        </form>

                        </div>
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