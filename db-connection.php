<?php

$connection_string = 'mysql:host=localhost;dbname=management_system';
$user = 'root';
$password = '';

// using PHP Data Objects
try {
    $pdo = new PDO($connection_string, $user, $password);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}