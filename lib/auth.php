<?php

/**
 * authentications
 */

function getUserId()
{
    return $_SESSION['user']['id'];
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
        $stmt->execute(['name' => $userData['name'], 'email' => $userData['email'], 'password' => password_hash($userData['password'], PASSWORD_DEFAULT)]);
        return 'You signed up successfully. Please Login.';
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

function loginUser()
{

    $userData = [
        'email' => cleanInput($_POST['email']),
        'password' => cleanInput($_POST['password'])
    ];

    if (
        !isset($userData['email']) || empty($userData['email']) ||
        !isset($userData['password']) || empty($userData['password'])
    ) {
        return 'Please fill out the form.';
    }

    try {
        global $pdo;


        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE email = :email");
        $stmt->execute(['email' => $userData['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && password_verify($userData['password'], $result['password'])) {
            $_SESSION['user'] = [
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
            ];
            header('Location: ' . BASE_URL . '/public/index.php');
        } else {
            return 'Invalid email or password.';
        }
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

function logoutUser()
{
    session_start();
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . '/public/auth.php');
}
