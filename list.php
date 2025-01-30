<?php
include 'db.php';
$result = $connection->query("SELECT * FROM performance_reviews");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Reviews</title>
</head>
<body>
    <h2>Performance Reviews</h2>
    <a href="add.php">Add New Review</a>
    <table border="1">
        <tr>
            <th>Review ID</th>
            <th>Employee Name</th>
            <th>Rating</th>
            <th>Comments</th>
            <th>Review Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['employee_name']; ?></td>
            <td><?= $row['rating']; ?></td>
            <td><?= $row['comments']; ?></td>
            <td><?= $row['review_date']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>