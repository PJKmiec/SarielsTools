<?php
const api_key = "24006f042f508c7e9dfdf032b8450e19";
const base_url = "https://rebrickable.com/api/v3/lego/";

$item = isset($_GET["item"]) ? $_GET["item"] : null;

$ch = curl_init();

$request = array();
$request['method'] = 'GET';
$request['url'] = base_url.'/parts/'.$item.'/colors/?key='.api_key;
curl_setopt($ch, CURLOPT_URL, $request['url']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request['method']);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

header('Content-type: application/json');
echo $result;
curl_close($ch);

?>
