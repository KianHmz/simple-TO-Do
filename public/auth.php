<?php

require_once '../bootstrap/init.php';

/**
 * redirect to dashboard if the user is logged in
 */

if (isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . '/public/index.php');
}

/**
 * actions
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        $_SESSION['msg'] = registerUser();
    }
    if (isset($_POST['login'])) {
        $_SESSION['msg'] = loginUser();
    }
}

include_once BASE_PATH . '/templates/form.php';
