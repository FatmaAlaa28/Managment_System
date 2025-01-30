<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_name = $_POST['employee_name'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $review_date = $_POST['review_date'];

    $sql = "INSERT INTO performance_reviews (employee_name, rating, comments, review_date) 
            VALUES ('$employee_name', '$rating', '$comments', '$review_date')";
    
    if ($connection->query($sql) === TRUE) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error: "; //. $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Performance Review</h2>
    <form method="post">
        Employee Name: <input type="text" name="employee_name" required><br>
        Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br>
        Comments: <textarea name="comments"></textarea><br>
        Review Date: <input type="date" name="review_date" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>