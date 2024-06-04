<?php

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
if (!isset($_POST['tampilkan'])) {
	$sql = "SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skl.acc,
                    data_request_skl.request
                FROM
                    data_user
                INNER JOIN data_request_skl ON data_request_skl.nik = data_user.nik
                WHERE data_request_skl.status = 3
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skd.acc,
                    data_request_skd.request
                FROM
                    data_user
                INNER JOIN data_request_skd ON data_request_skd.nik = data_user.nik
                WHERE data_request_skd.status = 3
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skk.acc,
                    data_request_skk.request
                FROM
                    data_user
                INNER JOIN data_request_skk ON data_request_skk.nik = data_user.nik
                WHERE data_request_skk.status = 3
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_sku.acc,
                    data_request_sku.request
                FROM
                    data_user
                INNER JOIN data_request_sku ON data_request_sku.nik = data_user.nik
                WHERE data_request_sku.status = 3";
} elseif (isset($_POST['tampilkan'])) {
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$sql = "SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skl.acc,
                    data_request_skl.request
                FROM
                    data_user
                INNER JOIN data_request_skl ON data_request_skl.nik = data_user.nik
                WHERE data_request_skl.status = 3 AND data_request_skl.acc BETWEEN '$start_date' AND '$end_date'
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skd.acc,
                    data_request_skd.request
                FROM
                    data_user
                INNER JOIN data_request_skd ON data_request_skd.nik = data_user.nik
                WHERE data_request_skd.status = 3 AND data_request_skd.acc BETWEEN '$start_date' AND '$end_date'
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_skk.acc,
                    data_request_skk.request
                FROM
                    data_user
                INNER JOIN data_request_skk ON data_request_skk.nik = data_user.nik
                WHERE data_request_skk.status = 3 AND data_request_skk.acc BETWEEN '$start_date' AND '$end_date'
                UNION
                SELECT
                    data_user.nik,
                    data_user.nama,
                    data_request_sku.acc,
                    data_request_sku.request
                FROM
                    data_user
                INNER JOIN data_request_sku ON data_request_sku.nik = data_user.nik
                WHERE data_request_sku.status = 3 AND data_request_sku.acc BETWEEN '$start_date' AND '$end_date'";
}
$query = mysqli_query($konek, $sql);

?>

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">LAPORAN REQUEST SURAT KETERANGAN</h2>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-tools">
						<form action="" method="POST">
							<div class="form-group">
								<label for="start_date">Tanggal Mulai:</label>
								<input type="date" name="start_date" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="end_date">Tanggal Akhir:</label>
								<input type="date" name="end_date" class="form-control" required value="<?php echo date('Y-m-d'); ?>">
							</div>
							<div class="form-group">
								<input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
								<a href="?halaman=laporan_pertahun">
									<input type="button" value="Reload" class="btn btn-primary btn-sm">
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-inner mt--5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-tools">
							<a href="cetak_laporan.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
								<span class="btn-label">
									<i class="fa fa-print"></i>
								</span>
								Print
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table mt-3">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Tanggal ACC</th>
									<th scope="col">Nama</th>
									<th scope="col">Nik</th>
									<th scope="col">Request</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$no++;
									$nik = $data['nik'];
									$nama = $data['nama'];
									$tanggal = $data['acc'];
									$tgl = date('d F Y', strtotime($tanggal));
									$request = $data['request'];
								?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $tgl; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><?php echo $request; ?></td>
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