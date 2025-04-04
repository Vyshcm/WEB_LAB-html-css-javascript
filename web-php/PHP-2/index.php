<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Name Sorting</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Enter Student Names</h2>
        <p>(Separate names using commas)</p>
        <form action="process.php" method="POST">
            <input type="text" name="names" placeholder="e.g. John, Alice, Bob" required>
            <button type="submit">Sort Names</button>
        </form>
    </div>
</body>
</html>
