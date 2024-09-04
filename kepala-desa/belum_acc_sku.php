<?php include '../konek.php';?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script> 

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="fw-bold text-uppercase">Request Surat Keterangan Usaha (Kepala Desa)</h4>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype untuk upload file -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add5" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Request</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status</th>
                                        <th>Scan KTP</th>
                                        <th>Scan KK</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Menampilkan permohonan yang sudah di-ACC Staf tapi belum disetujui oleh Kepala Desa (status = 2)
                                        $sql = "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE status = 1";
                                        $query = mysqli_query($konek, $sql);
                                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $tgl = $data['tanggal_request'];
                                            $format = date('d F Y', strtotime($tgl));
                                            $nik = $data['nik'];
                                            $nama = $data['nama'];
                                            $status = $data['status'];
                                            $id = $data['id_request_sku'];
                                            $ktp = $data['scan_ktp_u'];
                                            $kk = $data['scan_kk_u'];
                                            $scan_sku = $data['scan_sku']; // Kolom untuk file yang sudah diupload Kepala Desa

                                            if ($status == "1") {
                                                $status_text = "SUDAH ACC STAF";
                                            } else {
                                                $status_text = "BELUM ACC";
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $format; ?></td>
                                        <td><?php echo $nik; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status_text; ?></td>
                                        <td><img src="../style/img/scan_ktp_u/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
                                        <td><img src="../style/img/scan_kk_u/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
                                        <td>
                                            <!-- Tombol Download File -->
                                            <a href="../staf/downloads/Surat_Keterangan_Usaha_<?php echo $nama; ?>_<?php echo $id; ?>.pdf" class="btn btn-link btn-primary btn-lg" download>
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                            <!-- Form Upload File yang sudah ditandatangani -->
                                            <?php if (empty($scan_sku)) { ?>
                                                <input type="file" name="signed_file" required>
                                                <input type="hidden" name="id_request_sku" value="<?php echo $id; ?>">
                                                <button type="submit" name="upload" class="btn btn-success btn-sm">Upload</button>
                                            <?php } else { ?>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input type="file" name="signed_file" required>
                                                    <input type="hidden" name="id_request_sku" value="<?php echo $id; ?>">
                                                    <button type="submit" name="upload" class="btn btn-success btn-sm">Setujui</button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {
    $id_request_sku = $_POST['id_request_sku'];
    $target_dir = "../staf/downloads/";
    $target_file = $target_dir . basename($_FILES["signed_file"]["name"]);

    // Cek jika file diunggah
    if (move_uploaded_file($_FILES["signed_file"]["tmp_name"], $target_file)) {
        $filename = basename($_FILES["signed_file"]["name"]);
        
        // Update kolom scan_sku di database dan setujui permohonan
        $sql = "UPDATE data_request_sku SET scan_sku = ?, acc = ?, status = 2, keterangan = 'Surat sedang dalam proses cetak' WHERE id_request_sku = ?";
        $stmt = mysqli_prepare($konek, $sql);
        $tgl_acc = date('Y-m-d'); // Tanggal saat ini
        mysqli_stmt_bind_param($stmt, 'ssi', $filename, $tgl_acc, $id_request_sku);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script language='javascript'>swal('Sukses...', 'Permohonan disetujui!', 'success');</script>";
            echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sku">';
        } else {
            echo "<script language='javascript'>swal('Gagal...', 'Permohonan gagal disetujui!', 'error');</script>";
            echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sku">';
        }
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'File gagal diunggah!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sku">';
    }
}
?>

