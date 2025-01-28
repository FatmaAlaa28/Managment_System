<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) {
        require_once 'db-connection.php';
        $query = $pdo->prepare("SELECT * from departments where id=:id;");
        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        if (! $result) {
            die('We do not have data in the departments table.');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Department Form</title>
    </head>
    <body>
        <div class="container">
            <h2>Department Form</h2>
            <form action="controllers/update-department.php" method="POST">
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" id="department_name" name="department_name" value="<?php echo $result['department_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="<?php echo $result['location'] ?>">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>