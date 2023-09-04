<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'config/db_connect.php';
    require_once 'functions.php';
?>

<?php
    session_start();

    $id = intval($_GET['id']);

    if(isset($_POST['EDIT'])) 
    {
        $table = 'crud';
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        $mail = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $query = "UPDATE $table SET `first_name` = ?, `last_name` = ?, `email` = ?, `password` = ?, `pwd_hash` = ? WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $fname, $lname, $mail, $pwd, $hash, $id);
        $stmt->execute();

        if(($stmt->affected_rows) > 0) 
        {
            $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
            $_SESSION['alert_type'] = 'warning';

            header('Location: admin_panel.php');
        } 
        else 
        {
            $_SESSION['msg'] = "Échec de l'ajout de l'utilisateur";
            $_SESSION['alert_type'] = 'danger';

            header('Location: admin_panel.php');
        }
    }
?>

<main class="container" style="border: 1px solid red;">

    <div class="text-center mb-3 mt-3">
        <h3>Modifier les données de l'utilisateur</h3>
    </div>

    <span id="result"></span>

    <div class="container d-flex justify-content-center mb-3">

        <form action="edit_user.php?id=<?= $id; ?>" method="POST" style="width: 50vw; min-width: 300px;" class="mt-3 mb-3">

        <?php
            $table = 'crud';
            $column = 'id';

            $user = select($table, $column, $id);

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

</main>

<?php require_once 'templates/footer.php'; ?>