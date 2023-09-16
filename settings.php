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
?>

<main class="container">

    <?php
    if(isset($_SESSION['msg']))
    {
        echo
            '<div class="container mt-3">
                <div class="alert alert-'. $_SESSION['alert_type'] .' alert-dismissible fade show" role="alert">
            '. $_SESSION['msg'] .'
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';

        unset($_SESSION['msg']);
    }
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

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Km - limite 1</label>
                            <input class="form-control" type="text" name="KM1" >
                            
                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Km - limite 2</label>
                            <input class="form-control" type="text" name="KM2" >

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Km - limite 3</label>
                            <input class="form-control" type="text" name="KM3">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Km - limite 4</label>
                            <input class="form-control" type="text" name="KM4" >

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Prix - limite 1</label>
                            <input class="form-control" type="text" name="PRICE1">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Prix - limite 2</label>
                            <input class="form-control" type="text" name="PRICE2">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Prix - limite 3</label>
                            <input class="form-control" type="text" name="PRICE3">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Prix - limite 4</label>
                            <input class="form-control" type="text" name="PRICE4">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Année - limite 1</label>
                            <input class="form-control" type="text" name="YEAR1">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Année - limite 2</label>
                            <input class="form-control" type="text" name="YEAR2">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
                            <label class="form-label">Slider Année - limite 3</label>
                            <input class="form-control" type="text" name="YEAR3">

                            <strong><label>Valeur actuelle du critère :</label></strong><br />
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