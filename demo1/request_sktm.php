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
$rt_u = isset($data['rt_u']) ? $data['rt_u'] : '';
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SKK</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label<input type="text" name="keterangan" class="form-control"
										value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Istri</label>
									<input type="text" name="nama_istri" class="form-control"
										placeholder="Nama Istri Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Tempat Lahir Istri</label>
									<input type="text" name="tempat_lahir_istri" class="form-control"
										placeholder="Tempat Lahir Istri Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir Istri</label>
									<input type="date" name="tanggal_lahir_istri" class="form-control">
								</div>
								<div class="form-group">
									<label>NIK Istri</label>
									<input type="number" name="nik_istri" class="form-control form-control-lg"
										placeholder="NIK Istri Anda.."
										oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
										maxlength="16" required autofocus>
								</div>
								<div class="form-group">
									<label>Agama Istri</label>
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
									<label>Pekerjaan Istri</label>
									<input type="text" name="pekerjaan_istri" class="form-control"
										placeholder="Pekerjaan Anda..">
								</div>
								<div class="form-group">
									<label>Alamat Istri</label>
									<input type="text" name="alamat_istri" class="form-control"
										placeholder="Alamat Istri Anda...">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Nama Anak</label>
									<input type="text" name="nama_anak" class="form-control"
										placeholder="Nama Anak Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin Anak</label>
									<select name="jenis_kelamin_anak" class="form-control">
										<option value="">Jenis Kelamin Anak</option>
										<option <?php if ($jenis_kelamin_anak == 'laki-laki') {
											echo "selected";
										} ?>
											value='laki-laki'>Laki-Laki
										</option>
										<option <?php if ($jenis_kelamin_anak == 'perempuan') {
											echo "selected";
										} ?>
											value='perempuan'>Perempuan
										</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tempat Lahir Anak</label>
									<input type="text" name="tempat_lahir_anak" class="form-control"
										placeholder="Tempat Lahir Anak Anda..">
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
	$nama_kk = isset($_FILES['kk']);
	$file_kk = $_POST['nik'] . "_" . ".jpg";
	$sql = "INSERT INTO data_request_sktm (nik,nik_istri,scan_kk,nama_istri,tempat_lahir_istri,pekerjaan_istri,tanggal_lahir_istri,agama_istri,alamat_istri,nama_anak,jenis_kelamin_anak,tempat_lahir_anak,tanggal_lahir_anak,jam_lahir,anak_ke) VALUES ('$nik','$nik_istri','$file_kk','$nama_istri', '$tempat_lahir_istri','$pekerjaan_istri','$tanggal_lahir_istri','$agama_istri','$alamat_istri','$nama_anak','$jenis_kelamin_anak','$tempat_lahir_anak','$tanggal_lahir_anak','$jam_lahir','$anak_ke')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	if ($query) {
		copy($_FILES['kk']['tmp_name'], "../dataFoto/scan_kk/" . $file_kk);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_sktm">';
	}
}

?>