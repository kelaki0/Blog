<?php include 'header.php'; ?>

<main class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Reach out with any questions or inquiries.</p>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info">
        <div class="container">
            <h2>Get in Touch</h2>   
            <div class="info-grid">
                <div class="info-item">
                    <h3>Email</h3>
                    <p><a href="mailto:info@cybersecurityblog.com">info@intsecurity.com</a></p>
                </div>
                <div class="info-item">
                    <h3>Phone</h3>
                    <p><a href="tel:+1234567890">0795765046 / 0759696452</a></p>
                </div>
                <div class="info-item">
                    <h3>Address</h3>
                    <p>20157 Kabarak, Kenya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-form">
        <div class="container">
            <h2>Send Us a Message</h2>
            <form action="process_contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509182!2d144.9556513153169!3d-37.81732797975159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f2b1d9ff%3A0xf577f19a4f9a0b48!2sVictoria%20State%20Library!5e0!3m2!1sen!2sus!4v1639872427089!5m2!1sen!2sus"
            width="100%"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </section>
</main>

<?php include 'footer.php'; ?>
