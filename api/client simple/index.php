<?php
$url = 'http://localhost/api/server/index';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);

$response = json_decode($response_json, true);
print_r($response);

echo "<br><br>";

$url = 'http://localhost/api/server/index/7';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
print_r($response);

/**
 * [description] Add atau Menambahkan
 * @var array
 */
    // $data = array(
    //   'name' => 'Irfan aku ssssssssssssssssssss',
    //   'email' => 'irfan@gmail.com',
    //   'phone' => 'ABC Trading Inc.',
    //   'address' => 'sangkuriang'
    // );
    //
    // $url = 'http://localhost/api/server/index';
    // $ch = curl_init($url);
    //
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //
    // $response_json = curl_exec($ch);
    // curl_close($ch);
    // $response=json_decode($response_json, true);
    // print_r($response);

/**
 * [ description] Update
 */
    // $url = 'http://localhost/api/server/index/7'; $ch = curl_init($url);
    //
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //
    // $response_json = curl_exec($ch);
    // curl_close($ch);
    // $response=json_decode($response_json, true);
    // print_r($response);

/**
 * [description] Delete
 */
    // $url = 'http://localhost/api/server/index/18';
    // $ch = curl_init($url);
    //
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //
    // $response_json = curl_exec($ch);
    //
    // curl_close($ch);
    // $response=json_decode($response_json, true);
    // print_r($response);
