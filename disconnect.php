<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Disconnecting</title>
</head>
<body>
	<?php 
	session_start();
	$usuario = $_SESSION["nomuser"];
	include("datos.php");

	$sql = "UPDATE users SET users.conectado = 'no', users.created_on = CURRENT_TIMESTAMP WHERE users.username = '$usuario'";
	$vista = $mysqli->query($sql);
	
	$mysqli->close();
	session_destroy();
	?>
	<script language="javascript">
	window.location.replace("login.php");
	</script>
</body
</html>