

SET @DATABASE = 'support_system_db';
SET @PASSWORD = 'support_system_pwd';
SET @USER_NAME = 'support_system_usr';
SET @HOST = 'localhost';

SET @SQL = CONCAT(
    "CREATE DATABASE IF NOT EXISTS `",@DATABASE,"`;
    USE `",@DATABASE,"`;"
    ,'
    '
    ,"CREATE USER IF NOT EXISTS '",@USER_NAME,"'@'",@HOST,"' IDENTIFIED BY '",@PASSWORD,"';
    GRANT ALL ON `",@DATABASE,"`.* TO '",@USER_NAME,"'@'",@HOST,"';"
    );



PREPARE stmt FROM @SQL;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

