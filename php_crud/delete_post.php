<?php
include 'db.php';
session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: view_all_posts.php");
    exit();
} else {
    echo "No post ID provided!";
}
