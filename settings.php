<?php
    $page_title = "Ajouter d'un nouveau véhicule";

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
        if(isset($_SESSION['SUCCESS']))
        {
            foreach ($_SESSION['SUCCESS'] as $success) {
                echo '
                    <div class="container mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            '. $success .'
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>';
            }

            unset($_SESSION['SUCCESS']);
        }
    ?>

    <?php
        $KM = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Kilométrage'));
        $PRICE = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Prix'));
        $YEAR = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'AnnéeS'));
    ?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Paramètres des critères de recherche</h5>
                        </div>
                        <div class="card-body">

                        <form action="settings_formulaire.php" method="POST" class="mt-3 mb-3">

                            <strong><label>Valeur actuelle du critère : <?= $KM['sliders_min_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Km - limite 1</label>
                            <input class="form-control" type="text" name="KM1" >
                            
                            <strong><label>Valeur actuelle du critère : <?= $KM['sliders_max_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Km - limite 2</label>
                            <input class="form-control" type="text" name="KM2" >

                            <strong><label>Valeur actuelle du critère : <?= $KM['sliders_min_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Km - limite 3</label>
                            <input class="form-control" type="text" name="KM3">

                            <strong><label>Valeur actuelle du critère : <?= $KM['sliders_max_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Km - limite 4</label>
                            <input class="form-control" type="text" name="KM4" >

                            <strong><label>Valeur actuelle du critère : <?= $PRICE['sliders_min_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Prix - limite 1</label>
                            <input class="form-control" type="text" name="PRICE1">

                            <strong><label>Valeur actuelle du critère : <?= $PRICE['sliders_max_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Prix - limite 2</label>
                            <input class="form-control" type="text" name="PRICE2">

                            <strong><label>Valeur actuelle du critère : <?= $PRICE['sliders_min_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Prix - limite 3</label>
                            <input class="form-control" type="text" name="PRICE3">

                            <strong><label>Valeur actuelle du critère : <?= $PRICE['sliders_max_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Prix - limite 4</label>
                            <input class="form-control" type="text" name="PRICE4">

                            <strong><label>Valeur actuelle du critère : <?= $YEAR['sliders_min_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Année - limite 1</label>
                            <input class="form-control" type="text" name="YEAR1">

                            <strong><label>Valeur actuelle du critère : <?= $YEAR['sliders_max_value1']; ?></label></strong><br />
                            <label class="form-label">Slider Année - limite 2</label>
                            <input class="form-control" type="text" name="YEAR2">

                            <strong><label>Valeur actuelle du critère : <?= $YEAR['sliders_min_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Année - limite 3</label>
                            <input class="form-control" type="text" name="YEAR3">

                            <strong><label>Valeur actuelle du critère : <?= $YEAR['sliders_max_value2']; ?></label></strong><br />
                            <label class="form-label">Slider Année - limite 4</label>
                            <input class="form-control" type="text" name="YEAR4">

                            <div class="mt-4">
                                <button type="submit" name="SETTINGS" class="btn btn-success">ENREGISTRER</button>
                                <a href="cars_mg.php" class="btn btn-danger">ANNULER</a>
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