<?php

require "config.php";

$response = array();
$user_id = $_GET['id_user'];


$query_select_order = mysqli_query($connection, "SELECT * FROM orders WHERE user_id = '$user_id'");

while ($row_order = mysqli_fetch_array($query_select_order)) {
    # code..
    $key = array();
    
    $key['id'] = $row_order['id']; 
    $key['user_id'] = $row_order['user_id'];
    $key['name'] = $row_order['name'];
    $key['email'] = $row_order['email'];
    $key['phone'] = $row_order['phone'];
    $key['paket'] = $row_order['paket'];
    $key['date'] = $row_order['date'];
    $key['message'] = $row_order['message'];
    $key['metode_pembayaran'] = $row_order['metode_pembayaran'];
    $key['bukti_pembayaran'] = $row_order['bukti_pembayaran'];

    array_push($response, $key);
    }
 

echo json_encode($response);