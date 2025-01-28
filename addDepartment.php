<?php
include "config.php";

if (isset($_POST['submit'])) {
    // Prepare the SQL statement
    $stmt = $connection->prepare("INSERT INTO department (name, location) VALUES (?, ?)");
    
    // Bind parameters: 'ss' indicates two string parameters
    $stmt->bind_param("ss", $name, $location);
    
    // Assign values to the parameters
    $name = $_POST['name'];
    $location = $_POST['location'];
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
