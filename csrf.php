<?php

$url = 'php/update-cart.php';
$data = array('quantity_ZamZung7' => 10);

// use key 'http' even if you send the request to https://...
$options = array(
    'http://localhost:8888/' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
  echo "False";
} else {
  echo "True";
}

var_dump($result);

echo "Done";

?>
