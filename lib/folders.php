<?php

/**
 * Folders CRUD
 */

function showFolders()
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM `Folders`");
        $stmt->execute();
        return [true, $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
}

function createFolder()
{
    return false;
}

// function updateFolder() // UI ndre ***
// {
//     return false;
// }

function deleteFolder()
{
    return false;
}
