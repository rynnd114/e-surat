<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
$id = $nik = $nama = $dusun = $handil = $rt = $tgl = $ktp = $kk = $keperluan = ""; // Inisialisasi variabel

if (isset($_GET['id_request_skd'])) {
	$id = $_GET['id_request_skd'];
	$tampil_nik = "SELECT * FROM data_request_skd NATURAL JOIN data_user WHERE id_request_skd=$id";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	if ($data) { // Periksa apakah data berhasil diambil
		$nik = $data['nik'];
		$id = $data['id_request_skd'];
		$nama = $data['nama'];
		$dusun = $data['dusun'];
		$handil = $data['handil'];
		$rt = $data['rt'];
		$tgl = $data['tanggal_request'];
		$format1 = ($tgl != null) ? date('d-m-Y', strtotime($tgl)) : ""; // Tangani nilai null untuk $tgl
		$ktp = $data['scan_ktp_d'];
		$kk = $data['scan_kk_d'];
		$keperluan = $data['keperluan'];
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
									<input type="text" name="nik" class="form-control"
										value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Dusun</label>
								<select name="dusun" value="<?= $dusun; ?>" class="validate[required] form-control">
									<option value="">Pilih Dusun Anda</option>
									<option <?php if ($dusun == '001') {
										echo "selected";
									} ?> value='001'>001
									</option>
									<option <?php if ($dusun == '002') {
										echo "selected";
									} ?> value='002'>002
									</option>
									<option <?php if ($dusun == '003') {
										echo "selected";
									} ?> value='003'>003
									</option>
								</select>
							</div>
							<div class="form-group">
								<label>Handil</label>
								<select name="handil" value="<?= $handil; ?>" class="validate[required] form-control">
									<option value="">Pilih Handil Anda</option>
									<option <?php if ($handil == 'Handil A') {
										echo "selected";
									} ?> value='Handil A'>
										Handil A
									</option>
									<option <?php if ($handil == 'Handil B') {
										echo "selected";
									} ?> value='Handil B'>
										Handil B
									</option>
									<option <?php if ($handil == 'Handil c') {
										echo "selected";
									} ?> value='Handil c'>
										Handil c
									</option>
									<option <?php if ($handil == 'Handil D') {
										echo "selected";
									} ?> value='Handil D'>
										Handil D
									</option>
									<option <?php if ($handil == 'Mekar Baru') {
										echo "selected";
									} ?> value='Mekar Baru'>
										Mekar Baru
									</option>
									<option <?php if ($handil == 'Handil Lotre') {
										echo "selected";
									} ?> value='Handil Lotre'>Handil Lotre
									</option>
									<option <?php if ($handil == 'Handil Nilam') {
										echo "selected";
									} ?> value='Handil Nilam'>Handil Nilam
									</option>
								</select>
							</div>
							<div class="form-group">
								<label>RT</label>
								<select name="rt" value="<?= $rt; ?>" class="validate[required] form-control">
									<option value="">Pilih RT Anda</option>
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
	$nama_ktp = isset($_FILES['scan_ktp_d']);
	$file_ktp = $_POST['nik'] . "_" . ".jpg";
	$nama_kk = isset($_FILES['scan_kk_d']);
	$file_kk = $_POST['nik'] . "_" . ".jpg";
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