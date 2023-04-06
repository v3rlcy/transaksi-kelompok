<?php
session_start();
require '../../function.php';

$struk = query("SELECT tbproduk.namaProduk, tbtransaksidetil.qty, tbtransaksi.totalTransaksi, tbtransaksi.totalPembayaran, tbtransaksi.totalPengembalian FROM `tbtransaksidetil` INNER JOIN tbproduk ON tbtransaksidetil.idProduk = tbproduk.idProduk INNER JOIN tbtransaksi ON tbtransaksidetil.id = tbtransaksi.idTransaksi WHERE tbtransaksidetil.id = id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../../index.php">JRV Mart</a>
            <div class="navbar-nav">
                <a class="nav-link" href="../produk/produk.php">Produk</a>
                <a class="nav-link" href="../transaksi/transaksi.php">Transaksi</a>
                <a class="nav-link active" aria-current="page" href="#">Struk</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="page-header">
            <h1>Welcome to JRV Mart</h1>
        </div>

        <table border="1" style="width:100%">
            <tr>
                <td>Nama Produk</td>
                <td>qty</td>
                <td>Total Transaksi</td>
                <td>Total Pembayaran</td>
                <td>Total Pengembalian</td>
            </tr>

            <?php
            foreach ($struk as $row) : ?>
                <tr>
                    <td><?= ['namaProduk'] ?></td>
                    <td><?= ['qty'] ?>x</td>
                    <td>Rp. <?= ['totalTransaksi'] ?></td>
                    <td>Rp. <?= ['totalPembayaran'] ?></td>
                    <td>Rp. <?= ['totalPengembalian'] ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>



        </table>

    </div>

</body>

</html>