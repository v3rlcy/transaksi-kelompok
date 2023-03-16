<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRV MARKET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">JRV Mart</a>
            <div class="navbar-nav">
                <a class="nav-link" href="views/produk/produk.php">Produk</a>
                <a class="nav-link" href="views/transaksi/transaksi.php">Transaksi</a>
                <a class="nav-link" href="views/struk/struk.php">Struk</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="page-header">
            <h1>Welcome to JRV Market</h1>
        </div>

        <div class="container d-flex flex-wrap gap-3 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Our Products</h5>
                    <p class="card-text">Lihat produk kami disini!</p>
                    <a href="views/produk/produk.php" class="btn btn-primary">Tekan</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <p class="card-text">Lakukan transaksi disini!</p>
                    <a href="views/transaksi/transaksi.php" class="btn btn-primary">Tekan</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Struk</h5>
                    <p class="card-text">Lihat riwayat belanja disini!</p>
                    <a href="views/struk/struk.php" class="btn btn-primary">Tekan</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>