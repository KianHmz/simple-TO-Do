<?php

/**
 * Tasks CRUD
 */

$userId = getUserId();

function showTasks()
{
    global $pdo;
    global $userId;
    $folderId = $_GET['fid'] ?? 'all';
    $folderCondition = '';
    if (is_numeric($folderId)) {
        $folderCondition = " AND folder_id = $folderId";
    }
    try {
        $stmt = $pdo->prepare("SELECT * FROM `tasks` WHERE `user_id` = :user_id $folderCondition ORDER BY `is_done`, `created_at` DESC");
        $stmt->execute(['user_id' => $userId]);
        return ['success' => true, 'result' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } catch (PDOException $e) {
        return ['success' => true, 'result' => $e->getMessage()];
    }
}

function createTask($task_title, $folder_id)
{
    global $pdo;
    global $userId;
    if (strlen($task_title) < 3) {
        return ['success' => false, 'result' => 'Task title is too short.'];
        die();
    }
    if (!isset($folder_id) || !is_numeric($folder_id)) {
        return ['success' => false, 'result' => 'First select a folder.'];
        die();
    }
    try {
        $stmt = $pdo->prepare("INSERT INTO `tasks`(title, folder_id, user_id) VALUES(:title, :folder_id, :user_id)");
        $stmt->execute(['title' => $task_title, 'folder_id' => $folder_id, 'user_id' => $userId]);
        return ['success' => true, 'result' => 'task created successfully.'];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}

function deleteTask($task_id)
{
    global $pdo;
    global $userId;
    $taskId = $task_id;
    try {
        $stmt = $pdo->prepare("DELETE FROM `tasks` WHERE id = :task_id AND user_id = :user_id");
        $stmt->execute(['task_id' => $taskId, 'user_id' => $userId]);
        return ['success' => true, 'result' => 'Task deleted successfully.'];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}

function doneTask($task_id)
{
    global $pdo;
    global $userId;
    $taskId = $task_id;
    try {
        $stmt = $pdo->prepare("UPDATE `tasks` SET is_done = 1 - is_done WHERE id = :taskId AND user_id = :user_id");
        $stmt->execute(['taskId' => $taskId, 'user_id' => $userId]);
        return ['success' => true, 'result' => 'Task status changed successfully.'];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}
