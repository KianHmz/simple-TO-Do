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

function createTask()
{
    return false;
}

function updateTask()
{
    return false;
}

function deleteTask()
{
    return false;
}
