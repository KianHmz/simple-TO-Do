--
-- Tables Schema 
--
--
START TRANSACTION;

USE `to-do-app`;
--
-- --------------------------------------------------------
--
-- folders table
--
CREATE TABLE
    `folders` (
        `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
        `user_id` int NOT NULL,
        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_persian_ci;

-- --------------------------------------------------------
-- tasks table
--
CREATE TABLE
    `tasks` (
        `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
        `is_done` boolean NOT NULL DEFAULT 0,
        `folder_id` int NOT NULL,
        `user_id` int NOT NULL,
        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_persian_ci;

-- --------------------------------------------------------
-- users table
--
CREATE TABLE
    `users` (
        `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
        `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
        `password` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_persian_ci;

-- --------------------------------------------------------
--
COMMIT;