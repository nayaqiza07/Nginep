<?php
error_reporting(0);
include 'db_conn.php';
session_start();

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
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  </div>
  <!-- Akhir Nabvbar -->

  
  <!-- Content -->
  <div class="container mt-5 mb-5">

    <!-- produk -->
    <div class="col">
      <div class="card">
        <div class="card-body">
        <div class="col">
          <?php 
            if ($_GET['search'] != '' || $_GET['kategori'] != '') {
              $where = "AND nama_produk LIKE '%". $_GET['search'] ."%' AND id_kategori LIKE '%". $_GET['kategori'] ."%' ";
            }
            $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE status_produk = 1 $where ORDER BY id_produk DESC");

            if (mysqli_num_rows($produk) > 0) {
              while($p = mysqli_fetch_assoc($produk)){
          ?>
          <a href="detail_produk.php?id=<?php echo $p['id_produk'] ?>">
            <div class="row row-cols-1 row-cols-md-4 g-4">
              <div class="col">
              <div class="card mb-3">
                <img src="produk/<?php echo $p['gambar_produk'] ?> " class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text"><?php echo substr($p['nama_produk'], 0, 25) ?></p>
                  <p class="card-text">Rp. <?php echo number_format($p['harga_produk']) ?></p>
                </div>
              </div>
              </div>
            </div>
          </a>
            
            <?php } ?>
          <?php } else {?>
            <p>Produk tidak ada</p>
          <?php } ?>
        </div>
        </div>
      </div>
    </div>
    <!-- akhir produk -->
  </div>
</div>
  <!-- Akhir Content -->

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