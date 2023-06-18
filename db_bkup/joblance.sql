-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cv`;
CREATE TABLE `cv` (
  `c_id` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `experience` longtext NOT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cv` (`c_id`, `about`, `experience`, `skill`, `education`, `user_id`) VALUES
('648f3a9a685ca',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nobis dolore iure reiciendis, doloribus sint libero consequuntur, ipsum est error adipisci placeat qui voluptas quod numquam cupiditate aut quisquam obcaecati? Eos facere, consequatur harum voluptatem saepe ipsa distinctio ea ex ipsum ut? Doloribus sint voluptatum maxime laudantium porro molestias blanditiis?',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nobis dolore iure reiciendis, doloribus sint libero consequuntur, ipsum est error adipisci placeat qui voluptas quod numquam cupiditate aut quisquam obcaecati? Eos facere, consequatur harum voluptatem saepe ipsa distinctio ea ex ipsum ut? Doloribus sint voluptatum maxime laudantium porro molestias blanditiis?',	'web development',	'higher national diploma',	'zBUuwsT2vlZ4nQrXKNU1');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `location`, `image`) VALUES
('zBUuwsT2vlZ4nQrXKNU1',	'khilji',	'ishan@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'pvH0KMjWoxmxXa5Z16Kf.'),
('lRCzEhsGPXkkUOWoW0TG',	'khan',	'khan@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'cyxjK2poAkTEHuk0WwvN.jpg');

-- 2023-06-18 17:29:09
