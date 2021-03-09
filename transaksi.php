<?php
require 'functions.php';

$transaksi = query('SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang');

// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil ditambahkan atau tidak
  if (transaksi($_POST) > 0) {
    echo "
			<script>
				alert('Transaksi berhasil');
        document.location.href = 'tambah.php';
			</script>
		";
  } else {
    echo "<script>
				alert('Transaksi gagal');
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

  <title>Transaksi Barang</title>
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
          <a class="nav-link" href="#">Transaksi</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>Data Transaksi</h1>

    <div class="row mt-4">
      <div class="col-md-4">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#transaksiModal">Tambah Transaksi</a>
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-md-8">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Barang</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $t['tanggal']; ?></td>
                <td><?= $t['nama_barang']; ?></td>
                <td><?= $t['jumlah']; ?></td>
                <td><?= $t['total']; ?></td>
              </tr>
          </tbody>
          <?php $i++; ?>
        <?php endforeach; ?>
        </table>

      </div>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transaksiModalLabel">Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group row">
              <label for="tanggal" class="col col-form-label">Tgl</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tanggal" name="tanggal" value=" <?= date("Y-m-d H:i:s"); ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="row">
                <div class="col-md-2" style="margin-left: 14px;">
                  <label for="id_barang">Barang</label>
                </div>
                <div class="col-md-2" style="margin-left: 39px;">
                  <select name="id_barang" id="id_barang" onchange="changeValue(this.value)">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM barang");
                    $jsArray = "var dtBrg = new Array();\n";
                    while ($data = mysqli_fetch_array($result)) {
                      echo "<option value = $data[id_barang]> $data[nama_barang] </option>";
                      $jsArray .= "dtBrg['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "'};";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="harga" class="col col-form-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="jumlah" class="col col-form-label">Jumlah</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="jumlah" name="jumlah" onkeyup="hitung();">
              </div>
            </div>
            <div class="form-group row">
              <label for="total" class="col col-form-label">Total</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="total" name="total" onkeyup="hitung();">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Transaksi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer mt-5 text-center ">
    <h6 class="pt-3" style="font-style: italic;">Copyright by MuhammadIqbal. 2021</h6>
  </footer>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script>
    <?php echo $jsArray; ?>
    //menampilkan perubahan harga ketika nama barang dirubah klik
    function changeValue(id_barang) {
      document.getElementById('harga').value = dtBrg[id_barang].harga;
    };
    //menghitung total = jumlah * harga
    function hitung() {
      var jumlah = document.getElementById('jumlah').value;
      var harga = document.getElementById('harga').value;
      var result = parseInt(jumlah) * parseInt(harga);
      if (!isNaN(result)) {
        document.getElementById('total').value = result;
      }
    }
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>