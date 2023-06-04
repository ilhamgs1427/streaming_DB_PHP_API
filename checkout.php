<?php

// Assuming you have already established a database connection

require "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $response = array();
    $user_id = $_POST['user_id'];
    $paket = $_POST['paket'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $date = $_POST['date'];
 



    // cek user
    $cekUser = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id' ");
    if ($cekUser) {
        $fetchUser = mysqli_fetch_array($cekUser);
        $fetchnamaUser = $fetchUser['name'];
        $fetchEmail = $fetchUser['email'];
    } else {
        $response['value'] = 0;
        $response['message'] = "Failed to fetch user data";
        echo json_encode($response);
        exit;
    }

    // cek product
    $cekProduct = mysqli_query($connection, "SELECT * FROM pakets WHERE name = '$paket'");
    if ($cekProduct) {
        $fetchProduct = mysqli_fetch_array($cekProduct);
       
    } else {
        $response['value'] = 0;
        $response['message'] = "Failed to fetch product data";
        echo json_encode($response);
        exit;
    }
    
   
    // masukkan data ke table order
    $insertToOrder = "INSERT INTO orders VALUES ('', '$fetchnamaUser', '$fetchEmail', '$phone', '$paket', '$date', '$message', '$metode_pembayaran',' Jika COD Tidak perlu upload','in progress',$user_id, NOW(),NOW())";
    
    if (mysqli_query($connection, $insertToOrder)) {
        $response['value'] = 1;
        $response['message'] = "Yeay, Kamu berhasil reservasi";
        echo json_encode($response);
    } else {
        $response['value'] = 2;
        $response['message'] = "Maaf, kamu gagal untuk reservasi";
        echo json_encode($response);
    }
}
