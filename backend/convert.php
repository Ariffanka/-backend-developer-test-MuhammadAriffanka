<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//mengkonversi harga Bitcoin ke IDR
function convertBitcoinToIDR($bitcoinPrice) {
    $bitcoinToIDR = 500000000;

    //konversi
    $idrPrice = $bitcoinPrice * $bitcoinToIDR;

    return $idrPrice;
}

$bitcoinPrice = isset($_GET['harga']) ? floatval($_GET['harga']) : null;

if ($bitcoinPrice !== null) {
    $idrPrice = convertBitcoinToIDR($bitcoinPrice);

    $response = array(
        'bitcoin_price' => $bitcoinPrice,
        'idr_price' => $idrPrice
    );


    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Parameter harga tidak ditemukan'));
}
?>
