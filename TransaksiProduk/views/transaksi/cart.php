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

if (!isset($_SESSION['cart'])) { 
  $_SESSION['cart'][] = $produkArray; 
} else { 
  foreach ($_SESSION['cart'] as $key => $storedProduk) { 
    $ids[] = $storedProduk['idProduk']; 


    if ($produkArray['idProduk'] == $storedProduk['idProduk']) { 
      if ($_SESSION['cart'][$key]['jumlahProduk'] >= $produk[0]['totalStok']) {
        $_SESSION['cart'][$key]['jumlahProduk'] = $produk[0]['totalStok'];
        $_SESSION['cart'][$key]['hargaProduk'] = $produk[0]['totalStok'] * $produkArray['hargaProduk'];
        echo "<script>alert('Stok tidak mencukupi!');document.location.href='transaksi.php'</script>";
        die();
      } else {
        $_SESSION['cart'][$key]['jumlahProduk'] += 1; 
        $_SESSION['cart'][$key]['hargaProduk'] += $produkArray['hargaProduk'];
      }
    }
  }

  if (!in_array($produkArray['idProduk'], $ids)) { 
    $_SESSION['cart'][] = $produkArray; 
  }
}


header("Location: transaksi.php");

highlight_string("<?php " . var_export($_SESSION['cart'], true) . " ?>"); 
