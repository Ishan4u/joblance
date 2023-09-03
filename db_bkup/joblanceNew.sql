-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `com_id` varchar(255) NOT NULL,
  `com_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `company` (`com_id`, `com_name`, `location`, `phone`, `email`, `image`, `password`) VALUES
('gAKGBApX7twHqB7F3RE6',	'tony industry',	'stark',	'0711976100',	'tony@gmail.com',	'Dcw5AsPFvEthPNKsaqkG.desktop-1600x900 (1).jpg',	'30531c2885ce61b385dc81d2a375f6bef80607d5'),
('6esdHmV93Nn6pWDEHxXv',	'thor',	'asgard',	'0711976100',	'thor@gmail.com',	'BaogusIvXyUtBJGVkJww.java',	'30531c2885ce61b385dc81d2a375f6bef80607d5'),
('1KHWCiCBbOjZybE551za',	'microsoft',	'kurunegala',	'7788',	'company@gmail.com',	'pv3C3eJyZbgafMRTpvJ1.presentation',	'30531c2885ce61b385dc81d2a375f6bef80607d5');

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
('648f3a9a685ca',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nobis dolore iure reiciendis, doloribus sint libero consequuntur, ipsum est error adipisci placeat qui voluptas quod numquam cupiditate aut quisquam obcaecati? Eos facere, consequatur harum voluptatem saepe ipsa distinctio ea ex ipsum ut? Doloribus sint voluptatum maxime laudantium porro molestias blanditiis?',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nobis dolore iure reiciendis, doloribus sint libero consequuntur, ipsum est error adipisci placeat qui voluptas quod numquam cupiditate aut quisquam obcaecati? Eos facere, consequatur harum voluptatem saepe ipsa distinctio ea ex ipsum ut? Doloribus sint voluptatum maxime laudantium porro molestias blanditiis?',	'web development',	'higher national diploma',	'zBUuwsT2vlZ4nQrXKNU1'),
('64907429767b0',	'sdada',	'dsada',	'web',	'hnd',	'lkSWVf4rokQLiwvrteuu'),
('64e74b13000e5',	'good developer',	'more than two years',	'web design',	'hndit',	'FfcZsToX9Gddfj3bVwSB');

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `job_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `apply_before` timestamp NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `requirements` longtext NOT NULL,
  `com_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `salary` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `post` (`job_id`, `title`, `job_type`, `apply_before`, `image`, `description`, `requirements`, `com_id`, `salary`) VALUES
('JbJ4MnsofVkDZsc9oOoB',	'java devaloper',	'Full Time',	'2023-06-26 00:00:00',	'com_logo',	'Job Description',	'Job Description',	'gAKGBApX7twHqB7F3RE6',	'500000'),
('AES6FdR1kT0YtXyXcj27',	'python developer',	'Full Time',	'2023-06-23 00:00:00',	'MkNgb2gvxGOQKwGHXXUO.green.jpg',	'Job DescriptionJob DescriptionJob DescriptionJob DescriptionJob DescriptionJob DescriptionJob DescriptionJob Description',	'Job RequirementsJob RequirementsJob RequirementsJob RequirementsJob RequirementsJob RequirementsJob Requirements',	'gAKGBApX7twHqB7F3RE6',	'10000'),
('wCGiJqqTWbgbkThRH56Q',	'nasa haker',	'Full Time',	'2023-06-29 00:00:00',	'RCKBpvnnmuHaD8XU0ysZ.java',	'fsfsdfsdf',	'sdfsdf',	'gAKGBApX7twHqB7F3RE6',	'400000000'),
('9IygQFBYUl6BBz96lT7N',	'java hacker',	'Freelancer',	'2023-07-02 00:00:00',	'com_logo',	'Job Description',	'Job DescriptionJob DescriptionJob Description',	'6esdHmV93Nn6pWDEHxXv',	'670000'),
('htAOhsn1GD5yJjjv3Mld',	'Developer',	'Part Time',	'2023-08-15 00:00:00',	'NKufLdm1riVnT9sDp76A.para.jpg',	'des',	'req',	'1KHWCiCBbOjZybE551za',	'30000'),
('A6sGdhB9sRWGNPWrngwl',	'vb.net developer',	'Full Time',	'2023-08-15 00:00:00',	'EHRbrCfBeL59tIbJKwvI.vb',	'we want high skill developer',	'hndit diploma',	'1KHWCiCBbOjZybE551za',	'400000000');

DROP TABLE IF EXISTS `user_post`;
CREATE TABLE `user_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_id` varchar(255) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user_post` (`id`, `u_id`, `job_id`, `status`) VALUES
(7,	'FfcZsToX9Gddfj3bVwSB',	'JbJ4MnsofVkDZsc9oOoB',	0),
(10,	'FfcZsToX9Gddfj3bVwSB',	'zzncTY6tOZ8D98iQysCc',	0),
(11,	'FfcZsToX9Gddfj3bVwSB',	'htAOhsn1GD5yJjjv3Mld',	1),
(12,	'FfcZsToX9Gddfj3bVwSB',	'AES6FdR1kT0YtXyXcj27',	0),
(13,	'FfcZsToX9Gddfj3bVwSB',	'9IygQFBYUl6BBz96lT7N',	0),
(14,	'FfcZsToX9Gddfj3bVwSB',	'A6sGdhB9sRWGNPWrngwl',	1),
(15,	'FfcZsToX9Gddfj3bVwSB',	'wCGiJqqTWbgbkThRH56Q',	0);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `profession` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `location`, `image`, `profession`) VALUES
('zBUuwsT2vlZ4nQrXKNU1',	'khilji',	'ishan@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'pvH0KMjWoxmxXa5Z16Kf.',	'web'),
('lRCzEhsGPXkkUOWoW0TG',	'khan',	'khan@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'cyxjK2poAkTEHuk0WwvN.jpg',	'web'),
('lkSWVf4rokQLiwvrteuu',	'users',	'starkho@gmaill.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'gepPkm8xrIA58crF0C57.desktop-1600x900.jpg',	'web'),
('ctFHUUaz2AfSa9jb4gZc',	'aladin',	'aladin@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'Stark',	'Ee5xxPl7HiqXVYByf4C9.desktop-1600x900 (1).jpg',	'web'),
('ZpZwm3jFbdEGXzAqbSAD',	'tonyy',	'tony@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'0711976100',	'stark',	'HuPe7tgxEBRhVtUlJtPy.desktop-1600x900.jpg',	'web developer'),
('FfcZsToX9Gddfj3bVwSB',	'user',	'user@gmail.com',	'30531c2885ce61b385dc81d2a375f6bef80607d5',	'7788',	'kandy',	'dN5ZWSJPTmTWMISKRmaR.java',	'developer');

-- 2023-08-31 03:52:39
