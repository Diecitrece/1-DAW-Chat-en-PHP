<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log_Info</title>
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
	<h1>INFORME DE ENTRADA</h1>
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
			$sql = "SELECT users.conectado as u FROM users WHERE users.username = '$usuarioL'";
			$vista = $mysqli -> query($sql);
			$registro=$vista->fetch_object();
			$active = $registro->u;
			$vista->close();
			if ($active == 'si')
			{
				echo ("<p>El usuario <span style=color:#FF8700;font-weight:bold>".$usuarioL."</span> ya tiene la sesión iniciada</p>");
				$_SESSION["nomuser"]=$usuarioL;
				header('Refresh: 4; URL="disconnect.php"');
				echo("Se cerrarán todas las sesiones...");
			}
			else if ($existe==1)
			{
			echo ("<p>El usuario <span style=color:#FF8700;font-weight:bold>".$usuarioL."</span> se ha logeado correctamente</p>");
			$_SESSION["nomuser"]=$usuarioL;
			header('Refresh: 4; URL="chat_page.php"');
			echo("Se le redireccionará al chat en unos instantes...");
			}
			else if ($existe==0)
			{
			echo ("<p>Error. Usuario o contraseña incorrecta<br><p>");
			echo ("<a id=envolver href='login.php'><button>Volver al log</button></a>");
			}
			$mysqli->close();
		?>
	</div>
</body>
</html>