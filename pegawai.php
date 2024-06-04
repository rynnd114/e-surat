<?php include 'konek.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Login Pegawai</title>
  <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="style/css/style.css">
  <link href="style/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="style/js/jquery-2.1.3.min.js"></script>
  <script src="style/js/sweetalert.min.js"></script>
  <script src="style/js/sweetalert-dev.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="style/img/lo.png" style="width:70px;" alt="logo">
              </div>
              <h4>LOGIN PEGAWAI</h4>
              <form method="POST" class="pt-3">
                <div class="form-group">
                  <select name="hak_akses" class="form-control text-uppercase" required>
                    <option value="" selected="selected">Login sebagai</option>
                    <?php
                    $SQL = "SELECT DISTINCT hak_akses FROM data_user WHERE hak_akses='Staf' or hak_akses='Kepala Desa'";
                    $QUERY = mysqli_query($konek, $SQL);
                    while ($data = mysqli_fetch_array($QUERY, MYSQLI_BOTH)) {
                      $hak_akses = $data['hak_akses'];
                    ?>
                      <option value="<?php echo $hak_akses; ?>">
                        <?php echo $hak_akses; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password" class="form-control form-control-xs" placeholder="Password" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-eye" onclick="togglePasswordVisibility()"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    LOGIN
                  </button>
                </div>
                <div class="mb-2">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost/e-surat/">BATAL</a>
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
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    $sql_login = "SELECT * FROM data_user WHERE hak_akses='$hak_akses' AND password='$password'";
    $query_login = mysqli_query($konek, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login > 0) {
      session_start();
      $_SESSION['hak_akses'] = $data_login['hak_akses'];
      $_SESSION['nama'] = $data_login['nama'];
      $_SESSION['password'] = $data_login['password'];

      echo "<script language='javascript'>swal('Selamat...', 'Login Berhasil!', 'success');</script>";
      if ($hak_akses == 'Staf') {
        echo '<meta http-equiv="refresh" content="3; url=staf/main2.php">';
      } elseif ($hak_akses == 'Kepala Desa') {
        echo '<meta http-equiv="refresh" content="3; url=kepala-desa/main2.php">';
      }
    } else {
      echo "<script language='javascript'>swal('Gagal...', 'Login Gagal', 'error');</script>";
      echo '<meta http-equiv="refresh" content="3; url=pegawai.php">';
    }
  }
  ?>

  <script src="style/vendors/base/vendor.bundle.base.js"></script>
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
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
</body>

</html>
