--table: ytfvo (main table for storing urls and tags)

CREATE TABLE `ytfvo` (
  `url` text NOT NULL,
  `tags` text NOT NULL,
  `sequence` int NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  PRIMARY KEY (`sequence`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--table: ytfvo_credentials (table for storing credentials (api_key))

CREATE TABLE `ytfvo_credentials` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

--table: ytfvo_users (table for storing user credentials)

CREATE TABLE `ytfvo_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci