<?php
require_once './controllers/delete-performance-reviews.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Performance Reviews Table</title>
</head>
<body>
    <div class="container">
        <h2>Performance Reviews List</h2>
        <table id="performance-reviews-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Review Date</th>
                    <th>Score</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($performanceReviews)): ?> 
                    <?php foreach ($performanceReviews as $review): ?> 
                    <tr id="row-<?php echo $review['id']; ?>">
                        <td><?php echo $review['id']; ?></td>
                        <td><?php echo $review['department_id']; ?></td>
                        <td><?php echo $review['review_date']; ?></td>
                        <td><?php echo $review['rating']; ?></td>
                        <td><?php echo $review['comments']; ?></td>

                        <td>
                            <form action="table-performance-reviews.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $review['id']; ?>"> 
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this review?');">Delete</button>
                            </form>
                        </td>               
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No performance reviews found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
