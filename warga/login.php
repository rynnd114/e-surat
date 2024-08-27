<?php include '../konek.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Login Pemohon</title>
  <link rel="stylesheet" href="../style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../style/vendors/base/vendor.bundle.base.css">
  <link href="../main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="../main/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../main/css/style.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../main/img/lo.png" style="width:50px;" alt="logo">
              </div>
              <h4>LOGIN PEMOHON</h4>
              <h6 class="font-weight-light"></h6>
              <form method="POST" class="pt-3">
                <div class="form-group">
                  <input type="number" id="nik" name="nik" class="form-control form-control-xs text-bold" placeholder="NIK Anda.." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required autofocus>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control form-control-xs" placeholder="Password" minlength="8" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-eye" onclick="togglePasswordVisibility()"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div id="nikFeedback" style="color: red; font-size: 20px;"></div>
                <div id="passwordFeedback" style="color: red; font-size: 20px;"></div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    LOGIN
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                </div>
                <div class="mb-2">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost/e-surat/">BATAL</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum memiliki akun? <a href="register.php" class="text-primary">Buat</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $sql_login = "SELECT * FROM data_user WHERE nik='$nik' AND password='$password'";
    $query_login = mysqli_query($konek, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login > 0) {
      session_start();
      $_SESSION['hak_akses'] = $data_login['hak_akses'];
      $_SESSION['nama'] = $data_login['nama'];
      $_SESSION['password'] = $data_login['password'];
      $_SESSION['nik'] = $data_login['nik'];

      echo "<script language='javascript'>swal('Selamat...', 'Login Berhasil!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="3; url=index.php">';
    } else {
      echo "<script language='javascript'>swal('Gagal...', 'Nik dan Kata Sandi Salah', 'error');</script>";
      echo '<meta http-equiv="refresh" content="3; url=login.php">';
    }
  }
  ?>

  <script src="../main/vendors/base/vendor.bundle.base.js"></script>
  <script src="../main/js/off-canvas.js"></script>
  <script src="../main/js/hoverable-collapse.js"></script>
  <script src="../main/js/template.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
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
        feedback.textContent = " ";
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
        });
      } else if (nik.length = 16) {
        feedback.textContent = "NIK harus terdiri dari 16 angka.";
        feedback.style.color = "red";
      }
    });
  </script>
</body>

</html>