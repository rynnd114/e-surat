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
						<h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST SURAT KETERANGAN KELAHIRAN</h4>
					</div>
				</div>
				<div class="card-body">
					<form method="POST">
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
									$i = 1;
									$sql = "SELECT * FROM data_request_skl natural join data_user WHERE status=0";
									$query = mysqli_query($konek, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$id_request_skl = $data['id_request_skl'];
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
											<td><img src="../style/img/scan_kk_l/<?php echo $kk; ?>" width="50" height="50"
													alt=""></td>
											<td>

												<input type="checkbox" name="check[$i]"
													value="<?php echo $id_request_skl; ?>">
												<input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
												<div class="form-button-action">
													<a type="button" data-toggle="tooltip" title=""
														class="btn btn-link btn-primary btn-lg"
														data-original-title="Cek Data"
														href="?halaman=detail_skl&id_request_skl=<?= $id_request_skl; ?>">
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
	if (isset($_POST['check'])) {
		foreach ($_POST['check'] as $value) {
			// echo $value;
			$ubah = "UPDATE data_request_skl set status =1 where id_request_skl = $value";

			$query = mysqli_query($konek, $ubah);

			if ($query) {
				echo "<script language='javascript'>swal('Selamat...', 'ACC Staf Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_skl">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'ACC Staf Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_skl">';
			}

		}
	}
}
?>