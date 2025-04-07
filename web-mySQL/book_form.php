<!DOCTYPE html>
<html>
<head>
    <title>Book Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #dff9fb, #c7ecee);
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1c5980;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #7f8c8d;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        .message {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="color: blue;">Enter Book Information</h2>

    <form method="post">
        <label>Accession Number:</label>
        <input type="number" name="accession_number" required>

        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Authors:</label>
        <input type="text" name="authors" required>

        <label>Edition:</label>
        <input type="text" name="edition" required>

        <label>Publisher:</label>
        <input type="text" name="publisher" required>

        <input type="submit" name="submit" value="Add Book">
    </form>

    <h2  style="color: blue;">Search Book by Title</h2>
    <form method="post">
        <label>Enter Title:</label>
        <input type="text" name="search_title" required>
        <input type="submit" name="search" value="Search">
    </form>

<?php
$conn = new mysqli("localhost", "root", "", "bookdb");
if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
}

if (isset($_POST['submit'])) {
    // Only process if all fields are filled
    if (!empty($_POST['accession_number']) && !empty($_POST['title']) &&
        !empty($_POST['authors']) && !empty($_POST['edition']) && !empty($_POST['publisher'])) {

        $accession = $_POST['accession_number'];
        $title = $conn->real_escape_string($_POST['title']);
        $authors = $conn->real_escape_string($_POST['authors']);
        $edition = $conn->real_escape_string($_POST['edition']);
        $publisher = $conn->real_escape_string($_POST['publisher']);

        $check = "SELECT * FROM books WHERE accession_number = '$accession'";
        $res = $conn->query($check);
        if ($res->num_rows > 0) {
            echo "<p class='error'>A book with this accession number already exists!</p>";
        } else {
            $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
                    VALUES ('$accession', '$title', '$authors', '$edition', '$publisher')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='message'>Book information added successfully.</p>";
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }
        }
    } else {
        echo "<p class='error'>Please fill in all book fields before submitting.</p>";
    }
}

if (isset($_POST['search'])) {
    $search_title = $conn->real_escape_string($_POST['search_title']);
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        echo "<table>
                <tr>
                    <th>Accession Number</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Edition</th>
                    <th>Publisher</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['accession_number']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['authors']}</td>
                    <td>{$row['edition']}</td>
                    <td>{$row['publisher']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No book found with the given title.</p>";
    }
}

$conn->close();
?>
</div>

</body>
</html>
