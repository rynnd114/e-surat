<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN KELAHIRAN</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
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

									if ($status == "1") {
										$status = "<b style='color:blue'>ACC</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
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
											<div class="form-button-action">
												<a href="?halaman=view_cetak_skl&id_request_skl=<?= $id_request_skl; ?>">
													<button type="button" data-toggle="tooltip" title=""
														class="btn btn-link btn-primary btn-lg"
														data-original-title="View Cetak">
														<i class="fa fa-edit"></i>
													</button>
												</a>
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
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN USAHA</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add2" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
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
								$sql = "SELECT * FROM data_request_sku natural join data_user WHERE status=2";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
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

									if ($status == "2") {
										$status = "<b style='color:blue'>SUDAH ACC KEPALA DESA</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
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
										<td><img src="../style/img/scan_ktp_u/<?php echo $ktp; ?>" width="50" height="50"
												alt=""></td>
										<td><img src="../style/img/scan_kk_u/<?php echo $kk; ?>" width="50" height="50"
												alt="">
										</td>
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $status; ?>
										</td>
										<td>
											<div class="form-button-action">
												<a href="?halaman=view_cetak_sku&id_request_sku=<?= $id_request_sku; ?>">
													<button type="button" data-toggle="tooltip" title=""
														class="btn btn-link btn-primary btn-lg"
														data-original-title="View Cetak">
														<i class="fa fa-edit"></i>
													</button>
												</a>

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
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN KEMATIAN</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add3" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
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


									if ($status == "2") {
										$status = "<b style='color:blue'>SUDAH ACC KEPALA DESA</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
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
										<td><img src="../style/img/scan_kk_k/<?php echo $kk; ?>" width="50" height="50"
												alt="">
										</td>
										<td class="fw-bold text-uppercase text-danger op-8">
											<?php echo $status; ?>
										</td>
										<td>
											<div class="form-button-action">
												<a href="?halaman=view_cetak_skk&id_request_skk=<?= $id_request_skk; ?>">
													<button type="button" data-toggle="tooltip" title=""
														class="btn btn-link btn-primary btn-lg"
														data-original-title="View Cetak">
														<i class="fa fa-edit"></i>
													</button>
												</a>
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
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN DOMISILI</h4>
					</div>
				</div>
				<form method="POST">
					<div class="card-body">
						<div class="table-responsive">
							<table id="add4" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Request</th>
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
									$sql = "SELECT * FROM data_request_skd natural join data_user where status=2";
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

										if ($status == "2") {
											$status = "<b style='color:blue'>SUDAH ACC KEPALA DESA</b>";
										} elseif ($status == "0") {
											$status = "<b style='color:red'>BELUM ACC</b>";
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
											<td><img src="../style/img/scan_kk_d/<?php echo $kk; ?>" width="50" height="50"
													alt=""></td>
											<td class="fw-bold text-uppercase text-danger op-8">
												<?php echo $status; ?>
											</td>
											<td>
												<div class="form-button-action">
													<a
														href="?halaman=view_cetak_skd&id_request_skd=<?= $id_request_skd; ?>">
														<button type="button" data-toggle="tooltip" title=""
															class="btn btn-link btn-primary btn-lg"
															data-original-title="View Cetak">
															<i class="fa fa-edit"></i>
														</button>
													</a>

												</div>
											</td>
										</tr>
										<?php
									}
									?>
									<?php
									if (isset($_POST['kirim'])) {
										$keterangan = $_POST['keterangan'];
										$sql = mysqli_query($konek, "UPDATE data_request_skd SET
										keterangan='$keterangan', status='3' WHERE id_request_skd='$id_request_skd'");
										if ($sql) {
											echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>";
											echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
										} else {
											echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
											echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
										}

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