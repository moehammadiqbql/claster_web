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


function hapus($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");

  return mysqli_affected_rows($conn);
}

function edit($data)
{
  global $conn;
  $id = $data["id_barang"];
  $nama = htmlspecialchars($data["nama_barang"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE barang SET 
            nama_barang = '$nama',
            harga = '$harga',
            stok = '$stok',
            gambar = '$gambar'
          WHERE id_barang = $id
        ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
