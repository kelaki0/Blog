<?php
session_start(); // Start the session

// Include the database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog'); // Update credentials if necessary

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate email
    if (empty($email)) {
        $_SESSION['error_email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email format.";
    }

    // Validate password
    // Password Complexity Check
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
    }


    // Validate confirm password
    if (empty($confirm_password)) {
        $_SESSION['error_confirm_password'] = "Confirm password is required.";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error_confirm_password'] = "Passwords do not match.";
    }

    // If no errors, proceed with registration
    if (!isset($_SESSION['error_email']) && !isset($_SESSION['error_password']) && !isset($_SESSION['error_confirm_password'])) {

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password securely

        // Prepare and execute the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO users (email, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            // Successful registration, redirect to admin login page
            header('Location: admin_login.php');
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
