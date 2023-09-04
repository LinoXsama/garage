<?php
    $page_title = "Ajouter un nouvel utilisateur";
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<?php
    if(isset($_POST['SAVE']))
    {
        session_start();

        $table = 'crud';
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        $mail = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        $ut = 'employee';

        $query_status = insert($table, 'first_name', $fname, 'last_name', $lname, 'email', $mail, 'password', $pwd, 'pwd_hash', $hash, 'user_type', $ut);

        if($query_status)
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            $_SESSION['alert_type'] = 'warning';

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
                            <h5 class="pt-2 text-align text-center">Ajouter un nouvel utilisateur</h5>
                        </div>
                        <div class="card-body">

                        <form action="add_user.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label">Nom</label>
                            <input class="form-control" type="text" name="first_name" placeholder="Albert">

                            <label class="form-label">Prénom</label>
                            <input class="form-control" type="text" name="last_name"placeholder="Einsten">

                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="nom@example.com">

                            <label class="form-label">Mot de passe</label>
                            <input class="form-control" type="password" name="password">

                            <div class="mt-4">
                                <button type="submit" name="SAVE" value="save" class="btn btn-success">ENREGISTRER</button>
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

<?php include('templates/footer.php'); ?>

