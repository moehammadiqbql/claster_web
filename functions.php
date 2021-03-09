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
  $gambar = $_FILES['gambar']['name'];

  move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $gambar);

  if (!$gambar) {
    $gambar = "defaul-t.jpg";
  }

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
  $gambar = $_FILES['gambar']['name'];

  move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $gambar);

  if (!$gambar) {
    $gambar = "defaul-t.jpg";
  }

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


function transaksi($data)
{
  global $conn;
  $tanggal = htmlspecialchars($data['tanggal']);
  $id_barang = htmlspecialchars($data["id_barang"]);
  $jumlah = htmlspecialchars($data["jumlah"]);
  $total = htmlspecialchars($data["total"]);

  $query = "INSERT INTO transaksi VALUES 
				( '','$tanggal', '$id_barang', '$jumlah', '$total' )";

  // var_dump($query);
  // die;
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
