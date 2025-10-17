<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: upload.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Hardcoded credentials (tidak aman, ganti dengan database)
    if ($username == 'admin' && $password == 'password123') {
        $_SESSION['loggedin'] = true;
        header('Location: upload.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazama File - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login ke Nazama File</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <p>Belum punya akun? Hubungi admin.</p>
</body>
</html>