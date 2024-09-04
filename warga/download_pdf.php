<?php
include '../konek.php'; // Pastikan path ke koneksi database benar

// Ambil parameter ID dari URL
$id_request_skd = $_GET['id_request_skd'];

// Ambil nama file PDF dari database
$sql = "SELECT scan_skd FROM data_request_skd WHERE id_request_skd = '$id_request_skd'";
$query = mysqli_query($konek, $sql);
$data = mysqli_fetch_assoc($query);

if ($data) {
    $filePdf = $data['scan_skd'];

    // Path lengkap ke file PDF
    $filePath = 'C:/laragon/www/e-surat/staf/downloads/' . $filePdf;

    // Cek apakah file ada
    if (file_exists($filePath)) {
        // Set header untuk mendownload file
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Flush system output buffer
        flush();

        // Baca file dan kirim ke browser
        readfile($filePath);
        exit;
    } else {
        echo "File tidak ditemukan.";
    }
} else {
    echo "Pengajuan tidak ditemukan.";
}
?>
