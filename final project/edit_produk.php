<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit();
}

// mendapatkan id yang dikirim lewat url
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."'");

// cek data kategori berdasarkan id, jika kosong atau tidak ada nilai nya maka kembalikan ke halaman data kategori
if (mysqli_num_rows($produk) === 0) {
  echo header("location:data_produk.php");
}

// mengambil data dalam bentuk objek
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

  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

  <title>Edit Data Produk</title>
</head>

<body>
  <!-- Navbar -->
  <div class="container mt-0 mb-2">
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
    <h2>Edit Data</h2>
    <div class="card border shadow p-3 rounded mb-5 mt-3">
      <div class="card-body">
        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="kategori" class="form-label">Pilih Kategori</label>
            <select class="form-select" name="kategori" aria-label="Default select example">
              <option selected>-- Pilih --</option>
              <!-- Menampilkan Data Kategori pada tambah produk -->
              <?php 
                $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                while($r = mysqli_fetch_assoc($kategori)){    
              ?>
                <option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori'] == $p->id_kategori)? 'selected' : '' ?> > <?php echo $r['name_kategori'] ?> </option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="name" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga Produk" value="<?php echo $p->harga_produk ?>">
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label><br>
            <img src="produk/<?php echo $p->gambar_produk ?>" alt="gambar produk" class="img-thumbnail mb-3" width="200">
            <input class="form-control" type="hidden" name="foto" value="<?php echo $p->gambar_produk ?>">
            <input class="form-control" type="file" name="gambar">
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi" ><?php echo $p->deskripsi_produk ?></textarea>
          </div>

          <!-- Jika aktif maka produk akan tampil di halaman calon pembeli, jika tidak aktif maka tidak akan tampil -->
          <div class="mb-3">
          <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
              <option selected>-- Pilih --</option>
              <option value="1" <?php echo ($p->status_produk == 1) ? 'selected' : '' ?> >Aktif</option>
              <option value="2" <?php echo ($p->status_produk == 0) ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
          </div>
          <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </form>
        <!-- Akhir Form -->

        <!-- CRUD Create || membuat insert tambah data-->
        <?php
          if (isset($_POST['edit'])) {

            // menampung data inputan dari form
            $kategori   = $_POST['kategori'];
            $name       = $_POST['name'];
            $harga      = $_POST['harga'];
            $deskripsi  = $_POST['deskripsi'];
            $status     = $_POST['status'];
            $foto       = $_POST['foto'];

            // menampung data gambar baru
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            
            // jika admin ganti gambar
            if ($filename !== '') {
              // memisahkan nama file dan type
              $type1 = explode('.', $filename);
              $type2 = $type1[1]; // mengambil array dari $type1. $type2 berisi format file
  
              // rename nama file
              $newname = 'produk'.time().'.'.$type2;
    
              // menampung data format file yang diizinkan
              $type = array('jpg', 'jpeg', 'png', 'gif');
              
              // validasi format file
              // Jika format file dari $type2, formatnya tidak ada didalam $type. Maka jangan izinkan
              if (!in_array($type2, $type)) {
                // Jika format file tidak diizinkan
                echo "<script>alert('Format file tidak diizinkan')</script>";
                // echo "<script>window.location='tambah_produk.php'</script>";
              } else {
                // Jika format file diizinkan
                // proses upload file gambar baru sekaligus insert ke database dan menghapus file gambar yang lama
                unlink('./produk/'.$foto);
                move_uploaded_file($tmp_name, './produk/' .$newname);
                // menampung data gambar baru ke dalam variabel $namagambar
                $namagambar = $newname;
              }

            } else {
              // jika admin tidak ganti gambar
              $namagambar = $foto;
            }

            // query update untuk mengupdate data yang diedit ke dalam database
            $update = mysqli_query($conn, "UPDATE tb_produk SET
                                    id_kategori       = '$kategori',
                                    nama_produk       = '$name',
                                    harga_produk      = '$harga',
                                    deskripsi_produk  = '$deskripsi',
                                    gambar_produk     = '$namagambar',
                                    status_produk     = '$status'
                                    WHERE id_produk   = '$p->id_produk'
                                    ");

            if ($update) {
              echo "<script>alert('Data Berhasil diEdit')</script>";
              echo "<script>window.location='data_produk.php'</script>";
            } else {
              echo "<script>alert('Data Gagal diEdit')</script>";
              echo "<script>window.location='edit_produk.php'</script>";
            }

          }
        ?>
      </div>
    </div>
    </div>
  </div>
  </div>
  <!-- Akhir isi profil -->

  <script>
    CKEDITOR.replace( 'deskripsi' );
  </script>

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