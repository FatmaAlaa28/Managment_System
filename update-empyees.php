<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) {
        require_once 'db-connection.php';
        $query = $pdo->prepare("SELECT * from emplyees where id=:id;");
        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        if (! $result) {
            die('We do not have data in the emplyees table.');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Empyees Form</title>
    </head>
    <body>
        <div class="container">
            <h2>Emplyees Form</h2>
            <form action="controllers/update-empyees.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $result['first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $result['last_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $result['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="hire_date">Hire Date</label>
                    <input type="date" id="hire_date" name="hire_date" value="<?php echo $result['hire_date'] ?>">
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" value="<?php echo $result['salary'] ?>">
                </div>
                <div class="form-group">
                    <label for="department_id">Department id</label>
                    <input type="number" id="department_id" name="department_id" value="<?php echo $result['department_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" id="job_title" name="job_title" value="<?php echo $result['job_title'] ?>">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>