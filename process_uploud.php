<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi sederhana (opsional)
    if ($_FILES["fileToUpload"]["size"] > 2000000) { // Batasi 2MB
        echo "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File gagal diupload.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Generate link download
            $downloadLink = "http://nazama-file.com/download.php?file=" . urlencode(basename($_FILES["fileToUpload"]["name"]));
            echo "<h1>File berhasil diupload!</h1>";
            echo "<p>Bagikan link ini untuk mendownload file: <a href='$downloadLink' target='_blank'>$downloadLink</a></p>";
            echo "<p><a href='upload.php'>Upload file lain</a></p>";
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
        }
    }
} else {
    header('Location: upload.php');
    exit;
}
?>