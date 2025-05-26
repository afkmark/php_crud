<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM posts");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="dashboard">

    <div class="dashboard-header">
        <h2>🚀Welcome to Dashboard!</h2>
        <div>
            <a href="view_all_post.php">View All Posts</a>
            <a href="add_post.php">Add New Post</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <table>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td>
                    <a href="edit_post.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete_post.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>