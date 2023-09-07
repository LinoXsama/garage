<?php $page_title = 'admin'; ?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">GESTION DES PARAMETRES</h5>
                        </div>
                        <div class="card-body">

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES AVIS</a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="#" class="btn btn-primary text-white">GÉRER LES AVIS</a>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES VEHICULES</a>
                                        </h5>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="#" class="btn btn-primary text-white">GÉRER LES VEHICULES</a><br />
                                            <a href="#" class="btn btn-primary text-white mt-2">GÉRER LA GALERIE D'IMAGES</a>
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