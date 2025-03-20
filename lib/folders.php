<?php

/**
 * Folders CRUD
 */

$userId = getUserId();

function showFolders($userId)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM `folders` WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        $folders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ['success' => true, 'result' => $folders];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}

function createFolder($folder_name)
{
    global $pdo;
    global $userId;
    if (strlen($folder_name) < 3) {
        return ['success' => false, 'result' => 'Folder name is too short.'];
        die();
    }
    try {
        // check if the folder already exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM `folders` WHERE name = :name AND user_id = :user_id");
        $checkStmt->execute(['name' => $folder_name, 'user_id' => $userId]);
        if ($checkStmt->fetchColumn() > 0) {
            return ['success' => false, 'result' => 'Folder already exists.'];
        }
        $stmt = $pdo->prepare("INSERT INTO `folders`(name, user_id) VALUES(:name, :user_id)");
        $stmt->execute(['name' => $folder_name, 'user_id' => $userId]);
        return ['success' => true, 'result' => 'Folder created successfully.'];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}

// function updateFolder() // UI rename folder ndre ***
// {
//     return false;
// }

function deleteFolder($folder_id)
{
    global $pdo;
    global $userId;
    $folderId = $folder_id;
    try {
        $stmt = $pdo->prepare("DELETE FROM `folders` WHERE id = :folder_id AND user_id = :user_id");
        $stmt->execute(['folder_id' => $folderId, 'user_id' => $userId]);
        // delete tasks from selected folder
        $stmt = $pdo->prepare("DELETE FROM `tasks` WHERE folder_id = :folder_id AND user_id = :user_id");
        $stmt->execute(['folder_id' => $folderId, 'user_id' => $userId]);
        return ['success' => true, 'result' => 'Folder deleted successfully.'];
    } catch (PDOException $e) {
        return ['success' => false, 'result' => $e->getMessage()];
    }
}
