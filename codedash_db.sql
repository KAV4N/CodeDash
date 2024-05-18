-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: So 18.Máj 2024, 18:00
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `codedash_db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_bug_reports`
--

CREATE TABLE `tbl_bug_reports` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_bug_reports`
--

INSERT INTO `tbl_bug_reports` (`id`, `title`, `description`, `added`) VALUES
(6, 'NEJDE :(', '\\_(-_-)_/', '2024-05-18 05:38:17');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_code`
--

CREATE TABLE `tbl_code` (
  `id` bigint(20) NOT NULL,
  `snippet` varchar(1000) NOT NULL,
  `creation_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `difficulty_id` bigint(20) NOT NULL,
  `player_id` bigint(20) NOT NULL,
  `language_name_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_code`
--

INSERT INTO `tbl_code` (`id`, `snippet`, `creation_date`, `description`, `difficulty_id`, `player_id`, `language_name_id`) VALUES
(2900, '#include <iostream>\r\n#include <cstdlib> // For rand() and srand()\r\n#include <ctime>   // For time()\r\n\r\nint main() {\r\n    // Seed the random number generator\r\n    srand(time(nullptr));\r\n\r\n    // Generate and print 10 random numbers\r\n    for (int i = 0; i < 10; ++i) {\r\n        int randomNumber = rand() % 100 + 1; // Generate a random number between 1 and 100\r\n        std::cout << \"Random number \" << i+1 << \": \" << randomNumber << std::endl;\r\n    }\r\n\r\n    return 0;\r\n}\r\n', '2024-04-27 17:50:58', 'This code uses the rand() function from the C Standard Library to generate random numbers. It first seeds the random number generator using the current time, and then it generates 10 random numbers between 1 and 100 and prints them out.', 3, 621, 1),
(2902, '[][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]][([][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]]((!![]+[])[+!+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+([][[]]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+!+[]]+(+[![]]+[][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]])[+!+[]+[+!+[]]]+(!![]+[])[!+[]+!+[]+!+[]]+(+(!+[]+!+[]+!+[]+[+!+[]]))[(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]])[+!+[]+[+[]]]+([]+[])[([][(![]+[])[+[]]+(![]+[])[!+[]+!+[]]+(![]+[])[+!+[]]+(!![]+[])[+[]]]+[])[!+[', '2024-05-06 08:22:57', 'JSFUCK...', 4, 621, 4);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_difficulty`
--

CREATE TABLE `tbl_difficulty` (
  `id` bigint(20) NOT NULL,
  `exp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_difficulty`
--

INSERT INTO `tbl_difficulty` (`id`, `exp`, `name`, `time`) VALUES
(1, 1000, 'Easy', 60),
(2, 2000, 'Medium', 120),
(3, 3000, 'Hard', 180),
(4, 4000, 'Expert', 240);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_player`
--

CREATE TABLE `tbl_player` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `exp` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `typed` int(11) NOT NULL,
  `errors` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_banned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_player`
--

INSERT INTO `tbl_player` (`id`, `email`, `username`, `password`, `join_date`, `exp`, `rank_id`, `typed`, `errors`, `aboutme`, `is_admin`, `is_banned`) VALUES
(621, 'admin@codedash.sk', 'pa3k', '$2y$10$CAISl3ZnF9lyJfT0AzMxqOtj/TE/lVh.ZeCFi6gitFtIUNwsSBWFy', '2024-04-27 00:00:00', 10000, 3, 0, 0, 'TEST', 1, 0),
(625, 'patrik.kavan2@gmail.com', 'admin', '$2y$10$YNFKzWNVcvqdKdvg/A8Bf.0Ax4rnwfbhGRkUBhN4oWXi7ukaBP/ui', '2024-05-18 15:47:37', 0, 1, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_programming_language`
--

CREATE TABLE `tbl_programming_language` (
  `id` bigint(20) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_programming_language`
--

INSERT INTO `tbl_programming_language` (`id`, `language_name`) VALUES
(1, 'C++'),
(2, 'Java'),
(3, 'Python'),
(4, 'JavaScript'),
(5, 'C#'),
(6, 'C');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_race_stats`
--

CREATE TABLE `tbl_race_stats` (
  `id` bigint(20) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `time_left` int(11) NOT NULL,
  `wpm` int(11) NOT NULL,
  `play_date` datetime NOT NULL,
  `code_id` bigint(20) NOT NULL,
  `player_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_race_stats`
--

INSERT INTO `tbl_race_stats` (`id`, `accuracy`, `time_left`, `wpm`, `play_date`, `code_id`, `player_id`) VALUES
(59, 0, 0, 0, '2024-05-06 19:01:23', 2900, 621),
(60, 0, 0, 0, '2024-05-06 19:05:14', 2902, 621),
(61, 0, 0, 0, '2024-05-06 19:06:42', 2902, 621),
(62, 0, 0, 0, '2024-05-06 19:07:32', 2900, 621),
(63, 0, 0, 0, '2024-05-06 19:09:01', 2900, 621),
(64, 0, 0, 0, '2024-05-06 19:09:45', 2900, 621),
(65, 0, 0, 0, '2024-05-06 19:10:22', 2900, 621),
(66, 0, 0, 0, '2024-05-06 19:12:20', 2900, 621),
(67, 0, 0, 0, '2024-05-06 19:13:42', 2902, 621),
(68, 0, 0, 0, '2024-05-06 19:13:55', 2902, 621),
(69, 0, 0, 0, '2024-05-06 19:14:09', 2900, 621),
(70, 0, 0, 0, '2024-05-06 19:14:31', 2902, 621),
(71, 0, 0, 0, '2024-05-06 19:14:54', 2902, 621),
(75, 0, 0, 0, '2024-05-18 17:29:12', 2902, 621),
(76, 0, 0, 0, '2024-05-18 17:48:54', 2902, 621);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_ranks`
--

CREATE TABLE `tbl_ranks` (
  `id` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_ranks`
--

INSERT INTO `tbl_ranks` (`id`, `exp`, `name`, `level`) VALUES
(1, 10000, 'Novice Hacker', 1),
(2, 20000, 'Script Kiddie', 2),
(3, 40000, 'Binary Coder', 3),
(4, 60000, 'Code Ninja', 4),
(5, 80000, 'Cyber Sergeant', 5),
(6, 100000, 'Malware Master', 6),
(7, 120000, 'Encryption Expert', 7),
(8, 140000, 'Firewall Guardian', 8),
(9, 160000, 'Cybersecurity Chief', 9),
(10, 180000, 'Algorithm Architect', 10),
(11, 200000, 'Data Scientist', 11),
(12, 220000, 'Software Sorcerer', 12),
(13, 240000, 'Machine Learning Maestro', 13),
(14, 260000, 'Code Commander', 14),
(15, 280000, 'Programming Prodigy', 15),
(16, 300000, 'Cybernetic Strategist', 16),
(17, 320000, 'Digital Overlord', 17),
(18, 340000, 'Binary Baron', 18),
(19, 360000, 'Hacker Hero', 19),
(20, 380000, 'Cyber Deity', 20),
(21, 400000, 'AI Architect', 21),
(22, 420000, 'Neural Network Ninja', 22),
(23, 440000, 'Quantum Coder', 23),
(24, 460000, 'Virtual Reality Virtuoso', 24),
(25, 480000, 'Cyber Samurai', 25),
(26, 500000, 'Blockchain Baron', 26),
(27, 520000, 'Ethical Hacker', 27),
(28, 540000, 'Cryptocurrency Connoisseur', 28),
(29, 560000, 'Deep Learning Demigod', 29),
(30, 580000, 'Code Wizard', 30),
(31, 600000, 'Cyber Warlord', 31),
(32, 620000, 'Information Security Sorcerer', 32),
(33, 640000, 'Quantum Computing Queen/King', 33),
(34, 660000, 'Virtualization Virtuoso', 34),
(35, 680000, 'Cybernetic Sovereign', 35),
(36, 700000, 'Cloud Computing Champion', 36),
(37, 720000, 'Digital Defense Duke/Duchess', 37),
(38, 740000, 'Robotics Ruler', 38),
(39, 760000, 'Tech Titan', 39),
(40, 780000, 'Master of Cyberspace', 40);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tbl_routes`
--

CREATE TABLE `tbl_routes` (
  `id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `tbl_routes`
--

INSERT INTO `tbl_routes` (`id`, `module`, `section`) VALUES
(1, 'HomePage', 'home'),
(2, 'RacePage', 'race'),
(3, 'LeaderboardPage', 'leaderboard'),
(4, 'AboutPage', 'about-us'),
(6, 'BugReport', 'reported-bug'),
(7, 'Auth', 'auth'),
(8, 'ProfilePage', 'profile'),
(9, 'UpdateProfilePage', 'update-profile'),
(10, 'CreateRacePage', 'create-race'),
(11, 'PlayersDashboard', 'playersDashboard'),
(12, 'BugReportDashboard', 'bugReportDashboard');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `tbl_bug_reports`
--
ALTER TABLE `tbl_bug_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `tbl_code`
--
ALTER TABLE `tbl_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKcf5r4juy4gi4fmwox9dd6av59` (`difficulty_id`),
  ADD KEY `FK7avy7bere9gxvqj9mydobtxmu` (`language_name_id`),
  ADD KEY `FK40q83k28m1hnk53pe68xc5wtp` (`player_id`);

--
-- Indexy pre tabuľku `tbl_difficulty`
--
ALTER TABLE `tbl_difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `tbl_player`
--
ALTER TABLE `tbl_player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rank_id_constraint` (`rank_id`) USING BTREE;

--
-- Indexy pre tabuľku `tbl_programming_language`
--
ALTER TABLE `tbl_programming_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `tbl_race_stats`
--
ALTER TABLE `tbl_race_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKe8qvdj0w2jtsmumejucuwsljt` (`player_id`),
  ADD KEY `FKsu3xaeoaxwnkcllxthgn498w3` (`code_id`);

--
-- Indexy pre tabuľku `tbl_ranks`
--
ALTER TABLE `tbl_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `tbl_routes`
--
ALTER TABLE `tbl_routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `tbl_bug_reports`
--
ALTER TABLE `tbl_bug_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `tbl_code`
--
ALTER TABLE `tbl_code`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2904;

--
-- AUTO_INCREMENT pre tabuľku `tbl_difficulty`
--
ALTER TABLE `tbl_difficulty`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `tbl_player`
--
ALTER TABLE `tbl_player`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT pre tabuľku `tbl_programming_language`
--
ALTER TABLE `tbl_programming_language`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `tbl_race_stats`
--
ALTER TABLE `tbl_race_stats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pre tabuľku `tbl_ranks`
--
ALTER TABLE `tbl_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pre tabuľku `tbl_routes`
--
ALTER TABLE `tbl_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `tbl_code`
--
ALTER TABLE `tbl_code`
  ADD CONSTRAINT `FK40q83k28m1hnk53pe68xc5wtp` FOREIGN KEY (`player_id`) REFERENCES `tbl_player` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK7avy7bere9gxvqj9mydobtxmu` FOREIGN KEY (`language_name_id`) REFERENCES `tbl_programming_language` (`id`),
  ADD CONSTRAINT `FKcf5r4juy4gi4fmwox9dd6av59` FOREIGN KEY (`difficulty_id`) REFERENCES `tbl_difficulty` (`id`);

--
-- Obmedzenie pre tabuľku `tbl_player`
--
ALTER TABLE `tbl_player`
  ADD CONSTRAINT `rank_id_constraint` FOREIGN KEY (`rank_id`) REFERENCES `tbl_ranks` (`id`);

--
-- Obmedzenie pre tabuľku `tbl_race_stats`
--
ALTER TABLE `tbl_race_stats`
  ADD CONSTRAINT `FKe8qvdj0w2jtsmumejucuwsljt` FOREIGN KEY (`player_id`) REFERENCES `tbl_player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKsu3xaeoaxwnkcllxthgn498w3` FOREIGN KEY (`code_id`) REFERENCES `tbl_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
