<?php
require_once '../vendor/autoload.php'; // Path ke autoload.php sesuai dengan lokasi Composer Anda
include '../konek.php'; // Koneksi ke database

use Ilovepdf\OfficepdfTask;
use PhpOffice\PhpWord\TemplateProcessor;

// Cek apakah parameter `id_request_skl` ada di URL
if (isset($_GET['id_request_skl'])) {
    $id_request_skl = $_GET['id_request_skl'];

    // Query untuk mendapatkan data berdasarkan `id_request_skl`
    $sql = "SELECT data_request_skl.id_request_skl, data_request_skl.tanggal_request, data_request_skl.nik, data_request_skl.scan_kk_l, data_request_skl.nama_istri, data_request_skl.nik_istri, data_request_skl.tanggal_lahir_istri, data_request_skl.tempat_lahir_istri, data_request_skl.agama_istri, data_request_skl.alamat_istri, data_request_skl.pekerjaan_istri, data_request_skl.nama_anak, data_request_skl.jenis_kelamin_anak, data_request_skl.tanggal_lahir_anak, data_request_skl.tempat_lahir_anak, data_request_skl.anak_ke, data_request_skl.jam_lahir, data_user.nama, data_user.nik, data_user.tanggal_lahir, data_user.tempat_lahir, data_user.agama, data_user.alamat, data_user.pekerjaan
            FROM data_request_skl
            JOIN data_user ON data_request_skl.nik = data_user.nik
            WHERE data_request_skl.id_request_skl = ?";
    $stmt = mysqli_prepare($konek, $sql);

    if (!$stmt) {
        die('Prepare statement error: ' . mysqli_error($konek));
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_request_skl);
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id_request_skl, $tanggal_request, $nik, $scan_kk_l, $nama_istri, $nik_istri, $tanggal_lahir_istri, $tempat_lahir_istri, $agama_istri, $alamat_istri, $pekerjaan_istri, $nama_anak, $jenis_kelamin_anak, $tanggal_lahir_anak, $tempat_lahir_anak, $anak_ke, $jam_lahir, $nama, $nik, $tanggal_lahir, $tempat_lahir, $agama, $alamat, $pekerjaan);

    if (mysqli_stmt_fetch($stmt)) {
        // Data yang didapat dari query
        $data = [
            'id_request_skl' => $id_request_skl,
            'tanggal_request' => $tanggal_request,
            'nik' => $nik,
            'scan_kk_l' => $scan_kk_l,
            'nama_istri' => $nama_istri,
            'nik_istri' => $nik_istri,
            'tanggal_lahir_istri' => $tanggal_lahir_istri,
            'tempat_lahir_istri' => $tempat_lahir_istri,
            'agama_istri' => $agama_istri,
            'alamat_istri' => $alamat_istri,
            'pekerjaan_istri' => $pekerjaan_istri,
            'nama_anak' => $nama_anak,
            'jenis_kelamin_anak' => $jenis_kelamin_anak,
            'tanggal_lahir_anak' => $tanggal_lahir_anak,
            'tempat_lahir_anak' => $tempat_lahir_anak,
            'anak_ke' => $anak_ke,
            'jam_lahir' => $jam_lahir,
            'nama' => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'tempat_lahir' => $tempat_lahir,
            'agama' => $agama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        ];

        // Data yang akan digunakan untuk menggantikan placeholder dalam template
        $tanggal_lahir = date('d-m-Y', strtotime($data['tanggal_lahir']));
        $tanggal_lahir_istri = date('d-m-Y', strtotime($data['tanggal_lahir_istri']));
        $tanggal_lahir_anak = date('d-m-Y', strtotime($data['tanggal_lahir_anak']));
        $tanggal_request = date('d F Y', strtotime($data['tanggal_request']));
        $jam_lahir = date('H:i', strtotime($data['jam_lahir']));
        $anak_ke = $data['anak_ke'];

        function angkaKeTeks($angka)
        {
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

        $format2 = date('H:i', strtotime($jam_lahir));

        $format3 = date('l', strtotime($tanggal_lahir_anak));
        $format3 = str_replace(
            array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
            array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'),
            $format3
        );


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
        $agama = $data['agama'];

        $nik_istri = $data['nik_istri'];
        $nama_istri = $data['nama_istri'];
        $nama_istriUppercase = strtoupper($nama_istri);  // Ubah nama menjadi huruf besar

        $pekerjaan_istri = $data['pekerjaan_istri'];
        $tempat_lahir_istri = $data['tempat_lahir_istri'];
        $agama_istri = $data['agama_istri'];
        $alamat_istri = $data['alamat_istri'];
        $nama_anak = $data['nama_anak'];
        $nama_anakUppercase = strtoupper($nama_anak);  // Ubah nama menjadi huruf besar

        $jenis_kelamin_anak = $data['jenis_kelamin_anak'];
        $tempat_lahir_anak = $data['tempat_lahir_anak'];

        // Load template Word
        $templateProcessor = new TemplateProcessor('skl.docx'); // Ganti dengan path ke template Anda
        $templateProcessor->setValue('format4', $format4);
        $templateProcessor->setValue('format3', $format3);
        $templateProcessor->setValue('sixmonth', $sixmonth);
        $templateProcessor->setValue('format5', $format5);
        $templateProcessor->setValue('nik', $nik);
        $templateProcessor->setValue('namaUppercase', $namaUppercase);
        $templateProcessor->setValue('alamat', $alamat);
        $templateProcessor->setValue('pekerjaan', $pekerjaan);
        $templateProcessor->setValue('tempat_lahir', $tempat);
        $templateProcessor->setValue('tanggal_lahir', $tanggal_lahir);
        $templateProcessor->setValue('agama', $agama);
        $templateProcessor->setValue('nik_istri', $nik_istri);
        $templateProcessor->setValue('nama_istriUppercase', $nama_istriUppercase);
        $templateProcessor->setValue('pekerjaan_istri', $pekerjaan_istri);
        $templateProcessor->setValue('tempat_lahir_istri', $tempat_lahir_istri);
        $templateProcessor->setValue('tanggal_lahir_istri', $tanggal_lahir_istri);
        $templateProcessor->setValue('agama_istri', $agama_istri);
        $templateProcessor->setValue('alamat_istri', $alamat_istri);
        $templateProcessor->setValue('nama_anakUppercase', $nama_anakUppercase);
        $templateProcessor->setValue('jenis_kelamin_anak', $jenis_kelamin_anak);
        $templateProcessor->setValue('tempat_lahir_anak', $tempat_lahir_anak);
        $templateProcessor->setValue('tanggal_lahir_anak', $tanggal_lahir_anak);
        $templateProcessor->setValue('format2', $format2);
        $templateProcessor->setValue('anak_ke_terformat', $anak_ke_terformat);

        // Simpan dokumen Word sementara
        $wordFileName = "Surat_Keterangan_Kelahiran_{$nama}_{$id_request_skl}.docx";
        $templateProcessor->saveAs($wordFileName);

        // Konversi Word ke PDF menggunakan Ilovepdf

        $myTask = new OfficepdfTask('project_public_6dd6e4a31aa9b8af8a7c9539387cc79d_VKQhra2a906f5f0d5bc56c5dd9db2418444c8', 'secret_key_bb8c23c8d315dc91e45605dd1fe3e4cf_5ZHH03b3455ae96235ebb47af514661b5fa87'); // Ganti dengan public_id dan secret_key Anda
        $file = $myTask->addFile($wordFileName); // Tambahkan file Word untuk dikonversi

        // Proses konversi
        $myTask->execute();

        // Unduh file PDF ke server lokal di folder "downloads"
        $outputDirectory = 'downloads'; // Pastikan folder ini ada dan memiliki izin tulis
        $pdfFileName = "Surat_Keterangan_Kelahiran_{$nama}_{$id_request_skl}.pdf";
        $myTask->download($outputDirectory);

        // Menghapus file Word sementara setelah konversi untuk menghemat ruang
        if (file_exists($wordFileName)) {
            unlink($wordFileName);
        }

        // Update database dengan path file PDF
        mysqli_stmt_close($stmt); // Tutup statement SELECT sebelum UPDATE
        $updateQuery = "UPDATE data_request_skl SET scan_skl = ? WHERE id_request_skl = ?";
        $updateStmt = mysqli_prepare($konek, $updateQuery);
        if ($updateStmt) {
            mysqli_stmt_bind_param($updateStmt, 'si', $pdfFileName, $id_request_skl);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);
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

