<?php 
    $page_title = 'Administration du site';

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
    if(isset($_POST['SCHEDULES_UPDATE']))
    {
        $monday_morning = htmlspecialchars($_POST['monday-morning']);
        $monday_afternoon = htmlspecialchars($_POST['monday-afternoon']);

        if(!empty($monday_morning))
        {
            update('schedules', 'id', '1', 'morning', $monday_morning);
        }

        if(!empty($monday_afternoon))
        {
            update('schedules', 'id', '1', 'afternoon', $monday_afternoon);
        }

        $tuesday_morning = htmlspecialchars($_POST['tuesday-morning']);
        $tuesday_afternoon = htmlspecialchars($_POST['tuesday-afternoon']);

        if(!empty($tuesday_morning))
        {
            update('schedules', 'id', '2', 'morning', $tuesday_morning);
        }

        if(!empty($tuesday_afternoon))
        {
            update('schedules', 'id', '2', 'afternoon', $tuesday_afternoon);
        }

        $wednesday_morning = htmlspecialchars($_POST['wednesday-morning']);
        $wednesday_afternoon = htmlspecialchars($_POST['wednesday-afternoon']);

        if(!empty($wednesday_morning))
        {
            update('schedules', 'id', '3', 'morning', $wednesday_morning);
        }

        if(!empty($wednesday_afternoon))
        {
            update('schedules', 'id', '3', 'afternoon', $wednesday_afternoon);
        }

        $thursday_morning = htmlspecialchars($_POST['thursday-morning']);
        $thursday_afternoon = htmlspecialchars($_POST['thursday-afternoon']);

        if(!empty($thursday_morning))
        {
            update('schedules', 'id', '4', 'morning', $thursday_morning);
        }

        if(!empty($thursday_afternoon))
        {
            update('schedules', 'id', '4', 'afternoon', $thursday_afternoon);
        }

        $friday_morning = htmlspecialchars($_POST['friday-morning']);
        $friday_afternoon = htmlspecialchars($_POST['friday-afternoon']);

        if(!empty($friday_morning))
        {
            update('schedules', 'id', '5', 'morning', $friday_morning);
        }

        if(!empty($friday_afternoon))
        {
            update('schedules', 'id', '5', 'afternoon', $friday_afternoon);
        }

        $saturday_morning = htmlspecialchars($_POST['saturday-morning']);
        $saturday_afternoon = htmlspecialchars($_POST['saturday-afternoon']);

        if(!empty($saturday_morning))
        {
            update('schedules', 'id', '6', 'morning', $saturday_morning);
        }

        if(!empty($saturday_afternoon))
        {
            update('schedules', 'id', '6', 'afternoon', $saturday_afternoon);
        }

        $sunday_morning = htmlspecialchars($_POST['sunday-morning']);
        $sunday_afternoon = htmlspecialchars($_POST['sunday-afternoon']);

        if(!empty($sunday_morning))
        {
            update('schedules', 'id', '7', 'morning', $sunday_morning);
        }

        if(!empty($sunday_afternoon))
        {
            update('schedules', 'id', '7', 'afternoon', $sunday_afternoon);
        }

        unset($_POST['SCHEDULES_UPDATE']);
    }
?>

<main>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">ADMINISTRATION DU SITE</h5>
                        </div>
                        <div class="card-body">

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-flex justify-content-start"><span class="material-symbols-outlined">group</span>&nbsp;GESTION DES UTILISATEURS</a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="add_user.php" class="btn btn-success text-white">AJOUTER UN UTILISATEUR</a><br />
                                            <a href="admin_panel.php" class="btn btn-primary text-white mt-2">GÉRER LES UTILISATEURS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES AVIS</a>
                                        </h5>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="comments_mg.php" class="btn btn-primary text-white">GÉRER LES AVIS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="material-symbols-outlined">today</span>&nbsp;GESTION DES HORAIRES</a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">

                                        <form action="admin_dashboard.php" method="POST">

                                            <div class="form-group my-3 mx-3" >

                                                <label class="btn btn-info">LUNDI</label>
                                                <input type="text" name="monday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="monday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control mb-3">

                                                <label class="btn btn-info">MARDI</label>
                                                <input type="text" name="tuesday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="tuesday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">MERCREDI</label>
                                                <input type="text" name="wednesday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="wednesday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">JEUDI</label>
                                                <input type="text" name="thursday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="thursday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">VENDREDI</label>
                                                <input type="text" name="friday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="friday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">SAMEDI</label>
                                                <input type="text" name="saturday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="saturday-afternoon" placeholder="APRES-MIDI - Exemple : Fermé" class="form-control my-3">

                                                <label class="btn btn-info">DIMANCHE</label>
                                                <input type="text" name="sunday-morning" placeholder="MATINÉE - Exemple : Fermé" class="form-control my-3">
                                                <input type="text" name="sunday-afternoon" placeholder="APRES-MIDI - Exemple : Fermé" class="form-control my-3">

                                                <div class="text-center my-4">
                                                    <button type="submit" name="SCHEDULES_UPDATE" value="schedules_update" class="btn btn-primary">ENREGISTRER</button>
                                                </div>

                                            </div>

                                        </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES VEHICULES</a>
                                        </h5>
                                    </div>

                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="cars_mg.php" class="btn btn-primary text-white">GÉRER LES VEHICULES</a><br />
                                            <a href="upload_img.php" class="btn btn-primary text-white mt-2">GÉRER LA GALERIE D'IMAGES</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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