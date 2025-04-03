<?php
// Database configuration
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Change if your MySQL has a different user
$password = ""; 
$database = "school_db"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query to fetch data
$sql = "SELECT id, name, age, grade FROM students"; // Change table & columns accordingly
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            text-align: center;
            padding: 20px;
        }
        .table-container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
            color: #333;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 2px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
            font-size: 20px;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #d1e7fd;
        }
    </style>
</head>
<body>

    <h2>Student Details</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["grade"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
