<?php
    $page_title = "Accueil";

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

    <div class="container mt-4 mb-4">
    
        <h2 class="text-center pb-2">Bienvenue au Garage V.Parrot</h2>

        <div class="container  d-flex justify-content-center">
            <div>
                <p>
                    Au Garage V.Parrot, nous sommes fiers de vous offrir des services automobiles exceptionnels depuis de 
                    15 ans. Notre équipe de professionnels expérimentés est dédiée à fournir des solutions de 
                    qualité pour vos besoins automobiles. Nous nous engageons à garantir la performance et la sécurité de votre véhicule.
                </p>

                <p>
                    
                    Notre Engagement envers vous est que nous considérons chaque client comme un partenaire, et nous nous efforçons 
                    de créer des relations de confiance à long terme. Votre véhicule est précieux, et nous nous engageons à en prendre 
                    soin comme s'il s'agissait du nôtre.
                </p>

                <p>
                    Pour toute question ou pour planifier un rendez-vous, n'hésitez pas à nous contacter. Nous sommes là pour répondre 
                    à vos besoins automobiles.
                </p>

                <p>
                    Merci de nous faire confiance pour vos besoins automobiles. Nous avons hâte de vous servir.
                </p>

                <!-- Texte étendu -->
                <p>
                    À Garage V.Parrot, nous sommes résolus à fournir des services exceptionnels à nos clients. Nos années d'expérience et 
                    notre dévouement à la qualité nous permettent de vous offrir un éventail de services pour répondre à tous vos besoins 
                    automobiles. Qu'il s'agisse de l'entretien général de votre véhicule, de réparations mécaniques, de travaux de carrosserie 
                    et de peinture, de services de remorquage et de dépannage, ou même de la rénovation de l'intérieur de votre véhicule, 
                    nous sommes là pour vous servir.
                </p>
            </div>
        </div>

        <h2 class="text-center pb-2" style="font-style:italic;">Nos clients témoignent !</h2>

        <div class="container mt-5 ">
            <div class="row">

            <?php
                $comment = select('contacts', 'publication', 'OUI');

                while($row = mysqli_fetch_assoc($comment))
                {
            ?>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <p class="card-text"><?= $row['msg']; ?></p>
                    </div>
                </div>
            </div>
        
            <?php
                }
            ?>
            </div>
        </div>
    </div>



</main>

<?php require_once 'templates/footer.php'; ?>
