<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "todo_app";


$connection = mysqli_connect($host, $user, $pass);

if ($connection == false) {
    die("Database connection failed");
}


$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS todo_app 
                        CHARACTER SET utf8mb4 
                        COLLATE utf8mb4_unicode_ci";

mysqli_query($connection, $createDatabaseQuery);


mysqli_select_db($connection, "todo_app");


$createTableQuery = "
    CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        is_completed BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";

mysqli_query($connection, $createTableQuery);
