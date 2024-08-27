<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request_sku'])) {
    $id = $_GET['id_request_sku'];
    $sql = "SELECT * FROM data_request_sku natural join data_user WHERE id_request_sku='$id'";
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
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $alamat_usaha = $data['alamat_usaha'];
    $jenis_usaha = $data['jenis_usaha'];
    $rt_u = $data['rt_u'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
    $pekerjaan = $data['pekerjaan'];
    $nama_usaha = $data['nama_usaha'];
    $acc = $data['acc'];
    $format4 = date('d F Y', strtotime($acc));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK SKU</title>
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
            <td style="text-align: justify;">
                <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;<u><b>SURAT KETERANGAN USAHA</b></u></font><br>
                <span>Nomor : P-&nbsp;&nbsp;&nbsp;&nbsp;/HT/KES/510.8/<?php echo $format6; ?>
                </span>
            </td>
        </tr>
    </table>

    <br>
    <br>
    <table border="0"style="margin-left: 90px; font-family: Arial;">
        <tr>
            <td>
                Yang bertanda tangan dibawah ini Kepala Desa
                Handil Terusan Kecamatan Anggana menerangkan
                bahwa:
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
            <td>Tempat /Tanggal Lahir&nbsp;&nbsp;&nbsp;</td>
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
            <td>Alamat</td>
            <td>:</td>
            <td>
                <?php echo $alamat; ?>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" style="margin-left: 90px; margin-right: 15px;">
        <tr>
            <td style="font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
                Berdasarkan ini kami dari Pemerintah Desa Handil Terusan memberikan surat
                keterangan usaha berdasarkan surat pengantar dari Ketua RT.<?php echo $rt_u; ?> Desa Handil
                Terusan yang memiliki usaha sebagai berikut :
                <table border="0" style=" font-family: Arial;">
                    <tr>
                        <td>Nama Usaha </td>
                        <td>:</td>
                        <td>
                            <?php echo $nama_usaha; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jenis
                            Usaha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>:</td>
                        <td>
                            <b>
                                <?php echo $jenis_usaha; ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                        <td>:</td>
                        <td>
                            <?php echo $alamat_usaha; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table border="0" style="margin-left: 90px; margin-right: 15px;">
        <tr>
            <td style="font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
                Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.
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