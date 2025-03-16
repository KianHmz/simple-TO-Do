<?php

/**
 * Database Connection
 */

$db = require_once '../config/db.php';
try {
    $pdo = new PDO("mysql:host=" . $db['db_host'] . ";dbname=" . $db['db_name'] . ";CHARSET=" . $db['db_charset'], $db['db_user'], $db['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Database connection failed: " . $e->getMessage());
}
