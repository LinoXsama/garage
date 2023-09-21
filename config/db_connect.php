<?php
    $db_host_name = 'localhost';
    $db_user_name = 'lino';
    $db_user_pwd = 'test123';
    $db_name = 'garage';
?>
<!-- via mysqli -->

<?php
    try 
    {
        $conn = new mysqli($db_host_name, $db_user_name, $db_user_pwd, $db_name);

        if($conn->connect_errno) 
        {
            throw new Exception('Erreur de connexion à la base de donnée');
        }
    }
    catch (Exception $e) 
    {
        echo 'Une erreur est survenue : ' . $e->getMessage();
    }

?>

<!-- via PDO -->
<?php

    // $dsn = "mysql:host=localhost:3307; dbname=$db_name";

    //     try {
    //         $pdo = new PDO($dsn, $db_user_name, $db_user_pwd);
    //         // echo 'Success';
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     }
    //     catch(PDOException $e) {
    //         die('Erreur de connexion: ' . $e->getMessage());
    //     }

?>
