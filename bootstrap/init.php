<?php

/**
 * Starter Point Of The App 
 */

error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

session_start();

include_once '../config/consts.php';
include_once BASE_PATH . '/lib/helpers.php';
include_once BASE_PATH . '/bootstrap/db-connect.php';
include_once BASE_PATH . '/lib/auth.php';
include_once BASE_PATH . '/lib/folders.php';
include_once BASE_PATH . '/lib/tasks.php';
include_once BASE_PATH . '/vendor/autoload.php';
