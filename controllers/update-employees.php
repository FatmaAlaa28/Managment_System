<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../db-connection.php';

    $query = $pdo->prepare("UPDATE employees SET
    first_name=:first_name,
    last_name=:last_name,
    email=:email,
    hire_date=:hire_date,
    salary=:salary,
    department_id=:department_id,
    job_title=:job_title
    Where id=:id;
    ");

    $query->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
    $query->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->bindParam(':hire_date', $_POST['hire_date'], PDO::PARAM_STR);
    $query->bindParam(':salary', $_POST['salary'], PDO::PARAM_STR);
    $query->bindParam(':department_id', $_POST['department_id'], PDO::PARAM_INT);
    $query->bindParam(':job_title', $_POST['job_title'], PDO::PARAM_STR);
    $query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $query->execute();
}