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
						<h4 class="fw-bold text-uppercase">belum acc request surat keterangan kelahiran</h4>
					</div>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<div class="table-responsive">
							<table id="add5" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Request</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Nama Ibu</th>
										<th>Nama Anak</th>
										<th>Status</th>										
										<th>Scan KK</th>
										<th>Keterangan</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM data_request_skl natural join data_user where status=1";
									$query = mysqli_query($konek, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$nama_istri = $data['nama_istri'];
										$nama_anak = $data['nama_anak'];
										$status = $data['status'];
										$kk = $data['scan_kk_l'];
										$keterangan = $data['keterangan'];
										$id_request_skl = $data['id_request_skl'];

										if ($status == "1") {
											$status = "Sudah ACC Staf";
										} elseif ($status == "0") {
											$status = "BELUM ACC";
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
											</td>
											<td>
												<?php echo $nama_istri; ?>
											</td>
											<td>
												<?php echo $nama_anak; ?>
											</td>
											<td class="fw-bold text-uppercase text-success op-8">
												<?php echo $status; ?>
											</td>
											<td><img src="../style/img/scan_kk_l/<?php echo $kk; ?>" width="50" height="50"
													alt=""></td>
											<td><i>
													<?php echo $keterangan; ?>
												</i></td>

											<td>
												<div class="form-button-action">
													<a type="button" data-toggle="tooltip" title=""
														class="btn btn-link btn-primary btn-lg"
														data-original-title="View Surat"
														href="?halaman=view_skl&id_request_skl=<?= $id_request_skl; ?>">
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