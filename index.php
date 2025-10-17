<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: upload.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazama File - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Selamat datang di Nazama File</h1>
    <p>Silakan login untuk melanjutkan.</p>
</body>
</html>