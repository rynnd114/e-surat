<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data User</h4>
                        <a href="?halaman=tambah_user" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="table-responsive">
                            <table id="add5" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK / Nama</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Warga</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = "SELECT * FROM data_user WHERE hak_akses='pemohon'";
                                    $query = mysqli_query($konek, $tampil);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $username = $data['nik'];
                                        $nama = $data['nama'];
                                        $tempat = $data['tempat_lahir'];
                                        $tanggal = $data['tanggal_lahir'];
                                        $alamat = $data['alamat'];
                                        $jekel = $data['jekel'];
                                        $status_warga = $data['status_warga'];
                                        $tanggal_lahir = date("d-F-Y", strtotime($tanggal));
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $username . ' - ' . $nama; ?></td>
                                            <td><?php echo $tempat . ", " . $tanggal_lahir; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td><?php echo $jekel; ?></td>
                                            <td><?php echo $status_warga; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="?halaman=ubah_user&nik=<?php echo $username; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="?halaman=tampil_user&nik=<?php echo $username; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus User">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>


<?php
if (isset($_GET['nik'])) {
    $sql_hapus = "DELETE FROM data_user WHERE nik='" . $_GET['nik'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
    }
}
?>