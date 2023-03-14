<?php
require '../../controllers/ProdukController.php';

$dataProduk = query("SELECT * FROM tbproduk");

if (isset($_POST["submit"])) {
  if (insertProduk($_POST) > 0) {
    echo 'Data telah ditambahkan';
    header("Location: produk.php");
  } else {
    echo 'Data gagal ditambahkan';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <h1>Form Produk</h1>

  <form action="" method="post">

    <ul>
      <li>
        <label for="produk">Nama Produk</label>
        <input type="text" name="namaProduk">
      </li>
      <li>
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
          <option value="" disabled selected>Pilih kategori</option>
          <option value="daging">Daging</option>
          <option value="sayur">sayur</option>
          <option value="buah">buah</option>
        </select>
      </li>
      <li>
        <label for="satuan">Satuan</label>
        <select name="satuan" id="satuan">
          <option value="" disabled selected>Pilih satuan</option>
          <option value="kilogram">kilogram</option>
          <option value="gram">gram</option>
        </select>
      </li>
      <li>
        <label for="hargaJual">Harga Jual</label>
        <input type="number" name="hargaJual">
      </li>
      <li>
        <label for="hargaBeli">Harga Beli</label>
        <input type="number" name="hargaBeli">
      </li>
      <li>
        <label for="totalStok">Total Stok</label>
        <input type="number" name="totalStok">
      </li>
      <li>
        <button type="submit" name="submit">Tambah Produk</button>
      </li>
    </ul>
  </form>
  
</body>

</html>