<?php

require_once '../bootstrap/init.php';

$action = $_POST['action'] ?? '';


/**
 * actions: CREATE & DELETE using AJAX
 */

switch ($action) {

    case 'createFolder':
        $folderName = $_POST['folderName'];
        $createFolder = createFolder($folderName);
        die(json_encode($createFolder));
        break;

    case 'deleteFolder':
        $folderId = $_POST['folderId'];
        $deleteFolder = deleteFolder($folderId);
        die(json_encode($deleteFolder));
        break;
}

/**
 * actions: SHOW not using AJAX
 */

$folders = showFolders($userId); // output: [success => , result => ]
if (!$folders['success']) {
    errorModal('Error showing folders', $folders['result']);
}
$folders = $folders['result']; // store fetched records 

$tasks = showTasks($userId); // output: [success => , result => ]
if ($tasks['success'] === false) {
    errorModal('Error showing tasks', $tasks['result']);
}
$tasks = $tasks['result']; // store fetched records 






include_once BASE_PATH . '/templates/home.php';
