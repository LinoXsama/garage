<?php
    session_start();

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

        if(empty($fname) || empty($lname) || empty($mail) || empty($pwd))
        {
            $_SESSION['msg'] = "Tous les champs doivent être remplis pour la création du nouvel utilisateur !";
            $_SESSION['alert_type'] = 'warning';

            header('Location: add_user.php');
            exit;
        }
        else
        {
            $query_status = insert('crud', 'first_name', $fname, 'last_name', $lname, 'email', $mail, 'password', $pwd, 'pwd_hash', $hash, 'user_type', 'employee');

            if($query_status)
            {
                $_SESSION['msg'] = 'Utilisateur ajouté avec succès !';
                $_SESSION['alert_type'] = 'success';

                header('Location: admin_panel.php');
                exit;
            }
            else
            {
                $_SESSION['msg'] = "Echec de l'ajout de l'utilisateur !";
                $_SESSION['alert_type'] = 'danger';

                header('Location: admin_panel.php');
                exit;
            }
        }

        
    }
?>