<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Add / Remove Table Rows</title>
<style type="text/css">
    table{
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 5px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>


<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/register_user",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"email\":\"jack@gmail.com\",\n\t\"password\":\"jack123\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    echo "<pre>";
    print_r(json_decode($response)->status == false);die;
  echo $response;
} 
die;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"email\":\"jack@gmail.com\",\n\t\"password\":\"jack123\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    echo "<pre>";
    print_r(json_decode($response)->access_token);die;
    
} ?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/generate_wallet",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"access_token\":\"02755d2d986041acaf51a81ae954ae4f9e1498cdd8039cf25840dd06b19d1e66bfd1f9c73099660fcfff833dfc8b66aedeb444550b3543c6fde938f17c9b150a\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/get_address",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"access_token\":\"02755d2d986041acaf51a81ae954ae4f9e1498cdd8039cf25840dd06b19d1e66bfd1f9c73099660fcfff833dfc8b66aedeb444550b3543c6fde938f17c9b150a\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/get_private_key",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"access_token\":\"02755d2d986041acaf51a81ae954ae4f9e1498cdd8039cf25840dd06b19d1e66bfd1f9c73099660fcfff833dfc8b66aedeb444550b3543c6fde938f17c9b150a\",\n\t\"mnemonics\":\"bargain smoke allow side theme kid bid traffic place address divorce witness\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://165.227.138.170:3001/logout",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"access_token\":\"a7897679d8bf34afe4a47753f190effff23caf236d06b63e2038c211212129733378a404e41463348a02d410c7fabe75a750527d7faf56a8f63f28727d3deb60\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: asjd8293jejq8wjeF@GR5a_ksjdTSDA%%23",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>




</body> 
</html>