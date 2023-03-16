<?php

require '../../function.php';

$produk = query('SELECT * FROM tbproduk');

if(isset($_POST['cari'])){
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Welcome to JRV Mart</h1>
        </div>
        <h4>List Barang</h4>


        <a href="add.php">Add Product</a>

        <div class="form-group">
            <form action="" method="post">
                <div class="row">
                    <div class="input-group mb-2">
                        <input type="text" name="keyword" class="form-control" autofocus placeholder="Cari Produk" autocomplete="off" id="keyword">
                        <button class="btn btn-info" type="submit" name="cari" id="tombol-cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
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

        <tr>
            <td>
                <b>Tanggal</b>
            </td>
            <td>
                <input type="datetime-local" readonly value=<?php echo date("j f y, g:i"); ?> name="tanggal">
            </td>
        </tr>

    </div>
</body>

</html>