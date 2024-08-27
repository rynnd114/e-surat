<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request_skd'])) {
    $id = $_GET['id_request_skd'];
    $sql = "SELECT * FROM data_request_skd natural join data_user WHERE id_request_skd='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
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
    $keperluan = $data['keperluan'];
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

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK SKD</title>
</head>

<body>

    <table border="0" align="center" style="font-family: Arial; margin-left: 50px">
        <tr>
            <td><img src="../style/img/lo.png" width="75" height="90" alt=""></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <center style="width:100%; margin-left: 20px;">
                    <font size="3"><b>PEMERINTAH KABUPATEN KUTAI KARTANEGARA</b></font><br>
                    <font size="5"><b>KECAMATAN ANGANA</b></font><br>
                    <font size="5"><b>DESA HANDIL TERUSAN</b></font><br>
                </center>
                <div style="text-align: right; margin-right: -155px;">
                    <font size="3">Jalan : Pesantren No.9 RT. 03 Dusun 1 Handil
                        D&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
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
    <table border="0" style="margin-left: 90px; font-family: Arial;">
        <tr>
            <td>
                Kepala Desa Handil Terusan,menerangkan dengan sebenarnya bahwa :
            </td>
        </tr>
    </table>
    <br>
    <table border="0" style="margin-left: 90px; font-family: Arial;">

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
            <td>Tempat /Tanggal Lahir</td>
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
    <table border="0" style="margin-left: 90px; margin-right: 15px;">
        <tr>
            <td style="font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
                Yang bersangkutan di atas benar warga/penduduk Desa Handil Terusan dan
                berdomisili di wilayah Handil B RT.012 Dusun 2 Desa Handil Terusan Kecamatan
                Anggana Kabupaten Kutai Kartanegara. Surat keterangan domisili ini berlaku
                selama (6 bulan) mulai diterbitkan sampai dengan bulan
                <?php echo $format5; ?>.
                <br>
                Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana semestinya.
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" align="right"
        style=" font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
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





</body>

</html>
<script>
    window.print();
</script>