<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_sku'])) {
	$id_request_sku = $_GET['id_request_sku'];
	$sql = "SELECT * FROM data_request_sku natural join data_user WHERE id_request_sku='$id_request_sku'";
	$query = mysqli_query($konek, $sql);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat = $data['tempat_lahir'];
	$tgl = $data['tanggal_lahir'];
	$agama = $data['agama'];
	$jekel = $data['jekel'];
	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$rt_u = $data['rt_u'];
	$status_warga = $data['status_warga'];
	$nama = $data['nama'];
	$id = $data['id_request_sku'];
	$ktp = $data['scan_ktp_u'];
	$kk = $data['scan_kk_u'];
	$nama_usaha = $data['nama_usaha'];
	$jenis_usaha = $data['jenis_usaha'];
	$alamat_usaha = $data['alamat_usaha'];
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
							<a href="?halaman=sudah_acc_sku" class="btn btn-info btn-border btn-round btn-sm">
								Batal
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="number" name="nik" value="<?php echo $nik; ?>" class="form-control"
										placeholder="NIK Anda.." autofocus readonly>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control"
										placeholder="Nama Lengkap Anda..">
								</div>
								<div class="form-check">
									<label>Jenis Kelamin</label><br />
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="jekel" value="Laki-Laki"
											<?php if ($jekel == "Laki-Laki")
												echo 'checked' ?>>
											<span class="form-radio-sign">Laki-Laki</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="jekel" value="Perempuan"
											<?php if ($jekel == "Perempuan")
												echo 'checked' ?>>
											<span class="form-radio-sign">Perempuan</span>
										</label>
									</div>
									<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" name="tempat" value="<?php echo $tempat; ?>" class="form-control"
										placeholder="Tempat Lahir Anda..">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl" value="<?php echo $tgl; ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Agama</label>
									<select name="agama" value="<?php echo $agama; ?>" class="form-control">
										<option value="Islam" <?php if ($agama == "Islam")
											echo 'selected' ?>>Islam
											</option>
											<option value="Kristen" <?php if ($agama == "Kristen")
											echo 'selected' ?>>Kristen
											</option>
											<option value="Katolik" <?php if ($agama == "Katolik")
											echo 'selected' ?>>Katolik
											</option>
											<option value="Hindu" <?php if ($agama == "Hindu")
											echo 'selected' ?>>Hindu
											</option>
											<option value="Budha" <?php if ($agama == "Budha")
											echo 'selected' ?>>Budha
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label for="comment">Alamat</label>
										<textarea class="form-control" name="alamat"
											rows="2"> <?php echo $alamat; ?></textarea>
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
								<div class="form-group">
									<label>Status Warga</label>
									<select name="status_warga" value="<?php echo $status_warga; ?>" class="form-control">
										<option value="Kawin" <?php if ($status_warga == "Kawin")
											echo 'selected' ?>>Kawin
											</option>
										<option value="belum_kawin" <?php if ($status_warga == "Belum Kawin")
											echo 'selected' ?>>Belum Kawin
											</option>
										</select>
									</div>
									
									<div class="form-group">
										<label>Nama Usaha</label>
										<input type="text" name="nama_usaha" class="form-control"
											value="<?php echo $nama_usaha; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Jenis Usaha</label>
									<input type="text" name="jenis_usaha" class="form-control"
										value="<?php echo $jenis_usaha; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Alamat Usaha</label>
									<input type="text" name="alamat_usaha" class="form-control"
										value="<?php echo $alamat_usaha; ?>" autofocus>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">KTP</h4>
					</div>
					<div class="card-body">
						<div class="row justify-content-md-center">
							<img src="../style/img/scan_ktp_u/<?php echo $ktp; ?>" width="350" height="250" alt="">

						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">KK</h4>
					</div>
					<div class="card-body">
						<div class="row justify-content-md-center">
							<img src="../style/img/scan_kk_u/<?php echo $kk; ?>" width="350" height="250" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
if (isset($_POST['ubah'])) {
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$status_warga = $_POST['status_warga'];

	$ubah = "UPDATE data_user SET
		nama='$nama',
		tanggal_lahir='$tgl',
		tempat_lahir='$tempat',
		jekel='$jekel',
		agama='$agama',
		alamat='$alamat',
		status_warga='$status_warga' WHERE nik='$nik'";
	$query = mysqli_query($konek, $ubah);

	if ($query == 1) {
		$nama_usaha = $_POST['nama_usaha'];
		$jenis_usaha = $_POST['jenis_usaha'];
		$alamat_usaha = $_POST['alamat_usaha'];
		$keterangan = $_POST['keterangan'];
		$rt_u = $_POST['rt_u'];
		$ubah = "UPDATE data_request_sku SET
		nama_usaha='$nama_usaha',
    	jenis_usaha='$jenis_usaha',
		rt_u='$rt_u',
		keterangan='$keterangan',
		alamat_usaha='$alamat_usaha' WHERE id_request_sku='$id_request_sku'";
		$quey = mysqli_query($konek, $ubah);
		if ($quey == 1) {
			echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
			echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_sku">';

		}
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=detail_sku">';
	}
}
?>