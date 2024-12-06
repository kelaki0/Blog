<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Register Admin</h2>

        <form method="POST" action="admin_register_process.php">
            <label for="admin-name" class="field-label">Name:</label>
            <input type="text" id="admin-name" name="name" class="name-field" required placeholder="Enter full name">
            <?php if (isset($_SESSION['error_name'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_name']; ?></span>
                <?php unset($_SESSION['error_name']); ?>
            <?php endif; ?><br><br>

            <label for="admin-email">Email:</label>
            <input type="email" id="admin-email" name="email" required placeholder="Enter email">
            <?php if (isset($_SESSION['error_email'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_email']; ?></span>
                <?php unset($_SESSION['error_email']); ?>
            <?php endif; ?><br><br>

            <label for="admin-password">Password:</label>
            <input type="password" id="admin-password" name="password" required placeholder="Enter password" onkeyup="checkPasswordStrength()">
            <div class="show-password-container">
                <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()"> Show Password
            </div>
            <div id="password-strength" style="width: 100%; height: 10px; background-color: #ddd; margin-top: 5px;">
                <div id="strength-bar" style="height: 100%; width: 0; background-color: red;"></div>
            </div>
            <span id="password-strength-text"></span>
            <?php if (isset($_SESSION['error_password'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_password']; ?></span>
                <?php unset($_SESSION['error_password']); ?>
            <?php endif; ?><br><br>

            <label for="admin-confirm-password">Confirm Password:</label>
            <input type="password" id="admin-confirm-password" name="confirm-password" required placeholder="Confirm password">
            <?php if (isset($_SESSION['error_confirm_password'])): ?>
                <span class="error-message"><?php echo $_SESSION['error_confirm_password']; ?></span>
                <?php unset($_SESSION['error_confirm_password']); ?>
            <?php endif; ?><br><br>

            <?php if ($_SESSION['role'] === 'super_admin'): ?>
                <label for="admin-role">Role:</label>
                <select name="role" id="admin-role">
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            <?php endif; ?><br><br>

            <button type="submit">Register Admin</button>
        </form>

    </div>

</body>
</html>