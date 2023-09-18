<?php
    $page_title = 'Nos services';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
?>

<main style="height: 80%; overflow-y: auto;">

    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Entretien général</h5>
                        <p class="card-text">Nous offrons des services d'entretien régulier pour maintenir votre véhicule en bon état.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">                   
                    <div class="card-body">
                        <h5 class="card-title">Réparations mécaniques</h5>
                        <p class="card-text">Notre équipe de mécaniciens expérimentés est prête à résoudre tous les problèmes mécaniques de votre véhicule.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">                 
                    <div class="card-body">
                        <h5 class="card-title">Carrosserie et peinture</h5>
                        <p class="card-text">Nous proposons des services de réparation de carrosserie et de peinture pour redonner de l'éclat à votre véhicule.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">                 
                    <div class="card-body">
                        <h5 class="card-title">Remorquage et dépannage</h5>
                        <p class="card-text">Réponse rapide pour les pannes sur la route, nous vous ramenons sur la route en un clin d'œil.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rénovation d'intérieur de véhicule</h5>
                        <p class="card-text">Donnez une nouvelle vie à l'intérieur de votre véhicule avec nos services de rénovation complète.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>