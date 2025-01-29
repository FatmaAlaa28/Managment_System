<?php
require_once 'db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $performanceReviewsId = $_POST['id']; 
        $query = $pdo->prepare("DELETE FROM performance_reviews WHERE id = :id"); 
        $query->bindParam(':id', $performanceReviewsId, PDO::PARAM_INT);
        $query->execute();
        header('Location: table-performance-reviews.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}

try {
    $query = $pdo->prepare("SELECT * FROM performance_reviews;");
    $query->execute();
    $performanceReviews = $query->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}
?>
