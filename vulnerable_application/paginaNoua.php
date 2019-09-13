<!DOCTYPE html>
<html>
<head>
	<title> Pagina2</title>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
</head>
<body background="pic.jpg">
<form method="post" name ="myform" id="myform" action="login.php">
<?php session_start();
	$util = $_SESSION['utilizator'];
	echo 'Hello, '.$util;
?>
</form>

</body>
</html>