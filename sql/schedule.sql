-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2020 年 08 月 18 日 10:32
-- 伺服器版本： 8.0.21-0ubuntu0.20.04.4
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `schedule`
--

-- --------------------------------------------------------

--
-- 資料表結構 `NABOO`
--

CREATE TABLE `NABOO` (
  `s_begin` datetime(6) DEFAULT NULL,
  `s_end` datetime(6) DEFAULT NULL,
  `title` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `NABOO`
--

INSERT INTO `NABOO` (`s_begin`, `s_end`, `title`) VALUES
('2020-08-13 08:00:00.000000', '2020-08-13 09:00:00.000000', ' title'),
('2020-08-14 08:00:00.000000', '2020-08-14 09:00:00.000000', ''),
('2020-08-18 14:00:00.000000', '2020-08-18 17:00:00.000000', ' 開會');

-- --------------------------------------------------------

--
-- 資料表結構 `TATOOINE`
--

CREATE TABLE `TATOOINE` (
  `s_begin` datetime(6) DEFAULT NULL,
  `s_end` datetime(6) DEFAULT NULL,
  `title` char(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `TATOOINE`
--

INSERT INTO `TATOOINE` (`s_begin`, `s_end`, `title`, `user_id`) VALUES
('2020-08-13 08:00:00.000000', '2020-08-13 09:00:00.000000', ' sd', 1),
('2020-08-13 11:00:00.000000', '2020-08-13 16:00:00.000000', ' asda', 1),
('2020-08-21 08:00:00.000000', '2020-08-21 09:00:00.000000', ' sd', NULL),
('2020-08-13 10:00:00.000000', '2020-08-13 11:00:00.000000', ' sd', NULL),
('2020-08-27 08:00:00.000000', '2020-08-27 09:00:00.000000', '', NULL),
('2020-08-18 08:00:00.000000', '2020-08-18 09:00:00.000000', ' 開會', NULL),
('2020-08-13 16:00:00.000000', '2020-08-13 17:00:00.000000', ' ji', 1),
('2020-08-21 09:00:00.000000', '2020-08-21 12:00:00.000000', ' title', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
