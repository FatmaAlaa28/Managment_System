<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../db-connection.php';

    $query = $pdo->prepare("UPDATE departments SET department_name=:department_name, location=:location;");
    $query->bindParam(':department_name', $_POST['department_name'], PDO::PARAM_STR);
    $query->bindParam(':location', $_POST['location'], PDO::PARAM_STR);
    $query->execute();
}