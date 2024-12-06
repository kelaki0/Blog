<?php
session_start();

// Include the database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = trim($_POST['name']); // Get name
    $email = trim($_POST['email']); // Get email
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'admin'; // Default to 'admin'

    // Validate name
    if (empty($name)) {
        $_SESSION['error_name'] = "Name is required.";
    } elseif (strlen($name) < 3) {
        $_SESSION['error_name'] = "Name must be at least 3 characters long.";
    }

    // Validate email
    if (empty($email)) {
        $_SESSION['error_email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $_SESSION['error_password'] = "Password is required.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $_SESSION['error_password'] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[a-z]/', $password)) {
        $_SESSION['error_password'] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $_SESSION['error_password'] = "Password must contain at least one number.";
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $_SESSION['error_password'] = "Password must contain at least one special character.";
    } elseif (strlen($password) < 8) {
        $_SESSION['error_password'] = "Password must be at least 8 characters long.";
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $_SESSION['error_confirm_password'] = "Confirm password is required.";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error_confirm_password'] = "Passwords do not match.";
    }

    // If no errors, proceed with registration
    if (!isset($_SESSION['error_name']) && !isset($_SESSION['error_email']) && !isset($_SESSION['error_password']) && !isset($_SESSION['error_confirm_password'])) {

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashed_password, $role);

        if (mysqli_stmt_execute($stmt)) {
            // Successful registration, redirect to admin login page
            header('Location: login.php');
            exit;
        } else {
            // Error executing the query
            $_SESSION['error'] = "There was an error with your registration. Please try again.";
            header('Location: register_admin.php');
            exit;
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        // If validation failed, redirect back to the registration form
        header('Location: register_admin.php');
        exit;
    }
}
?>
