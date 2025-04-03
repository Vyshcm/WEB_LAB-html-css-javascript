<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['errors'] = [];
    $_SESSION['success'] = "";

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if (empty($name)) {
        $_SESSION['errors']['name'] = "Name is required.";
    }
    if (empty($email)) {
        $_SESSION['errors']['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = "Invalid email format.";
    }
    if (empty($phone)) {
        $_SESSION['errors']['phone'] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $_SESSION['errors']['phone'] = "Phone number must be 10 digits.";
    }
    if (empty($password)) {
        $_SESSION['errors']['password'] = "Password is required.";
    }
    if (empty($confirm_password)) {
        $_SESSION['errors']['confirm_password'] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $_SESSION['errors']['confirm_password'] = "Passwords do not match.";
    }

    if (empty($_SESSION['errors'])) {
        $_SESSION['success'] = "Registration successful!";
    }

    header("Location: index.php");
    exit();
}
?>
