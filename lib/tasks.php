<?php

/**
 * Tasks CRUD
 */

// $action = $_GET['action'] ?? null;

// switch ($action) {
//     case 'show':
//         echo json_encode(["success" => true, "data" => showTasks()]);
//         break;

//     case 'create':
//         echo json_encode(["success" => true, "task_id" => createTask()]);
//         break;

//     case 'update':
//         echo json_encode(["success" => true, "updated" => updateTask()]);
//         break;

//     case 'delete':
//         echo json_encode(["success" => true, "deleted" => deleteTask()]);
//         break;

//     default:
//         echo json_encode(["success" => false, "error" => "Invalid Action"]);
// }
// exit;

function showTasks()
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM `tasks` ORDER BY `is_done`, `created_at` DESC");
        $stmt->execute();
        return [true, $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } catch (PDOException $e) {
        return [false, $e->getMessage()];
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
