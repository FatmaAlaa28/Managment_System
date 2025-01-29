<?php

$host = 'localhost';
$dbname = 'management_system';
$user = 'root';
$password = '';

$connection_string = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($connection_string, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "<script>alert('The Database is connection');</script>";
    
    
    $create_table_query = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($create_table_query);
    // echo "<script>alert('The table be created');</script>";
    

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
