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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamr.</title>
    <link rel="stylesheet" href="styleeee.css">
    <script src="script.js" defer></script>
</head>

    
   
 <main class="main">
        <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      display: flex;
    }

    .sidebar {
      width: 20%;
      background-color: #333;
      color: #fff;
      padding: 20px;
      box-sizing: border-box;
      height: 100vh;
    }

    .sidebar h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .container {
      width: 80%;
      padding: 20px;
      box-sizing: border-box;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .blog-post {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-post:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .blog-post img {
      width: 100%;
      height: auto;
    }

    .content {
      padding: 15px;
    }

    .title {
      font-size: 1.2rem;
      font-weight: bold;
      margin: 0 0 10px;
    }

    .meta {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 10px;
    }

    .category {
      display: inline-block;
      background: #007bff;
      color: #fff;
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 0.8rem;
      margin-right: 5px;
    }

    .description {
      font-size: 1rem;
      color: #333;
      line-height: 1.6;
    }
  </style>


  <div class="sidebar">
    <h2>Sidebar</h2>
    <p>Additional content or navigation can go here.</p>
  </div>
  <div class="container">
    <div class="grid">
    </div>
  </div>

  <script>
    const posts = Array.from({ length: 12 }, (_, i) => ({
      title: `Blog Post ${i + 1}`,
      date: `December ${i + 1}, 2024`,
      category: ["Tech", "Travel", "Food"][i % 3],
      description: `This is a brief description for blog post ${i + 1}.`,
      imageUrl: "https://via.placeholder.com/400x300"
    }));

    const grid = document.querySelector('.grid');

    posts.forEach(post => {
      const blogPost = document.createElement('div');
      blogPost.className = 'blog-post';

      blogPost.innerHTML = `
        <img src="${post.imageUrl}" alt="${post.title}">
        <div class="content">
          <div class="title">${post.title}</div>
          <div class="meta">
            <span class="category">${post.category}</span>
            <span class="date">${post.date}</span>
          </div>
          <div class="description">${post.description}</div>
        </div>
      `;

      grid.appendChild(blogPost);
    });
  </script>
  </main>
</body>


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
