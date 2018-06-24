# sql file for CREATE TABLE



# DB manage account infomation of users

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



# DB manage timeline information

CREATE TABLE `timeline_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_1` (`user_id`),
  CONSTRAINT `fk_1` FOREIGN KEY (`user_id`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



# DB manage friend-request information

CREATE TABLE `request_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_request` int(11) DEFAULT NULL,
  `user_requested` int(11) DEFAULT NULL,
  `friends_request_flg` tinyint(1) DEFAULT NULL,
  `friends_flg` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_2` (`user_request`),
  KEY `fk_3` (`user_requested`),
  CONSTRAINT `fk_2` FOREIGN KEY (`user_request`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_3` FOREIGN KEY (`user_requested`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



# DB manage friend information

CREATE TABLE `friends_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_user_id` int(11) DEFAULT NULL,
  `friends_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_6` (`login_user_id`),
  KEY `fk_7` (`friends_user_id`),
  CONSTRAINT `fk_6` FOREIGN KEY (`login_user_id`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_7` FOREIGN KEY (`friends_user_id`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



# DB manage chat information

CREATE TABLE `chat_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pair_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `contents` text NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_8` (`sender_id`),
  KEY `fk_9` (`receiver_id`),
  KEY `fk_10` (`pair_id`),
  CONSTRAINT `fk_8` FOREIGN KEY (`sender_id`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_9` FOREIGN KEY (`receiver_id`) REFERENCES `account_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_10` FOREIGN KEY (`pair_id`) REFERENCES `friends_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


