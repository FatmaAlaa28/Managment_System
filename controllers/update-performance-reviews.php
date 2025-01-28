<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../db-connection.php';

    $query = $pdo->prepare("UPDATE performance_reviews SET
    department_id=:department_id,
    review_date=:review_date,
    rating=:rating,
    comments=:comments
    Where id=:id;
    ");

    $query->bindParam(':department_id', $_POST['department_id'], PDO::PARAM_INT);
    $query->bindParam(':review_date', $_POST['review_date'], PDO::PARAM_STR);
    $query->bindParam(':rating', $_POST['rating'], PDO::PARAM_INT);
    $query->bindParam(':comments', $_POST['comments'], PDO::PARAM_STR);
    $query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $query->execute();

    header("Location: show_performance_reviews.php");
    exit;
}