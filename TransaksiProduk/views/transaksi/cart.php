<?php
session_start();
require '../../function.php';

$produk = query("SELECT * FROM tbproduk WHERE idProduk='" . $_GET["id"] . "'");

$produkArray = array(
  'idProduk' => $produk[0]['idProduk'],
  'namaProduk' => $produk[0]['namaProduk'],
  'hargaProduk' => $produk[0]['hargaJual'],
  'jumlahProduk' => 1
);



highlight_string("<?php " . var_export($_SESSION['cart'], true) . " ?>");
