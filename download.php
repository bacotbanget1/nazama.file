<?php
$file = $_GET['file'];  // Ambil nama file dari URL
$path = 'uploads/' . $file;  // Path file di server

if (file_exists($path)) {
    // Set header untuk download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($path));
    readfile($path);
    exit;
} else {
    echo "File tidak ditemukan atau telah dihapus.";
}
?>