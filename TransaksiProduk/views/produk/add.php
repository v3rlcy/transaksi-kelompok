<?php
require '../../controllers/ProdukController.php';


if (isset($_POST["submit"])) {
  if (addProduk($_POST) > 0) {
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
            <h1>Tambahkan Produk Baru</h1>
        </div>

        <form action="" method="POST">

            <ul>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="produk">Nama Produk</label>
                            <input type="text" name="namaProduk" class="form-control">
                        </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="jual">Harga Jual</label>
                            <input type="number" name="hargaJual" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="totalStok">Total Stok</label>
                            <input type="number" name="totalStok"class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="form-label" for="berat">Kategori Produk</label>
                            <select name="kategori" id="kategori">
                                <option value="" disabled selected>Kategori</option>
                                <option value="Daging">Daging</option>
                                <option value="Sayur">Sayur</option>
                                <option value="Buah">Buah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="control-label col-sm-2" for="berat">Berat Produk</label>
                            <input type="number" name="beratProduk">
                            <select name="satuan" id="satuan">
                                <option value="" disabled selected>Satuan</option>
                                <option value="Kilogram">KG</option>
                                <option value="Gram">G</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
                            <button type="reset" name="reset" class="btn btn-info">Reset</button>
                        </div>
                    </div>
                </div>
            </ul>
        </form>
    </div>
</body>

</html>