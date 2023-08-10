<?php

function is_email_invalid(string $email): bool 
{
    // si $email est invalide alors filter_var() renvoie false, 
    // le cas écheant il renvoie la valeur de $email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {     
        return true;
    }
    else {
        return false;
    }

}

function is_password_invalid(string $password): bool
{

    if(!(strlen($password) >= 8 && preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])^\S+$/', $password))) {
        return true;
    }
    else {
        return false;
    }

}

function does_email_exist(object $db_conn, string $user_email): bool {

    $query = "SELECT email FROM users WHERE email = ?";                    
    $stmt = $db_conn->prepare($query);
    $stmt -> bind_param("s", $user_email);                                 
    $stmt -> execute();
    
    $stmt->store_result();                                                
    
    $result = ($stmt->num_rows) > 0;                                        
    
    return $result;

}

function user_registration(object $db_conn, string $user_email, string $password): array 
{

    $data = array
        (
            'qp' => '',
            'qb' => '',
            'qe' => '',
            'return' => ''
        );

        $pwd_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(email, hashed_password) VALUES(?, ?)";
        $data['qp'] = $stmt = $db_conn->prepare($query);
        $data['qb'] = $stmt->bind_param("ss", $user_email, $pwd_hash);
        $data['qe'] = $stmt->execute();

        $data['return'] = $data['qp'] && $data['qb'] && $data['qe'];

        return $data;

}
