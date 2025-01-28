<?php
include "config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['department_name'];
    $location = $_POST['location'];

    
    $stmt = $connection->prepare("INSERT INTO departments (department_name, location) VALUES (?, ?);");
    if (!$stmt) {
        die("Prepare failed: " . $connection->error); 
    }

    // Bind and execute
    $stmt->bind_param("ss", $name, $location);
    if ($stmt->execute()) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

   
    $stmt->close();
    $connection->close();
}
?>
