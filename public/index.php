<?php

require_once '../bootstrap/init.php';


$tasks = showTasks();
if (!$tasks[0]) {
    errorModal('Error showing tasks', $tasks[1]);
} else {
    $tasks = $tasks[1]; // store fetched records
}

$folders = showFolders();
if (!$folders[0]) {
    errorModal('Error showing folders', $folders[1]);
} else {
    $folders = $folders[1]; // store fetched records
}

include_once BASE_PATH . '/templates/home.php';
