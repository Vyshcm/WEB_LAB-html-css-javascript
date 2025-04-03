<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_names = trim($_POST["names"]);
    $students = explode(",", $input_names);

    echo '<link rel="stylesheet" href="styles.css">';
    echo '<div class="container">';
    echo "<h2>Original Student List</h2>";
    echo "<pre>" . print_r($students, true) . "</pre>";

    asort($students);
    echo "<h2>Sorted in Ascending Order (A-Z)</h2>";
    echo "<pre>" . print_r($students, true) . "</pre>";

    arsort($students);
    echo "<h2>Sorted in Descending Order (Z-A)</h2>";
    echo "<pre>" . print_r($students, true) . "</pre>";

    echo '<a href="index.php" class="back-btn">Back to Form</a>';
    echo '</div>';
} else {
    header("Location: index.php");
    exit();
}
?>
