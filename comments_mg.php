<?php
    $page_title = "Gestion des demandes";
    
    session_start();

    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<main>

<h3 class="text-center mt-3 mb-3">Liste des messages</h3>

    <div class="container mt-3 mb-4">
        <table class="table table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>Date du message</th>
                    <th>Auteur</th>
                    <th>Adresse email</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    // Récupération de la liste des messages

                    $messages = select('contacts');

                    while($row = mysqli_fetch_assoc($messages))
                    {
                ?>

                        <tr>
                            <td><?= date('d/m/Y', strtotime($row['msg_date'])); ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= ($row['car_id'] !== 0) ? 'VEHICULE' : 'INFORMATION'; ?></td>
                            <td><?= $row['msg']; ?></td>
                            <td>
                                <?php
                                    if($row['car_id'] !== 0)
                                    {
                                        // Fonts awesome Icons
                                        echo '<span class="link-dark"><i class="fa-solid fa-eye fs-5"></i></span>';
                                    }
                                ?>
                                <!-- Fonts awesome Icons -->
                                &nbsp;<span class="link-dark"><i id="" name="" class="fa-solid fa-trash fs-5"></i></span>
                            </td>
                        </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>