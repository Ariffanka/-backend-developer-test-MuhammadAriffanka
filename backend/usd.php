<?php

//agar bisa mendapat akses
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

#url api(data)
$url= file_get_contents('https://api.coindesk.com/v1/bpi/currentprice.json');

//mengubah data ke array PHP
$data=json_decode($url, true);

#cek jika ada hasil
if($data){
    #ngambil harga usd
    $price= $data['bpi']['USD']['rate'];
    $time= $data['time']['updated'];

    $response['status'] = 'success';
    $response['data'] = array(
        'bitcoin_price' => $price,
        'time' => $time
    );
} else {
    // Menambahkan pesan kesalahan ke dalam respons jika terjadi masalah
    $response['status'] = 'error';
    $response['message'] = 'Gagal mengambil data harga Bitcoin dari API atau data yang diharapkan tidak tersedia.';
}

// Menghasilkan output JSON
header('Content-Type: application/json');
echo json_encode($response);