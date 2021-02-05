<?php
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'cdb_kasir');


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{
  global $conn;
  $nama = htmlspecialchars($data["nama_barang"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "INSERT INTO barang VALUES 
				( '', '$nama', '$harga', '$stok', '$gambar' )";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
