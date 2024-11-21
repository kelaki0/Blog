<?php include 'header.php'; ?>

<!-- Main Content -->
<main>
    <!-- Hero Section -->
    <section class="hero">
        <img src="assets/img/net.jpg" alt="Cybersecurity" class="hero-image">
        <div class="hero-text">
            <span class="in-no">IN NO</span>
            <span class="time">TIME</span>

        </div>
    </section>

    <!-- Main Content Section -->
    <section class="content">
        <!-- Sidebar for Topics -->
        <aside class="sidebar">
            <h3>Main Topics</h3>
            <ul>
                <li><a href="topic1.php">Network Security</a></li>
                <li><a href="topic2.php">Application Security</a></li>
                <li><a href="topic3.php">Cloud Security</a></li>
                <li><a href="topic4.php">Cyber Threat Intelligence</a></li>
                <li><a href="topic5.php">Penetration Testing</a></li>
            </ul>
        </aside>

        <!-- Recent Posts Section -->
        <section class="recent-posts">
            <h3>Recent Posts</h3>
            <article>
                <h4><a href="../posts/post1.php">What is Network Security?</a></h4>
                <p>A quick dive into protecting networks...</p>
            </article>
            <article>
                <h4><a href="../posts/post2.php">Top 5 Cyber Threats</a></h4>
                <p>Discover the most common threats...</p>
            </article>
            <article>
                <h4><a href="../posts/post3.php">Cloud Security Basics</a></h4>
                <p>How to secure data in the cloud...</p>
            </article>
            <p><a href="blog.php">View all posts &rarr;</a></p>
        </section>
    </section>
</main>



<?php include 'footer.php'; ?>
