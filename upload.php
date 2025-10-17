<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazama File - Upload File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Selamat datang, Anda telah login!</h1>
    <p><a href="logout.php">Logout</a></p>
    <h2>Upload File</h2>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Pilih file untuk upload:</label>
        <input type="file" id="fileToUpload" name="fileToUpload" required><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>