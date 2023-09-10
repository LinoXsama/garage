<?php
    $page_title = "Galérie d'images";
    
    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';


    // if(!isset($_SESSION['user_id']))
    // {
    //     header('Location: login.php');
    //     exit;
    // }
    // else
    // {
?>

<main>

    <h4 class="text-center mt-3">Galérie d'images</h4>

    <div class="gallery card shadow">
        <div class="container-lg">
            <div class="row gy-4 row-cols-1 -row-cols-sm-2 row-cols-md-3">
                <div class="col">
                    <img src="img/peugeot308_2020_1.jpg" class="cars-gallery-item shadow" alt="">
                </div>
                <div class="col">
                    <img src="img/peugeot308_2020_2.jpg" class="cars-gallery-item shadow" alt="">
                </div>
                <div class="col">
                    <img src="img/daciaDuster2021.jpg" class="cars-gallery-item shadow" alt="">
                </div>
            </div>
        </div>

    </div>

    <h4 class="text-center mb-3"> Détails du véhicule</h4>

    <div class="container">
        <div class="card ml-3 mr-3 mb-5">
    
        <h4 class="card-header">Opel Astra 2016 100 CH</h4>

        <div class="card-body">

            <ul class="card-text list-unstyled">
                <li><span class="bold">Marque : </span>Renault</li>
                <li><span class="bold">Modèle : </span>Clio</li>
                <li><span class="bold">Année : </span>2020</li>
                <li><span class="bold">Type de moteur : </span>Diesel</li>
                <li><span class="bold">Kilométrage : </span>12 000km</li>
                <li><span class="bold">Boîte de vitesse : </span>Automatique</li>
                <li><span class="bold">Nombre de portes : </span>5</li>
                <li><span>Sellerie : </span>Cuir/Tissu</li>
                <li><span class="bold">Couleur : </span>Bleu</li>
                <li><span class="bold">Garantie : </span>Etendue 12 mois</li>
                <li><span class="bold">Equipements</span> :
                    <ul>
                        <li><span class="bold">Multimédia</span> : 
                            <ul>
                                <li>Radio</li>
                                <li>Ecran Tactile 7"</li>
                                <li>1 port USB + 1 prise audio</li>
                                <li>GPS</li>
                            </ul>
                        </li>
                        <li><span class="bold">Confort</span> : 
                            <ul>
                                <li>Climatisation automatique</li>
                                <li>Détecteur d'obstacle</li>
                                <li>Rétroviseurs extérieurs réglables électriquement</li>
                                <li>Appui-tête AR réglable</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        </div>
    </div>
    
        <?php
            if(isset($_POST['CONTACT_FORM']))
            {
                session_start();

                $table = 'contacts';

                $_SESSION['name'] = htmlspecialchars($_POST['NAME']);
                $_SESSION['email'] = htmlspecialchars($_POST['EMAIL']);
                $_SESSION['phone'] = htmlspecialchars($_POST['PHONE']);
                $_SESSION['comment'] = htmlspecialchars($_POST['COMMENT']);

                insert($table, 'name', $_SESSION['name'], 'email', $_SESSION['email'], 'phone', $_SESSION['phone'], 'msg', $_SESSION['comment']);
            }
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">Contactez-nous</h5>
                        </div>
                        <div class="card-body">

                            <form action="contact.php" method="POST">

                                <div class="form-group my-3 mx-3" >
                                    <input type="text" name="NAME" placeholder="Vos nom et prénom" class="form-control my-3">
                                    <input type="text" name="EMAIL" placeholder="Votre adresse email" class="form-control mb-3">
                                    <input type="text" name="PHONE" placeholder="Votre numéro de téléphone" class="form-control">

                                    <textarea rows="4" name="COMMENT" placeholder="Rédigez votre message ici..." class="form-control my-3"></textarea>
                                    
                                    <div class="text-center my-4">
                                        <button type="submit" name="CONTACT_FORM" value="contact_form" class="btn btn-primary">SOUMETTRE</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</main>

<?php require_once 'templates/footer.php'; ?>

<?php
    // }
?>