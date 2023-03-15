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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="../../">JRV Mart</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="../produk/produk.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="../../index.php">Transaksi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <h3>Data Produk</h3>
    <a class="btn btn-success" href="frm_produk.php">Tambah Produk</a>
    <table class="table table-bordered border-primary text-center mt-2">
      <tr class="table-primary">
        <th>No.</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Total Stok</th>
        <th>Action</th>
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
            <a class="btn btn-warning" href="edit.php?id=<?= $data['idProduk'] ?>">Edit Produk</a> ||
            <a class="btn btn-danger" href="delete.php?id=<?= $data['idProduk'] ?>">Hapus Produk</a>
          </td>

        <?php
      }
        ?>
        </tr>
    </table>
  </div>
</body>

</html>