

CREATE DATABASE IF NOT EXISTS `support_system_db`;
USE `support_system_db`;

CREATE USER IF NOT EXISTS 'support_system_usr'@'localhost' IDENTIFIED BY 'support_system_pwd';
GRANT ALL ON my_db.* TO 'support_system_usr'@'localhost';

