<?php
$mysqli = new mysqli("localhost", "root", "", "int_blog");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<?php include 'header.php'; ?>


    
        <div class="blog-container">
            <?php while ($post = $result->fetch_assoc()): ?>
                <div class="blog-card">
                    <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Blog Image">
                    <div class="blog-content">
                        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                        <p class="date"><?php echo date("F d, Y", strtotime($post['created_at'])); ?></p>
                        <p><?php echo htmlspecialchars($post['description']); ?></p>
                        <a href="post.php?id=<?php echo $post['id']; ?>" class="read-more">Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
  


<?php include 'footer.php'; ?>
