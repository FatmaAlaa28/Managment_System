<?php
include "config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['employee_name'];
    $location = $_POST['location'];

    
    $stmt = $connection->prepare("INSERT INTO employee (employee _name, location) VALUES (?, ?);");
    if (!$stmt) {
        die("Prepare failed: " . $connection->error); 
    }

    // Bind and execute
    $stmt->bind_param("ss", $name, $location);
    if ($stmt->execute()) {
        header("Location: show_dept.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

   
    $stmt->close();
    $connection->close();
}
?>