<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skd'])) {
    $id = $_GET['id_request_skd'];
	$tampil_nik = "SELECT data_request_skd.*, data_user.nama AS user_nama FROM data_request_skd JOIN data_user ON data_request_skd.nik = data_user.nik WHERE data_request_skd.id_request_skd=$id";
	$query = mysqli_query($konek, $tampil_nik);
	
	if ($query && mysqli_num_rows($query) > 0) {
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$nik = $data['nik'];
		$nama = $data['user_nama'];
		$dusun = $data['dusun'];
		$handil = $data['handil'];
		$rt = $data['rt_d'];
		$tgl = $data['tanggal_request'];
		$format1 = ($tgl != null) ? date('d-m-Y', strtotime($tgl)) : "";
		$ktp = $data['scan_ktp_d'];
		$kk = $data['scan_kk_d'];
		$keperluan = $data['keperluan'];
	} else {
		echo "Data tidak ditemukan.";
	}
}	
?>

<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH DATA REQUEST SURAT KETERANGAN DOMISILI</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Dusun</label>
									<input type="text" name="dusun" class="form-control" value="<?= $dusun; ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Handil</label>
									<input type="text" name="handil" class="form-control" value="<?= $handil; ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Rt</label>
									<input type="text" name="rt" class="form-control" value="<?= $rt; ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Keperluan</label>
									<input type="text" name="keperluan" class="form-control" value="<?= $keperluan; ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../style/img/scan_ktp_d/<?= $ktp; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<input type="file" name="scan_ktp_d" class="form-control" size="37">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KK</label><br>
									<img src="../style/img/scan_kk_d/<?= $kk; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<input type="file" name="scan_kk_d" class="form-control" size="37">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$dusun = $_POST['dusun'];
	$handil = $_POST['handil'];
	$rt = $_POST['rt'];
	$nama_ktp = $_FILES['scan_ktp_d']['name'];
	$file_ktp = $_POST['nik'] . "_ktp.jpg"; // Nama file ktp disesuaikan dengan kebutuhan
	$nama_kk = $_FILES['scan_kk_d']['name'];
	$file_kk = $_POST['nik'] . "_kk.jpg"; // Nama file kk disesuaikan dengan kebutuhan

	$keperluan = $_POST['keperluan'];
	$sql = "UPDATE data_request_skd SET dusun='$dusun',handil='$handil',rt='$rt', scan_ktp_d='$file_ktp',scan_kk_d='$file_kk',keperluan='$keperluan' WHERE id_request_skd=$id";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		copy($_FILES['scan_ktp_d']['tmp_name'], "../style/img/scan_ktp_d/" . $file_ktp);
		copy($_FILES['scan_kk_d']['tmp_name'], "../style/img/scan_kk_d/" . $file_kk);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skd">';
	}
}

?>