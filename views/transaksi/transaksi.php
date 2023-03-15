<?php
require '../../controllers/ProdukController.php';
$dataProduk = query("SELECT * FROM tbproduk");

$nama = $_GET["namaProduk"];
$harga = $_GET["hargaJual"];

if(isset($_POST["cari"])) {
    $dataProduk = dataProduk($_POST["cari"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi YPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">JRV Mart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="views/produk/produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-3">Welcome To JRV Mart Pontianak</h1>
        <p>See our product here <a href="views/produk/produk.php">Produk YPS</a></p>
    </div>

    <div class="container">
        <h4>List Barang</h4>

        <div class="form-group">
            <form action="" method="POST">
                <div class="row">
                    <div class="input-group mb-2">
                        <input type="text" name="cari" class="form-control" autofocus placeholder="Masukkan cari pencarian" autocomplete="off" id="cari">
                        <button class="btn btn-info" type="submit" name="cari" id="tombol-cari">Cari!</button>
                    </div>
            </form>
        </div>
        <div>
            <table class="table table-bordered border-primary text-center mt-2">
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1;
                foreach ($dataProduk as $row) : ?>
                    <tr>
                        <td><?= $row['idProduk'] ?></td>
                        <td><?= $row['namaProduk'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['hargaJual'] ?></td>
                        <td><a class="btn btn-success" href="">Add to Cart</a></td>
                    <?php endforeach; ?>
                    </tr>
            </table>
        </div>
    </div>


    <div>
        <h1>Form Transaksi</h1>
        <div class>
            <tr>
                <td><b>Tanggal</b></td>
                <td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i"); ?>" name="tgl"></td>
            </tr>
        </div>
        <div>
            <table class="table table-bordered border-primary text-center mt-2">
                <td>No.</td>
                <td>Nama Produk</td>
                <td>Harga Jual</td>
                <td>Aksi</td>
            </table>

            
        <?php $i = 1; ?>
        <?php foreach ($keranjang as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

        </div>
    </div>
</body>


</html>