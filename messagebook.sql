SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `messagebook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `messagebook`;

CREATE TABLE `content` (
  `conid` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED DEFAULT NULL COMMENT 'user表的主鍵',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '新文章標題',
  `content` text COMMENT '新文章內容',
  `createtime` int(11) NOT NULL DEFAULT '0' COMMENT '格林威治時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `userName` varchar(100) NOT NULL DEFAULT '',
  `account` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `regTime` varchar(255) NOT NULL COMMENT '格林威治時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `content`
  ADD PRIMARY KEY (`conid`),
  ADD KEY `uid` (`uid`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);


ALTER TABLE `content`
  MODIFY `conid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;