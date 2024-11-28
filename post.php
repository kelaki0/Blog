<?php
$id = $_GET['id'];

$mysqli = new mysqli("localhost", "root", "", "int_blog");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    die("Post not found.");
}
?>

<?php include 'header.php'; ?>

<div class="post-page"> <!-- Add unique class for the post page -->
    <div class="post-container">
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>

        <article>
            <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image">
            <p class="date"><?php echo date("F d, Y", strtotime($post['created_at'])); ?></p>
            <p><?php echo nl2br(htmlspecialchars($post['description'])); ?></p>
        </article>

        <a href="blog.php" id="back-to-blog">Back to Blog</a>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php
$stmt->close();
$mysqli->close();
?>
