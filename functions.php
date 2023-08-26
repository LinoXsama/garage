<!-- FONCTIONS DU FICHIER admin_panel.php -->

<?php
// Fonction qui récupère la liste des employés depuis la base de données
// VERSION 1.0

// function select(string $table, string $targetted_column, string $searched_value): object
// {
//     include 'config/db_connect.php';

//     // IMPORTANT : les noms de la table et de la colonne ne peuvent pas être utilisés
//     // dynamiquement avec bind_param
//     $query = "SELECT * FROM `$table` WHERE `$targetted_column` = ? ";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("s", $searched_value);
//     $stmt->execute();

//     $result = $stmt->get_result();

//     if (($result->num_rows) > 0) {
//         return $result;
//     }
// }
?>

<?php
// VERSION 1.1

    function select(string $table, ?string $targetted_column = null, ?string $searched_value = null): object
    {
        include 'config/db_connect.php';

        if ($targetted_column === null || $searched_value === null) 
        {
            $query = "SELECT * FROM `$table`";
            $stmt = $conn->prepare($query);
        }
        else 
        {
            $query = "SELECT * FROM `$table` WHERE `$targetted_column` = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $searched_value);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result;
        }

        return false;
    }

?>
