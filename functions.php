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

        if (($result->num_rows) > 0) {
            return $result;
        }

        return false;
    }

?>

<?php
    // VERSION 1.0

    function insert(string $table, string $targetted_column_1, string $value_1, ?string $targetted_column_2 = null, ?string $value_2 = null, ?string $targetted_column_3 = null, ?string $value_3 = null, ?string $targetted_column_4 = null, ?string $value_4 = null, ?string $targetted_column_5 = null, ?string $value_5 = null, ?string $targetted_column_6 = null, ?string $value_6 = null): bool
    {
        include 'config/db_connect.php';

        if($targetted_column_2 === null || $value_2 === null)
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`) VALUES ('$value_1')";
        }
        else if($targetted_column_3 === null || $value_3 === null)
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`, `$targetted_column_2`) VALUES ('$value_1', '$value_2')";
        }
        else if($targetted_column_4 === null || $value_4 === null)
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`, `$targetted_column_2`, `$targetted_column_3`) VALUES ('$value_1', '$value_2', '$value_3')";
        }
        else if($targetted_column_5 === null || $value_5 === null) 
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`, `$targetted_column_2`, `$targetted_column_3`, `$targetted_column_4`) VALUES ('$value_1', '$value_2', '$value_3', '$value_4')";
        }
        else if($targetted_column_6 === null || $value_6 === null)
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`, `$targetted_column_2`, `$targetted_column_3`, `$targetted_column_4`, `$targetted_column_5`) VALUES ('$value_1', '$value_2', '$value_3', '$value_4', '$value_5')";
        }
        else 
        {
            $query = "INSERT INTO `$table` (`$targetted_column_1`, `$targetted_column_2`, `$targetted_column_3`, `$targetted_column_4`, `$targetted_column_5`, `$targetted_column_6`) VALUES ('$value_1', '$value_2', '$value_3', '$value_4', '$value_5', '$value_6')";
        }

        $stmt = $conn->prepare($query);
        $stmt->execute();

        return(($stmt->affected_rows) > 0);
    }

    // FONCTION QUI TESTE LA FONCTION insert()
    // function test($TABLE, $COLONNE1, $VALEUR1)
    // {
    //     if(insert($TABLE, $COLONNE1, $VALEUR1))
    //     {
    //         echo 'Success';
    //     }
    //     else {
    //         echo 'Failure';
    //     }
    // }

    // test('contacts', 'name', 'Lino');

?>
