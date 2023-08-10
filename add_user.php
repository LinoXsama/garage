<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'config/db_connect.php';
?>

<?php
    if(isset($_POST['SAVE']))
    {
        session_start();

        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        $em = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $query = "INSERT INTO `crud`(`first_name`, `last_name`, `email`, `password`, `pwd_hash`, `user_type`) VALUES ('$fname','$lname','$em', '$pwd', '$hash', 'employee')";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if(($stmt->affected_rows) > 0)
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            header('Location: admin_panel.php');
        }
        else
        {
            $_SESSION['msg'] = "Echec de l'ajout de l'utilisateur";
            header('Location: admin_panel.php');
        }

    }
?>

<main class="container">

    <div class="text-center mb-3 mt-3">
        <h3>Ajouter un nouvel utilisateur</h3>
    </div>

    <div class="container d-flex justify-content-center mb-3">

        <form action="add_user.php" method="POST" style="width: 50vw; min-width: 300px;" class="mt-3 mb-3">

            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="first_name" placeholder="Alexandre">

            <label class="form-label">Prénom</label>
            <input class="form-control" type="text" name="last_name"placeholder="Deschamps">
            
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

</main>

<?php include('templates/footer.php'); ?>

