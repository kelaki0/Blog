<?php
// Include database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog'); // Change this as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize email to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password using password_verify()
        if (password_verify($password, $hashed_password)) {
            // Successful login, redirect to admin dashboard
            session_start();
            $_SESSION['admin_id'] = $row['id']; // Store admin ID in session
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>