<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Data Kategori</title>
</head>

<body>
  <!-- Navbar -->
  <div class="mt-0 mb-2">
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container">
      <a class="navbar-brand" href="komponen/Logo/NGINEP.png">
        <img src="NGINEP.png" alt="" width="30" height="25">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tambah_produk.php"><b> Tambah Produk</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tambah_kategori.php"><b> Tambah Kategori</b></a>
        </li>
          </a>
        </li>
      </ul>
  </div>
        <!-- Dropdown -->
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if (isset($_SESSION['name'])) {
              echo $_SESSION['name'];
            }
            ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profil.php">Setting</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <!-- Akhir Dropdown -->
      </div>
    </div>
  </nav>
  </div>
  <!-- Akhir Navbar -->

<!-- isi profil -->
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-lg-8">
    <h2>Kategori</h2>
    <div class="card border shadow p-3 rounded mb-5 mt-3">
      <div class="card-body">
      <!-- Button Tambah -->
      <div class="d-flex justify-content-end mb-3">
        <a href="tambah_kategori.php" class="btn btn-primary">Tambah Data</a>
      </div>
      <!-- Akhit Button Tambah -->
        <!-- Table -->
        <table class="table table-bordered table-striped">
          <thead class="text-center">
            <tr class="col">
              <th scope="col" class="col-1">No</th>
              <th scope="col" class="col-8">Kategori</th>
              <th scope="col" class="col-3">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- CRUD Read || menampilkan data dari database -->
            <?php
              $no = 1;
              $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");

              if (mysqli_num_rows($kategori) > 0) {

              // mengambil data array
              while($row = mysqli_fetch_assoc($kategori)){
            ?>
            <tr>
              <th scope="row"><?php echo $no++ ?></th>
              <td><?php echo $row['name_kategori'] ?></td>
              <td class="d-flex justify-content-center">
                <a href="edit_kategori.php?id=<?php echo $row['id_kategori'] ?>" class="btn btn-primary me-3">Edit</a>
                <a href="hapus.php?idk=<?php echo $row['id_kategori'] ?>" onclick="return confirm('Apakah Anda ingin Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
              <tr>
                <td colspan="3" class="text-center">Tidak ada data</td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
        <!-- Akhir Table -->
      </div>
    </div>
    </div>
  </div>
  </div>
  <!-- Akhir isi profil -->



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>