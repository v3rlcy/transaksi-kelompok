<?php
require '../../function.php';
session_start();

$_SESSION['idProduk'] = $_GET['id'];
$_SESSION['namaProduk'] = $_GET['nama'];
$_SESSION['jumlah'] = $_GET['jumlah'];
$_SESSION['total'] = $_GET['total'];

header("Location: transaksi.php");