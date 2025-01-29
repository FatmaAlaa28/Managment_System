<?php
require_once './controllers/delete-department.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Department Table</title>
</head>
<body>
    <div class="container">
        <h2>Departments List</h2>
        <table id="departments-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Location</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($departments)): ?>
                    <?php foreach ($departments as $department): ?>
                    <tr id="row-<?php echo $department['id']; ?>">
                        <td><?php echo $department['id']; ?></td>
                        <td><?php echo $department['department_name']; ?></td>
                        <td><?php echo $department['location']; ?></td>
                        <td>
                            <form action="table-department.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $department['id']; ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                            </form>
                        </td>               
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No departments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html> 
