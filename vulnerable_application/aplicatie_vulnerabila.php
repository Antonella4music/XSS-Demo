<? session_start();
require('interog.inc');
if( isset($_GET['autentificare']) )
{
	$util = $_GET["utilizator"];
	$pass = $_GET["parola"];
	$role = $_GET["rol"];

	$nr = InterogareSQL("select nume_user, parola_user from utilizatori_tabel where nume_user =  '" . $util . "' and parola_user = '" . $pass . "';" , $mat);
	$role = InterogareSQL("select privileges_user from utilizatori_tabel where nume_user =  '" . $util . "' and parola_user = '" . $pass . "';", $rez);
	
	for($i=0; $i<$role; $i++)
	{
	    $linie = CitesteLinie($rez, $i);
	    $role = $_GET['$linie'];
	    
		if($linie['privileges_user'] == 1)
		{
			$role = "Hello, admin!";
		}
		else
		{
			$role = "Hello, user!";
		}
	}
	echo '', $_GET['utilizator'];

	if( $nr <= 0) echo "\nUtilizator sau parola incorecta!";
	else { 
 
	//crearea unei sesiuni
	//setarea variabilei de sesiune
	//gasite pe toate paginile aplicatiei
	$_SESSION["ok"] = 1;
	$_SESSION["utilizator"]=$util;
	$_SESSION['role'] = $role;

	echo ''.$util;

	//redirectarea catre alta pagina
	//header("location: redirectare.php"); 
	echo '<script language="JavaScript"> window.location.href="http://apollo.eed.usv.ro/~berches.antonela/paginaNoua.php"</script>';

    }
}
?>
	</html>
	<head> 
		<title> Login </title>
	</head>
	<body background="pic.jpg">
	<form method="GET" action="">
	 <div align=center> 
	    <table>
	    <tr>
		<td>Username:</td>
		<td><input type="text" name="utilizator" id="user" ></td>
	    </tr>
	    <tr>
		<td>Password:</td>
		<td><input type="password" name="parola" id="pass" ></td>
	    </tr>
	    <tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<td>
		<form method="GET" action="">
			<input type="submit" name="autentificare" value="Autentificare"></td>
 		</form>
		<td><input type="reset" name="reset" value="Reset"></td>

	    </tr>	    
	    </table>    	    
	
	    
    <?
    if(!isset($_POST['autentificare']) )
	{
		//echo "Eroare la autentificare!";
	}
    ?> 
	</div>
	</form>
	</body>
	</html>
