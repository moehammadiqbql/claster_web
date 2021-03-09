<?php
require 'functions.php';

// ambil id di url
$id = $_GET['id_barang'];

// query data barang berdasarkan id
$brg = query("SELECT * FROM barang WHERE id_barang = $id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah atau tidak
  if (edit($_POST) > 0) {
    echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = 'tambah.php';
			</script>
		";
  } else {
    echo "<script>
				document.location.href = 'tambah.php';
			</script>
		";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Edit Data Barang</title>
  <style>
    .form-edit {
      background-color: rgba(0, 0, 0, 0);
      margin-top: 100px;
    }

    .img-edit {
      margin-left: 220px;
    }

    .img-browse {
      margin-top: -90px;
      margin-right: 100px;
    }
  </style>
</head>

<body>

  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
          <div class="row">
            <div class="col">
              <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                Form Edit Nama Barang
              </h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
            <div class=" row form-group">
              <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
              <div class="col-md-9">
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $brg['nama_barang']; ?>">
              </div>
            </div>
            <div class="row form-group">
              <label class="col-md-3 text-md-right" for="harga">Harga</label>
              <div class="col-md-9">
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $brg['harga']; ?>">
              </div>
            </div>
            <div class="row form-group">
              <label class="col-md-3 text-md-right" for="stok">Stok</label>
              <div class="col-md-9">
                <input type="text" name="stok" id="stok" class="form-control" value="<?= $brg['stok']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 img-edit">
                <label style="margin-left: -30px;">Img</label>
                <img src="<?= "img/" . $brg['gambar']; ?>" class="img-thumbnail" width="90px">
              </div>
              <div class="col-sm-6 ml-auto img-browse">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar">
                  <label class="custom-file-label" for="gambar">Choose file</label>
                </div>
              </div>
            </div>
            <div class="row form-group mt-3">
              <div class="col-md-9 offset-md-3">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



</body>

</html>