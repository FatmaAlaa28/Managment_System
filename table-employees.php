<?php
require_once './controllers/delete-employees.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Employees Table</title>
</head>
<body>
    <div class="container">
        <h2>Employees List</h2>
        <table id="employees-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th> 
                    <th>Hire Date</th> 
                    <th>Salary</th> 
                    <th>Department Id</th> 
                    <th>Job Title</th> 
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($emplyees)): ?> 
                    <?php foreach ($emplyees as $employee): ?> 
                    <tr id="row-<?php echo $employee['id']; ?>">
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['hire_date']; ?></td>
                        <td><?php echo $employee['salary']; ?></td>
                        <td><?php echo $employee['department_id']; ?></td>
                        <td><?php echo $employee['job_title']; ?></td>

                        <td>
                            <form action="table-employees.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>"> 
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                            </form>
                        </td>               
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No employees found.</td> 
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
