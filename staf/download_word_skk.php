<?php
require_once '../vendor/autoload.php'; // Path ke autoload.php sesuai dengan lokasi Composer Anda
include '../konek.php'; // Koneksi ke database

use Ilovepdf\OfficepdfTask;
use PhpOffice\PhpWord\TemplateProcessor;

// Cek apakah parameter `id_request_skk` ada di URL
if (isset($_GET['id_request_skk'])) {
    $id_request_skk = $_GET['id_request_skk'];

    // Query untuk mendapatkan data berdasarkan `id_request_skk`
    $sql = "SELECT data_request_skk.id_request_skk, data_request_skk.tanggal_request, data_request_skk.nama_almarhum, data_request_skk.nik_a, data_request_skk.jenis_kelamin, data_request_skk.tempat_lahir_a, data_request_skk.tanggal_lahir_a, data_request_skk.agama_a, data_request_skk.anak_ke, data_request_skk.nama_ayah, data_request_skk.nama_ibu, data_request_skk.pekerjaan_a, data_request_skk.kewarganegaraan, data_request_skk.alamat_a, data_request_skk.tanggal_kematian, data_request_skk.waktu_kematian, data_request_skk.tempat_kematian, data_request_skk.penyebab_kematian, data_request_skk.tempat_pemakaman, data_request_skk.tanggal_pemakaman, data_request_skk.waktu_pemakaman
            FROM data_request_skk
            
            WHERE data_request_skk.id_request_skk = ?";
    $stmt = mysqli_prepare($konek, $sql);

    if (!$stmt) {
        die('Prepare statement error: ' . mysqli_error($konek));
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_request_skk);
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id_request_skk, $tanggal_request, $nama_almarhum, $nik_a, $jenis_kelamin, $tempat_lahir_a, $tanggal_lahir_a, $agama_a, $anak_ke, $nama_ayah, $nama_ibu, $pekerjaan_a, $kewarganegaraan, $alamat_a, $tanggal_kematian, $waktu_kematian, $tempat_kematian, $penyebab_kematian, $tempat_pemakaman, $tanggal_pemakaman, $waktu_pemakaman);
    
    if (mysqli_stmt_fetch($stmt)) {
        // Data yang didapat dari query
        $data = [
            'id_request_skk' => $id_request_skk,
            'tanggal_request' => $tanggal_request,
            'nama_almarhum' => $nama_almarhum,
            'nik_a' => $nik_a,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir_a' => $tempat_lahir_a,
            'tanggal_lahir_a' => $tanggal_lahir_a,
            'agama_a' => $agama_a,
            'anak_ke' => $anak_ke,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'pekerjaan_a' => $pekerjaan_a,
            'kewarganegaraan' => $kewarganegaraan,
            'alamat_a' => $alamat_a,
            'tanggal_kematian' => $tanggal_kematian,
            'waktu_kematian' => $waktu_kematian,
            'tempat_kematian' => $tempat_kematian,
            'penyebab_kematian' => $penyebab_kematian,
            'tempat_pemakaman' => $tempat_pemakaman,
            'tanggal_pemakaman' => $tanggal_pemakaman,
            'waktu_pemakaman' => $waktu_pemakaman
        ];
        // Data yang akan digunakan untuk menggantikan placeholder dalam template
        $waktu_pemakaman = date('H:i', strtotime($data['waktu_pemakaman']));
        $waktu_kematian = date('H:i', strtotime($data['waktu_kematian']));
        $tanggal_kematian = date('l, d F Y', strtotime($data['tanggal_kematian']));
        $tanggal_kematian = str_replace(
            array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
            array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'),
            $tanggal_kematian
        );
        $tanggal_kematian = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $tanggal_kematian
        );

        $tanggal_pemakaman = date('l, d F Y', strtotime($data['tanggal_pemakaman']));
        $tanggal_pemakaman = str_replace(
            array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
            array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'),
            $tanggal_pemakaman
        );
        $tanggal_pemakaman = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $tanggal_pemakaman
        );

        $tanggal_request = date('d F Y', strtotime($data['tanggal_request']));
        $anak_ke = $data['anak_ke'];

        function angkaKeTeks($angka) {
            // Array untuk memetakan angka menjadi teks
            $angkaTeks = array(
                0 => 'nol',
                1 => 'satu',
                2 => 'dua',
                3 => 'tiga',
                4 => 'empat',
                5 => 'lima',
                6 => 'enam',
                7 => 'tujuh',
                8 => 'delapan',
                9 => 'sembilan',
                10 => 'sepuluh',
                11 => 'sebelas',
                12 => 'dua belas',
                13 => 'tiga belas',
                14 => 'empat belas',
                15 => 'lima belas',
                16 => 'enam belas',
                17 => 'tujuh belas',
                18 => 'delapan belas',
                19 => 'sembilan belas',
                20 => 'dua puluh'
            );
        
            if (isset($angkaTeks[$angka])) {
                return $angka . " (" . $angkaTeks[$angka] . ")";
            } else {
                return $angka; // Mengembalikan angka jika tidak ada di array
            }
        }

        $anak_ke_terformat = angkaKeTeks($anak_ke);

        $tanggal_lahir_a = date('d-m-Y', strtotime($data['tanggal_lahir_a']));
        function hitungUmur($tanggalLahir) {
            // Buat objek DateTime dari tanggal lahir
            $lahir = new DateTime($tanggalLahir);
            $sekarang = new DateTime(); // Tanggal saat ini
        
            // Hitung selisih antara tanggal sekarang dan tanggal lahir
            $umur = $sekarang->diff($lahir);
        
            // Kembalikan umur dalam tahun
            return $umur->y;
        }

        $umur = hitungUmur($tanggal_lahir_a);

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

        $nama_almarhum = $data['nama_almarhum'];
        $nama_aUppercase = strtoupper($nama_almarhum);  // Ubah nama menjadi huruf besar
        $nik_a = $data['nik_a'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $tempat_lahir_a = $data['tempat_lahir_a'];
        $agama_a = $data['agama_a'];
        $nama_ayah = $data['nama_ayah'];
        $nama_ibu = $data['nama_ibu'];
        $pekerjaan_a = $data['pekerjaan_a'];
        $kewarganegaraan = $data['kewarganegaraan'];
        $alamat_a = $data['alamat_a'];
        $tempat_kematian = $data['tempat_kematian'];
        $penyebab_kematian = $data['penyebab_kematian'];
        $tempat_pemakaman = $data['tempat_pemakaman'];

        // Load template Word
        $templateProcessor = new TemplateProcessor('skk.docx'); // Ganti dengan path ke template Anda
        $templateProcessor->setValue('format4', $format4);
        $templateProcessor->setValue('format5', $format5);
        $templateProcessor->setValue('nama_aUppercase', $nama_aUppercase);
        $templateProcessor->setValue('nik_a', $nik_a);
        $templateProcessor->setValue('jenis_kelamin', $jenis_kelamin);
        $templateProcessor->setValue('tempat_lahir_a', $tempat_lahir_a);
        $templateProcessor->setValue('tanggal_lahir_a', $tanggal_lahir_a);
        $templateProcessor->setValue('agama_a', $agama_a);
        $templateProcessor->setValue('anak_ke_terformat', $anak_ke_terformat);
        $templateProcessor->setValue('nama_ayah', $nama_ayah);
        $templateProcessor->setValue('nama_ibu', $nama_ibu);
        $templateProcessor->setValue('pekerjaan_a', $pekerjaan_a);
        $templateProcessor->setValue('kewarganegaraan', $kewarganegaraan);
        $templateProcessor->setValue('alamat_a', $alamat_a);
        $templateProcessor->setValue('tanggal_kematian', $tanggal_kematian);
        $templateProcessor->setValue('waktu_kematian', $waktu_kematian);
        $templateProcessor->setValue('tempat_kematian', $tempat_kematian);
        $templateProcessor->setValue('penyebab_kematian', $penyebab_kematian);
        $templateProcessor->setValue('tempat_pemakaman', $tempat_pemakaman);
        $templateProcessor->setValue('tanggal_pemakaman', $tanggal_pemakaman);
        $templateProcessor->setValue('waktu_pemakaman', $waktu_pemakaman);
        $templateProcessor->setValue('umur', $umur);

        // Ganti placeholder lain sesuai kebutuhan

        // Simpan dokumen Word sementara
        $wordFileName = "Surat_Keterangan_Kematian_{$nama_almarhum}_{$id_request_skk}.docx";
        $templateProcessor->saveAs($wordFileName);

        // Konversi Word ke PDF menggunakan Ilovepdf

        $myTask = new OfficepdfTask('project_public_6dd6e4a31aa9b8af8a7c9539387cc79d_VKQhra2a906f5f0d5bc56c5dd9db2418444c8', 'secret_key_bb8c23c8d315dc91e45605dd1fe3e4cf_5ZHH03b3455ae96235ebb47af514661b5fa87'); // Ganti dengan public_id dan secret_key Anda
        $file = $myTask->addFile($wordFileName); // Tambahkan file Word untuk dikonversi

        // Proses konversi
        $myTask->execute();

        // Unduh file PDF ke server lokal di folder "downloads"
        $outputDirectory = 'downloads'; // Pastikan folder ini ada dan memiliki izin tulis
        $pdfFileName = "Surat_Keterangan_Kematian_{$nama_almarhum}_{$id_request_skk}.pdf";
        $myTask->download($outputDirectory);

        // Menghapus file Word sementara setelah konversi untuk menghemat ruang
        if (file_exists($wordFileName)) {
            unlink($wordFileName);
        }

        // Update database dengan path file PDF
        mysqli_stmt_close($stmt); // Tutup statement SELECT sebelum UPDATE
        $updateQuery = "UPDATE data_request_skk SET scan_skk = ? WHERE id_request_skk = ?";
        $updateStmt = mysqli_prepare($konek, $updateQuery);
        if ($updateStmt) {
            mysqli_stmt_bind_param($updateStmt, 'si', $pdfFileName, $id_request_skk);
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
