<?php 

require "../../controllers/ProdukController.php";
if (deleteProduk($_GET['id']) > 0) {
    header("Location: produk.php");
}