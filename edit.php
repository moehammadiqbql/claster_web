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
				document.location.href = 'index.php';
			</script>
		";
  } else {
    echo "<script>
				alert('Data gagal diubah');
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
  <title>Edit Data Barang</title>
</head>

<body>
  <h1>Edit Data Barang</h1>

  <form action="" method="post">
    <ul>
      <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
      <li>
        <label for="nama_barang">Nama Barang : </label>
        <input type="text" name="nama_barang" id="nama_barang" required value="<?= $brg['nama_barang']; ?>">
      </li>
      <li>
        <label for="harga">Harga : </label>
        <input type="text" name="harga" id="harga" required value="<?= $brg['harga']; ?>">
      </li>
      <li>
        <label for="stok">Stok : </label>
        <input type="text" name="stok" id="stok" value="<?= $brg['stok']; ?>">
      </li>
      <li>
        <label for=" gambar">Gambar : </label>
        <input type="text" name="gambar" id="gambar" value="<?= $brg['gambar']; ?>">
      </li>
      <li>
        <button type=" submit" name="submit">Ubah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>