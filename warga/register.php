<?php include '../konek.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Pendaftaran Pemohon</title>
  <link rel="stylesheet" href="../style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../style/vendors/base/vendor.bundle.base.css">
  <link href="../main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="../main/js/jquery-2.1.3.min.js"></script>
  <script src="../main/js/sweetalert.min.js"></script>
  <script src="../main/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../main/css/style.css">
  <link rel="shortcut icon" href="../main/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../main/img/lo.png" style="width:70px;" alt="logo">
              </div>
              <h4>HALAMAN PENDAFTARAN</h4>
              <form method="POST" class="pt-3">
                <div class="form-group">
                  <input type="number" id="nik" name="nik" class="form-control form-control-lg" placeholder="NIK Anda.." size="16" required autofocus>
                </div>

                <div class="form-group">
                  <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap Anda.." required>
                </div>
                <div class="form-group">
                  <select name="jekel" id="" class="form-control">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" name="kota" class="form-control form-control-lg" placeholder="Kota Lahir Anda.." required>
                </div>
                <div class="form-group">
                  <input type="date" name="tgl" class="form-control form-control-lg" required>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Kata Sandi" minlength="8" required>
                    <div class="input-group-append">
                      <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i class="mdi mdi-eye"></i>
                      </span>
                    </div>
                  </div>
                  <div id="nikFeedback" style="color: red; font-size: 20px;"></div>
                  <div id="passwordFeedback" style="color: red; font-size: 20px;"></div>

                </div>
                <script>
                  document.getElementById('togglePassword').addEventListener('click', function(e) {
                    // Get the password input field and the icon element
                    var passwordInput = document.getElementsByName("password")[0];
                    var icon = this.querySelector('i');

                    // Toggle the type attribute
                    if (passwordInput.type === "password") {
                      passwordInput.type = "text";
                      // Change icon to eye-off
                      icon.classList.remove('mdi-eye');
                      icon.classList.add('mdi-eye-off');
                    } else {
                      passwordInput.type = "password";
                      // Change icon back to eye
                      icon.classList.remove('mdi-eye-off');
                      icon.classList.add('mdi-eye');
                    }
                  });
                </script>

                <script>
                  document.getElementById('password').addEventListener('input', function() {
                    var password = this.value;
                    var feedback = document.getElementById('passwordFeedback');

                    // Cek panjang password
                    if (password.length < 8) {
                      feedback.textContent = "Kata Sandi harus terdiri dari minimal 8.";
                      feedback.style.color = "red";
                    } else if (!/[A-Za-z]/.test(password) || !/[0-9]/.test(password)) {
                      feedback.textContent = "Kata Sandi harus terdiri dari kombinasi angka dan huruf.";
                      feedback.style.color = "red";
                    } else {
                      feedback.textContent = "Kata Sandi Valid.";
                      feedback.style.color = "green";
                    }
                  });
                </script>

                <script>
                  document.getElementById('nik').addEventListener('input', function() {
                    var nik = this.value;
                    var feedback = document.getElementById('nikFeedback');

                    // Reset feedback message
                    feedback.textContent = "";

                    if (nik.length === 16) {
                      // Kirim permintaan Ajax untuk cek NIK
                      $.ajax({
                        url: 'cek_nik.php', // File PHP yang akan memeriksa NIK di database
                        method: 'POST',
                        data: {
                          nik: nik
                        },
                        success: function(response) {
                          if (response === 'exists') {
                            feedback.textContent = "NIK sudah terdaftar.";
                            feedback.style.color = "red";
                          } else {
                            feedback.textContent = "NIK valid.";
                            feedback.style.color = "green";
                          }
                        }
                      });
                    } else if (nik.length = 16) {
                      feedback.textContent = "NIK harus terdiri dari 16 angka.";
                      feedback.style.color = "red";
                    }
                  });
                </script>


                <div class="mb-4">

                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">
                    DAFTAR
                  </button>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost/e-surat/">BATAL</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah memiliki akun? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- insert register -->
  <?php
  if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = "Pemohon";
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $kota = $_POST['kota'];
    $tgl = $_POST['tgl'];

    // Validasi NIK
    if (strlen($nik) != 16) {
        echo "<script language='javascript'>swal('Gagal...', 'NIK harus terdiri dari 16 angka!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=register.php">';
    } elseif (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        echo "<script language='javascript'>swal('Gagal...', 'Kata Sandi harus terdiri dari kombinasi angka dan huruf!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=register.php">';
    } else {
        $query = "SELECT COUNT(*) as count FROM data_user WHERE nik = '$nik'";
        $result = mysqli_query($konek, $query);
        $data = mysqli_fetch_assoc($result);

        if ($data['count'] > 0) {
            echo "<script language='javascript'>swal('Gagal...', 'NIK sudah terdaftar!', 'error');</script>";
        } else {
            $sql_simpan = "INSERT INTO data_user (nik,password,hak_akses,nama,tanggal_lahir,jekel,tempat_lahir) VALUES ('$nik','$password','$hak_akses','$nama','$tgl','$jekel','$kota')";
            $query_simpan = mysqli_query($konek, $sql_simpan);

            if ($query_simpan) {
                echo "<script language='javascript'>swal('Selamat...', 'Akun Berhasil dibuat!', 'success');</script>";
                echo '<meta http-equiv="refresh" content="3; url=login.php">';
            } else {
                echo "<script language='javascript'>swal('Gagal...', 'Akun Gagal dibuat!', 'error');</script>";
                echo '<meta http-equiv="refresh" content="3; url=register.php">';
            }
        }
    }
}

  ?>

  <!-- plugins:js -->
  <script src="../main/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../main/js/off-canvas.js"></script>
  <script src="../main/js/hoverable-collapse.js"></script>
  <script src="../main/js/template.js"></script>
  <!-- endinject -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>

</body>

</html>
<script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementsByName("password")[0];
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }
</script>