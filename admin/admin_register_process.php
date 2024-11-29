
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog'); // Change this as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); // You can also use PASSWORD_DEFAULT

    // Sanitize email to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Insert the admin data into the database
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: admin_login.php");
        exit(); // It's a good practice to call exit after a header redirect
    
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
