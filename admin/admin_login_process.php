<?php
session_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Clear session values to ensure fields reset
    unset($_SESSION['login_email']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_password']);
    unset($_SESSION['error_admin']);

    // Validate email and password
    if (empty($email)) {
        $_SESSION['error_email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $_SESSION['error_password'] = "Password is required."; // Fixed typo here
    }

    if (empty($role)) {
        $_SESSION['error_role'] = "Role is required.";
    }

    // If no errors, proceed with login
    if (!isset($_SESSION['error_email']) && !isset($_SESSION['error_password']) && !isset($_SESSION['error_role'])) {
        // Prepare and execute the SQL statement
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ? AND role = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $role);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if user exists
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Successful login
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role']; // Store role (admin or super_admin)

                // Redirect to dashboard or admin panel
                header('Location: admin_dashboard.php');
                exit;
            } else {
                $_SESSION['error_password'] = "Incorrect password.";
            }
        } else {
            $_SESSION['error_email'] = "No account found with that email and role.";
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);

    // Redirect back to login page with errors
    header('Location: login.php');
    exit();
}