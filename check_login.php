
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

    function does_password_match(object $conn, string $email, string $password): bool {
    // VERSION 1.2

        $query = "SELECT hashed_password FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $stmt->store_result();

        if(($stmt->num_rows) > 0) {

            $hashed_password = '';
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if(password_verify($password, $hashed_password)) {
                return true;
            }

        }

        return false;
    }

?>

<?php

    function is_email_invalid(string $email): bool
    {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {     // si $email est invalide alors filter_var() renvoie false le cas écheant il renvoie la valeur de $email
            return true;
        }
        else {
            return false;
        }

    }

    
?>

<?php

    function check_user_type(object $db_conn, string $email): string {

        $query = "SELECT user_type FROM users WHERE email = ?";
        $stmt = $db_conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        return $user['user_type'];

    }

?>