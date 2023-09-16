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
    <!-- MESSAGES DE NOTIFICATIONS - START -->
    <?php
        // GESTION DES MESSAGES DE SUCCESS - START
            if(isset($_SESSION['SUCCESS_SETTINGS']))
            {
                foreach ($_SESSION['SUCCESS_SETTINGS'] as $success) {
                    echo '
                        <div class="container mt-3">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                '. $success .'
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>';
                }

                unset($_SESSION['SUCCESS_SETTINGS']);
            }
        // GESTION DES MESSAGES DE SUCCESS - END

        // GESTION DES MESSAGES D'ERREURS - START
            if(isset($_SESSION['ERRORS_SETTINGS']))
            {
                foreach ($_SESSION['ERRORS_SETTINGS'] as $error) {
                    echo '
                        <div class="container mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                '. $error .'
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>';
                }

                unset($_SESSION['ERRORS_SETTINGS']);
            }
        // GESTION DES MESSAGES D'ERREURS - END

        // GESTION DES PROBLEMES D'INCOHERENCES - START

            // INCOHERENCE KM - START
                if(isset($_SESSION['PROBLEMS_KM'])) 
                {
                    echo '<div class="container mt-3">';
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

                    echo '<ul>';
                    foreach ($_SESSION['PROBLEMS_KM'] as $problem) 
                    {
                        echo '<li>' .$problem. '</li>';
                    }
                    echo '<ul>';

                        echo '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    echo '</div>';
                    
                    unset($_SESSION['PROBLEMS_KM']); 
                }
            // INCOHERENCE KM - END

            // INCOHERENCE PRIX - START
                if(isset($_SESSION['PROBLEMS_PRICE'])) 
                {
                        echo '<div class="container mt-3">';
                            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';

                        echo '<ul>';
                        foreach ($_SESSION['PROBLEMS_PRICE'] as $problem) 
                        {
                            echo '<li>' .$problem. '</li>';
                        }
                        echo '<ul>';

                            echo '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        echo '</div>';
                    
                    unset($_SESSION['PROBLEMS_PRICE']); 
                }
            // INCOHERENCE PRIX - END

            // INCOHERENCE ANNEE - START
                if(isset($_SESSION['PROBLEMS_YEAR'])) 
                {
                        echo '<div class="container mt-3">';
                            echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">';

                        echo '<ul>';
                        foreach ($_SESSION['PROBLEMS_YEAR'] as $problem) 
                        {
                            echo '<li>' .$problem. '</li>';
                        }
                        echo '<ul>';

                            echo '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        echo '</div>';
                    
                    unset($_SESSION['PROBLEMS_YEAR']); 
                }
            // INCOHERENCE ANNEE - END

        // GESTION DES PROBLEMES D'INCOHERENCES - END
    ?>
    <!-- MESSAGES DE NOTIFICATIONS - END -->

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Paramètres des critères de recherche</h5>
                        </div>
                        <div class="card-body">

                        <?php
                            $KM = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Kilométrage'));
                            $PRICE = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Prix'));
                            $YEAR = mysqli_fetch_assoc(select('sliders_filters', 'filters_name', 'Années'));
                        ?>

                        <form action="settings_formulaire.php" method="POST" class="mt-3 mb-3">

                            <label class="form-label">KM slider 1 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $KM['sliders_min_value1']; ?>)</label></strong>
                            <input class="form-control" type="text" name="KM1">
                            
                            <label class="form-label">KM slider 1 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $KM['sliders_max_value1']; ?></label>)</strong>
                            <input class="form-control" type="text" name="KM2" >

                            <label class="form-label">KM slider 2 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $KM['sliders_min_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="KM3">

                            <label class="form-label">KM slider 2 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $KM['sliders_max_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="KM4" >

                            <label class="form-label">Prix slider 1 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $PRICE['sliders_min_value1']; ?></label>)</strong>
                            <input class="form-control" type="text" name="PRICE1">

                            <label class="form-label">Prix slider 1 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $PRICE['sliders_max_value1']; ?></label>)</strong>
                            <input class="form-control" type="text" name="PRICE2">

                            <label class="form-label">Prix slider 2 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $PRICE['sliders_min_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="PRICE3">

                            <label class="form-label">Prix slider 2 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $PRICE['sliders_max_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="PRICE4">

                            <label class="form-label">Année slider 1 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $YEAR['sliders_min_value1']; ?></label>)</strong>
                            <input class="form-control" type="text" name="YEAR1">

                            <label class="form-label">Année slider 1 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $YEAR['sliders_max_value1']; ?></label>)</strong>
                            <input class="form-control" type="text" name="YEAR2">

                            <label class="form-label">Année slider 2 <strong><span class="text-success">min</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $YEAR['sliders_min_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="YEAR3">

                            <label class="form-label">Année slider 2 <strong><span class="text-danger">max</span></strong></label>
                            <strong><label>(Valeur actuelle du critère : <?= $YEAR['sliders_max_value2']; ?></label>)</strong>
                            <input class="form-control" type="text" name="YEAR4">

                            <div class="mt-4">
                                <button type="submit" name="SETTINGS" class="btn btn-success">ENREGISTRER</button>
                                <a href="#" class="btn btn-danger">ANNULER</a>
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