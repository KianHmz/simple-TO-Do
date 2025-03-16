--
-- Sample Records
--
--
START TRANSACTION;

USE `to-do-app`;
--
-- --------------------------------------------------------
--
-- folders table records
--
INSERT INTO `folders` (`id`, `name`, `user_id`) VALUES
(1, 'work', 1),
(2, 'personal', 2);

-- --------------------------------------------------------
-- tasks table records
--
INSERT INTO `tasks` (`id`, `title`, `folder_id`, `user_id`) VALUES
(1, 'dnld folan movie', 2, 2),
(2, 'design UI for mr.', 1, 1),
(3, 'book room no. 110 for Eid', 2, 2);

-- --------------------------------------------------------
-- users table records
--
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kian', 'kian@gmail.com', 'kian@gmail.com'),
(2, 'Tootoo', 'tootoo@gmail.com', 'tootoo@gmail.com');

-- --------------------------------------------------------
--
COMMIT;