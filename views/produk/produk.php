<?php
require '../../controllers/ProdukController.php';
$dataProduk = query("SELECT * FROM tbproduk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk YPS</title>
</head>

<body>
  <h3>Data Produk</h3>
  <a href="frm_produk.php">Tambah Produk</a>
  <table>
    <tr>
      <th>No.</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Satuan</th>
      <th>Harga Jual</th>
      <th>Harga Beli</th>
      <th>Total Stok</th>
    </tr>
    <?php
    foreach ($dataProduk as $data) {
    ?>
      <tr>
        <td><?= $data['idProduk'] ?></td>
        <td><?= $data['namaProduk'] ?></td>
        <td><?= $data['kategori'] ?></td>
        <td><?= $data['satuan'] ?></td>
        <td><?= $data['hargaJual'] ?></td>
        <td><?= $data['hargaBeli'] ?></td>
        <td><?= $data['totalStok'] ?></td>
        <td>
          <a href="edit.php?id=<?= $data['idProduk'] ?>">Edit Produk</a>
          <a href="delete.php?id=<?= $data['idProduk'] ?>">Hapus Produk</a>
        </td>

      <?php
    }
      ?>
      </tr>
  </table>
</body>

</html>