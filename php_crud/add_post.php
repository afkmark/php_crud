<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="add-post-page">

    <div class="add-post-form">
        <h2>Add Post</h2>
        <form method="POST">
            <input type="text" name="title" required placeholder="Title">
            <textarea name="content" required placeholder="Write your content here..."></textarea>
            <button type="submit" name="save">Save</button>
            <a href="dashboard.php">
                <button type="button" class="cancel-btn">Cancel</button>
            </a>
        </form>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['title'], $_POST['content']);
        $stmt->execute();
        header("Location: dashboard.php");
    }
    ?>

</body>

</html>