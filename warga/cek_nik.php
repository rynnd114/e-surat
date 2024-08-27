<?php
include '../konek.php';

if (isset($_POST['nik'])) {
  $nik = $_POST['nik'];
  
  $query = "SELECT COUNT(*) as count FROM data_user WHERE nik = '$nik'";
  $result = mysqli_query($konek, $query);
  $data = mysqli_fetch_assoc($result);
  
  if ($data['count'] > 0) {
    echo 'exists'; // NIK sudah terdaftar
  } else {
    echo 'not_exists'; // NIK belum terdaftar
  }
}