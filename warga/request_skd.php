<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];

?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN DOMISILI</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" class="form-control" value="<?= $nik . ' - ' . $nama; ?>"
										readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Keperluan</label>
									<input type="text" name="keperluan" class="form-control"
										placeholder="Keperluan Anda...">
								</div>
								<div class="form-group">
									<label>Dusun</label>
									<input type="text" name="dusun" class="form-control" placeholder="Dusun Anda.."
										autofocus>
								</div>
								<div class="form-group">
									<label>Handil</label>
									<input type="text" name="handil" class="form-control" placeholder="Handil Anda.."
										autofocus>
								</div>
								<div class="form-group">
									<label>RT</label>
									<input type="text" name="rt" class="form-control" placeholder="Rt Anda.." autofocus>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label>
									<input type="file" name="scan_ktp_d" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="scan_kk_d" class="form-control" size="37" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="kirim" class="btn btn-success">Kirim</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nik = $_POST['nik'];
	$keperluan = $_POST['keperluan'];
	$dusun = $_POST['dusun'];
	$handil = $_POST['handil'];
	$rt = $_POST['rt'];
	$timestamp = time();
	$nama_ktp_d = isset($_FILES['scan_ktp_d']);
    $file_ktp_d = $_POST['nik'] . "_ktp_" . $timestamp . ".jpg";
	$nama_kk_d = isset($_FILES['scan_kk_d']);
    $file_kk_d = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";
	$sql = "INSERT INTO data_request_skd (nik,scan_ktp_d,scan_kk_d,keperluan,dusun,handil,rt) VALUES ('$nik','$file_ktp_d','$file_kk_d','$keperluan','$dusun','$handil','$rt')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	if ($query) {
		copy($_FILES['scan_ktp_d']['tmp_name'], "../style/img/scan_ktp_d/" . $file_ktp_d);
		copy($_FILES['scan_kk_d']['tmp_name'], "../style/img/scan_kk_d/" . $file_kk_d);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skd">';
	}
}

?>