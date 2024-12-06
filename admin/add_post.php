<form action="add_post.php" method="POST" enctype="multipart/form-data">
    <label>Title:</label>
    <input type="text" name="title" required>

    <label>Content:</label>
    <textarea name="content" required></textarea>

    <label>Date:</label>
    <input type="date" name="date" required>

    <label>Image:</label>
    <input type="file" name="image" required>

    <button type="submit">Add Post</button>
</form>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'blog_db');

    // Validate input
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $date = $_POST['date'];

    // Handle image upload
    $image = $_FILES['image'];
    $imagePath = 'posts/images/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Insert into database
    $sql = "INSERT INTO posts (title, content, date, image_url) VALUES ('$title', '$content', '$date', '$imagePath')";
    if ($conn->query($sql)) {
        echo "Post added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
