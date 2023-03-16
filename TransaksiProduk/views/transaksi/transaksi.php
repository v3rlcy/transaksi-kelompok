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
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../../index.php">JRV Mart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../produk/produk.php">Produk</a>
                    <a class="nav-link active" aria-current="page" href="#">Transaksi</a>
                    <a class="nav-link" href="../struk/struk.php">Struk</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="page-header">
            <h1>Welcome to JRV Mart</h1>
        </div>

        <div>
            <div>
                <h5>List Produk</h5>
            </div>
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

            <table class="table table-bordered border-primary text-center mt-2">
                <tr class="table-warning">
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>

                <?php foreach ($produk as $row) : ?>
                    <tr>
                        <td><?= $row['idProduk'] ?></td>
                        <td><?= $row['namaProduk'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['hargaJual'] ?></td>
                        <td><a href="" class="btn btn-success">Add To Cart</a></td>
                    </tr>
                <?php endforeach; ?>
                </th>
            </table>
        </div>
        <div>
            <div>
                <h4>Kasir</h4>
                <a href="">Reset Keranjang</a>
            </div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td>
                            <?php echo "Tanggal " . date("j F Y, G:i") . "<br>"; ?>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered border-primary text-center mt-2">
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>

                </th>
            </table>
            </div>
        </div>
    </div>

</body>

</html>