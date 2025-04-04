<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_names = trim($_POST["names"]);
    $students = explode(",", $input_names);
    $students = array_map('trim', $students); // Remove extra spaces

    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Sorted Student Names</title>';
    echo '<link rel="stylesheet" href="student_style.css">';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
    echo "<h1>Student Name List</h1>";

    // Function to display the table
    function displayTable($title, $data) {
        echo "<div class='table-container'>";
        echo "<h3>$title</h3>";
        echo "<table>";
        echo "<tr><th>Index</th><th>Name</th></tr>";
        foreach ($data as $index => $name) {
            echo "<tr><td>$index</td><td>$name</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    echo "<div class='sorting-container'>";
    
    // Original Order
    displayTable("Original Order", $students);

    // Ascending Order (A-Z)
    asort($students);
    displayTable("Ascending Order", $students);

    // Descending Order (Z-A)
    arsort($students);
    displayTable("Descending Order", $students);

    echo "</div>"; // Close sorting container
    echo '<a href="index.php" class="back-btn">Back to Form</a>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
} else {
    header("Location: index.php");
    exit();
}
?>
