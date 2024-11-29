<?php
include '../includes/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Fetch the post to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $post = $result->fetch_assoc();
}

// Update post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = $conn->prepare("UPDATE posts SET title = ?, content = ?, updated_at = NOW() WHERE id = ?");
    $query->bind_param('ssi', $title, $content, $id);
    if ($query->execute()) {
        echo "Post updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!-- HTML Form for Editing -->
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>
    <label for="content">Content</label>
    <textarea id="content" name="content" required><?php echo $post['content']; ?></textarea>
    <button type="submit">Update Post</button>
</form>
