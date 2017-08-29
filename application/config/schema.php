<?php

define('JOURNAL_DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE . '` (
  `journal` varchar(20) DEFAULT NULL,
  `volume` varchar(3) DEFAULT NULL,
  `issue` varchar(10) DEFAULT NULL,
  `month` varchar(6) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `hassup` tinyint(1) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `feature` varchar(200) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `abstract` text,
  `keywords` varchar(400) DEFAULT NULL,
  `authors` text,
  `dates` mediumtext,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');


?>
