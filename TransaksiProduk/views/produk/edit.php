<?php
require '../../controllers/ProdukController.php';

$idProduk = $_GET['id'];
$produk = query("SELECT * FROM tbproduk WHERE idProduk = '$idProduk'")[0];

if (isset($_POST["submit"])) {
    if (editProduk($_POST) > 0) {
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
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-5">
        <div class="page-header">
            <h1>Update Produk</h1>
        </div>


        <form action="" method="POST">

            <ul class="mt-3">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" value="<?= $produk['idProduk'] ?>" name="idProduk">
                        <div class="checkbox">
                            <label class="form-label" for="produk">Nama Produk</label>
                            <input type="text" value="<?= $produk['namaProduk'] ?>" class="form-control" name="namaProduk">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="jual">Harga Jual</label>
                            <input type="number" name="hargaJual" value="<?= $produk['hargaJual'] ?>"class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="totalStok">Total Stok</label>
                            <input type="number" name="totalStok" value="<?= $produk['totalStok'] ?>"class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3" >
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="berat">Kategori Produk</label>
                            <select name="kategori" id="kategori">
                                <option selected value="<?= $produk['kategori'] ?>"><?= $produk['kategori'] ?></option>
                                <option value="daging">Daging</option>
                                <option value="sayur">Sayur</option>
                                <option value="buah">Buah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="berat">Berat Produk</label>
                            <input type="number" name="beratProduk" value="<?= $produk['beratProduk'] ?>">
                            <select name="satuan" id="satuan">
                                <option value="<?= $produk['satuan'] ?>" selected><?= $produk['satuan'] ?></option>
                                <option value="kilogram">KG</option>
                                <option value="gram">G</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <button type="submit" name="submit" class="btn btn-primary">Update Produk</button>
                            <button type="reset" name="reset" class="btn btn-info">Reset</button>
                        </div>
                    </div>
                </div>
            </ul>
        </form>
    </div>
</body>

</html>