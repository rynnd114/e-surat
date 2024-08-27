<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.4.min.js"></script>
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
						<table id="add4" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Nama Ibu</th>
									<th>Nama Anak</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_skl natural join data_user WHERE nik=$_SESSION[nik]";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$nama_istri = $data['nama_istri'];
									$nama_anak = $data['nama_anak'];
									$status = $data['status'];
									$kk = $data['scan_kk_l'];
									$keterangan = $data['keterangan'];
									$id_request_skl = $data['id_request_skl'];

									switch ($status) {
										case "1":
											$statusText = "<b style='color:green'>SUDAH DISETUJUI STAF</b>";
											break;
										case "0":
											$statusText = "<b style='color:red'>BELUM DISETUJUI STAF</b>";
											break;
										case "2":
											$statusText = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
											break;
										case "3":
											$statusText = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
											break;
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
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $statusText; ?>
										</td>
										<td><i>
												<?php echo $keterangan; ?>
											</i></td>
										<td>
											<div class="form-button-action">
												<?php if ($status == "0") { ?>
													<a href="?halaman=ubah_skl&id_request_skl=<?= $id_request_skl; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
															<i class="fa fa-edit"></i>
														</button>
													</a>
													<a href="?halaman=tampil_status&id_request_skl=<?= $id_request_skl; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
															<i class="fa fa-times"></i>
														</button>
													</a>
												<?php } ?>
											</div>
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
						<table id="add4" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Nama Usaha</th>
									<th>Jenis Usaha</th>
									<th>Alamat Usaha</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_sku natural join data_user WHERE nik=$_SESSION[nik] ORDER BY id_request_sku DESC";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$formatSort = date('Y-m-d H:i:s', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp_u'];
									$kk = $data['scan_kk_u'];
									$nama_usaha = $data['nama_usaha'];
									$jenis_usaha = $data['jenis_usaha'];
									$alamat_usaha = $data['alamat_usaha'];
									$keterangan = $data['keterangan'];
									$id_request_sku = $data['id_request_sku'];

									switch ($status) {
										case "1":
											$statusText = "<b style='color:green'>SUDAH DISETUJUI STAF</b>";
											break;
										case "0":
											$statusText = "<b style='color:red'>BELUM DISETUJUI STAF</b>";
											break;
										case "2":
											$statusText = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
											break;
										case "3":
											$statusText = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
											break;
									}
								?>
									<tr>
										<td data-sort="<?php echo $formatSort; ?>">
											<?php echo $format; ?>
										</td>
										<td>
											<?php echo $nik; ?>
										</td>
										<td>
											<?php echo $nama; ?>
										</td>
										<td><img src="../style/img/scan_ktp_u/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
										<td><img src="../style/img/scan_kk_u/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
										<td>
											<?php echo $nama_usaha; ?>
										</td>
										<td>
											<?php echo $jenis_usaha; ?>
										</td>
										<td>
											<?php echo $alamat_usaha; ?>
										</td>
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $statusText; ?>
										</td>
										<td><i>
												<?php echo $keterangan; ?>
											</i></td>
										<td>
											<div class="form-button-action">
												<?php if ($status == "0") { ?>
													<a href="?halaman=ubah_sku&id_request_sku=<?= $id_request_sku; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
															<i class="fa fa-edit"></i>
														</button>
													</a>
													<a href="?halaman=tampil_status&id_request_sku=<?= $id_request_sku; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
															<i class="fa fa-times"></i>
														</button>
													</a>
												<?php } ?>
											</div>
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
						<table id="add4" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Almarhum</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$sql = "SELECT * FROM data_request_skk INNER JOIN data_user ON data_request_skk.nik = data_user.nik WHERE data_request_skk.nik = '$nik';";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik_a = $data['nik_a'];
									$nama_almarhum = $data['nama_almarhum'];
									$status = $data['status'];
									$kk = $data['scan_kk_k'];
									$keterangan = $data['keterangan'];
									$id_request_skk = $data['id_request_skk'];

									switch ($status) {
										case "1":
											$statusText = "<b style='color:green'>SUDAH DISETUJUI STAF</b>";
											break;
										case "0":
											$statusText = "<b style='color:red'>BELUM DISETUJUI STAF</b>";
											break;
										case "2":
											$statusText = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
											break;
										case "3":
											$statusText = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
											break;
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
											<?php echo $statusText; ?>
										</td>
										<td><i>
												<?php echo $keterangan; ?>
											</i>
										</td>
										<td>
											<div class="form-button-action">
												<?php if ($status == "0") { ?>
													<a href="?halaman=ubah_skk&id_request_skk=<?= $id_request_skk; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
															<i class="fa fa-edit"></i>
														</button>
													</a>
													<a href="?halaman=tampil_status&id_request_skk=<?= $id_request_skk; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
															<i class="fa fa-times"></i>
														</button>
													</a>
												<?php } ?>
											</div>
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
				<div class="card-body">
					<div class="table-responsive">
						<table id="add4" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th>Keperluan</th>
									<th>Keterangan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_skd INNER JOIN data_user ON data_request_skd.nik = data_user.nik WHERE data_request_skd.nik = '$nik';";
								$query = mysqli_query($konek, $sql);

								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp_d'];
									$kk = $data['scan_kk_d'];
									$keterangan = $data['keterangan'];
									$keperluan = $data['keperluan'];
									$id_request_skd = $data['id_request_skd'];

									switch ($status) {
										case "1":
											$statusText = "<b style='color:green'>SUDAH DISETUJUI STAF</b>";
											break;
										case "0":
											$statusText = "<b style='color:red'>BELUM DISETUJUI STAF</b>";
											break;
										case "2":
											$statusText = "<b style='color:blue'>SUDAH DISETUJUI KEPALA DESA</b>";
											break;
										case "3":
											$statusText = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
											break;
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
										<td><img src="../style/img/scan_ktp_d/<?php echo $ktp; ?>" width="50" height="50"
												alt=""></td>
										<td><img src="../style/img/scan_kk_d/<?php echo $kk; ?>" width="50" height="50" alt="">
										</td>
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $statusText; ?>
										</td>
										<td>
											<?= $keperluan; ?>
										</td>
										<td><i>
												<?= $keterangan; ?>
											</i></td>
										<td>
											<div class="form-button-action">
												<?php if ($status == "0") { ?>
													<a href="?halaman=ubah_skd&id_request_skd=<?= $id_request_skd; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
															<i class="fa fa-edit"></i>
														</button>
													</a>
													<a href="?halaman=tampil_status&id_request_skd=<?= $id_request_skd; ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
															<i class="fa fa-times"></i>
														</button>
													</a>
												<?php } ?>
											</div>
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
	</div>
</div>
<?php
if (isset($_GET['id_request_skd'])) {
	$hapus = mysqli_query($konek, "DELETE FROM data_request_skd WHERE id_request_skd=$id_request_skd");
	if ($hapus) {
		echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
} elseif (isset($_GET['id_request_skl'])) {
	$hapus = mysqli_query($konek, "DELETE FROM data_request_skl WHERE id_request_skl=$id_request_skl");
	if ($hapus) {
		echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
} elseif (isset($_GET['id_request_skk'])) {
	$hapus = mysqli_query($konek, "DELETE FROM data_request_skk WHERE id_request_skk=$id_request_skk");
	if ($hapus) {
		echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
} elseif (isset($_GET['id_request_sku'])) {
	$hapus = mysqli_query($konek, "DELETE FROM data_request_sku WHERE id_request_sku=$id_request_sku");
	if ($hapus) {
		echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
}
?>