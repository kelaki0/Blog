<?php include 'header.php'; ?>

<main class="posts-page">
    <!-- Page Title -->
    <h1>Recent Posts</h1>

    <!-- Content Layout -->
    <div class="content">
        <!-- Main Content -->
        <section class="posts-grid">
            <!-- Example of dynamically generated posts -->
            <?php 
            // Example dynamic content loop
            $posts = [
                ["title" => "Post Title 1", "excerpt" => "Snippet of the first post...", "link" => "post1.php", "image" => "assets/img/post1.jpg"],
                ["title" => "Post Title 2", "excerpt" => "Snippet of the second post...", "link" => "post2.php", "image" => "assets/img/post2.jpg"],
                ["title" => "Post Title 3", "excerpt" => "Snippet of the third post...", "link" => "post3.php", "image" => "assets/img/post3.jpg"]
            ];

            foreach ($posts as $post): ?>
                <article class="post">
                    <img src="<?= $post['image']; ?>" alt="<?= $post['title']; ?>" class="post-thumbnail">
                    <h2><a href="<?= $post['link']; ?>"><?= $post['title']; ?></a></h2>
                    <p><?= $post['excerpt']; ?></p>
                    <a href="<?= $post['link']; ?>" class="read-more">Read More</a>
                </article>
            <?php endforeach; ?>
        </section>

        <!-- Sidebar -->
        <aside class="sidebar">
            <h3>Topics</h3>
            <ul>
                <li><a href="category1.php">Cybersecurity Basics</a></li>
                <li><a href="category2.php">Threat Analysis</a></li>
                <li><a href="category3.php">Best Practices</a></li>
            </ul>
        </aside>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&laquo; Prev</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">Next &raquo;</a>
    </div>
</main>

<?php include 'footer.php'; ?>
