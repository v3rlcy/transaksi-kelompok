<?php
session_start();
require '../../function.php';

$struk = query("SELECT tbtransaksi.idTransaksi, tbtransaksi.waktuTransaksi, tbproduk.namaProduk, tbtransaksidetil.qty, tbtransaksi.totalTransaksi, tbtransaksi.totalPembayaran, tbtransaksi.totalPengembalian FROM `tbtransaksidetil` INNER JOIN tbproduk ON tbtransaksidetil.idProduk = tbproduk.idProduk INNER JOIN tbtransaksi ON tbtransaksidetil.id = tbtransaksi.idTransaksi WHERE tbtransaksidetil.id = id");
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
                <a class="nav-link active" aria-current="page" href="#">Riwayat Transaksi</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="page-header">
            <h1>Welcome to JRV Mart</h1>
        </div>

        <table class="table table-bordered">
            <tr class="table table-warning">
                <td>ID Pembayaran</td>
                <td>Waktu Pembayaran</td>
                <td>Nama Produk</td>
                <td>qty</td>
                <td>Total Transaksi</td>
                <td>Total Pembayaran</td>
                <td>Total Pengembalian</td>
            </tr>

            <?php
            foreach ($struk as $row) : ?>
                <tr>
                    <td><?= $row['idTransaksi'] ?></td>
                    <td><?= $row['waktuTransaksi'] ?></td>
                    <td><?= $row['namaProduk'] ?></td>
                    <td><?= $row['qty'] ?>x</td>
                    <td>Rp. <?= $row['totalTransaksi'] ?></td>
                    <td>Rp. <?= $row['totalPembayaran'] ?></td>
                    <td>Rp. <?= $row['totalPengembalian'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</body>

</html>