<!-- // HERE I TEST CODE -->

<?php

// for($i = 0; $i < 5; $i++) {
//     $data = md5(rand());                    // Rénégerates random md5 keys
//     echo '<h1>'. $data . '</h1>';
// }

?>

<!-- mbstring permet d'utiliser la fonction mb_send_mail pour envoyer des mails -->
<?php

// if (extension_loaded('mbstring')) {
//     echo "L'extension 'mbstring' est activée.";
// } else {
//     echo "L'extension 'mbstring' n'est pas activée.";
// }

// // Utilisation de mb_send_mail

// $to = "merlin.migan@gmail.com";
// $subject = "Hello Lino";
// $message = "Bowser epic";
// $additional_headers = "From: slavikzaya@gmail.com\r\n";
// $additional_headers .= "Reply-To: slavikzaya@gmail.com\r\n";
// $additional_headers .= "Cc: slavikzaya@gmail.com\r\n";

// echo $additional_headers;

// if (mb_send_mail($to, $subject, $message, $additional_headers)) {
//     echo "L'e-mail a été envoyé avec succès.";
// } else {
//     echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
// }

?>

<!-- TEST DE CONNEXION A UNE BASE DE DONNEES VIA PDO -->
<?php

// $host = "localhost:3307";
// $dbname = "test";
// $user = "lino";
// $password = "test123";

// $dsn = "mysql:host=$host;dbname=$dbname";

// try {
// 	$pdo = new PDO($dsn, $user, $password);
// 	echo 'Connection réussie !'.'<br><br>';
// }
// catch (PDOException $e) {
// 	echo 'Impossible de se connecter à la base de données'. '<br>'. $e;
// }

?>

<!-- CONTROLE DE LA CONFORMITE DU MOT DE PASSE -->
<?php

// $passwords = [
//     'data',
//     ' hello ',
//     'ser ',
//     ' djdjd ',
//     'dataM',
//     'Datm',
//     'hM',
//     'Mh',
//     ' hkhkhMMM ',
//     ' fsdf PPPP',
//     'mmmMMMMMMPPPP@à',
//     '@_=)/*-', 
//     '',
//     '    '
// ];

// echo 'Le mot de passe DOIT COMPORTER AU MOINS 8 caractères !'.'<br>';
// echo 'Le mot de passe DOIT COMPORTER AU MOINS UNE lettre minuscule !'.'<br>';
// echo 'Le mot de passe DOIT COMPORTER AU MOINS UNE lettre majuscule'.'<br>';
// echo 'Le mot de passe DOIT COMPORTER AU MOINS UN caractère spécial !'.'<br>';
// echo 'Le mot de passe NE DOIT PAS COMPORTER d\'espace !'.'<br><br>';

// for($i = 0; $i < count($passwords); $i++) 
// {

//     if(strlen($passwords[$i]) >= 8 && preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])^\S+$/', $passwords[$i])) {
//         echo 'Le mot de passe '.'<strong>'.'"'. $passwords[$i] .'"'.'</strong>'.' est valide et comporte'.strlen($passwords[$i]).'<br>';
//     }
//     else {
//         echo 'Le mot de passe '.'<strong>'.'"'. $passwords[$i] .'"'.'</strong>'.' est invalide et comporte '.strlen($passwords[$i]).' caractères'.'<br>';
//     }

// }

?>

<!-- RECUPERATION D'UNE SEULE DONNEE DEPUIS LA DB VIA UNE REQUETE PREPAPREE -->
<div>

    <?php
    // include('config/db_connect.php');
    ?>

    <!-- AVEC PDO  -->
    <?php
    // function is_email_taken($pdo_connection, $email) {
    //     $query = "SELECT email FROM users WHERE email = :email;"; // PDO utilise des paramètres nommés comme ':email;' mais pas mysqli
    //     $stmt = $pdo_connection->prepare($query);
    //     $stmt -> bindParam(":email", $email); // syntaxe propre à PDO : voir comme précédent
    //     $stmt -> execute();

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC); // syntaxe propre à PDO

    //     return $result;
    // }
    ?>

    <!-- AVEC MYSQLI -->
    <?php
    // function is_email_taken(object $db_connection, string $user_email) {
    //     $query = "SELECT email FROM users WHERE email = ?";                        // syntaxe propre à mysqli
    //     $stmt = $db_connection->prepare($query);
    //     $stmt -> bind_param("s", $user_email);                                     // syntaxe propre à mysqli
    //     $stmt -> execute();
    ?>

    <!-- VERIFIE S'IL Y AU MOINS UN ENREGISTREMENT : > 0 -->
    <?php
    //     // $stmt->store_result();                                                  // syntaxe propre à mysqli

    //     // $result = $stmt->num_rows > 0;                                          // syntaxe propre à mysqli : vérifie s'il y au moins un enregistrement qui correspond à la requete

    //     // return $result;
    ?>

    <!--  RENVOIE LE CONTENU DE L'ENREGISTREMENT -->
    <?php
    //     $result = $stmt->get_result();

    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         return $row['email'];                                                 // Retourne l'adresse e-mail existante
    //     }

    //     return null;                                                              // Aucune adresse e-mail correspondante trouvée

    // }
    ?>

    <!-- AFFICHAGE DES DONNEES RECUPEREES -->
    <?php

    // $email = 'merlin.migan@gmail.com';

    // $data = is_email_taken($pdo, $email); // pour PDO

    // $data = is_email_taken($conn, $email); // pour MYSQLI

    // var_dump($data);

    ?>

