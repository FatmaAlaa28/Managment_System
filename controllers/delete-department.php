<?php
require_once 'db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $departmentId = $_POST['id'];
        $query = $pdo->prepare("DELETE FROM departments WHERE id = :id");
        $query->bindParam(':id', $departmentId, PDO::PARAM_INT);
        $query->execute();
        header('Location: table-department.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $query = $pdo->prepare("SELECT * FROM departments;");
    $query->execute();
    $departments = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
