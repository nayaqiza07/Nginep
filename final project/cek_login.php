<?php
session_start();

include 'db_conn.php';

if (isset($_POST["login"])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // cek user
  $cek_user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
  $row = mysqli_num_rows($cek_user);

  // hash password
  $hash = hash('md5', $password);
  // cek user
  if ($row === 1) {
    // jalankan prosedur seleksi password
    $fetch_pass = mysqli_fetch_assoc($cek_user);

    // cek password
    if ($hash === $fetch_pass["password"]) {

      // set session
      $_SESSION["login"] = true;
      $_SESSION["id"] = $fetch_pass['id_admin'];
      $_SESSION['name'] = $fetch_pass['name_admin'];

      header("location:dashboard.php");
      exit();
    } else {
      header("location:login.php?error=username atau password salah");
    }
  } else {
    header("location:login.php?error=username atau password salah");
    // echo "<script>alert('User belum terdaftar');</script>";
  }
}