</div>

<!-- TEST DE LA FONCTION does_password_match -->
<?php

// include 'config/db_connect.php';
// include 'check_login.php';

// $test_email = 'merlin.migan@gmail.com';
// $test_password = '123456';

// $data = does_password_match($conn, $test_email, $test_password);

// var_dump($data);

?>

<!-- TEST DES PHP's BUILT-IN FUNCTIONS : password_hash() et password_verify() -->
<?php

// $test_password = 'serris';

// for($i = 1; $i <= 10; $i++) {

//     $hashed_pwd = password_hash($test_password, PASSWORD_DEFAULT); // password_hash renvoie une string
//     echo $i.' The password hash is ' .$hashed_pwd. ' and contains ' .strlen($hashed_pwd). ' caracteres !'. '<br>';

// }

// $hashed_key = '$2y$10$FIZAF/1a4rooMmbU/iEuo.GUSDen3vyC/9DLaaXrSmr8PlDCBZ5dO';

// if(password_verify($test_password, $hashed_key)) {
//     echo 'Le mot de passe est correcte :) !';
// }
// else {
//     echo 'Le mot de passe est incorrecte :( !';
// }

?>

<!-- TEST DE LA FONCTION DE RECUPERATION DU TYPE DE L'UTILISATEUR -->
<?php

// function check_user_type(object $db_conn, string $email): string {

//     $query = "SELECT user_type FROM users WHERE email = ?";
//     $stmt = $db_conn->prepare($query);
//     $stmt->bind_param("s", $email);
//     $stmt->execute();

//     $user = $stmt->get_result()->fetch_assoc();

//     return $user['user_type'];

// }

// include('config/db_connect.php');

// $t_email = 'elmorelys@gmail.com';

// $data = check_user_type($conn, $t_email);

// echo($data);

?>

<?php

// function does_password_match(object $conn, string $email, string $password): bool {
//     // VERSION 1.2

//         $query = "SELECT hashed_password FROM users WHERE email = ?";
//         $stmt = $conn->prepare($query);
//         $stmt->bind_param("s", $email);
//         $stmt->execute();

//         $stmt->store_result();

//         if(($stmt->num_rows) > 0) {

//             $hashed_password = '';
//             $stmt->bind_result($hashed_password);
//             $stmt->fetch();

//             if(password_verify($password, $hashed_password)) {
//                 return $hashed_password;
//             }

//         }

//         return false;
//     }

//     does_password_match($conn, )


?>


<!-- TEST DE UNIQID -->
<?php
// for ($i = 0; $i < 10; $i++) {
//     echo uniqid('', false) . '<br>';
// }
?>

<!-- TEST DE LA FONCTION D'ENREGISTREMENT D'UN UTILISATEUR DANS LA DB -->
<?php
    //     require_once 'config/db_connect.php';

    // function registration(object $db_conn, string $user_email, string $password): array
    // {
    //     $data = array
    //     (
    //         'qp' => '',
    //         'qb' => '',
    //         'qe' => '',
    //         'return' => ''
    //     );

    //     $pwd_hash = password_hash($password, PASSWORD_DEFAULT);

    //     $query = "INSERT INTO users(email, hashed_password) VALUES(?, ?)";
    //     $data['qp'] = $stmt = $db_conn->prepare($query);
    //     $data['qb'] = $stmt->bind_param("ss", $user_email, $pwd_hash);
    //     $data['qe'] = $stmt->execute();

    //     $data['return'] = $data['qp'] && $data['qb'] && $data['qe'];

    //     return $data;
    // }

    // $email = 'koopabowsa@gmail.com';
    // $pwd = 'akounamatata';

    // $result = registration($conn, $email, $pwd);

        // echo '<pre>';
        //     print_r($result);
        // echo '<pre>';
?>