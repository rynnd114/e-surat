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
$agama = $data['agama'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SKL</div>
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
									<label>Nama Ibu</label>
									<input type="text" name="nama_istri" class="form-control"
										placeholder="Nama Ibu.." autofocus>
								</div>
								<div class="form-group">
									<label>Tempat Lahir Ibu</label>
									<input type="text" name="tempat_lahir_istri" class="form-control"
										placeholder="Tempat Lahir Istri.." autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir Ibu</label>
									<input type="date" name="tanggal_lahir_istri" class="form-control">
								</div>
								<div class="form-group">
									<label>NIK Ibu</label>
									<input type="number" name="nik_istri" class="form-control form-control-lg"
										placeholder="NIK Istri.."
										oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
										maxlength="16" required autofocus>
								</div>
								<div class="form-group">
									<label>Agama Ibu</label>
									<select name="agama_istri" class="form-control">
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
									<label>Pekerjaan Ibu</label>
									<input type="text" name="pekerjaan_istri" class="form-control"
										placeholder="Pekerjaan Istri..">
								</div>
								<div class="form-group">
									<label>Alamat Ibu</label>
									<input type="text" name="alamat_istri" class="form-control"
										placeholder="Alamat Istri..">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Nama Anak</label>
									<input type="text" name="nama_anak" class="form-control"
										placeholder="Nama Anak.." autofocus>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin:</label>
									<select name="jenis_kelamin_anak" id="" class="form-control">
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tempat Lahir Anak</label>
									<input type="text" name="tempat_lahir_anak" class="form-control"
										placeholder="Tempat Lahir Anak..">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir anak</label>
									<input type="date" name="tanggal_lahir_anak" class="form-control">
								</div>
								<div class="form-group">
									<label for="comment">Jam </label>
									<input type="time" name="jam_lahir" rows="2">
									</textarea>
								</div>
								<div class="form-group">
									<label for="comment">Anak Ke </label>
									<input type="number" name="anak_ke" rows="2">
									</textarea>
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="scan_kk_l" class="form-control" size="37" required>
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
	$nik_istri = $_POST['nik_istri'];
	$nama_istri = $_POST['nama_istri'];
	$pekerjaan_istri = $_POST['pekerjaan_istri'];
	$tempat_lahir_istri = $_POST['tempat_lahir_istri'];
	$tanggal_lahir_istri = $_POST['tanggal_lahir_istri'];
	$agama_istri = $_POST['agama_istri'];
	$alamat_istri = $_POST['alamat_istri'];
	$nama_anak = $_POST['nama_anak'];
	$jenis_kelamin_anak = $_POST['jenis_kelamin_anak'];
	$tempat_lahir_anak = $_POST['tempat_lahir_anak'];
	$tanggal_lahir_anak = $_POST['tanggal_lahir_anak'];
	$jam_lahir = $_POST['jam_lahir'];
	$anak_ke = $_POST['anak_ke'];
	$timestamp = time();
	$nama_kk_l = isset($_FILES['scan_kk_l']);
	$file_kk_l = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";
	$sql = "INSERT INTO data_request_skl (nik,nik_istri,scan_kk_l,nama_istri,tempat_lahir_istri,pekerjaan_istri,tanggal_lahir_istri,agama_istri,alamat_istri,nama_anak,jenis_kelamin_anak,tempat_lahir_anak,tanggal_lahir_anak,jam_lahir,anak_ke) VALUES ('$nik','$nik_istri','$file_kk_l','$nama_istri', '$tempat_lahir_istri','$pekerjaan_istri','$tanggal_lahir_istri','$agama_istri','$alamat_istri','$nama_anak','$jenis_kelamin_anak','$tempat_lahir_anak','$tanggal_lahir_anak','$jam_lahir','$anak_ke')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	if ($query) {
		copy($_FILES['scan_kk_l']['tmp_name'], "../style/img/scan_kk_l/" . $file_kk_l);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skl">';
	}
}

?>