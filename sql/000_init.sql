

CREATE USER 'chat_db_user'@'%' IDENTIFIED BY PASSWORD 'passwd';

GRANT ALL ON chat_db TO 'chat_db_user'@'%' IDENTIFIED BY PASSWORD 'passwd'

ALTER USER 'chat_db_user'@'%' IDENTIFIED WITH mysql_native_password BY 'passwd';

FLUSH PRIVILEGES;
