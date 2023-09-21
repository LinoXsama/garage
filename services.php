<?php
    $page_title = 'Nos services';

    session_start();
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar_visitor.php';
    require_once 'functions.php';
?>

<main id="main-services">

    <div class="container mt-5">
        <div class="row">

        <?php
            $service = select('services');

            while($row = mysqli_fetch_assoc($service))
            {
        ?>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['service_name']; ?></h5>
                        <p class="card-text roboto"><?= $row['service_description']; ?></p>
                    </div>
                </div>
            </div>
        
        <?php
            }
        ?>

        </div>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>