<?php
$name = $email = $phone = $password = $confirm_password = "";
$nameErr = $emailErr = $phoneErr = $passwordErr = $confirmPasswordErr = "";
$registration_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation (only alphabets and spaces)
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $nameErr = "Only letters and spaces are allowed";
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Phone number validation (must be exactly 10 digits)
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = htmlspecialchars(trim($_POST["phone"]));
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Phone number must be exactly 10 digits";
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters";
        }
    }

    // Confirm Password validation
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Please confirm your password";
    } else {
        $confirm_password = $_POST["confirm_password"];
        if ($password !== $confirm_password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    // If no errors, process registration
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $registration_success = true;
        echo "<h3 style='color: green; text-align: center;'>Registration Successful!</h3>";

        // Reset fields after successful registration
        $name = $email = $phone = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right,rgb(154, 220, 255),rgb(196, 250, 237));
            padding: 40px;
        }
        .container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        h2 {
            color: #4A90E2;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-bottom:2px; 
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 style="text-align: center;">Registration Form</h2>
        <form method="post" action="">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo !$registration_success ? $name : ''; ?>">
            <span class="error"><?php echo $nameErr; ?></span><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo !$registration_success ? $email : ''; ?>">
            <span class="error"><?php echo $emailErr; ?></span><br>

            <label>Phone Number:</label>
            <input type="tel" name="phone" value="<?php echo !$registration_success ? $phone : ''; ?>">
            <span class="error"><?php echo $phoneErr; ?></span><br>

            <label>Password:</label>
            <input type="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span><br>

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password">
            <span class="error"><?php echo $confirmPasswordErr; ?></span><br>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
