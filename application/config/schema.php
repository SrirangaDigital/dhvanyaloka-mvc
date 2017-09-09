<?php

define('JOURNAL_DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE . '` (
  `book_id` varchar(10) DEFAULT NULL,
  `btitle` varchar(2000) DEFAULT NULL,
  `author` varchar(2000) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `title` varchar(10000) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `id` int(6) AUTO_INCREMENT, PRIMARY KEY (`id`)
) AUTO_INCREMENT=10001 ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8mb4');

?>
