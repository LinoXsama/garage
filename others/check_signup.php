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
    if(!(strlen($password) >= 8 && preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])^\S+$/', $password))) 
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function does_email_exist(string $user_email): bool 
{
    include 'config/db_connect.php';

    $query = "SELECT email FROM crud WHERE email = ?";                    
    $stmt = $conn->prepare($query);
    $stmt -> bind_param("s", $user_email);                                 
    $stmt -> execute();
    
    $stmt->store_result();                                                
    
    $result = ($stmt->num_rows) > 0;                                        
    
    return $result;
}

function user_registration(string $fname, string $lname, string $user_email, string $password): array 
{
    include 'config/db_connect.php';

    $data = array(
        'qp' => '',
        'qb' => '',
        'qe' => '',
        'return' => ''
    );

    $userType = "admin";

    $pwd_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO crud(first_name, last_name, email, password, pwd_hash, user_type) VALUES(?, ?, ?, ?, ?, ?)";
    $data['qp'] = $stmt = $conn->prepare($query);
    $data['qb'] = $stmt->bind_param("ssssss", $fname, $lname, $user_email, $password, $pwd_hash, $userType);
    $data['qe'] = $stmt->execute();

    $stmt->close();

    $data['return'] = $data['qp'] && $data['qb'] && $data['qe'];

    return $data;
}
