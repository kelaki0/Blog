<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h2>Register Admin</h2>
        <form method="POST" action="admin_register_process.php">
            <label for="admin-email">Email:</label>
            <input type="email" id="admin-email" name="email" required><br><br>
            
            <label for="admin-password">Password:</label>
            <input type="password" id="admin-password" name="password" required><br><br>

            <!-- Add a Confirm Password field -->
            <label for="admin-confirm-password">Confirm Password:</label>
            <input type="password" id="admin-confirm-password" name="confirm-password" required><br><br>

            <button type="submit">Register Admin</button>
        </form>
    </div>
</body>
</html>
