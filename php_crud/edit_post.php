<?php
include 'db.php';
session_start();
$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="edit-post-page">
    <div class="edit-post-form">
        <h2>Edit Post</h2>
        <form method="POST">
            <input type="text" name="title" value="<?= $post['title'] ?>" required><br>
            <textarea name="content" required><?= $post['content'] ?></textarea>
            <button type="submit" name="update">Update</button>
            <a href="dashboard.php">
                <button type="button" class="cancel-btn">Cancel</button>
            </a>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $_POST['title'], $_POST['content'], $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>