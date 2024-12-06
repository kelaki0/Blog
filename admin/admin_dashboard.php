<?php
session_start();

// Include the database connection
$conn = mysqli_connect('localhost', 'root', '', 'int_blog');

// Check if the user is logged in and has a valid role
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

// Assign role to a variable for convenience
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Logged in as: <?php echo $_SESSION['email']; ?></p>

        <!-- Admin actions -->
        <div class="actions">
            <h2>Blog Management</h2>
            <ul>
                <li><a href="../public/blog.php">View All Blog Posts</a></li>
                <li><a href="add_post.php">Add New Post</a></li>
                <li><a href="edit_post.php">Edit Existing Posts</a></li>
                <li><a href="delete_post.php">Delete Posts</a></li>
                
            </ul>
        </div>

        <!-- Super Admin Special Privileges -->
        <?php if ($role === 'super_admin'): ?>
            <div class="admin-actions">
                <h2>Admin Management</h2>
                <ul>
                    <li><a href="register_admin.php">Add New Admin</a></li>
                    <li><a href="manage_admins.php">Manage Existing Admins</a></li>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Log out link -->
        <div class="logout-container">
    <a href="logout.php" class="logout-button">Log Out</a>
</div>


    </div>
</body>
</html>
