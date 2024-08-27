<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skd'])) {
    $id = $_GET['id_request_skd'];
    $sql = "SELECT * FROM data_request_skd natural join data_user WHERE id_request_skd='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id = $data['id_request_skd'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
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
    $agama = $data['agama'];
    $pekerjaan = $data['pekerjaan'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
    $keterangan = $data['keterangan'];
    $keperluan = $data['keperluan'];
    $status = $data['status'];
    $acc = $data['acc'];
    $format4 = date('d F Y', strtotime($acc));
    if ($format4 == 0) {
        $format4 = "kosong";
    } elseif ($format4 == 1) {
        $format4;
    } else {
        $format4 = date('d F Y', strtotime($acc));
        $format4 = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            $format4
        );
    }


    if ($status == 3) {
        $keterangan = "SUDAH ACC KEPALA DESA, surat sedang dalam proses cetak oleh staf";
    }
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
                                <label>Keterangan</label>
                                <select name="dicetak" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                                </select><br>
                                <!-- <input type="date" name="tgl_acc" class="form-control"> -->
                                <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                                <a href="cetak_skd.php?id_request_skd=<?= $id; ?>"
                                    class="btn btn-primary btn-sm">Cetak</a>
                                <!-- <div class="form-group">
                                                    <a href="cetak_skd.php?id_request_skd=<?php $id; ?>">
                                                        Cetak
                                                    </a>
                                                </div> -->
                                <!-- <div class="form-group">
                                                   <a href="cetak_skd.php?id_request_skd=<?= $id; ?>">a</a>
                                                </div> -->
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ttd'])) {
                            $cetak = $_POST['dicetak'];
                            $update = mysqli_query($konek, "UPDATE data_request_skd SET keterangan='$cetak', status=3 WHERE id_request_skd=$id");
                            if ($update) {
                                echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=surat_dicetak">';
                            } else {
                                echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd">';
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
                                <td><img src="../style/img/lo.png" width="90" height="110" alt=""></td>
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
                        <table border="0" align="center" style="font-family: Arial;">
                            <tr>
                                <td>
                                    <center>
                                        <font size="4"><b>SURAT KETERANGAN DOMISILI</b></font><br>
                                        <hr style="margin:0px" color="black">
                                        <span>Nomor : B-&nbsp;&nbsp;&nbsp;&nbsp;/HT/PEM/212.3/
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
                                    Kepala Desa Handil Terusan,menerangkan dengan sebenarnya bahwa :
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; font-family: Arial;">

                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td style="text-transform: uppercase;">
                                    <b>
                                        <?php echo $nama; ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <?php echo $jekel; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tempat /Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>:</td>
                                <td>
                                    <?php echo $tempat . ", " . $format2; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>:</td>
                                <td>
                                    <?php echo $status_warga; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    <?php echo $agama; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>
                                    <?php echo $pekerjaan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>No. NIK</td>
                                <td>:</td>
                                <td>
                                    <?php echo $nik; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <?php echo $alamat; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="margin-left: 240px; margin-right: 200px;">
                            <tr>
                                <td style="font-size: 14px; font-family: Arial; text-align: justify; line-height: 2.0;">
                                    Yang bersangkutan di atas benar warga/penduduk Desa Handil Terusan dan
                                    berdomisili di wilayah Handil B RT.012 Dusun 2 Desa Handil Terusan Kecamatan
                                    Anggana Kabupaten Kutai Kartanegara. Surat keterangan domisili ini berlaku
                                    selama (6 bulan) mulai diterbitkan sampai dengan bulan
                                    <?php echo $format5; ?>.
                                    <br>
                                    Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana
                                    semestinya.
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
                                        <?php echo $format4; ?><u></td>
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
                </div>
            </div>
        </div>
    </div>
</div>