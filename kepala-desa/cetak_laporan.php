<?php
include '../konek.php';
?>
<!-- Fonts and icons -->
<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: { "families": ["Lato:300,400,700,900"] },
        custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css'] },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/atlantis.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="../assets/css/demo.css">

<?php
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    $sql = "SELECT
                data_user.nik,
                data_user.nama,
                data_request_skl.acc,
                data_request_skl.tanggal_request,
                data_request_skl.request
            FROM
                data_user
            INNER JOIN data_request_skl ON data_request_skl.nik = data_user.nik
            WHERE data_request_skl.status = 3 AND data_request_skl.acc BETWEEN '$start_date' AND '$end_date'
            UNION
            SELECT
                data_user.nik,
                data_user.nama,
                data_request_skd.acc,
                data_request_skd.tanggal_request,
                data_request_skd.request
            FROM
                data_user
            INNER JOIN data_request_skd ON data_request_skd.nik = data_user.nik
            WHERE data_request_skd.status = 3 AND data_request_skd.acc BETWEEN '$start_date' AND '$end_date'
            UNION
            SELECT
                data_user.nik,
                data_user.nama,
                data_request_skk.acc,
                data_request_skk.tanggal_request,
                data_request_skk.request
            FROM
                data_user
            INNER JOIN data_request_skk ON data_request_skk.nik = data_user.nik
            WHERE data_request_skk.status = 3 AND data_request_skk.acc BETWEEN '$start_date' AND '$end_date'
            UNION
            SELECT
                data_user.nik,
                data_user.nama,
                data_request_sku.acc,
                data_request_sku.tanggal_request,
                data_request_sku.request
            FROM
                data_user
            INNER JOIN data_request_sku ON data_request_sku.nik = data_user.nik
            WHERE data_request_sku.status = 3 AND data_request_sku.acc BETWEEN '$start_date' AND '$end_date'";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CETAK LAPORAN</title>
    </head>

    <body>
        <table border="0" align="center">
            <tr>
                <td><img src="../style/img/lo.png" width="70" height="87" alt=""></td>
                <td>
                    <center>
                        <font size="4"><b>LAPORAN REQUEST SURAT KETERANGAN</b></font><br>
                        <font size="4"><b>DESA HANDIL TERUSAN</b></font><br>
                        <font size="4"><b>PERIODE <?php echo date('d F Y', strtotime($start_date)) . ' - ' . date('d F Y', strtotime($end_date)); ?></b></font><br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr color="black">
                </td>
            </tr>
        </table>
        <br>
        <center>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Request</th>
                        <th>Tanggal ACC</th>
                        <th>Nama</th>
                        <th>Request</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                $query = mysqli_query($konek, $sql);
                while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    $no++;
                    $nama = $data['nama'];
                    $tanggal = $data['acc'];
                    $tgl_acc = date('d F Y', strtotime($tanggal));
                    $tglreq = $data['tanggal_request'];
                    $tgl_req = date('d F Y', strtotime($tglreq));
                    $request = $data['request'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tgl_req; ?></td>
                        <td><?php echo $tgl_acc; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $request; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </center>

        <br><br>
        <table border="0" align="right" style="font-size: 16px; font-family: Arial; text-align: justify; line-height: 2.0;">
            <tr>
                <td>Diberikan di: Handil Terusan</td>
            </tr>
            <tr>
                <td><b>Pada tanggal: <?php echo date('d F Y'); ?></b></td>
            </tr>
            <tr>
                <td>Kepala Desa Handil Terusan</td>
            </tr>
            <tr><td><br><br><br></td></tr>
            <tr>
                <td><u><b>ACHMADI, A.Md</b></u></td>
            </tr>
        </table>
    </body>
    </html>
    <script>
        window.print();
    </script>
    <?php
}
?>
