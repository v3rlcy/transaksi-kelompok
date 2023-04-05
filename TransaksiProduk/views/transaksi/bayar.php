<?php
session_start();
require '../../controllers/TransaksiController.php';

$subtotal = array_sum(array_column($_SESSION['cart'], 'hargaProduk'));

if (isset($_POST['prosesBayar'])) {
  if ($_POST['totalPembayaran'] < $subtotal) {
    echo "<script>alert('Pembayaran kurang!')</script>";
  } else {
    addTransaksi($_POST);
    header("Location: transaksi.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <h2>Pembayaran</h2>
    <form action="" method="post">
      <table class="table table-bordered border-primary text-center mt-2">
        <tr class="table-success">
          <th>Nama Produk</th>
          <th>Jumlah</th>
          <th>Total Harga</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $cart) : ?>
          <tr>
            <td><?= $cart['namaProduk'] ?></td>
            <td><?= $cart['jumlahProduk'] ?>x</td>
            <td><?= $cart['hargaProduk'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <br>
      </br>
      
      <p class="h2">Subtotal : Rp. <?= $subtotal ?> <input hidden type="number" name="totalTransaksi" value="<?= $subtotal ?>"> </p> <br>

      <ul>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label class="form-label" for="produk">Pembayaran</label>
              <input class="form-control" type="number" name="totalPembayaran" required>
            </div>
          </div>
        </div>
        </br>
        <button class="btn btn-primary" type="submit" name="prosesBayar">Bayar</button>
    </form>
  </div>
</body>



</html>