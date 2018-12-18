<?php
$url = 'http://localhost/api/server/index'; 
$ch = curl_init($url);  
curl_setopt($ch, CURLOPT_HTTPGET, true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
$response_json = curl_exec($ch); 
print_r($response_json);
curl_close($ch); 
$response = json_decode($response_json, true); 

echo "<br><br>";

$url = 'http://localhost/api/server/index/7'; 
$ch = curl_init($url);  
curl_setopt($ch, CURLOPT_HTTPGET, true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
$response_json = curl_exec($ch); 
print_r($response_json);
curl_close($ch); 
$response = json_decode($response_json, true); 
?>