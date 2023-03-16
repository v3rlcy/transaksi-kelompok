<?php

$conn = mysqli_connect("localhost", "root", "", "db_penjualan");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function filterProduk($keyword)
{
    $query = "SELECT * FROM tbproduk WHERE
        idProduk LIKE '%$keyword%' OR
        namaProduk LIKE '%$keyword%' OR
        kategori LIKE '%$keyword%'
    ";

    return query($query);
}
