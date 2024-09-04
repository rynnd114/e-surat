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
						<h4 class="fw-bold text-uppercase">List Pengajuan Surat Keterangan Domisili</h4>
					</div>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="table-responsive">
							<table id="add5" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Pengajuan</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Scan KTP</th>
										<th>Scan KK</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sql = "SELECT * FROM data_request_skd JOIN data_user ON data_request_skd.nik = data_user.nik WHERE data_request_skd.status=0";
									$query = mysqli_query($konek, $sql);
									if (!$query) {
										die('Error in SQL query: ' . mysqli_error($konek));
									}
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$ktp = $data['scan_ktp_d'];
										$kk = $data['scan_kk_d'];
										$keterangan = $data['keterangan'];
										$id_request_skd = $data['id_request_skd'];

										if ($status == "1") {
											$status = "<b style='color:blue'>DISETUJUI</b>";
										} elseif ($status == "0") {
											$status = "<b style='color:red'>BELUM DISETUJUI</b>";
										}
									?>
										<tr>
											<td><?php echo $format; ?></td>
											<td><?php echo $nik; ?></td>
											<td><?php echo $nama; ?></td>
											<td><img src="../style/img/scan_ktp_d/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
											<td><img src="../style/img/scan_kk_d/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
											<td>
											<input type="hidden" name="id_request_skd" value="<?php echo $id_request_skd; ?>">
											<button type="submit" name="acc" class="btn btn-primary btn-sm" value="<?php echo $id_request_skd; ?>">SETUJUI</button>
											<div class="my-2 d-flex justify-content-between align-items-center">

												</div>
												<a href="download_word_skd.php?id_request_skd=<?php echo $id_request_skd; ?>" class="btn btn-sm btn-success">DOWNLOAD FILE</a>
												<div class="form-button-action">
													<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cek Data" href="?halaman=detail_skd&id_request_skd=<?= $id_request_skd; ?>">
														<i class="fa fa-edit"></i></a>

												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<?php
if (isset($_POST['acc'])) {
	$id_request_skd = $_POST['acc']; // Mendapatkan id_request_skd dari tombol "SETUJUI"
	$keterangan = "Menunggu Persetujuan Kepala Desa"; // Keterangan otomatis yang diubah

	// Menggunakan prepared statement untuk query update
	$ubah = "UPDATE data_request_skd SET status = 1, keterangan = ? WHERE id_request_skd = ?";
	$stmt = mysqli_prepare($konek, $ubah); // Menyiapkan statement
	mysqli_stmt_bind_param($stmt, 'si', $keterangan, $id_request_skd); // Mengikat parameter (s = string, i = integer)
	$query = mysqli_stmt_execute($stmt); // Eksekusi statement

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Persetujuan Berhasil, Menunggu Persetujuan Kepala Desa!', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=acc_skd">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Persetujuan Gagal!', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=acc_skd">';
	}
}
?>
