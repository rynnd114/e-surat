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
$rt = $data['rt'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN USAHA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="keterangan" class="form-control"
										value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Usaha</label>
									<input type="text" name="nama_usaha" class="form-control"
										placeholder="Nama Usaha Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Jenis Usaha</label>
									<input type="text" name="jenis_usaha" class="form-control"
										placeholder="Jenis Usaha Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Alamat Usaha</label>
									<input type="text" name="alamat_usaha" class="form-control"
										placeholder="Alamat Usaha Anda.." autofocus>
								</div>
								<label>RT Alamat Usaha</label>
								<select name="rt_u" class="form-control" placeholder="Alamat Usaha Anda.." autofocus>>
									<option disabled="" value="">Pilih RT Alamat Usaha Anda</option>
									<option <?php if ($rt == '001') {
												echo "selected";
											} ?> value='001'>001
									</option>
									<option <?php if ($rt == '002') {
												echo "selected";
											} ?> value='002'>002
									</option>
									<option <?php if ($rt == '003') {
												echo "selected";
											} ?> value='003'>003
									</option>
									<option <?php if ($rt == '004') {
												echo "selected";
											} ?> value='004'>004
									</option>
									<option <?php if ($rt == '005') {
												echo "selected";
											} ?> value='005'>005
									</option>
									<option <?php if ($rt == '006') {
												echo "selected";
											} ?> value='006'>006
									</option>
									<option <?php if ($rt == '007') {
												echo "selected";
											} ?> value='007'>007
									</option>
									<option <?php if ($rt == '008') {
												echo "selected";
											} ?> value='008'>008
									</option>
									<option <?php if ($rt == '009') {
												echo "selected";
											} ?> value='009'>009
									</option>
									<option <?php if ($rt == '010') {
												echo "selected";
											} ?> value='010'>010
									</option>
									<option <?php if ($rt == '011') {
												echo "selected";
											} ?> value='011'>011
									</option>
									<option <?php if ($rt == '012') {
												echo "selected";
											} ?> value='012'>012
									</option>
									<option <?php if ($rt == '013') {
												echo "selected";
											} ?> value='013'>013
									</option>
									<option <?php if ($rt == '014') {
												echo "selected";
											} ?> value='014'>014
									</option>
									<option <?php if ($rt == '015') {
												echo "selected";
											} ?> value='015'>015
									</option>
								</select>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label>
									<input type="file" name="scan_ktp_u" class="form-control" size="37" required onchange="previewImage(this, 'preview_ktp')">
									<img id="preview_ktp" src="#" alt="Preview KTP" style="display: none; max-width: 500px; max-height: 500px;">
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="scan_kk_u" class="form-control" size="37" required onchange="previewImage(this, 'preview_kk')">
									<img id="preview_kk" src="#" alt="Preview KK" style="display: none; max-width: 500px; max-height: 500px;">
								</div>
							</div>

							<script>
								function previewImage(input, previewId) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();
										reader.onload = function(e) {
											$('#' + previewId).attr('src', e.target.result);
											$('#' + previewId).show();
										}
										reader.readAsDataURL(input.files[0]);
									}
								}
							</script>
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
	$nama_usaha = $_POST['nama_usaha'];
	$jenis_usaha = $_POST['jenis_usaha'];
	$alamat_usaha = $_POST['alamat_usaha'];
	$rt_u = $_POST['rt_u'];
	$timestamp = time();
	$file_ktp_u = $_POST['nik'] . "_ktp_" . $timestamp . ".jpg";
	$file_kk_u = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";

	// Ambil nomor surat terbaru
	$tahun_sekarang = date('Y');
	$sql_get_latest_nomor = "SELECT IFNULL(MAX(nomor_surat), 0) + 1 AS new_nomor_surat FROM data_request_sku WHERE YEAR(tanggal_request) = '$tahun_sekarang'";
	$result_nomor = mysqli_query($konek, $sql_get_latest_nomor);
	$row_nomor = mysqli_fetch_assoc($result_nomor);
	$nomor_surat_baru = $row_nomor['new_nomor_surat'];

	// Simpan data dengan nomor surat
	$sql = "INSERT INTO data_request_sku (nik, scan_ktp_u, scan_kk_u, nama_usaha, jenis_usaha, alamat_usaha, rt_u, nomor_surat, tahun) VALUES ('$nik','$file_ktp_u','$file_kk_u','$nama_usaha','$jenis_usaha','$alamat_usaha','$rt_u', '$nomor_surat_baru', '$tahun_sekarang')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	if ($query) {
		copy($_FILES['scan_ktp_u']['tmp_name'], "../style/img/scan_ktp_u/" . $file_ktp_u);
		copy($_FILES['scan_kk_u']['tmp_name'], "../style/img/scan_kk_u/" . $file_kk_u);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_sku">';
	}
}

?>