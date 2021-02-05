<?php
require 'functions.php';

$barang = query('SELECT * FROM barang');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
</head>

<body>
  <h1>Data Barang</h1>

  <a href="tambah.php">Tambah data barang</a>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($barang as $b) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $b['nama_barang']; ?></td>
        <td><?= $b['harga']; ?></td>
        <td><?= $b['stok']; ?></td>
        <td><img src="img/<?= $b['gambar']; ?>" width='70px'></td>
        <td>
          <a href="">edit |</a>
          <a href="hapus.php?id=<?= $b["id_barang"]; ?>" onclick="return confirm('yakin?')">hapus</a>
        </td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>

</html>