<?php

function url_get_title($url){
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    
    // get the code of request
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // FAIL
    if ($httpCode == 400) return $url;
    
    // SUCCEED!
    if ($httpCode == 200)
        {
        $str = file_get_contents($url);
        if (strlen($str) > 0)
            {
            $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
            preg_match("/\<title\>(.*)\<\/title\>/i", $str, $title); // ignore case
            return $title[1];
            }
        }
}


//$valoresParaSubmeter = array('key1' => 'valor1', 'key2' => 'valor2');
$ch = curl_init("https://www.globo.com/hsduahdusahduahsudhausdhaushdas/");


curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HEADER => true,
    CURLINFO_HEADER_OUT => true,
    CURLOPT_HTTPHEADER => [
        "https://www.globo.com/hsduahdusahduahsudhausdhaushdas/",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36"
    ],
    CURLOPT_ENCODING => '',
    CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS]); 
//json_encode($ch);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$request  = curl_getinfo($ch, CURLINFO_HEADER_OUT);
//echo $output = curl_exec($ch);
//print_r(curl_getinfo($ch));
/*$info = curl_getinfo($ch);
echo $info['http_code'];*/


curl_close($ch);

echo $request;
echo 'status: '.$httpcode;
// echo $data;

$str = trim(preg_replace('/\s+/', ' ', $data)); // supports line breaks inside <title>
preg_match("/\<title\>(.*)\<\/title\>/i", $str, $title); // ignore case
echo $title[1];
//echo ($httpcode>=200 && $httpcode<300) ? $data : "false";

?>