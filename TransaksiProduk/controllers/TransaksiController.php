<?php

include "../../function.php";

function addTransaksiDetil($idTransaksi, $cart)
{
  global $conn;


  $idProduk = $cart['idProduk'];
  $jumlahProduk = $cart['jumlahProduk'];

  $query = "INSERT INTO tbtransaksidetil VALUES ('$idTransaksi', '$idProduk', $jumlahProduk)";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function addTransaksi($data)
{
  global $conn;

  $prefix = "T-";
  $getId = mysqli_query($conn, "SELECT idTransaksi FROM tbtransaksi ORDER BY idTransaksi DESC LIMIT 1");
  $id = mysqli_fetch_assoc($getId);
  if (!$id) {
    $id = "T-000";
  } else {
    $id = $id['idTransaksi'];
  }
  $currentId = (int)explode("-", $id)[1] + 1;

  $idTransaksi = str_pad($currentId, 3, "0", STR_PAD_LEFT);
  $idTransaksi = $prefix . $idTransaksi;

  $waktuTransaksi = date("Y-m-d H:i:s");
  $totalTransaksi = htmlspecialchars($data['totalTransaksi']);
  $totalPembayaran = htmlspecialchars($data['totalPembayaran']);
  $totalPengembalian = $totalPembayaran - $totalTransaksi;

  $query = "INSERT INTO tbtransaksi VALUES ('$idTransaksi', '$waktuTransaksi', '$totalTransaksi', '$totalPembayaran', '$totalPengembalian')";
  mysqli_query($conn, $query);

  foreach ($_SESSION['cart'] as $cart) {
    addTransaksiDetil($idTransaksi, $cart);
    $idProduk = $cart['idProduk'];
    $sisaProduk = query("SELECT * FROM tbproduk WHERE idProduk = '$idProduk'");
    $sisaStok = $sisaProduk[0]['totalStok'] - $cart['jumlahProduk'];
    $queryUpdateStok = "UPDATE tbproduk SET totalStok = '$sisaStok' WHERE idProduk = '$idProduk'";
    mysqli_query($conn, $queryUpdateStok);
  }

  unset($_SESSION['cart']);
  return mysqli_affected_rows($conn);
}
