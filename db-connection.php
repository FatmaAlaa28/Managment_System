<?php

$connection_string = 'mysql:host=localhost;dbname=management_system';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($connection_string, $user, $password);
}
catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}