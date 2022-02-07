<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reg_Info</title>
<style>

	h1
	{
		text-align: center;
		color: darkred;
		margin-top: 5%;
	}
	body
	{
		background-color: #8FF087;
	}
	#total
	{
		text-align: center;
	}
</style>
</head>
<body>
	<h1>INFORME DE REGISTRO</h1>
	
	<div id="total">
	<?php 
		session_start();
		$usuarioL = $_POST["user"];
		$contraL = $_POST["password"];
		include("datos.php");
		$sql = "select count(*) as x from users where username = '$usuarioL' and password ='$contraL'";
		$vista = $mysqli -> query($sql);
		$existe=0;
		$registro=$vista->fetch_object();
		if ($registro->x==1){
			$existe=1; 
		}
	
		$vista->close();
		if ($existe==1)
		{
		echo ("<p>El usuario ".$usuarioL." ya existe, por favor inténtelo de nuevo<br></p>");
		echo ("<a id= envolver href=login.php><button>Volver al log</button></a>");
		}
	
		if ($existe==0)
		{
			$sql = 'insert into users (username, password) values ("'.$usuarioL.'", "'.$contraL.'")';
			$meter = $mysqli->query($sql);
			echo("<p>El usuario <span style=color:#FF8700;font-weight:bold>".$usuarioL."</span> se ha registrado correctamente</p><br><br>");
			$_SESSION["nomuser"]=$usuarioL;
			header('Refresh: 4; URL="chat_page.php"');
			echo("Se le redireccionará al chat en unos instantes...");
			
		}
		$mysqli->close();
	?>
	</div>
</body>
</html>