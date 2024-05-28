<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skl'])) {
	$id = $_GET['id_request_skl'];
	$tampil_nik = "SELECT data_request_skd.*, data_user.nik, data_user.nama FROM data_request_skd INNER JOIN data_user ON data_request_skd.id_user = data_user.id_user;
	";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request_skl'];
	$nik = $data['nik'];
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

}
?>
<div class="page-inner">
	<?php 
		var_dump($query);
		var_dump($data);
	?>

	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH REQUEST SKK</div>
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
										placeholder="Tempat Lahir Ibu.."value="<?= $tempat_lahir_istri; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir Ibu</label>
									<input type="date" name="tanggal_lahir_istri" class="form-control" value="<?= $tanggal_lahir_istri; ?>">
								</div>
								<div class="form-group">
									<label>NIK Ibu</label>
									<input type="number" name="nik_istri" class="form-control form-control-lg"
										placeholder="NIK Ibu.."
										oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
										maxlength="16" required value="<?= $nik_istri; ?>" autofocus>
								</div>
								<label>Agama Ibu</label>
								<select name="agama_istri" class="form-control" >
									<option value="<?= $agama_istri; ?>">Pilih Agama Anda</option>
									<option <?php if ($agama_istri == 'Islam') {
										echo "selected";
									} ?> value='Islam'>Islam
									</option>
									<option <?php if ($agama_istri == 'Katolik') {
										echo "selected";
									} ?> value='Kristen'>Katolik
									</option>
									<option <?php if ($agama_istri == 'Kristen') {
										echo "selected";
									} ?> value='Kristen'>Kristen
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
										placeholder="Alamat Ibu..." value="<?= $alamat_istri; ?>">
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
										placeholder="Tempat Lahir Anak.." value="<?= $tempat_lahir_anak; ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir anak</label>
									<input type="date" name="tanggal_lahir_anak" class="form-control" value="<?= $tanggal_lahir_anak; ?>">
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
								<div class="form-group">
									<label>Scan KK</label>
									<img src="../style/img/scan_kk_l/<?=$kk;?>" width="250" height="250" alt="">
									<input type="file" name="scan_kk_l" class="form-control" size="37"  required>
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
	$nama_kk_l = isset($_FILES['scan_kk_l']);
	$file_kk_l = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";
	$sql = "UPDATE data_request_skl SET
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
    scan_kk_l='$file_kk_l'
    WHERE id_request_skl=$id";	$query = mysqli_query($konek, $sql);

	if ($query) {
		copy($_FILES['scan_kk_l']['tmp_name'], "../style/img/scan_kk_l/" . $file_kk_l);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_skl">';
	}
}

?>