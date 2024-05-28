<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skl'])) {
    $id = $_GET['id_request_skl'];
    $sql = "SELECT * FROM data_request_skl natural join data_user WHERE id_request_skl='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id = $data['id_request_skl'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tanggal= $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
// Make sure $data['tanggal_lahir'] is not null and is a valid date format
if (!empty($data['tanggal_lahir'])) {
    $tanggal = $data['tanggal_lahir'];
    $format2 = date('d-m-Y', strtotime($tanggal));
} else {
    $format2 = "Invalid Date"; // Handle the case when $tgl is null or invalid
}
    $format3 = date('d F Y', strtotime($tgl2));
    $format5 = date('F Y', strtotime($tgl2));
    $format5 = str_replace(
        array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
        array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
        $format5
    );
    $format6 = date('m/Y', strtotime($tgl2));

    // Mendapatkan hari dari tanggal lahir anak
    $tanggal_lahir_anak = $data['tanggal_lahir_anak'];
    $format7 = date('l', strtotime($tanggal_lahir_anak));

    // Konversi nama hari ke dalam bahasa Indonesia
    $format7 = str_replace(
        array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
        array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'),
        $format7
    );

    $pekerjaan = $data['pekerjaan'];
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
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
    $nik_istri = $data['nik_istri'];
    $nama_istri = $data['nama_istri'];
    $pekerjaan_istri = $data['pekerjaan_istri'];
    $tempat_lahir_istri = $data['tempat_lahir_istri'];
    $tanggal_lahir_istri = $data['tanggal_lahir_istri'];
    $agama_istri = $data['agama_istri'];
    $alamat_istri = $data['alamat_istri'];
    $nama_anak = $data['nama_anak'];
    $jenis_kelamin_anak = $data['jenis_kelamin_anak'];
    $tempat_lahir_anak = $data['tempat_lahir_anak'];
    $tanggal_lahir_anak = $data['tanggal_lahir_anak'];
    $jam_lahir = $data['jam_lahir'];
    list($jam, $menit, $detik) = explode(":", $jam_lahir);
    $waktu_lahir = $jam . '.' . $menit . ' wita';
    $anak_ke = $data['anak_ke'];
    $kk = $data['scan_kk_l'];
}
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="date" name="tgl_acc" class="form-control">
                                <div class="form-group">
                                    <input type="submit" name="ttd" value="ACC" class="btn btn-primary btn-sm">
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ttd'])) {
                            $ket = "Surat sedang dalam proses cetak";
                            $tgl = $_POST['tgl_acc'];
                            $update = mysqli_query($konek, "UPDATE data_request_skl SET acc='$tgl', status=2, keterangan='$ket' WHERE id_request_skl=$id");
                            if ($update) {
                                echo "<script language='javascript'>swal('Selamat...', 'ACCKepala Desa Berhasil', 'success');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_skl">';
                            } else {
                                echo "<script language='javascript'>swal('Gagal...', 'ACCKepala Desa Gagal', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skl">';
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="1" align="center">
                        <table border="0" align="center" style="font-family: Arial;">
                            <tr>
                                <td><img src="../style/css/img/lo.png" width="90" height="110" alt=""></td>
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
                                        <font size="3"><b>SURAT KETERANGAN KELAHIRAN</b></font><br>
                                        <hr style="margin:0px" color="black">
                                        <span>Nomor :
                                            B-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HT/PEM/472.11/
                                            <?php echo $format6; ?>
                                        </span>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table border="0" style="margin-left: 240px; font-family: Arial;">
                            <tr>
                                <td>
                                    Yang bertanda tangan di bawah ini Kepala Desa Handil Terusan Kecamatan
                                    Anggana<br>menerangkan bahwa :
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; font-family: Arial;">
                            <tr>
                                <td><b>Nama</b></td>
                                <td>:</td>
                                <td style="text-transform: uppercase;">
                                    <b>
                                        <?php echo $nama; ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat dan tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>:</td>
                                <td>
                                    <?php echo $tempat . ", " . $format2; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>
                                    <?php echo $nik; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    <?php echo $agama; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>
                                    <?php echo $pekerjaan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <?php echo $alamat; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; font-family: Arial;">
                            <tr>
                                <td><b>Nama</b></td>
                                <td>:</td>
                                <td style="text-transform: uppercase;"><b>
                                        <?php echo $nama_istri; ?>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Tempat dan tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>:</td>
                                <td>
                                    <?php echo $tempat_lahir_istri . ", " . $tanggal_lahir_istri; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>
                                    <?php echo $nik_istri; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    <?php echo $agama_istri; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>
                                    <?php echo $pekerjaan_istri; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <?php echo $alamat_istri; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; margin-right: 200px;">
                            <tr>
                                <td style="font-size: 14px; font-family: Arial; text-align: justify; line-height: 2.0;">
                                    Bahwa keluarga tersebut di atas telah melahirkan seorang anak <b><?php echo $jenis_kelamin_anak; ?></b>
                                    <br>dengan
                                    pertolongan
                                    seorang:
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; font-family: Arial;">
                            <tr>
                                <td><b>Nama Bayi / Anak</b></td>
                                <td>:</td>
                                <td style="text-transform: uppercase;"><b>
                                        <?php echo $nama_anak; ?>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Tempat dan tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>:</td>
                                <td>
                                    <?php echo $tempat_lahir_anak . ", " . $tanggal_lahir_anak; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Hari</td>
                                <td>:</td>
                                <td>
                                    <?php echo $format7; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td>
                                    <?php echo $waktu_lahir; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke</td>
                                <td>:</td>
                                <td>
                                    <?php echo $anak_ke; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; margin-right: 200px;">
                            <tr>
                                <td>Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                                </td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <table border="0" align="right"
                            style=" margin-right: 200px; font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
                            <tr>
                                <td>Diberikan di : Handil Terusan</td>
                            </tr>
                            <tr>
                                <td><u>Pada tanggal:
                                </td>
                            </tr>
                            <tr>
                                <td>Kepala Desa Handil Terusan</td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td></td>
                                <td></td>
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

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>