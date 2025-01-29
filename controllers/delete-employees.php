<?php
require_once 'db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $employeeId = $_POST['id'];
        $query = $pdo->prepare("DELETE FROM emplyees WHERE id = :id"); 
        $query->bindParam(':id', $employeeId, PDO::PARAM_INT);
        $query->execute();
        header('Location: table-employees.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $query = $pdo->prepare("SELECT * FROM emplyees;");
    $query->execute();
    $emplyees = $query->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
