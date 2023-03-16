<?php

require '../../function.php';

$produk = query('SELECT * FROM tbproduk');

if (isset($_POST['cari'])) {
    $produk = filterProduk($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">>
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../../index.php">JRV Mart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="views/produk/produk.php">Produk</a>
                    <a class="nav-link" href="views/transaksi/transaksi.php">Transaksi</a>
                    <a class="nav-link" href="views/struk/struk.php">Struk</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="page-header">
            <h1>Welcome to JRV Mart</h1>
        </div>
        <h5>List Barang</h5>


        <a href="add.php" class="btn btn-primary">Add Product</a>

        <div class="form-group mt-3">
            <form action="" method="post">
                <div class="row">
                    <div class="input-group mb-2">
                        <input type="text" name="keyword" class="form-control" autofocus placeholder="Cari Produk" autocomplete="off" id="keyword">
                        <button class="btn btn-info" type="submit" name="cari" id="tombol-cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <tr>
            <td>
                <?php echo "Tanggal " . date("Y/m/d") . "<br>"; ?>
            </td>
                    
        </tr>

        <table class="table table-bordered border-primary text-center mt-2">
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Berat Produk</th>
                <th>Satuan</th>
                <th>Harga Jual</th>
                <th>Total Stok</th>
                <th>Edit or Delete Product</th>
            </tr>

            <?php
            foreach ($produk as $row) : ?>
                <tr>
                    <td><?= $row['idProduk'] ?></td>
                    <td><?= $row['namaProduk'] ?></td>
                    <td><?= $row['kategori'] ?></td>
                    <td><?= $row['beratProduk'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td><?= $row['hargaJual'] ?></td>
                    <td><a href="edit.php?id=<?= $row['idProduk'] ?>" class="btn btn-success">Edit</a></td>
                    <td><a href="delete.php?id=<?= $row['idProduk'] ?>" class="btn btn-success">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>

</html>