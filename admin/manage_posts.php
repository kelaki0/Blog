<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $query->bind_param('i', $delete_id);
    if ($query->execute()) {
        echo "Post deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<a href="manage_posts.php?delete_id=<?php echo $post['id']; ?>">Delete</a>
