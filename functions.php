<!-- FONCTIONS DU FICHIER admin_panel.php -->

<?php
    // Fonction qui récupère la liste des employés depuis la base de données
    function select(string $table, string $targetted_column, string $searched_value): object
    {
        require_once 'config/db_connect.php';

        // IMPORTANT : les noms de la table et de la colonne ne peuvent pas être utilisés
        // dynamiquement avec bind_param
        $query = "SELECT * FROM `$table` WHERE `$targetted_column` = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $searched_value);
        $stmt->execute();

        $result = $stmt->get_result();

        if(($result->num_rows) > 0)
        {
            return $result;
        }
    }
?>
