<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Container Styling */
        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Heading */
        h2 {
            text-align: center;
            color: #333;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Table Headers */
        th {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            text-align: left;
        }

        /* Table Cells */
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Row Hover Effect */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* No records message */
        td[colspan="4"] {
            text-align: center;
            color: #888;
            padding: 20px;
        }

        /* Action Button Styles */
        .btn {
            padding: 8px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-delete {
            background-color: red;
        }

        .btn-update {
            background-color: orange;
        }

        a {
            text-decoration: none;
            color: black;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Department List</h2>
        <button><a href="AddDept_form.html">New Department</a></button>
        <table  >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";

                // Fetch data from the table
                $sql = "SELECT * FROM departments";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['department_name'] . "</td>
                                <td>" . $row['location'] . "</td>
                                <td>
                                    <a href='update-department.php?id=" . $row['id'] . "' class='btn btn-update'>Update</a>
                                    <a href='delete-department.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this department?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }

                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
