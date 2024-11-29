<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>In No Time</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php" class="logo">
            <span class="in-no">In no</span> <span class="time">Time</span>
        </a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <!-- Add Light/Dark Mode Toggle -->
        <button id="theme-toggle" aria-label="Toggle Dark Mode">
            <i id="theme-icon" class="fas fa-sun"></i>
        </button>
    </nav>
    <div class="branding">
        <form class="search-bar">
            <input type="text" placeholder="Search..." aria-label="Search">
            <button type="submit">Search</button>
        </form>
    </div>
</header>
<script src="script.js"></script>
</body>
</html>
