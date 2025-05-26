<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-register-page">
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" required placeholder="Username"><br>
            <input type="password" name="password" required placeholder="Password"><br>
            <button type="submit" name="login">Login</button>
        </form>
        <br>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    if (loginUser($_POST['username'], $_POST['password'])) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>