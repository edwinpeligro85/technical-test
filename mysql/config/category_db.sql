CREATE DATABASE IF NOT EXISTS category_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE USER IF NOT EXISTS 'category_user'@'%' IDENTIFIED BY 'category_password';
GRANT ALL PRIVILEGES ON category_db.* TO 'category_user'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;
