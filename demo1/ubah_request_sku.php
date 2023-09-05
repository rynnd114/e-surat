<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_sku'])) {
	$id = $_GET['id_request_sku'];
	$tampil_nik = "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE id_request_sku=$id";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request_sku'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$nama_usaha = $data['nama_usaha'];
	$jenis_usaha = $data['jenis_usaha'];
	$alamat_usaha = $data['alamat_usaha'];
	$rt = $data['rt'];
	$rt_u = $data['rt_u'];
	$ktp = $data['scan_ktp'];
	$kk = $data['scan_kk'];
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
									<img src="../dataFoto/scan_ktp/<?= $ktp; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<input type="file" name="ktp" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../dataFoto/scan_kk/<?= $kk; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="kk" class="form-control" size="37" required>
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
	$nama_ktp = isset($_FILES['ktp']);
	$file_ktp = $_POST['nik'] . "_" . ".jpg";
	$nama_kk = isset($_FILES['kk']);
	$file_kk = $_POST['nik'] . "_" . ".jpg";
	$sql = "UPDATE data_request_sku SET
    nama_usaha='$nama_usaha',
    jenis_usaha='$jenis_usaha',
	alamat_usaha='$alamat_usaha',
	rt_u='$rt_u',
    scan_ktp='$file_ktp',
    scan_kk='$file_kk' WHERE id_request_sku=$id";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		copy($_FILES['ktp']['tmp_name'], "../dataFoto/scan_ktp/" . $file_ktp);
		copy($_FILES['kk']['tmp_name'], "../dataFoto/scan_kk/" . $file_kk);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
}

?>