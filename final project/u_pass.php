<?php
include 'db_conn.php';
include 'profil.php';

// $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '" . $_SESSION["id"] . "'");
// $data = mysqli_fetch_object($query);

if (isset($_POST['ubah_password'])) {
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  $pass_hash = hash('md5', $pass1);
  $pass_hash2 = hash('md5', $pass2);
}

// konfirmasi password
if ($pass_hash2 !== $pass_hash) {
  echo "<script>alert('Konfirmasi Password Baru Salah')</script>";
} else {
  $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                        password = '$pass_hash'
                        WHERE id_admin = '$data->id_admin'");

  if ($u_pass) {
    echo "<script>alert('Ubah Password berhasil')</script>";
    echo "<script>window.location='profil.php'</script>";
  } else {
    echo "Gagal" . mysqli_error($conn);
  }
}
