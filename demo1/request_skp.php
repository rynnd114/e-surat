<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
$agama = $data['agama'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT KEMATIAN</div>
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
									<label>Nama Almarhum:</label>
									<input type="text" name="nama_almarhum" class="form-control" required>
								</div>

								<div class="form-group">
									<label>NIK:</label>
									<input type="number" name="nik_a" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Jenis Kelamin:</label>
									<select name="jenis_kelamin" id="" class="form-control">
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>

								<div class="form-group">
									<label>Tempat Lahir:</label>
									<input type="text" name="tempat_lahir_a" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Tanggal Lahir:</label>
									<input type="date" name="tanggal_lahir_a" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Agama</label>
									<select name="agama_a" class="form-control">
										<option value="">Pilih Agama Anda</option>
										<option <?php if ($agama == 'Islam') {
											echo "selected";
										} ?> value='Islam'>Islam
										</option>
										<option <?php if ($agama == 'Katolik') {
											echo "selected";
										} ?> value='Kristen'>
											Katolik
										</option>
										<option <?php if ($agama == 'Kristen') {
											echo "selected";
										} ?> value='Kristen'>
											Kristen
										</option>
										<option <?php if ($agama == 'Hindu') {
											echo "selected";
										} ?> value='Hindu'>Hindu
										</option>
										<option <?php if ($agama == 'Budha') {
											echo "selected";
										} ?> value='Budha'>Budha
										</option>
									</select>
								</div>

								<div class="form-group">
									<label>Anak Ke:</label>
									<input type="number" name="anak_ke" class="form-control">
								</div>

								<div class="form-group">
									<label>Nama Ayah:</label>
									<input type="text" name="nama_ayah" class="form-control">
								</div>

								<div class="form-group">
									<label>Nama Ibu:</label>
									<input type="text" name="nama_ibu" class="form-control">
								</div>


							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Pekerjaan:</label>
									<input type="text" name="pekerjaan_a" class="form-control">
								</div>

								<div class="form-group">
									<label>Kewarganegaraan:</label>
									<input type="text" name="kewarganegaraan" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Alamat:</label>
									<textarea name="alamat_a" class="form-control" rows="2" required></textarea>
								</div>

								<div class="form-group">
									<label>Tanggal Kematian:</label>
									<input type="date" name="tanggal_kematian" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Waktu Kematian:</label>
									<input type="time" name="waktu_kematian" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Tempat Kematian:</label>
									<input type="text" name="tempat_kematian" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Penyebab Kematian:</label>
									<input type="text" name="penyebab_kematian" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Tempat Pemakaman:</label>
									<input type="text" name="tempat_pemakaman" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Tanggal Pemakaman:</label>
									<input type="date" name="tanggal_pemakaman" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Waktu Pemakaman:</label>
									<input type="time" name="waktu_pemakaman" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="kk" class="form-control" size="37" required>
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
	$nama_almarhum = $_POST['nama_almarhum'];
	$nik_a = $_POST['nik_a'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir_a = $_POST['tempat_lahir_a'];
	$tanggal_lahir_a = $_POST['tanggal_lahir_a'];
	$agama_a = $_POST['agama_a'];
	$anak_ke = $_POST['anak_ke'];
	$nama_ayah = $_POST['nama_ayah'];
	$nama_ibu = $_POST['nama_ibu'];
	$pekerjaan_a = $_POST['pekerjaan_a'];
	$kewarganegaraan = $_POST['kewarganegaraan'];
	$alamat_a = $_POST['alamat_a'];
	$tanggal_kematian = $_POST['tanggal_kematian'];
	$waktu_kematian = $_POST['waktu_kematian'];
	$tempat_kematian = $_POST['tempat_kematian'];
	$penyebab_kematian = $_POST['penyebab_kematian'];
	$tempat_pemakaman = $_POST['tempat_pemakaman'];
	$tanggal_pemakaman = $_POST['tanggal_pemakaman'];
	$waktu_pemakaman = $_POST['waktu_pemakaman'];
	$nama_kk = isset($_FILES['kk']);
	$file_kk = $_POST['nik'] . "_" . ".jpg";
	$sql = "INSERT INTO data_request_skp (
        nik,scan_kk,nama_almarhum, nik_a, jenis_kelamin, tempat_lahir_a, tanggal_lahir_a, agama_a, anak_ke,
        nama_ayah, nama_ibu, pekerjaan_a, kewarganegaraan, alamat_a, tanggal_kematian, waktu_kematian,
        tempat_kematian, penyebab_kematian, tempat_pemakaman, tanggal_pemakaman, waktu_pemakaman
    ) VALUES (
        '$nik','$file_kk','$nama_almarhum', '$nik_a', '$jenis_kelamin', '$tempat_lahir_a', '$tanggal_lahir_a', '$agama_a', '$anak_ke',
        '$nama_ayah', '$nama_ibu', '$pekerjaan_a', '$kewarganegaraan', '$alamat_a', '$tanggal_kematian', '$waktu_kematian',
        '$tempat_kematian', '$penyebab_kematian', '$tempat_pemakaman', '$tanggal_pemakaman', '$waktu_pemakaman'
    )";
	$query = mysqli_query($konek, $sql) or die(mysqli_error());

	if ($query) {
		copy($_FILES['kk']['tmp_name'], "../dataFoto/scan_kk/" . $file_kk);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skp">';
	}
}

?>