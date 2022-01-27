<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '" . $_SESSION["id"] . "'");
$data = mysqli_fetch_object($query);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Profil</title>
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
  <!-- Akhir Navbar -->

  <!-- isi profil -->
  <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-lg-8">
    <h2>Profil</h2>
    <div class="card border shadow p-3 rounded mb-5 mt-3">
      <div class="card-body">
        <!-- Form -->
        <form action="update_profil.php" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="<?php echo $data->name_admin ?>">
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data->username ?>">
          </div>
          <div class="mb-3">
            <label for="hp" class="form-label">No Hp</label>
            <input type="text" class="form-control" name="hp" placeholder="No Hp" value="<?php echo $data->telp_admin ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data->email_admin ?>">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $data->alamat_admin ?>">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Ubah Profil</button>
        </form>
        <!-- Akhir Form -->
      </div>
    </div>
    </div>
  </div>
  </div>
  <!-- Akhir isi profil -->

  <!-- isi profil 2 -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
      <h2>Ubah Password</h2>
        <div class="card border shadow p-3 rounded mb-5 mt-3">
          <div class="card-body">
            <!-- Form 2 -->
            <form action="u_pass.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="password" class="form-control" name="pass1" placeholder="Password Baru">
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="password" class="form-control" name="pass2" placeholder="Konfirmasi Password">
              </div>
              <button type="submit" name="ubah_password" class="btn btn-primary">Ubah Password</button>
            </form>
            <!-- Akhir Form 2 -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir isi profil 2 -->

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