<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_penjualan');

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


/**
 * Insert barang
 */
function insertProduk($data)
{
  global $conn;

  $prefix = "P-";
  $getId = mysqli_query($conn, "SELECT idProduk FROM tbproduk ORDER BY idProduk DESC LIMIT 1");
  $id = mysqli_fetch_assoc($getId);
  if (!$id) {
    $id = "P-000";
  } else {
    $id = $id['idProduk'];
  }
  $currentId = (int)explode("-", $id)[1] + 1;

  $idProduk = str_pad($currentId, 3, "0", STR_PAD_LEFT);
  $idProduk = $prefix . $idProduk;

  $namaProduk = htmlspecialchars($data['namaProduk']);
  $kategori = htmlspecialchars($data['kategori']);
  $satuan = htmlspecialchars($data['satuan']);
  $hargaJual = htmlspecialchars($data['hargaJual']);
  $hargaBeli = htmlspecialchars($data['hargaBeli']);
  $totalStok = htmlspecialchars($data['totalStok']);

  $query = "INSERT INTO tbproduk VALUES ('$idProduk', '$namaProduk', '$kategori', '$satuan', '$hargaJual', '$hargaBeli', '$totalStok')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function deleteProduk($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tbproduk WHERE idProduk = $id");
  return mysqli_affected_rows($conn);
}

function editProduk($data)
{
  global $conn;

  $idProduk = $data['idProduk'];
  $namaProduk = htmlspecialchars($data['namaProduk']);
  $kategori = htmlspecialchars($data['kategori']);
  $satuan = htmlspecialchars($data['satuan']);
  $hargaJual = htmlspecialchars($data['hargaJual']);
  $hargaBeli = htmlspecialchars($data['hargaBeli']);
  $totalStok = htmlspecialchars($data['totalStok']);

  $query = "UPDATE tbproduk SET 
    idProduk = '$idProduk',
    namaProduk = '$namaProduk',
    kategori = '$kategori',
    satuan = '$satuan',
    hargaJual = '$hargaJual',
    hargaBeli = '$hargaBeli',
    totalStok = '$totalStok'
    WHERE idProduk = '$idProduk'
  ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);

function dataProduk($cari)
{
  global $conn;
  $query = "SELECT * FROM tbproduk WHERE 
    idProduk LIKE '%$cari%' OR
    namaProduk LIKE '%$cari%' OR
    kategori LIKE '%$cari%' OR
    hargaJual LIKE '%$cari%' 
    ";
  return mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

}
