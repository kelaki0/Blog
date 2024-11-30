<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css"> </head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>
        <form method="POST" action="admin_login_process.php">
            <label for="admin-email">Email:</label>
            <input type="email" id="admin-email" name="email" required placeholder="Enter email"><br><br>
            
            <label for="admin-password">Password:</label>
            <input type="password" id="admin-password" name="password" required placeholder="Enter password"><br><br>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>