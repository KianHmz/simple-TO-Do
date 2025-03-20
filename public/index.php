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

    case 'createTask':
        $taskTitle = $_POST['taskTitle'];
        $folderId = $_POST['folderId'];
        $createTask = createTask($taskTitle, $folderId);
        die(json_encode($createTask));
        break;

    case 'deleteTask':
        $taskId = $_POST['taskId'];
        $deleteTask = deleteTask($taskId);
        die(json_encode($deleteTask));
        break;

    case 'doneTask':
        $taskId = $_POST['taskId'];
        $doneTask = doneTask($taskId);
        die(json_encode($doneTask));
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
