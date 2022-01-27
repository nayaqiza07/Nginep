<?php
include 'db_conn.php';

// CRUD Delete || Menghapus data Kategori
if (isset($_GET['idk'])) {
  $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '" . $_GET["idk"] . "'");
  echo "<script> alert('Hapus Data Berhasil') </script>";
  echo "<script> window.location='data_kategori.php' </script>";
}

// CRUD Delete || Menghapus data Produk
if (isset($_GET['idp'])) {

  // untuk menghapus gambar pada tb_produk
  $gambar_produk = mysqli_query($conn, "SELECT gambar_produk FROM tb_produk WHERE id_produk = '" . $_GET["idp"] . "'");
  $gp = mysqli_fetch_object($gambar_produk);

  unlink('./produk/' .$gp->gambar_produk);


  $delete = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk = '" . $_GET["idp"] . "'");
  echo "<script> alert('Hapus Data Berhasil') </script>";
  echo "<script> window.location='data_produk.php' </script>";
}
?>