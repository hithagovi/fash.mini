<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fashion_blog');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blogs
$blogs = $conn->query("SELECT * FROM blogs");
$categories = $conn->query("SELECT DISTINCT category FROM blogs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamr.</title>
    <link rel="stylesheet" href="styleeee.css">
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Glamr.
            <div class="nav">
                <a href="logout.php">Logout</> 
                <a href="cont.php"> Contact</a>
                <a href="about.html">About</a>
                <a href="write.html">New blog</a>
            </div>            
        </div>
    </header>

    <!-- Main Body -->
    <main class="main">
        <aside class="sidebar">
            <h2>Categories</h2>
            <ul>
                <?php while ($category = $categories->fetch_assoc()): ?>
                    <li><a href="#"><?php echo htmlspecialchars($category['category']); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </aside>

        <section class="blog-list">
            <?php while ($blog = $blogs->fetch_assoc()): ?>
                <article class="blog-post">
                    <img src="<?php echo htmlspecialchars($blog['']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" />
                    <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                    <p><?php echo htmlspecialchars($blog['content']); ?></p>
                    <span class="category"><?php echo htmlspecialchars($blog['category']); ?></span>
                </article>
            <?php endwhile; ?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Glamr. All Rights Reserved.</p>
    </footer>
</body>
</html>
