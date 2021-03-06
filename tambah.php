<?php
require 'functions.php';

$barang = query('SELECT * FROM barang');

if (isset($_POST['submit'])) {

  if (tambah($_POST) > 0) {
    echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'tambah.php';
			</script>
		";
  } else {
    echo "<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'tambah.php';
			</script>
		";
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">

  <title>Data Barang</title>
  <style>
    .nav-link {
      text-transform: uppercase;
      margin-left: 12px;
      font-size: 14px;
      color: white !important;
    }

    .nav-link:hover {
      opacity: 0.7;
    }

    .data-brg {
      border: #acacac;
    }

    .footer {
      background-color: #007BFF;
      width: 100%;
      height: 50px;
      color: white;
      position: fixed;
      bottom: 0;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">e-Kasir</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="index.php">Home</a>
          <a class="nav-link" href="tambah.php">Barang</a>
          <a class="nav-link" href="transaksi.php">Transaksi</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>Data Barang</h1>

    <div class="row mt-4">
      <div class="col-md-4">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Barang</a>
      </div>
    </div>

    <div class="row mt-1 data-brg">
      <div class="col-md-10">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($barang as $b) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $b['nama_barang']; ?></td>
                <td><?= $b['harga']; ?></td>
                <td><?= $b['stok']; ?></td>
                <td><img src="img/<?= $b['gambar']; ?>" width='70px'></td>
                <td>
                  <a href="edit.php?id_barang=<?= $b['id_barang']; ?>" class="btn btn-warning">edit</a>
                  <a href="hapus.php?id_barang=<?= $b["id_barang"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?')">hapus</a>
                </td>
              </tr>
          </tbody>
          <?php $i++; ?>
        <?php endforeach; ?>
        </table>

      </div>
    </div>

  </div>


  <footer class="footer mt-5 text-center ">
    <h6 class="pt-3" style="font-style: italic;">Copyright by MuhammadIqbal. 2021</h6>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="nama_barang" class="col col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
              </div>
            </div>
            <div class="form-group row">
              <label for="harga" class="col col-form-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="stok" class="col col-form-label">Stok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stok" name="stok">
              </div>
            </div>
            <div class="form-group row">
              <label for="gambar" class="col col-form-label">Img</label>
              <div class="col-sm-10">
                <input type="file" id="gambar" name="gambar">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Tambah Barang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>