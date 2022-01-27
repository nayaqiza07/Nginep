<?php

$sname = "localhost";
$uname = "root";
$pass = "";
$dbname = "db_nginep";

$conn = mysqli_connect($sname, $uname, $pass, $dbname);

if (!$conn) {
  echo "Koneksi Gagal";
}
