<?php
error_reporting(0);
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
}
?>
<?php
if ($hak_akses == "Staf") {
	$sql_skl = "SELECT * FROM data_request_skl WHERE status=0";
	$query_skl = mysqli_query($konek, $sql_skl);
	$count_skl = mysqli_num_rows($query_skl);

	$sql_sku = "SELECT * FROM data_request_sku WHERE status=0";
	$query_sku = mysqli_query($konek, $sql_sku);
	$count_sku = mysqli_num_rows($query_sku);

	$sql_skk = "SELECT * FROM data_request_skk WHERE status=0";
	$query_skk = mysqli_query($konek, $sql_skk);
	$count_skk = mysqli_num_rows($query_skk);

	$sql_skd = "SELECT * FROM data_request_skd WHERE status=0";
	$query_skd = mysqli_query($konek, $sql_skd);
	$count_skd = mysqli_num_rows($query_skd);
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h3 class="fw-bold text-uppercase">Lihat Permintaan Surat Keterangan dari Pemohon</h3>
		<!-- Card With Icon States Background -->
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=acc_skl">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKL (Surat Keterangan Kelahiran)</p>
									<?php
									$sql = "SELECT * FROM data_request_skl WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=acc_sku">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKU (Surat Keterangan Usaha)</p>
									<?php
									$sql = "SELECT * FROM data_request_sku WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=acc_skk">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKK (Surat Keterangan Kematian)</p>
									<?php
									$sql = "SELECT * FROM data_request_skk WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=acc_skd">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKD (Surat Keterangan Domisili)</p>
									<?php
									$sql = "SELECT * FROM data_request_skd WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	</head>

	<body>
		<div class="page-inner">
			<canvas id="requestChart" width="400" height="200"></canvas>
		</div>

		<script>
			var ctx = document.getElementById('requestChart').getContext('2d');
			var requestChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['SKL', 'SKU', 'SKK', 'SKD'],
					datasets: [{
						label: 'Jumlah Permintaan',
						data: [<?php echo $count_skl; ?>, <?php echo $count_sku; ?>, <?php echo $count_skk; ?>, <?php echo $count_skd; ?>],
						backgroundColor: ['blue', 'green', 'orange', 'purple'],
						borderColor: ['blue', 'green', 'orange', 'purple'],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		</script>
	</body>

	</html>

<?php
} elseif ($hak_akses == "Kepala Desa") {
	$sql_skl = "SELECT * FROM data_request_skl WHERE status=1";
	$query_skl = mysqli_query($konek, $sql_skl);
	$count_skl = mysqli_num_rows($query_skl);

	$sql_sku = "SELECT * FROM data_request_sku WHERE status=1";
	$query_sku = mysqli_query($konek, $sql_sku);
	$count_sku = mysqli_num_rows($query_sku);

	$sql_skk = "SELECT * FROM data_request_skk WHERE status=1";
	$query_skk = mysqli_query($konek, $sql_skk);
	$count_skk = mysqli_num_rows($query_skk);

	$sql_skd = "SELECT * FROM data_request_skd WHERE status=1";
	$query_skd = mysqli_query($konek, $sql_skd);
	$count_skd = mysqli_num_rows($query_skd);
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h4 class="page-title">Tampilkan Permintaan Surat Keterangan yang Sudah Disetujui Staf</h4>
		<!-- Card With Icon States Background -->
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=belum_acc_skl">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKL</p>
									<?php
									$sql = "SELECT * FROM data_request_skl WHERE status=1";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=belum_acc_sku">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKU</p>
									<?php
									$sql = "SELECT * FROM data_request_sku WHERE status=1";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=belum_acc_skk">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKK</p>
									<?php
									$sql = "SELECT * FROM data_request_skk WHERE status=1";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=belum_acc_skd">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">SKD</p>
									<?php
									$sql = "SELECT * FROM data_request_skd WHERE status=1";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	</head>

	<body>
		<div class="page-inner">
			<canvas id="requestChart" width="400" height="200"></canvas>
		</div>

		<script>
			var ctx = document.getElementById('requestChart').getContext('2d');
			var requestChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['SKL', 'SKU', 'SKK', 'SKD'],
					datasets: [{
						label: 'Jumlah Permintaan',
						data: [<?php echo $count_skl; ?>, <?php echo $count_sku; ?>, <?php echo $count_skk; ?>, <?php echo $count_skd; ?>],
						backgroundColor: ['blue', 'green', 'orange', 'purple'],
						borderColor: ['blue', 'green', 'orange', 'purple'],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		</script>
	</body>

	</html>