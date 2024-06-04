<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skl'])) {
	$id_request_skl = $_GET['id_request_skl'];
	$sql = "SELECT * FROM data_request_skl natural join data_user WHERE id_request_skl='$id_request_skl'";
	$query = mysqli_query($konek, $sql);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request_skl'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$nik_istri = $data['nik_istri'];
	$nama_istri = $data['nama_istri'];
	$pekerjaan_istri = $data['pekerjaan_istri'];
	$tempat_lahir_istri = $data['tempat_lahir_istri'];
	$tanggal_lahir_istri = $data['tanggal_lahir_istri'];
	$agama_istri = $data['agama_istri'];
	$alamat_istri = $data['alamat_istri'];
	$nama_anak = $data['nama_anak'];
	$jenis_kelamin_anak = $data['jenis_kelamin_anak'];
	$tempat_lahir_anak = $data['tempat_lahir_anak'];
	$tanggal_lahir_anak = $data['tanggal_lahir_anak'];
	$jam_lahir = $data['jam_lahir'];
	$anak_ke = $data['anak_ke'];
	$kk = $data['scan_kk_l'];
	$keterangan = $data['keterangan'];
}
?>
<div class="page-inner">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" class="form-control" autofocus><br>
							<button type="submit" name="ubah" class="btn btn-info btn-border btn-round btn-sm">
								<span class="btn-label">
									<i class="fas fa-edit"></i>
								</span>
								Ubah
							</button>
							<a href="?halaman=acc_skl" class="btn btn-info btn-border btn-round btn-sm">
								Batal
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control"
										value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Ibu</label>
									<input type="text" name="nama_istri" class="form-control"
										placeholder="Nama Ibu.." value="<?= $nama_istri; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tempat Lahir Ibu</label>
									<input type="text" name="tempat_lahir_istri" class="form-control"
										placeholder="Tempat Lahir Ibu.." value="<?= $tempat_lahir_istri; ?>"
										autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir Ibu</label>
									<input type="date" name="tanggal_lahir_istri" class="form-control"
										value="<?= $tanggal_lahir_istri; ?>">
								</div>
								<div class="form-group">
									<label>NIK Ibu</label>
									<input type="number" name="nik_istri" class="form-control form-control-lg"
										placeholder="NIK Ibu.."
										oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
										maxlength="16" required value="<?= $nik_istri; ?>" autofocus>
								</div>
								<label>Agama Ibu</label>
								<select name="agama_istri" class="form-control">
									<option value="<?= $agama_istri; ?>">Pilih Agama Anda</option>
									<option <?php if ($agama_istri == 'Islam') {
										echo "selected";
									} ?> value='Islam'>Islam
									</option>
									<option <?php if ($agama_istri == 'Katolik') {
										echo "selected";
									} ?> value='Kristen'>
										Katolik
									</option>
									<option <?php if ($agama_istri == 'Kristen') {
										echo "selected";
									} ?> value='Kristen'>
										Kristen
									</option>
									<option <?php if ($agama_istri == 'Hindu') {
										echo "selected";
									} ?> value='Hindu'>Hindu
									</option>
									<option <?php if ($agama_istri == 'Budha') {
										echo "selected";
									} ?> value='Budha'>Budha
									</option>
								</select>
								<div class="form-group">
									<label>Pekerjaan Ibu</label>
									<input type="text" name="pekerjaan_istri" class="form-control"
										placeholder="Pekerjaan Ibu.." value="<?= $pekerjaan_istri; ?>">
								</div>
								<div class="form-group">
									<label>Alamat Ibu</label>
									<input type="text" name="alamat_istri" class="form-control"
										placeholder="Alamat Ibu.." value="<?= $alamat_istri; ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Nama Anak</label>
									<input type="text" name="nama_anak" class="form-control"
										placeholder="Nama Anak.." value="<?= $nama_anak; ?>" autofocus>
								</div>
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
								<div class="form-group">
									<label>Tempat Lahir Anak</label>
									<input type="text" name="tempat_lahir_anak" class="form-control"
										placeholder="Tempat Lahir Anak Anda.." value="<?= $tempat_lahir_anak; ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir anak</label>
									<input type="date" name="tanggal_lahir_anak" class="form-control"
										value="<?= $tanggal_lahir_anak; ?>">
								</div>
								<div class="form-group">
									<label for="comment">Jam </label>
									<input type="time" name="jam_lahir" rows="2" value="<?= $jam_lahir; ?>">
									</textarea>
								</div>
								<div class="form-group">
									<label for="comment">Anak Ke </label>
									<input type="number" name="anak_ke" rows="2" value="<?= $anak_ke; ?>">
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">KK</h4>
					</div>
					<div class="card-body">
						<div class="row justify-content-md-center">
							<img src="../style/img/scan_kk_l/<?php echo $kk; ?>" width="300" height="300" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
if (isset($_POST['ubah'])) {
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
	$keterangan = $_POST['keterangan'];
	$ubah = "UPDATE data_request_skl SET 
	nik_istri='$nik_istri',
    nama_istri='$nama_istri',
    pekerjaan_istri='$pekerjaan_istri',
    tempat_lahir_istri='$tempat_lahir_istri',
    tanggal_lahir_istri='$tanggal_lahir_istri',
    agama_istri='$agama_istri',
    alamat_istri='$alamat_istri',
    nama_anak='$nama_anak',
	jenis_kelamin_anak = '$jenis_kelamin_anak',
    tempat_lahir_anak='$tempat_lahir_anak',
    tanggal_lahir_anak='$tanggal_lahir_anak',
    jam_lahir='$jam_lahir',
    anak_ke='$anak_ke',
	keterangan='$keterangan' WHERE id_request_skl='$id_request_skl'";
	$query = mysqli_query($konek, $ubah);

	if ($query == 1) {
		$keterangan = $_POST['keterangan'];
		$ubah = "UPDATE data_request_skl SET
		keterangan='$keterangan' WHERE id_request_skl='$id_request_skl'";
		$quey = mysqli_query($konek, $ubah);
		if ($quey == 1) {
			echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
			echo '<meta http-equiv="refresh" content="3; url=?halaman=acc_skl">';

		}
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=detail_skl">';
	}
}
?>