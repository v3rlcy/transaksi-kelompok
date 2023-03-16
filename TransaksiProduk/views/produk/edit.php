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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <div class="page-header">
            <h1>Update Produk</h1>
        </div>


        <form action="" method="POST">

            <ul>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" value="<?= $produk['idProduk'] ?>" name="idProduk">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="produk">Nama Produk</label>
                            <input type="text" value="<?= $produk['namaProduk'] ?>" name="namaProduk">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="berat">Kategori Produk</label>
                            <select name="kategori" id="kategori">
                                <option selected value="<?= $produk['kategori'] ?>"><?= $produk['kategori'] ?></option>
                                <option value="daging">Daging</option>
                                <option value="sayur">Sayur</option>
                                <option value="buah">Buah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="berat">Berat Produk</label>
                            <input type="number" name="beratProduk" value="<?= $produk['beratProduk'] ?>">
                            <select name="satuan" id="satuan">
                                <option value="<?= $produk['satuan'] ?>" selected><?= $produk['satuan'] ?></option>
                                <option value="kilogram">KG</option>
                                <option value="gram">G</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="jual">Harga Jual</label>
                            <input type="number" name="hargaJual" value="<?= $produk['hargaJual'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="totalStok">Total Stok</label>
                            <input type="number" name="totalStok" value="<?= $produk['totalStok'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
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