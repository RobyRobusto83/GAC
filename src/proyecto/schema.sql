CREATE TABLE IF NOT EXISTS `curse` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(6) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS users (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `dining_room` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dining_id` bigint(20) unsigned DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `dining_id` (`dining_id`),
  CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`dining_id`) REFERENCES `dining_room` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `student` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `surname` varchar(100) NOT NULL,
    `dni` varchar(12) NOT NULL,
    `curse_id` bigint(20) unsigned NOT NULL,
    `account` varchar(50) NOT NULL,
    `table_id` bigint(20) unsigned NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`),
    FOREIGN KEY (`curse_id`) REFERENCES curse(`id`),
    FOREIGN KEY (`table_id`) REFERENCES tables(`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE student_attendance(
    student_id BIGINT UNSIGNED NOT NULL,
    date VARCHAR(10) NOT NULL,
    `curse_id` bigint(20) unsigned NOT NULL,
    `table_id` bigint(20) unsigned NOT NULL,
    status ENUM('presence', 'absence'),
    FOREIGN KEY (curse_id) REFERENCES curse(id),
    FOREIGN KEY (table_id) REFERENCES tables(id),
    FOREIGN KEY (student_id) REFERENCES student(id)
);
