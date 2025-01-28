<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) {
        require_once 'db-connection.php';
        $query = $pdo->prepare("SELECT * from performance_reviews where id=:id;");
        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        if (! $result) {
            die('We do not have data in the performance_reviews table.');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Performance Form</title>
    </head>
    <body>
        <div class="container">
            <h2>Performance Form</h2>
            <form action="controllers/update-performance-reviews.php" method="POST">
                <div class="form-group">
                    <label for="department_id">Department id</label>
                    <input type="number" id="department_id" name="department_id" value="<?php echo $result['department_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="review_date">Review Date</label>
                    <input type="date" id="review_date" name="review_date" value="<?php echo $result['review_date'] ?>">
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select name="rating" id="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Comment</label>
                    <input type="text" id="comments" name="comments" value="<?php echo $result['comments'] ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>