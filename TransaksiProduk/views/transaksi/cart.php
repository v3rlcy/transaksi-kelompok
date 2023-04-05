<?php
session_start();
require '../../function.php';

$produk = query("SELECT * FROM tbproduk WHERE idProduk='" . $_GET["id"] . "'"); // dapetin data produk sesuai dengan id yang dikirim dari transaksi.php (a href="cart.php?id=blabla")

$produkArray = array( // data tadi dimasukkin ke array
  'idProduk' => $produk[0]['idProduk'], // $produk[0] karena query ($produk) di atas mengembalikan array, jadi harus diakses dengan indeks 0
  'namaProduk' => $produk[0]['namaProduk'],
  'hargaProduk' => $produk[0]['hargaJual'],
  'jumlahProduk' => 1
);

if (!isset($_SESSION['cart'])) { // cek kalau session cartnya ga ada (null)
  $_SESSION['cart'][] = $produkArray; // tambahin data produk ke session cart + buatin session cart
} else { // kalau session cartnya ada (ada data)
  foreach ($_SESSION['cart'] as $key => $storedProduk) { // loop session cart ambil array index sama datanya 
    $ids[] = $storedProduk['idProduk']; // ambil semua id produk yang ada di session cart


    if ($produkArray['idProduk'] == $storedProduk['idProduk']) { // kalau id produk ada yang sama dengan id yang ada di session cart (datanya sama otomatis qty/jumlah dan harga bertambah)
      $_SESSION['cart'][$key]['jumlahProduk'] += 1; // akses session cart index arraynya terus access array jumlahProduk + 1
      $_SESSION['cart'][$key]['hargaProduk'] += $produkArray['hargaProduk']; // tambahin harga produknya juga (sama kaya +1 cuman sekarang ambil data hargaProduk)
    }
  }

  if (!in_array($produkArray['idProduk'], $ids)) { // kalau produk yang ditambahin ga ada di session cart (id produk baru tidak ada di session cart)
    $_SESSION['cart'][] = $produkArray; // tambahin data produk ke session cart
  }
}


header("Location: transaksi.php");

highlight_string("<?php " . var_export($_SESSION['cart'], true) . " ?>"); // ini abaikan aja soalnya buat debug, dicomment/hapus nanti gapapa
