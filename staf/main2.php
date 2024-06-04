<?php
session_start();
if (!isset($_SESSION['password']) || !isset($_SESSION['hak_akses'])) {
	header('location: login.php');
	exit(); // Pastikan untuk menghentikan eksekusi setelah mengarahkan
} else {
	$hak_akses = $_SESSION['hak_akses'];
}
?>

<?php include '../header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="main2.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">fitur</h4>
				</li>
				<?php
				if ($hak_akses == "Staf") {
				?>
					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data User</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=permohonan_surat">
							<i class="far fa-calendar-check"></i>
							<p>Cetak Surat</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Surat Selesai</p>
						</a>
					</li>
				<?php
				}
				?>
				<li class="mx-4 mt-2">
					<a href="../logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<?php
		if (isset($_GET['halaman'])) {
			$hal = $_GET['halaman'];
			switch ($hal) {
				case 'beranda';
					include 'beranda.php';
					break;
				case 'ubah_pemohon';
					include 'ubah_pemohon.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'tampil_status';
					include 'status_request.php';
					break;
				case 'acc_skl';
					include 'acc_skl.php';
					break;
				case 'acc_sku';
					include 'acc_sku.php';
					break;
				case 'acc_skk';
					include 'acc_skk.php';
					break;
				case 'acc_skd';
					include 'acc_skd.php';
					break;
				case 'detail_skl';
					include 'detail_skl.php';
					break;
				case 'detail_sku';
					include 'detail_sku.php';
					break;
				case 'detail_skk';
					include 'detail_skk.php';
					break;
				case 'detail_skd';
					include 'detail_skd.php';
					break;
				case 'cetak_skl';
					include 'cetak_skl.php';
					break;
				case 'tampil_user';
					include 'tampil_user.php';
					break;
				case 'tambah_user';
					include 'tambah_user.php';
					break;
				case 'ubah_user';
					include 'ubah_user.php';
					break;
				case 'view_skl';
					include 'view_skl.php';
					break;
				case 'view_sku';
					include 'view_sku.php';
					break;
				case 'view_skk';
					include 'view_skk.php';
					break;
				case 'view_skd';
					include 'view_skd.php';
					break;
				case 'view_cetak_skl';
					include 'view_cetak_skl.php';
					break;
				case 'view_cetak_sku';
					include 'view_cetak_sku.php';
					break;
				case 'view_cetak_skk';
					include 'view_cetak_skk.php';
					break;
				case 'view_cetak_skd';
					include 'view_cetak_skd.php';
					break;
				case 'surat_dicetak';
					include 'surat_dicetak.php';
					break;
				case 'laporan_perbulan';
					include 'laporan_perbulan.php';
					break;
				case 'laporan_pertahun';
					include 'laporan_pertahun.php';
					break;
				case 'permohonan_surat';
					include 'permohonan_surat.php';
					break;
				default:
					echo "<center>HALAMAN KOSONG</center>";
					break;
			}
		} else {
			include 'beranda2.php';
		}
		?>
	</div>
	<?php include '../footer.php'; ?>