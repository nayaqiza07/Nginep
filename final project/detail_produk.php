<?php
error_reporting(0);
include 'db_conn.php';
session_start();

if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit();
}

$kontak = mysqli_query($conn, "SELECT telp_admin FROM tb_admin WHERE id_admin = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '". $_GET['id'] ."' ");
$p = mysqli_fetch_object($produk);

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Index</title>
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
          <a class="nav-link active" aria-current="page" href="produk.php"><b>Produk</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profil.php"><b>Profile</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php"><b>Log Out</b></a>
        </li>
          </a>
        </li>
      </ul>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profil.php">Setting</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
    </div>
  </div>
</nav>
  </div>
  <!-- Akhir Nabvbar -->

  
  <!-- Produk Detail -->
  <!-- Content -->
  <div class="container mt-5 mb-5">
    <div class="card">
    <div class="card-body">
    <div class="row">
      <!-- gambar -->
      <div class="col-sm-6">
        <div class="card border-0">
          <div class="card-body">
            <div class="col">
              <img src="produk/<?php echo $p->gambar_produk ?>" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
  <!-- akhir gambar -->

    <!-- produk -->
    <div class="col-sm-6">
      <div class="card border-0">
        <div class="card-body">
        <div class="col">
          <h3 class="mb-3"><?php echo $p->nama_produk ?></h3>
          <h4>Rp. <?php echo number_format($p->harga_produk) ?></h4>
          <p class="mt-5 mb-3">
            <b>Deskripsi: </b><br>
            <?php echo $p->deskripsi_produk ?><br>
          </p>
          <div class="d-grid gap-2">
          <a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=<?php echo $a->telp_admin ?>&text=Hai, Saya tertarik dengan produk Anda." type="button" target="_blank">Hubungi Via Whatsapp</a>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir produk -->
    </div>
    </div>
  </div>
  <!-- Akhir Content -->
  <!-- Akhir Produk Detail -->
   <!-- FOOTER -->
   <hr class="text-dark" />
        <p class="text-center text-dark">Copyright ©2022 All right reserved | This template is made with by Blewah</p>
      </div>
    </section>
  <!-- FOOTER -->

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