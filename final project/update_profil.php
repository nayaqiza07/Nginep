<?php
include 'db_conn.php';
include 'profil.php';

// $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '" . $_SESSION["id"] . "'");
// $data = mysqli_fetch_object($query);

if (isset($_POST['submit'])) {
  $name     = ucwords($_POST['name']);
  $username = $_POST['username'];
  $hp       = $_POST['hp'];
  $email    = $_POST['email'];
  $alamat   = ucwords($_POST['alamat']);
}

$update = mysqli_query($conn, "UPDATE tb_admin SET 
                        name_admin   = '$name',
                        username     = '$username',
                        telp_admin   = '$hp',
                        email_admin  = '$email',
                        alamat_admin = '$alamat'
                        WHERE id_admin = '$data->id_admin'");

if ($update) {
  echo "<script>alert('Ubah data berhasil')</script>";
  echo "<script>window.location='profil.php'</script>";
} else {
  echo "Gagal";
}
