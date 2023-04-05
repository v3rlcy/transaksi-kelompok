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
</head>

<body>
  <h2>Pembayaran</h2>
  <form action="" method="post">
    <table>
      <tr>
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
    Subtotal : Rp. <?= $subtotal ?> <input hidden type="number" name="totalTransaksi" value="<?= $subtotal ?>"> <br>
    Pembayaran : <input type="number" name="totalPembayaran" required>
    <button type="submit" name="prosesBayar">Bayar</button>
  </form>
</body>

</html>