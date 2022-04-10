<?php

//$valoresParaSubmeter = array('key1' => 'valor1', 'key2' => 'valor2');
$ch = curl_init("https://www.globo.com");


curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => [
        "https://www.globo.com",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36"
    ],
    CURLOPT_ENCODING => '',
    CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS]); 
//json_encode($ch);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//echo $output = curl_exec($ch);
//print_r(curl_getinfo($ch));
/*$info = curl_getinfo($ch);
echo $info['http_code'];*/


curl_close($ch);
echo ($httpcode>=200 && $httpcode<300) ? $data : "false";

?>