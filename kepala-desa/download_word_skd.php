<?php
// Skrip download file dengan validasi
if (isset($_GET['id_request_skd'])) {
    include '../konek.php';
    $id_request_skd = $_GET['id_request_skd'];
    
    // Ambil nama file dari database
    $sql = "SELECT scan_skd FROM data_request_skd WHERE id_request_skd = '$id_request_skd'";
    $result = mysqli_query($konek, $sql);
    $data = mysqli_fetch_assoc($result);
    
    if ($data && !empty($data['scan_skd'])) {
        $file_path = '../style/img/scan_skd/' . $data['scan_skd'];
        
        // Periksa apakah file benar-benar ada
        if (file_exists($file_path)) {
            // Mengatur header untuk download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file_path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            
            // Membaca file dan mendownload
            readfile($file_path);
            exit;
        } else {
            echo "File tidak ditemukan!";
        }
    } else {
        echo "Data tidak ditemukan!";
    }
} else {
    echo "ID request tidak valid!";
}
?>
