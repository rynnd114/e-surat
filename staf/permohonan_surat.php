<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS PENGAJUAN SURAT KETERANGAN KELAHIRAN</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add5" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Nama Ibu</th>
									<th>Nama Anak</th>
									<th>Scan KK</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_skl natural join data_user WHERE status=2";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_request_skl = $data['id_request_skl'];
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$nama_istri = $data['nama_istri'];
									$nama_anak = $data['nama_anak'];
									$status = $data['status'];
									$kk = $data['scan_kk_l'];
									$scan_skl = $data['scan_skl']; // Kolom untuk file yang sudah diupload Kepala Desa

									if ($status == "1") {
										$status = "<b style='color:blue'>DISETUJUI</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM DISETUJUI</b>";
									}
								?>
									<tr>
										<td>
											<?php echo $format; ?>
										</td>
										<td>
											<?php echo $nik; ?>
										</td>
										<td>
											<?php echo $nama; ?>
										</td>
										<td>
											<?php echo $nama_istri; ?>
										</td>
										<td>
											<?php echo $nama_anak; ?>
										</td>
										<td><img src="../style/img/scan_kk_l/<?php echo $kk; ?>" width="50" height="50" alt="">
										</td>
										<td>
											<form action="" method="POST">
												<!-- Input Tersembunyi untuk Mengirim ID -->
												<input type="hidden" name="id_request_skl" value="<?php echo $id_request_skl; ?>">

												<div class="form-group">
													<!-- Tombol Persetujuan -->
													<input type="submit" name="kirim" value="Setujui" class="btn btn-success btn-sm" data-toggle="tooltip" title="Setujui">
												</div>

												<!-- Tombol Download -->
												<?php if (!empty($scan_skl)) { ?>
													<a href="downloads/<?php echo $scan_skl; ?>" class="btn btn-link btn-primary btn-sm" download data-toggle="tooltip" title="Download">
														<i class="fa fa-download"></i> Download
													</a>
												<?php } ?>
											</form>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS PENGAJUAN SURAT KETERANGAN USAHA</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add5" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								// Query untuk mengambil data pengajuan yang sudah disetujui
								$sql = "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE status=2";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp_u'];
									$kk = $data['scan_kk_u'];
									$id_request_sku = $data['id_request_sku'];
									$scan_sku = $data['scan_sku']; // File surat keterangan usaha yang sudah diupload

									// Menentukan teks status
									if ($status == "2") {
										$status_text = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
									} elseif ($status == "0") {
										$status_text = "<b style='color:red'>BELUM DISETUJUI</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><img src="../style/img/scan_ktp_u/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
										<td><img src="../style/img/scan_kk_u/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
										<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status_text; ?></td>
										<td>
											<form action="" method="POST">
												<!-- Input Tersembunyi untuk Mengirim ID -->
												<input type="hidden" name="id_request_sku" value="<?php echo $id_request_sku; ?>">

												<div class="form-group">
													<!-- Tombol Persetujuan -->
													<input type="submit" name="kirim" value="Setujui" class="btn btn-success btn-sm" data-toggle="tooltip" title="Setujui">
												</div>

												<!-- Tombol Download -->
												<?php if (!empty($scan_sku)) { ?>
													<a href="downloads/<?php echo $scan_sku; ?>" class="btn btn-link btn-primary btn-sm" download data-toggle="tooltip" title="Download">
														<i class="fa fa-download"></i> Download
													</a>
												<?php } ?>
											</form>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS PENGAJUAN SURAT KETERANGAN KEMATIAN</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add5" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Almarhum</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_skk natural join data_user where status=2";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik_a = $data['nik_a'];
									$nama_almarhum = $data['nama_almarhum'];
									$status = $data['status'];
									$kk = $data['scan_kk_k'];
									$id_request_skk = $data['id_request_skk'];
									$scan_skk = $data['scan_skk']; // File surat keterangan kematian yang sudah diupload


									if ($status == "2") {
										$status = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM DISETUJUI</b>";
									}
								?>
									<tr>
										<td>
											<?php echo $format; ?>
										</td>
										<td>
											<?php echo $nik_a; ?>
										</td>
										<td>
											<?php echo $nama_almarhum; ?>
										</td>
										<td><img src="../style/img/scan_kk_k/<?php echo $kk; ?>" width="50" height="50" alt="">
										</td>
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $status; ?>
										</td>
										<td>
											<form action="" method="POST">
												<!-- Input Tersembunyi untuk Mengirim ID -->
												<input type="hidden" name="id_request_skk" value="<?php echo $id_request_skk; ?>">

												<div class="form-group">
													<!-- Tombol Persetujuan -->
													<input type="submit" name="kirim" value="Setujui" class="btn btn-success btn-sm" data-toggle="tooltip" title="Setujui">
												</div>

												<!-- Tombol Download -->
												<?php if (!empty($scan_skk)) { ?>
													<a href="downloads/<?php echo $scan_skk; ?>" class="btn btn-link btn-primary btn-sm" download data-toggle="tooltip" title="Download">
														<i class="fa fa-download"></i> Download
													</a>
												<?php } ?>
											</form>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS PENGAJUAN SURAT KETERANGAN DOMISILI</h4>
					</div>
				</div>
				<form method="POST">
					<div class="card-body">
						<div class="table-responsive">
							<table id="add5" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Pengajuan</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Scan KTP</th>
										<th>Scan KK</th>
										<th>Status</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$sql = "SELECT * FROM data_request_skd JOIN data_user ON data_request_skd.nik = data_user.nik WHERE status = 2";
									$query = mysqli_query($konek, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$ktp = $data['scan_ktp_d'];
										$kk = $data['scan_kk_d'];
										$id_request_skd = $data['id_request_skd'];
										$scan_skd = $data['scan_skd'];	// File surat keterangan domisili yang sudah diupload

										if ($status == "2") {
											$status = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
										} elseif ($status == "0") {
											$status = "<b style='color:red'>BELUM DISETUJUI</b>";
										}
									?>
										<tr>
											<td>
												<?php echo $format; ?>
											</td>
											<td>
												<?php echo $nik; ?>
											</td>
											<td>
												<?php echo $nama; ?>
											</td>
											<td><img src="../style/img/scan_ktp_d/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
											<td><img src="../style/img/scan_kk_d/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
											<td class="fw-bold text-uppercase text-danger op-8">
												<?php echo $status; ?>
											</td>
											<td>
											<form action="" method="POST">
												<!-- Input Tersembunyi untuk Mengirim ID -->
												<input type="hidden" name="id_request_skd" value="<?php echo $id_request_skd; ?>">

												<div class="form-group">
													<!-- Tombol Persetujuan -->
													<input type="submit" name="kirim" value="Setujui" class="btn btn-success btn-sm" data-toggle="tooltip" title="Setujui">
												</div>

												<!-- Tombol Download -->
												<?php if (!empty($scan_skd)) { ?>
													<a href="downloads/<?php echo $scan_skd; ?>" class="btn btn-link btn-primary btn-sm" download data-toggle="tooltip" title="Download">
														<i class="fa fa-download"></i> Download
													</a>
												<?php } ?>
											</form>
										</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
    // Memastikan ID diterima dari formulir
    $id_request_skl = $_POST['id_request_skl'] ?? null;
    $id_request_sku = $_POST['id_request_sku'] ?? null;
	$id_request_skk = $_POST['id_request_skk'] ?? null;
	$id_request_skd = $_POST['id_request_skd'] ?? null;


	switch (true) {
		case isset($id_request_skl):
			// Proses untuk surat keterangan kelahiran
			$keterangan = "Surat Sudah Tersedia, Silahkan Download";
			$sql = mysqli_query($konek, "UPDATE data_request_skl SET keterangan='$keterangan', status='3' WHERE id_request_skl='$id_request_skl'");
			break;
		case isset($id_request_sku):
			// Proses untuk surat keterangan usaha
			$keterangan = "Surat Sudah Tersedia, Silahkan Download";
			$sql = mysqli_query($konek, "UPDATE data_request_sku SET keterangan='$keterangan', status='3' WHERE id_request_sku='$id_request_sku'");
			break;
		case isset($id_request_skk):
			// Proses untuk surat keterangan kematian
			$keterangan = "Surat Sudah Tersedia, Silahkan Download";
			$sql = mysqli_query($konek, "UPDATE data_request_skk SET keterangan='$keterangan', status='3' WHERE id_request_skk='$id_request_skk'");
			break;
		case isset($id_request_skd):
			// Proses untuk surat keterangan domisili
			$keterangan = "Surat Sudah Tersedia, Silahkan Download";
			$sql = mysqli_query($konek, "UPDATE data_request_skd SET keterangan='$keterangan', status='3' WHERE id_request_skd='$id_request_skd'");
			break;
	}

    if ($sql) {
        echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
    }
}
?>