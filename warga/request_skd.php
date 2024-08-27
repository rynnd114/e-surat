<?php include '../konek.php'; ?>
<link href="../style/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../style/js/jquery-2.1.3.min.js"></script>
<script src="../style/js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];

?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN DOMISILI</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" class="form-control" value="<?= $nik . ' - ' . $nama; ?>"
										readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Keperluan</label>
									<input type="text" name="keperluan" class="form-control"
										placeholder="Keperluan Anda...">
								</div>
								<div class="form-group">
									<label>Dusun</label>
									<select id="dusun" name="dusun" class="form-control">
										<option value="">Pilih Dusun</option>
										<option value="1">Dusun 1</option>
										<option value="2">Dusun 2</option>
										<option value="3">Dusun 3</option>
									</select>
								</div>
								<div class="form-group">
									<label>Handil</label>
									<select id="handil" name="handil" class="form-control">
										<option value="">Pilih Handil</option>
										<!-- Opsi Handil akan diisi dengan JavaScript -->
									</select>
								</div>

								<div class="form-group">
									<label>RT</label>
									<select id="rt_d" name="rt_d" class="form-control">
										<option value="">Pilih RT</option>
										<!-- Opsi RT akan diisi dengan JavaScript -->
									</select>
								</div>

							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label>
									<input type="file" name="scan_ktp_d" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="scan_kk_d" class="form-control" size="37" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="kirim" class="btn btn-success">Kirim</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nik = $_POST['nik'];
	$keperluan = $_POST['keperluan'];
	$dusun = $_POST['dusun'];
	$handil = $_POST['handil'];
	$rt_d = $_POST['rt_d'];
	$timestamp = time();
	$nama_ktp_d = isset($_FILES['scan_ktp_d']);
	$file_ktp_d = $_POST['nik'] . "_ktp_" . $timestamp . ".jpg";
	$nama_kk_d = isset($_FILES['scan_kk_d']);
	$file_kk_d = $_POST['nik'] . "_kk_" . $timestamp . ".jpg";
	$sql = "INSERT INTO data_request_skd (nik,scan_ktp_d,scan_kk_d,keperluan,dusun,handil,rt_d) VALUES ('$nik','$file_ktp_d','$file_kk_d','$keperluan','$dusun','$handil','$rt_d')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	if ($query) {
		copy($_FILES['scan_ktp_d']['tmp_name'], "../style/img/scan_ktp_d/" . $file_ktp_d);
		copy($_FILES['scan_kk_d']['tmp_name'], "../style/img/scan_kk_d/" . $file_kk_d);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skd">';
	}
}

?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
    const dusunSelect = document.getElementById('dusun');
    const handilSelect = document.getElementById('handil');
    const rtSelect = document.getElementById('rt_d');

    const handilOptions = {
        "1": ["D"], // Handil D hanya muncul jika Dusun 1 dipilih
        "2": ["A", "B", "C"], // Handil A, B, dan C hanya muncul jika Dusun 2 dipilih
        "3": ["Mekar Baru", "Handil Lotrai", "Handil Nilam"] // Handil lainnya untuk Dusun 3
    };

    const rtOptions = {
        "1": [1, 2, 3, 4, 5],
        "2": [6, 7, 8, 11, 12, 14],
        "3": [9, 10, 13, 15]
    };

    const handilRtOptions = {
        "D": [1, 2, 3, 4, 5], // Handil D mencakup semua RT di Dusun 1
        "A": [8, 14],
        "B": [7, 12],
        "C": [6, 11],
        "Mekar Baru": [13],
        "Handil Lotrai": [9],
        "Handil Nilam": [10, 15]
    };

    function updateHandilOptions() {
        const selectedDusun = dusunSelect.value;

        // Reset dan isi ulang opsi Handil berdasarkan Dusun yang dipilih
        handilSelect.innerHTML = '<option value="">Pilih Handil</option>';
        if (selectedDusun && handilOptions[selectedDusun]) {
            handilOptions[selectedDusun].forEach(handil => {
                const option = document.createElement('option');
                option.value = handil;
                option.textContent = handil;
                handilSelect.appendChild(option);
            });
        }

        // Reset opsi RT setiap kali Dusun berubah
        updateRtOptions();
    }

    function updateRtOptions() {
        const selectedDusun = dusunSelect.value;
        const selectedHandil = handilSelect.value;

        // Ambil RT berdasarkan Dusun dan Handil
        let availableRt = [];
        if (selectedDusun && rtOptions[selectedDusun]) {
            availableRt = rtOptions[selectedDusun];
        }

        if (selectedHandil && handilRtOptions[selectedHandil]) {
            availableRt = availableRt.filter(rt => handilRtOptions[selectedHandil].includes(rt));
        }

        // Reset dan isi ulang opsi RT
        rtSelect.innerHTML = '<option value="">Pilih RT</option>';
        availableRt.forEach(rt => {
            const option = document.createElement('option');
            option.value = rt;
            option.textContent = `RT ${rt}`;
            rtSelect.appendChild(option);
        });
    }

    dusunSelect.addEventListener('change', updateHandilOptions);
    handilSelect.addEventListener('change', updateRtOptions);
});
</script>