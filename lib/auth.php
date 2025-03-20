<?php

session_start();
$_SESSION['msg'] = '';

/**
 * authentications
 */

function getUserId()
{
    return 1;
}

function registerUser()
{
    $userData = [ 
        'name' => cleanInput($_POST['name']),
        'email' => cleanInput($_POST['email']),
        'password' => cleanInput($_POST['password'])
    ];

    if ( 
        !isset($userData['name']) || empty($userData['name']) ||
        !isset($userData['email']) || empty($userData['email']) ||
        !isset($userData['password']) || empty($userData['password'])
    ) {
        return 'Please fill out the form.';
    }

    try {
        global $pdo;

        // check if the email already exists
        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE email = :email");
        $stmt->execute(['email' => $userData['email']]);
        if ($stmt->rowCount() > 0) {
            return 'Email already in use.';
        }
        
        $stmt = $pdo->prepare("INSERT INTO `users`(name, email, password) VALUES(:name, :email, :password)");
        $stmt->execute(['name' => $userData['name'], 'email' => $userData['email'], 'password' => $userData['password']]);
        return 'You signed up successfully. Please Login.';
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

function loginUser() {}
