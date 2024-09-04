<?php
require_once '../vendor/autoload.php'; // Path ke autoload.php sesuai dengan lokasi Composer Anda
include '../konek.php'; // Koneksi ke database

use Ilovepdf\OfficepdfTask;
use PhpOffice\PhpWord\TemplateProcessor;

// Cek apakah parameter `id_request_sku` ada di URL
if (isset($_GET['id_request_sku'])) {
    $id_request_sku = $_GET['id_request_sku'];

    // Query untuk mendapatkan data berdasarkan `id_request_sku`
    $sql = "SELECT data_request_sku.id_request_sku, data_request_sku.tanggal_request, data_request_sku.nik, data_request_sku.rt_u, data_request_sku.nama_usaha, data_request_sku.jenis_usaha, data_request_sku.alamat_usaha, data_request_sku.nomor_surat, data_user.nama, data_user.alamat, data_user.pekerjaan, data_user.tempat_lahir, data_user.tanggal_lahir, data_user.status_warga
            FROM data_request_sku
            JOIN data_user ON data_request_sku.nik = data_user.nik
            WHERE data_request_sku.id_request_sku = ?";
    $stmt = mysqli_prepare($konek, $sql);

    if (!$stmt) {
        die('Prepare statement error: ' . mysqli_error($konek));
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_request_sku);
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id_request_sku, $tanggal_request, $nik, $rt_u, $nama_usaha, $jenis_usaha, $alamat_usaha, $nomor_surat, $nama, $alamat, $pekerjaan, $tempat_lahir, $tanggal_lahir, $status_warga);

    if (mysqli_stmt_fetch($stmt)){
        // Data yang didapat dari query
        $data = [
            'id_request_sku' => $id_request_sku,
            'tanggal_request' => $tanggal_request,
            'nik' => $nik,
            'rt_u' => $rt_u,
            'nama_usaha' => $nama_usaha,
            'jenis_usaha' => $jenis_usaha,
            'alamat_usaha' => $alamat_usaha,
            'nomor_surat' => $nomor_surat,
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'status_warga' => $status_warga
        ];
   
        // Data yang akan digunakan untuk menggantikan placeholder dalam template
        $tanggal_lahir = date('d-m-Y', strtotime($data['tanggal_lahir']));
        $tanggal_request = date('d F Y', strtotime($data['tanggal_request']));

        $format4 = date('d F Y', strtotime($tanggal_request));
        $format4 = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $format4
        );

        $format5 = date('F/Y', strtotime($tanggal_request));
        $format5 = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
            $format5
        );

        $nik = $data['nik'];
        $nama = $data['nama'];
        $namaUppercase = strtoupper($nama);  // Ubah nama menjadi huruf besar
        $alamat = $data['alamat'];
        $pekerjaan = $data['pekerjaan'];
        $tempat = $data['tempat_lahir'];
        $rt_u = $data['rt_u'];
        $status_warga = $data['status_warga'];
        $nama_usaha = $data['nama_usaha'];
        $jenis_usaha = $data['jenis_usaha'];
        $alamat_usaha = $data['alamat_usaha'];
        $nomor_surat = $data['nomor_surat'];

        // Load template Word
        $templateProcessor = new TemplateProcessor('sku.docx'); // Ganti dengan path ke template Anda
        $templateProcessor->setValue('format4', $format4);
        $templateProcessor->setValue('format5', $format5);
        $templateProcessor->setValue('nik', $nik);
        $templateProcessor->setValue('namaUppercase', $namaUppercase);
        $templateProcessor->setValue('alamat', $alamat);
        $templateProcessor->setValue('pekerjaan', $pekerjaan);
        $templateProcessor->setValue('tempat_lahir', $tempat);
        $templateProcessor->setValue('tanggal_lahir', $tanggal_lahir);
        $templateProcessor->setValue('rt_u', $rt_u);
        $templateProcessor->setValue('status_warga', $status_warga);
        $templateProcessor->setValue('nama_usaha', $nama_usaha);
        $templateProcessor->setValue('jenis_usaha', $jenis_usaha);
        $templateProcessor->setValue('alamat_usaha', $alamat_usaha);
        $templateProcessor->setValue('nomor_surat', $nomor_surat);

        // Simpan dokumen Word sementara
        $wordFileName = "Surat_Keterangan_Usaha_{$nama}_{$id_request_sku}.docx";
        $templateProcessor->saveAs($wordFileName);

        // Konversi Word ke PDF menggunakan Ilovepdf
        $myTask = new OfficepdfTask('project_public_6dd6e4a31aa9b8af8a7c9539387cc79d_VKQhra2a906f5f0d5bc56c5dd9db2418444c8', 'secret_key_bb8c23c8d315dc91e45605dd1fe3e4cf_5ZHH03b3455ae96235ebb47af514661b5fa87'); // Ganti dengan public_id dan secret_key Anda
        $file = $myTask->addFile($wordFileName); // Tambahkan file Word untuk dikonversi

        // Proses konversi
        $myTask->execute();

        // Unduh file PDF ke server lokal di folder "downloads"
        $outputDirectory = 'downloads'; // Pastikan folder ini ada dan memiliki izin tulis
        $pdfFileName = "Surat_Keterangan_Usaha_{$nama}_{$id_request_sku}.pdf";
        $myTask->download($outputDirectory);

        // Menghapus file Word sementara setelah konversi untuk menghemat ruang
        if (file_exists($wordFileName)) {
            unlink($wordFileName);
        }

        // Simpan nama file PDF ke database
        mysqli_stmt_close($stmt); // Tutup statement SELECT sebelum UPDATE
        $updateSql = "UPDATE data_request_sku SET scan_sku = ? WHERE id_request_sku = ?";
        $updateStmt = mysqli_prepare($konek, $updateSql);
        if ($updateStmt) {
            mysqli_stmt_bind_param($updateStmt, 'si', $pdfFileName, $id_request_sku);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);
        }

        // Menampilkan PDF di browser
        $pdfFilePath = $outputDirectory . '/' . $pdfFileName;
        if (file_exists($pdfFilePath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $pdfFileName . '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');

            // Membaca dan menampilkan file PDF
            readfile($pdfFilePath);
        } else {
            echo "File PDF tidak ditemukan.";
        }
    } else {
        echo "Data tidak ditemukan!";
    }
    mysqli_stmt_close($stmt); // Tutup statement SELECT sebelum UPDATE
} else {
    echo "ID pengajuan tidak disertakan!";
}

mysqli_close($konek);

