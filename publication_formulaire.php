<?php
    session_start();

    require_once 'functions.php';
    require_once 'config/db_connect.php';
?>

<?php
    if(isset($_POST['PUBLICATION']))
    {
        $MSG_ID = htmlspecialchars($conn->real_escape_string($_POST['MSG_ID']));
        $AUTHOR = htmlspecialchars($conn->real_escape_string($_POST['AUTHOR']));
        $STATUS = htmlspecialchars($conn->real_escape_string($_POST['STATUS']));
        $_SESSION['PREVIOUS_STATUS'] = $STATUS;
        $MSG_DATE = date('d/m/Y', strtotime(htmlspecialchars($conn->real_escape_string($_POST['MSG_DATE']))));

        $query_status = update('contacts', 'msg_id', $MSG_ID, 'publication', $STATUS);

        if($query_status && $STATUS === 'OUI')
        {
            $_SESSION['msg'] = "L'avis {$MSG_ID} de {$AUTHOR} du {$MSG_DATE} sera affiché sur la page des avis clients !";
            $_SESSION['alert_type'] = 'success';
        }
        
        if($query_status && $STATUS === 'NON')
        {
            $_SESSION['msg'] = "L'avis {$MSG_ID} de {$AUTHOR} du {$MSG_DATE} a été mis en attente de validation !";
            $_SESSION['alert_type'] = 'warning';
        }

        header('Location: comments_mg.php');
        exit;
    }
?>