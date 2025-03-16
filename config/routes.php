<?php

/**
 * Routing Pages WTFFFFFFFFFFFFFFFFFFF
 */

$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        return BASE_URL . '/public/index.php';
        break;

    // other routings ...

    default:
        return BASE_URL . '/public/404.php';
        break;
}
