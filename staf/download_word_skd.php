<?php
require_once '../vendor/autoload.php'; // Path ke autoload.php sesuai dengan lokasi Composer Anda
include '../konek.php'; // Koneksi ke database

use Ilovepdf\OfficepdfTask;
use PhpOffice\PhpWord\TemplateProcessor;

// Cek apakah parameter `id_request_skd` ada di URL
if (isset($_GET['id_request_skd'])) {
    $id_request_skd = $_GET['id_request_skd'];

    // Query untuk mendapatkan data berdasarkan `id_request_skd`
    $sql = "SELECT data_request_skd.id_request_skd, data_request_skd.tanggal_request, data_request_skd.dusun, data_request_skd.handil, data_request_skd.rt_d, data_user.nik, data_user.nama, data_user.jekel, data_user.alamat, data_user.pekerjaan, data_user.tempat_lahir, data_user.tanggal_lahir, data_user.status_warga, data_user.agama
            FROM data_request_skd
            JOIN data_user ON data_request_skd.nik = data_user.nik
            WHERE data_request_skd.id_request_skd = ?";
    $stmt = mysqli_prepare($konek, $sql);

    if (!$stmt) {
        die('Prepare statement error: ' . mysqli_error($konek));
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_request_skd);
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id_request_skd_col, $tanggal_request, $dusun, $handil, $rt_d, $nik, $nama, $jekel, $alamat, $pekerjaan, $tempat_lahir, $tanggal_lahir, $status_warga, $agama);

    if (mysqli_stmt_fetch($stmt)) {
        // Data yang didapat dari query
        $data = [
            'id_request_skd' => $id_request_skd_col,
            'tanggal_request' => $tanggal_request,
            'nik' => $nik,
            'nama' => $nama,
            'jekel' => $jekel,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'status_warga' => $status_warga,
            'agama' => $agama,
            'dusun' => $dusun,
            'handil' => $handil,
            'rt_d' => $rt_d
        ];

        // Fungsi untuk format tanggal 6 bulan ke depan
        function formatSixMonthsAhead($tanggal)
        {
            $dateTime = new DateTime($tanggal);
            $dateTime->modify('+6 months');
            return $dateTime->format('F Y');
        }

        // Format tanggal
        $tanggal_request = date('d F Y', strtotime($data['tanggal_request']));
        $format4 = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $tanggal_request
        );

        $sixmonth = formatSixMonthsAhead($tanggal_request);
        $sixmonth = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $sixmonth
        );

        $format5 = date('F/Y', strtotime($tanggal_request));
        $format5 = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
            $format5
        );

        // Data yang akan digunakan untuk menggantikan placeholder dalam template
        $nik = $data['nik'];
        $nama = $data['nama'];
        $jekel = $data['jekel'];
        $alamat = $data['alamat'];
        $pekerjaan = $data['pekerjaan'];
        $tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $status_warga = $data['status_warga'];
        $agama = $data['agama'];
        $dusun = $data['dusun'];
        $handil = $data['handil'];
        $rt = $data['rt_d'];

        // Load template Word
        $templatePath = 'skd.docx'; // Ganti dengan path ke template Anda
        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('format4', $format4);
        $templateProcessor->setValue('sixmonth', $sixmonth);
        $templateProcessor->setValue('format5', $format5);
        $templateProcessor->setValue('nik', $nik);
        $templateProcessor->setValue('nama', $nama);
        $templateProcessor->setValue('jekel', $jekel);
        $templateProcessor->setValue('alamat', $alamat);
        $templateProcessor->setValue('pekerjaan', $pekerjaan);
        $templateProcessor->setValue('tempat_lahir', $tempat);
        $templateProcessor->setValue('tanggal_lahir', $tgl);
        $templateProcessor->setValue('status_warga', $status_warga);
        $templateProcessor->setValue('agama', $agama);
        $templateProcessor->setValue('dusun', $dusun);
        $templateProcessor->setValue('handil', $handil);
        $templateProcessor->setValue('rt', $rt);

        // Simpan dokumen Word sementara
        $wordFileName = "Surat_Keterangan_Domisili_{$nama}_{$id_request_skd}.docx";
        $templateProcessor->saveAs($wordFileName);

        // Konversi Word ke PDF menggunakan Ilovepdf
        $public_id = 'project_public_6dd6e4a31aa9b8af8a7c9539387cc79d_VKQhra2a906f5f0d5bc56c5dd9db2418444c8'; // Ganti dengan public_id Anda
        $secret_key = 'secret_key_bb8c23c8d315dc91e45605dd1fe3e4cf_5ZHH03b3455ae96235ebb47af514661b5fa87'; // Ganti dengan secret_key Anda
        $myTask = new OfficepdfTask($public_id, $secret_key);
        $myTask->addFile($wordFileName); // Tambahkan file Word untuk dikonversi

        // Proses konversi
        $myTask->execute();

        // Unduh file PDF ke server lokal di folder "downloads"
        $outputDirectory = 'downloads'; // Pastikan folder ini ada dan memiliki izin tulis
        $pdfFileName = "Surat_Keterangan_Domisili_{$nama}_{$id_request_skd}.pdf";
        $myTask->download($outputDirectory);

        // Menghapus file Word sementara setelah konversi untuk menghemat ruang
        if (file_exists($wordFileName)) {
            unlink($wordFileName);
        }

        // Simpan nama file PDF ke database
        mysqli_stmt_close($stmt); // Tutup statement SELECT sebelum UPDATE
        $updateSql = "UPDATE data_request_skd SET scan_skd = ? WHERE id_request_skd = ?";
        $updateStmt = mysqli_prepare($konek, $updateSql);
        if ($updateStmt) {
            mysqli_stmt_bind_param($updateStmt, 'si', $pdfFileName, $id_request_skd);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt); // Tutup statement UPDATE
        } else {
            die('Prepare statement error: ' . mysqli_error($konek));
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

    mysqli_stmt_close($stmt); // Tutup statement SELECT
} else {
    echo "ID pengajuan tidak disertakan!";
}

mysqli_close($konek);