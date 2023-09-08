<!-- FONCTIONS GLOBALES DU SITE - START -->

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

        $stmt->close();

        if(($result->num_rows) > 0) 
        {
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

        if($stmt)
        {
            $stmt->execute();

            if(($stmt->affected_rows) > 0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
        }
        else
        {
            return false;
        }
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

<?php
    // VERSION 1.0 
    function update(string $table, string $condition, string $condition_value, string $targetted_column1, string $value1, ?string $targetted_column2 = null, ?string $value2 = null, ?string $targetted_column3 = null, ?string $value3 = null, ?string $targetted_column4 = null, ?string $value4 = null, ?string $targetted_column5 = null, ?string $value5 = null): bool
    {
        include 'config/db_connect.php';

        if($targetted_column2 === null || $value2 === null)
        {
            $query = "UPDATE $table SET $targetted_column1 = ? WHERE $condition = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $value1, $condition_value);
            
        }
        else if($targetted_column3 === null || $value3 === null)
        {
            $query = "UPDATE $table SET $targetted_column1 = ?, $targetted_column2 = ? WHERE $condition = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $value1, $value2, $condition_value);
            
        }
        else if($targetted_column4 === null || $value4 === null)
        {
            $query = "UPDATE $table SET $targetted_column1 = ?, $targetted_column2 = ?, $targetted_column3 = ? WHERE $condition = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $value1, $value2, $value3, $condition_value);
            
        }
        else if($targetted_column5 === null || $value5 === null)
        {
            $query = "UPDATE $table SET $targetted_column1 = ?, $targetted_column2 = ?, $targetted_column3 = ?, $targetted_column4 = ?, WHERE $condition = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", $value1, $value2, $value3, $value4, $condition_value);
        
        }
        else
        {
            $query = "UPDATE $table SET $targetted_column1 = ?, $targetted_column2 = ?, $targetted_column3 = ?, $targetted_column4 = ?, $targetted_column5 = ? WHERE $condition = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $value1, $value2, $value3, $value4, $value5, $condition_value);
            
        }

        if($stmt)
        {
            $stmt->execute();

            if(($stmt->affected_rows) > 0)
            {
                $stmt->close();
                return true;
            }
            else {
                $stmt->close();
                return false;
            }
        }
        else
        {
            return false;
        }
    }
?>

<?php
    // VERSION 1.0 
    function delete(string $table, string $condition, string $value): bool
    {
        include 'config/db_connect.php';

        $query = "DELETE FROM $table WHERE $condition = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $value);

        if($stmt)
        {
            $stmt->execute();

            if(($stmt->affected_rows) > 0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
        }
        else
        {
            return false;
        }
    }
?>

<!-- FONCTIONS GLOBALES DU SITE - END -->

<!-- FONCTIONS DE LA PAGE login.php - START -->

<?php

    // function does_password_match(object $db_conn, string $email, string $password) {
    // // VERSION 1.0
    
    //     $query = "SELECT email FROM users WHERE email = ?";
    //     $stmt = $db_conn->prepare($query);
    //     $stmt->bind_param("s", $email);
    //     $stmt->execute();
    
    //     $stmt->store_result();
    
    //     if(($stmt->num_rows) > 0) {
    
    //         $query = "SELECT hashed_password FROM users WHERE email = ?";
    //         $stmt = $db_conn->prepare($query);
    //         $stmt->bind_param("s", $email);
    //         $stmt->execute();
    
    //         $user = $stmt->get_result()->fetch_assoc();
    
    //         if(password_verify($password, $user['hashed_password'])) {
    //             return true;
    //         }

    //     }
    //     return false;
    
    // }

?>

<?php

    // function does_password_match(object $conn, string $email, string $password): bool {

    // VERSION 1.1 : bug à la ligne : user = $stmt->get_result()->fetch_assoc(); 
    // Je peux en déduire qu'on ne peut pas utiliser store_result() et get_result() 
    // sur un même objet de requête préparée. Dans la version 1.0 $stmt est utilisé
    // pour stocker deux objets de requêtes préparées différents.

    //     $query = "SELECT hashed_password FROM users WHERE email = ?";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bind_param("s", $email);
    //     $stmt->execute();

    //     $stmt->store_result();

    //     if(($stmt->num_rows) > 0) {

    //         $user = $stmt->get_result()->fetch_assoc();

    //         if(password_verify($password, $user['hashed_password'])) {
    //             return true;
    //         }

    //     }

    //     return false;
    // }

?>

<?php

    function does_password_match(string $email, string $password): bool 
    {
    // VERSION 1.2

        include 'config/db_connect.php';

        $query = "SELECT pwd_hash FROM crud WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $stmt->store_result();

        if(($stmt->num_rows) > 0) 
        {
            $hashed_password = '';
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if(password_verify($password, $hashed_password)) 
            {
                return true;
            }
        }

        return false;

        $stmt->close();
    }
?>

<?php

    function is_email_invalid(string $email): bool
    {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {     // si $email est invalide alors filter_var() renvoie false le cas écheant il renvoie la valeur de $email
            return true;
        }
        else 
        {
            return false;
        }

    }

    
?>

<?php

    function get_user_data(string $email): array 
    {
        include 'config/db_connect.php';

        $data = array
        (
            'id' => '',
            'user_type' => ''
        );

        $query = "SELECT id, user_type FROM crud WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        $data['id'] = $user['id'];
        $data['user_type'] = $user['user_type'];

        return $data;
    }

?>

<!-- FONCTIONS DE LA PAGE login.php - END -->