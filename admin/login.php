<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>

        <form method="POST" action="admin_login_process.php">
            <!-- Email Field -->
            <label for="admin-email">Email:</label>
            <input 
                type="email" 
                id="admin-email" 
                name="email" 
                required 
                placeholder="Enter email"
                value="<?php echo isset($_SESSION['login_email']) ? '' : ''; ?>" 

            <?php if (isset($_SESSION['error_email'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_email']; ?></span>
                <?php unset($_SESSION['error_email']); ?>
            <?php endif; ?>
            <br><br>

            <!-- Password Field -->
            <label for="admin-password">Password:</label>
            <input type="password" id="admin-password" name="password" required placeholder="Enter password">
            <div class="show-password-container">
                <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">Show Password
            </div>

            <?php if (isset($_SESSION['error_password'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_password']; ?></span>
                <?php unset($_SESSION['error_password']); ?>
            <?php endif; ?>
            <br><br>

            <!-- Role selection -->
             <label for="role">Role</label>
             <select name="role" name="role" required>
                <option value="" disabled selected>Select your role...</option>
                <option value="admin">Admin</option>
                <option value="super_admin">Super Admin</option>
             </select>

             <?php if (isset($_SESSION['error_role'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_role']; ?></span>
                <?php unset($_SESSION['error_role']); ?>
                <?php endif ; ?>
                <br><br>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
