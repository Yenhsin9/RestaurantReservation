-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 08 月 08 日 08:06
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `restaurant_reservation`
--

-- --------------------------------------------------------

--
-- 資料表結構 `reservations`
--

CREATE TABLE `reservations` (
  `Re_id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `people` int(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `reservations`
--

INSERT INTO `reservations` (`Re_id`, `Name`, `phone_number`, `date`, `time`, `people`, `type`) VALUES
(1, 'Yenhsin', '0986997022', '2024-08-08', '7pm-8pm', 2, 'Italy'),
(2, 'selena', '0900000', '2024-08-08', '5pm-6pm', 2, 'China'),
(2, 'selena', '0900000', '2024-08-08', '7pm-8pm', 2, 'Italy');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `ID_num` int(20) NOT NULL,
  `Account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `E_mail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`ID_num`, `Account`, `password`, `Name`, `phone_number`, `E_mail`) VALUES
(1, 'admin', '0000', 'Yenhsin', '0986997022', '123qqqselena@gmail.com'),
(2, 'selena1', '123qqq', 'selena', '09123', '123@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_num`),
  ADD UNIQUE KEY `Account` (`Account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `ID_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT ALL PRIVILEGES ON restaurant_reservation.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
