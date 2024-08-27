<?php
date_default_timezone_set('Asia/Jakarta');

// Mengambil kredensial dari file konfigurasi atau environment variables
$hostname = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';
$database = getenv('DB_NAME') ?: 'surat';

// Membuat koneksi ke database dengan error handling
$konek = mysqli_connect($hostname, $username, $password, $database);

// Mengecek apakah koneksi berhasil
if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

return $konek;
