<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-register-page">
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" required placeholder="Username"><br>
            <input type="email" name="email" required placeholder="Email"><br>
            <input type="password" name="password" required placeholder="Password"><br>
            <button type="submit" name="register">Register</button>
        </form>
        <br>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>

</html>

<?php
if (isset($_POST['register'])) {
    if (registerUser($_POST['username'], $_POST['password'], $_POST['email'])) {
        header("Location: login.php");
    } else {
        $error = "Registration failed. Please try again.";
    }
}
?>