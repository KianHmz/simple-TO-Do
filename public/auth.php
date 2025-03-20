<?php

require_once '../bootstrap/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        $_SESSION['msg'] = registerUser();
    }
    if (isset($_POST['login'])) {
        $_SESSION['msg'] = loginUser();
    }
}


include_once BASE_PATH . '/templates/form.php';
