<?php
include 'db.php';
session_start();

// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="view-post-page">

    <div class="dashboard">
        <div class="dashboard-header">
            <h2>All Posts</h2>
            <div>
                <a href="dashboard.php">Dashboard</a>
                <a href="add_post.php">Add Post</a>
            </div>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="post-card">
                    <div class="post-title"><?= htmlspecialchars($row['title']) ?></div>
                    <div class="post-content"><?= nl2br(htmlspecialchars($row['content'])) ?></div>
                    <div class="post-actions">
                        <a href="edit_post.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete_post.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-posts">No posts found.</p>
        <?php endif; ?>
    </div>

</body>

</html>