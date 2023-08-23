
<?php
    $page_title = 'Contact';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'config/db_connect.php';
?>

<main>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-align text-center">Contactez-nous</h5>
                        </div>
                        <div class="card-body">
                            <form action="contact.php" method="POST">
                                <div class="form-group my-3 mx-3" >
                                    <input type="text" name="NAME" placeholder="Vos nom et prénom" class="form-control my-3">
                                    <input type="text" name="EMAIL" placeholder="Votre adresse email" class="form-control mb-3">
                                    <input type="text" name="PHONE" placeholder="Votre numéro de téléphone" class="form-control">

                                    <textarea rows="4" name="COMMENT" placeholder="Rédigez votre message ici..." class="form-control my-3"></textarea>
                                    
                                    <div class="text-center my-4">
                                        <button type="submit" name="SUBMIT" value="submit" class="btn btn-primary">SOUMETTRE</button>
                                    </div>
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