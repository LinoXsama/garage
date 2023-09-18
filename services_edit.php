<?php

    session_start();

    // if(!isset($_SESSION['user_id']))
    // {
    //     header('Location: login.php');
    //     exit;
    // }
    // else
    // {
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main class="container">
    
    <?php
        $service = select('services', 'service_id', $_SESSION['SERVICE_ID']);

        $row = mysqli_fetch_assoc($service);
    ?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Modifier un service</h5>
                        </div>
                        <div class="card-body">

                        <form action="" method="POST" class="mt-3 mb-3">

                            <label class="form-label responsive-font">Nom du service</label>
                            <input class="form-control" type="text" name="SERVICE_NAME" value="<?= $row['service_name'];?>" placeholder="Ex : Réparation">
                            
                            <label class="form-label responsive-font">Description du service</label>
                            <input class="form-control" type="text" name="SERVICE_DESCRIPTION" value="<?= $row['service_description'];?>" placeholder="Ex : Nous réparons vos...">

                            <div class="mt-4">
                                <button type="submit" name="ADD_SERVICES" class="btn btn-success responsive-font">ENREGISTRER</button>
                                <a href="services_mg.php" class="btn btn-danger ctm-btn responsive-font">RETOUR</a>
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
    // }
?>