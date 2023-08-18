<?php
$page_title = 'Connexion';
?>

<?php
require_once 'templates/header.php';
require_once 'templates/navbar.php';
require_once 'config/db_connect.php';
require_once 'check_login.php';

session_start();
$_SESSION['email'] = $_SESSION['password'] = '';


$login_errors = array(
    'empty_email' => '',
    'invalid_email' => '',
    'empty_password' => '',
    'incorrect_email_or_password' => ''
);

?>

<?php

if (isset($_POST['login'])) {

    $email_status = $password_status = false;
    
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
    $_SESSION['password'] = htmlspecialchars($_POST['password']);

    if (empty($_SESSION['email'])) {
        $login_errors['empty_email'] = "L'adresse mail n'a pas été renseignée !";
    } elseif (is_email_invalid($_SESSION['email'])) {
        $login_errors['invalid_email'] = "L'adresse mail est invalide";
    } else {
        $email_status = true;
    }

    if (empty($_SESSION['password'])) {
        $login_errors['empty_password'] = "Le mot de passe n'a pas été renseigné !";
    } elseif (!does_password_match($conn, $_SESSION['email'], $_SESSION['password'])) {
        $login_errors['incorrect_email_or_password'] = "L'adresse mail ou le mot de passe est incorrect";
    } else {
        $password_status = true;
    }

    if ($email_status && $password_status) {
        if (check_user_type($conn, $_SESSION['email']) === 'admin') {
            header('Location: admin_panel.php');
        } else {
            header('Location: index.php');
        }
    }
}

?>

<main>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-center">Connexion</h5>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">

                                <div class="form-group mb-3">
                                    <p>
                                        <?php

                                        if ($login_errors['empty_email']) {
                                            echo $login_errors['empty_email'];
                                        } else {
                                            echo $login_errors['invalid_email'];
                                        }

                                        ?>
                                    </p>
                                    <label for="em" class="mb-1">Email</label>
                                    <input class="form-control" type="text" id="em" name="email" placeholder="example@gmail.com" value="<?php echo $_SESSION['email']; ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <p>
                                        <?php

                                        if ($login_errors['empty_password']) {
                                            echo $login_errors['empty_password'];
                                        } else {
                                            echo $login_errors['incorrect_email_or_password'];
                                        }

                                        ?>
                                    </p>
                                    <label for="tl" class="mb-1">Mot de passe</label>
                                    <input class="form-control" type="password" id="tl" name="password" value="<?php echo $_SESSION['password']; ?>">
                                </div>

                                <div class="form-group mb-3 text-center">
                                    <button class="btn btn-primary" type="submit" name="login" value="Login">SE CONNECTER</button>
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