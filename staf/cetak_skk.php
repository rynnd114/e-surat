<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request_skk'])) {
    $id = $_GET['id_request_skk'];
    $sql = "SELECT * FROM data_request_skk natural join data_user WHERE id_request_skk='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $format5 = date('F Y', strtotime($tgl2));
    $format5 = str_replace(
        array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
        array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
        $format5
    );
    $format6 = date('m/Y', strtotime($tgl2));
    $nik = $data['nik'];
    $nama = $data['nama'];
    $agama = $data['agama'];
    $nama_almarhum = $data['nama_almarhum'];
    $nik_a = $data['nik_a'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $tempat_lahir_a = $data['tempat_lahir_a'];
    $tanggal_lahir_a = $data['tanggal_lahir_a'];
    $agama_a = $data['agama_a'];
    $anak_ke = $data['anak_ke'];
    $nama_ayah = $data['nama_ayah'];
    $nama_ibu = $data['nama_ibu'];
    $pekerjaan_a = $data['pekerjaan_a'];
    $kewarganegaraan = $data['kewarganegaraan'];
    $alamat_a = $data['alamat_a'];
    $tanggal_kematian = $data['tanggal_kematian'];
    $nama_hari_indonesia = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    $nama_ahari = $nama_hari_indonesia[date("l", strtotime($tanggal_kematian))];
    $tanggal_ahasil = $nama_ahari . ', ' . $tanggal_kematian;
    $waktu_kematian = $data['waktu_kematian'];
    list($jam, $menit, $detik) = explode(":", $waktu_kematian);
    $waktu_akematian = $jam . '.' . $menit . ' wita';
    $tempat_kematian = $data['tempat_kematian'];
    $penyebab_kematian = $data['penyebab_kematian'];
    $tempat_pemakaman = $data['tempat_pemakaman'];
    $tanggal_pemakaman = $data['tanggal_pemakaman'];
    $nama_hari_indonesia = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    $nama_hari = $nama_hari_indonesia[date("l", strtotime($tanggal_pemakaman))];
    $tanggal_hasil = $nama_hari . ', ' . $tanggal_pemakaman;
    $waktu_pemakaman = $data['waktu_pemakaman'];
    list($jam, $menit, $detik) = explode(":", $waktu_pemakaman);
    $waktu_apemakaman = $jam . '.' . $menit . ' wita';
    $acc = $data['acc'];
    $format4 = '';
    if ($acc !== null) {
        $dateTime = new DateTime($acc);
        $format4 = $dateTime->format('d F Y');

        $monthTranslations = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        $format4 = strtr($format4, $monthTranslations);
    } else {
        $format4 = "kosong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK SKK</title>
</head>

<body>

    <table border="0" align="center" style="font-family: Arial;">
        <tr>
            <td><img src="../style/img/lo.png" width="75" height="90" alt=""></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <center>
                    <font size="4"><b>PEMERINTAHAN KABUPATEN KUTAI KARTANEGARA</b></font><br>
                    <font size="5"><b>KECAMATAN ANGANA</b></font><br>
                    <font size="5"><b>DESA HANDIL TERUSAN</b></font><br>
                </center>
                <div style="text-align: right; margin-right: -40px;">
                    <font size="3">Jalan : Pesantren No.9 RT. 03 Dusun 1 Handil
                        D&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </font>
                    <font size="1">Kode Pos : 75381</font>
                </div>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="45">
                <hr color="black">
            </td>
        </tr>
    </table>
    <br>
    <table border="0" align="center">
        <tr>
            <td>
                <center>
                    <font size="3"><b>SURAT KETERANGAN KEMATIAN</b></font><br>
                    <hr style="margin:0px" color="black">
                    <span>Nomor : B-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HT/PEM/472.12/
                        <?php echo $format6; ?>
                    </span>
                </center>
            </td>
        </tr>
    </table>
    <table border="0" style="margin-left: 70px; font-family: Calibri; font-size: 16px;">
        <tr>
            <td>
                Yang Bertanda Tangan Dibawah ini : <br>
                Nama
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                ACHMADI,A.Md<br>
                Jabatan
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                Kepala Desa Handil Terusan
            </td>
        </tr>
    </table>
    <table border="0" style="font-size:16px; margin-left: 70px; font-family: Calibri;">
        <tr>
            <td>
                Berdasarkan Bukti Dokumen Administrasi Kependudukan Terlampir Berupa
                Fotocopy Kartu Keluarga (KK) Siak Nomor KK : Menerangkan Dengan Sebenar-benarnya bahwa :
            </td>
        </tr>
    </table>
    <table border="0" style="margin-left: 70px; font-family: Calibri; font-size: 16px;">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: uppercase;">
                <b>
                    <?php echo $nama_almarhum; ?>
                </b>
            </td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>
                <?php echo $nik_a; ?>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <?php echo $jenis_kelamin; ?>
            </td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir/Umur</td>
            <td>:</td>
            <td>
                <?php echo $tempat_lahir_a . ", " . $tanggal_lahir_a; ?>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                <?php echo $agama_a; ?>
            </td>
        </tr>
        <tr>
            <td>Anak ke</td>
            <td>:</td>
            <td>
                <?php echo $anak_ke; ?>
            </td>
        </tr>
        <tr>
            <td>Nama Orang Tua</td>
        </tr>
        <tr>
            <td>Ayah</td>
            <td>:</td>
            <td>
                <?php echo $nama_ayah; ?>
            </td>
        </tr>
        <tr>
            <td>Ibu</td>
            <td>:</td>
            <td>
                <?php echo $nama_ibu; ?>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
                <?php echo $pekerjaan_a; ?>
            </td>
        </tr>
        <tr>
            <td>kewarganegaraan</td>
            <td>:</td>
            <td>
                <?php echo $kewarganegaraan; ?>
            </td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td>:</td>
            <td>
                <?php echo $alamat_a; ?>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" style="margin-left: 70px; font-family: Calibri; font-size: 16px;">
        <tr>
            <td>
                Nama tersebut/diatas memang benar telah meninggal dunia pada:
            </td>
        </tr>
    </table>

    <table border="0" style="margin-left: 70px; font-family: Calibri; font-size: 16px;">
        <tr>
            <td>Hari/Tanggal Kematian</td>
            <td>:</td>
            <td>
                <?php echo $tanggal_ahasil; ?>
            </td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td>
                <?php echo $waktu_akematian; ?>
            </td>
        </tr>
        <tr>
            <td>Tempat Kematian</td>
            <td>:</td>
            <td>
                <?php echo $tempat_kematian; ?>
            </td>
        </tr>
        <tr>
            <td>Penyebab Kematian</td>
            <td>:</td>
            <td>
                <?php echo $penyebab_kematian; ?>
            </td>
        </tr>
        <tr>
            <td>Dimakamkan di</td>
            <td>:</td>
            <td>
                <?php echo $tempat_pemakaman; ?>
            </td>
        </tr>
        <tr>
            <td>Hari/Tanggal Pemakaman&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td>
                <?php echo $tanggal_hasil; ?>
            </td>
        </tr>
        <tr>
            <td>waktu_pemakaman</td>
            <td>:</td>
            <td>
                <?php echo $waktu_apemakaman; ?>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" style="font-size:16px; margin-left: 70px; font-family: Calibri;">
        <tr>
            <td>
                Surat Keterangan ini dibuat berdasarkan bukti/Fotocopy dokumen administrasi terlampir maupun
                pernyataan/keterangan dari pelapor/yang memberikan keterangan. Demikian surat keterangan ini dibuat dan
                diberikan agar dapat diketahui serta dipergunakan sebagaimana mestinya.
            </td>
        </tr>
    </table>
    <table border="0" align="right"
        style=" margin-right: 20px; font-size: 16px; font-family: Calibri; text-align: justify;">
        <tr>
            <td>Diberikan di : Handil Terusan</td>
        </tr>
        <tr>
            <td><u>Pada tanggal: <?php echo $format4; ?>
            </td>
        </tr>
        <tr>
            <td>Kepala Desa Handil Terusan</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td rowspan="15"></td>
            <td></td>
            <td rowspan="15"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>

            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>ACHMADI,A.Md</b></u>
            </td>
        </tr>
    </table>




</body>

</html>
<script>
    window.print();
</script>