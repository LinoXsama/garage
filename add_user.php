<?php
    $page_title = "Ajouter un nouvel utilisateur";

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

<?php
    if(isset($_POST['SAVE']))
    {
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        $mail = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $query_status = insert('crud', 'first_name', $fname, 'last_name', $lname, 'email', $mail, 'password', $pwd, 'pwd_hash', $hash, 'user_type', 'employee');

        if($query_status)
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            $_SESSION['alert_type'] = 'success';

            header('Location: admin_panel.php');
        }
        else
        {
            $_SESSION['msg'] = "Echec de l'ajout de l'utilisateur !";
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
                            <h5 class="pt-2 text-align text-center responsive-font">Ajouter un nouvel utilisateur</h5>
                        </div>
                        <div class="card-body">

                        <form action="add_user.php" method="POST" class="mt-3 mb-3">
                            
                            <label class="form-label responsive-font">Prénom</label>
                            <input class="form-control" type="text" name="first_name" placeholder="Albert">

                            <label class="form-label responsive-font">Nom</label>
                            <input class="form-control" type="text" name="last_name"placeholder="Einsten">

                            <label class="form-label responsive-font">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="nom@example.com">

                            <label class="form-label responsive-font">Mot de passe</label>
                            <input class="form-control" type="text" name="password">

                            <div class="mt-4">
                                <a type="submit" name="SAVE" value="save" class="btn btn-success responsive-font">ENREGISTRER</a>
                                <a href="admin_panel.php" class="btn btn-danger ctm-btn responsive-font">RETOUR</a>
                            </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include('templates/footer.php'); ?>

<?php
    }
?>