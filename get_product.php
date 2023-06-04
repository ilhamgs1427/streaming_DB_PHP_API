<?php
header("Content-Type: application/json");

require 'config.php';

$response = array();

$cek_product = mysqli_query($connection, "SELECT * FROM pakets");

while ($row_product = mysqli_fetch_array($cek_product)) {
    # code...
    $key['id'] = $row_product['id'];
    $key['jenis'] = $row_product['jenis'];
    $key['name'] = $row_product['name'];
    $key['deskripsi'] = $row_product['deskripsi'];
    $key['image'] = $row_product['image'];
    $key['harga'] = $row_product['harga'];
    $key['created_at'] = $row_product['created_at'];


    array_push($response, $key);
}
echo json_encode($response);