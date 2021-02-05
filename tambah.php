<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
  } else {
    echo "<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'index.php';
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
  <title>Tambah Data Barang</title>
</head>

<body>
  <h1>Tambah Data Barang</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="nama_barang">Nama Barang : </label>
        <input type="text" name="nama_barang" id="nama_barang" required>
      </li>
      <li>
        <label for="harga">Harga : </label>
        <input type="text" name="harga" id="harga" required>
      </li>
      <li>
        <label for="stok">Stok : </label>
        <input type="text" name="stok" id="stok">
      </li>
      <li>
        <label for="gambar">Gambar : </label>
        <input type="text" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Tambah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>