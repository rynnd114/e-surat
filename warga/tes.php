<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skd'])) {
	$id = $_GET['id_request_skd'];
	$tampil_nik = "SELECT * FROM data_request_skd NATURAL JOIN data_user WHERE id_request_skd=$id";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	// $id = $data['id_request_skd'];
	// $nik = $data['nik'];
	// $nama = $data['nama'];
	// $nama_usaha = $data['nama_usaha'];
	// $jenis_usaha = $data['jenis_usaha'];
	// $alamat_usaha = $data['alamat_usaha'];
	// $rt = $data['rt'];
	// $rt_u = $data['rt_u'];
	// $ktp = $data['scan_ktp_u'];
	// $kk = $data['scan_kk_u'];

    $id = $data['id_request_skd'];
    $nik = $data['nik'];
    $dusun = $data['dusun'];
    $handil = $data['handil'];
    $rt = $data['rt'];
    $tanggal_request = $data['tanggal_request'];
    $scan_ktp_d = $data['scan_ktp_d'];
    $scan_kk_d = $data['scan_kk_d'];
    $keperluan = $data['keperluan'];
    $keterangan = $data['keterangan'];
    $request = $data['request'];
    $status = $data['status'];
    $acc = $data['acc'];
}
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH DATA REQUEST SURAT KETERANGAN USAHA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= $nik . ' - ' . $nama; ?>"
										readonly>
								</div>
								<div class="form-group">
									<label>Nama Usaha</label>
									<input type="text" name="nama_usaha" class="form-control" value="<?= $nama_usaha; ?>"
										placeholder="Usaha Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Jenis Usaha</label>
									<input type="text" name="jenis_usaha" class="form-control"
										value="<?= $jenis_usaha; ?>" placeholder="Keperluan Anda..">
								</div>
								<div class="form-group">
									<label>Alamat Usaha</label>
									<input type="text" name="alamat_usaha" class="form-control"
										value="<?= $alamat_usaha; ?>" placeholder="Keperluan Anda..">
								</div>
								<div class="form-group">
								<label>RT Alamat Usaha</label>
								<select name="rt_u" class="form-control">
									<option value="<?= $rt_u; ?>">Pilih RT Alamat Usaha Anda</option>
									<option <?php if ($rt_u == '001') {
										echo "selected";
									} ?> value='001'>001
									</option>
									<option <?php if ($rt_u == '002') {
										echo "selected";
									} ?> value='002'>002
									</option>
									<option <?php if ($rt_u == '003') {
										echo "selected";
									} ?> value='003'>003
									</option>
									<option <?php if ($rt_u == '004') {
										echo "selected";
									} ?> value='004'>004
									</option>
									<option <?php if ($rt_u == '005') {
										echo "selected";
									} ?> value='005'>005
									</option>
									<option <?php if ($rt_u == '006') {
										echo "selected";
									} ?> value='006'>006
									</option>
									<option <?php if ($rt_u == '007') {
										echo "selected";
									} ?> value='007'>007
									</option>
									<option <?php if ($rt_u == '008') {
										echo "selected";
									} ?> value='008'>008
									</option>
									<option <?php if ($rt_u == '009') {
										echo "selected";
									} ?> value='009'>009
									</option>
									<option <?php if ($rt_u == '010') {
										echo "selected";
									} ?> value='010'>010
									</option>
									<option <?php if ($rt_u == '011') {
										echo "selected";
									} ?> value='011'>011
									</option>
									<option <?php if ($rt_u == '012') {
										echo "selected";
									} ?> value='012'>012
									</option>
									<option <?php if ($rt_u == '013') {
										echo "selected";
									} ?> value='013'>013
									</option>
									<option <?php if ($rt_u == '014') {
										echo "selected";
									} ?> value='014'>014
									</option>
									<option <?php if ($rt_u == '015') {
										echo "selected";
									} ?> value='015'>015
									</option>
								</select>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../style/img/scan_ktp_u/<?= $ktp; ?>" width="100" height="100" alt="">
								</div>
								<div class="form-group">
									<input type="file" name="scan_ktp_u" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../style/img/scan_kk_u/<?= $kk; ?>" width="100" height="100" alt="">
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="scan_kk_u" class="form-control" size="37" required>
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
	$nama_usaha = $_POST['nama_usaha'];
	$jenis_usaha = $_POST['jenis_usaha'];
	$alamat_usaha = $_POST['alamat_usaha'];
	$rt_u = $_POST['rt_u'];
	$nama_ktp_u = isset($_FILES['scan_ktp_u']);
    $file_ktp_u = $_POST['nik'] . "_ktp_" . $timestamp . ".jpg";
	$nama_kk_u = isset($_FILES['scan_kk_u']);
    $file_kk_u = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";
	$sql = "UPDATE data_request_sku SET
    nama_usaha='$nama_usaha',
    jenis_usaha='$jenis_usaha',
	alamat_usaha='$alamat_usaha',
	rt_u='$rt_u',
    scan_ktp_u='$file_ktp_u',
    scan_kk_u='$file_kk_u' WHERE id_request_sku=$id";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		copy($_FILES['scan_ktp_u']['tmp_name'], "../style/img/scan_ktp_u/" . $file_ktp_u);
		copy($_FILES['scan_kk_u']['tmp_name'], "../style/img/scan_kk_u/" . $file_kk_u);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
}

?>