<?php
require '../../function.php';

/**
 * Insert barang
 */
function insertProduk($data)
{
  global $conn;

  $namaProduk = htmlspecialchars($data['namaProduk']);
  $kategori = htmlspecialchars($data['kategori']);
  $satuan = htmlspecialchars($data['satuan']);
  $hargaJual = htmlspecialchars($data['hargaJual']);
  $hargaBeli = htmlspecialchars($data['hargaBeli']);
  $totalStok = htmlspecialchars($data['totalStok']);

  $query = "INSERT INTO tbproduk VALUES ('', '$namaProduk', '$kategori', '$satuan', '$hargaJual', '$hargaBeli', '$totalStok')";

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
}
