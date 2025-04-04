<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? "";
session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>

        <?php if (!empty($success)): ?>
            <p class="success"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form id="regForm" method="POST" action="process.php" onsubmit="return validateForm()">
            <label>Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <span class="error" id="nameError"><?= $errors['name'] ?? '' ?></span>

            <label>Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <span class="error" id="emailError"><?= $errors['email'] ?? '' ?></span>

            <label>Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
            <span class="error" id="phoneError"><?= $errors['phone'] ?? '' ?></span>

            <label>Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password">
            <span class="error" id="passwordError"><?= $errors['password'] ?? '' ?></span>

            <label>Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password">
            <span class="error" id="confirmPasswordError"><?= $errors['confirm_password'] ?? '' ?></span>

            <button type="submit">Register</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
