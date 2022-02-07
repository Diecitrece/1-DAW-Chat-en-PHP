<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat Room</title>
<style>

	h1
	{
		text-align: center;
		color: darkred;
	}
	html, body
	{
		background-color: #8FF087;
		height: 100%;
	}
	hr{
        height: 3px;
        background-color: darkred;
        border: none;
    }
	#total
	{
		display: flex;
		height: 85%;
		width: 60%;
		margin: 0 auto;
		flex-direction: row;
	}
	#userbox
	{
		display: flex;
		flex-direction: column;
		width: 20%;
		height: 100%;
		background-color: 
	}
	#users
	{
		border: 3px solid darkred;
		background-color: #37A82E;
		width: 97%;
		height: 70%;
		overflow: scroll;
		overflow-x: hidden;
		overflow-y: auto;
	}
	#userconfig
	{
		background-color: dimgrey;
		width: 100%;
		height: 30%;
	}
	#usertag
	{
		text-align: center;
		width: 100%;
		height: 10%;
	}
	#settings
	{
		display: flex;
		flex-direction: row;
		width: 100%;
		height: 65%;
	}
	#chat_cbox
	{
		display: flex;
		flex-direction: column;
		width: 80%;
		height: 100%;
	}
	#chat
	{
		border: 3px solid darkred;
		width: 100%;
		height: 70%;
		margin:0px;
		overflow: scroll;
		overflow-x: hidden;
		overflow-y: auto;
	}
	#chatable td
	{
		word-wrap: break-word;
		max-width: 600px;
	}
	#cbox
	{
		background-color: white;
		width: 100%;
		height: 30%;
		margin:0px;
	}	
	#chatbox
	{
		width: 80%;
		height: 100%
	}
	#send
	{
		position: absolute;
		width: 9%;
		height: 25%;
		margin-bottom: 50px;
	}
</style>
</head>

<body>
	<script type="text/javascript" src="jquery.js"></script>
	<script language="javascript">
	$(document).ready(function() {
                $('#mensajes').load("chatcons.php");
                setInterval(function() {
                    $('#mensajes').load("chatcons.php");
                }, 1000);
            });
	$(document).ready(function() {
                $('#users').load("userscons.php");
                setInterval(function() {
                    $('#users').load("userscons.php");
                }, 1000);
            });
	</script>
	<?php 
	include("datos.php");
	session_start();
	if (isset($_SESSION['nomuser']) )
	{
		error_reporting(0);
		$moment = getdate();
		$hora=
		"$moment[mday]/$moment[mon]/$moment[year]>>>$moment[hours]:$moment[minutes]:$moment[seconds]";
		$usuario = $_SESSION["nomuser"];
		$sql = "UPDATE users SET users.conectado = 'si', users.created_on = CURRENT_TIMESTAMP WHERE users.username = '$usuario'";
		$vista = $mysqli->query($sql);
		$date = date("H:i:s");

		
		
	}
	?>
	
		
	
	
	<h1>SALA DE CHAT</h1>
	<div id="total">
		<div id="userbox">
			
		<div id="users"></div>
			
		<div id="userconfig">
			<div id="usertag">
			<h3><?php echo ("<span style=font-weight:bold;color:#F8FF00;>$usuario</span>");?></h3>
			</div>
			<div id="settings">
				<div style="border:1px solid black; background-color: green; width: 50%; height: 100%;">
					<button onclick="disconnect()" style="background-color: green; position: absolute; height: 17%; width: 6%">SALIR</button>
				</div>
				<div style="border:1px solid black; background-color: green; width: 50%; height: 100%;">
					<button onclick="refresh()" style="background-color: green; position: absolute; height: 17%; width: 6%; text-align: center;">RECARGAR</button>
				</div>
			</div>
			
		</div>
		</div>
		<div id= "chat_cbox">
			<div id="chat">
	
				<div id="mensajes"></div>	
			
			</div>
			<div id="cbox">
				<form action="chat_page.php" method="POST">
					<textarea name= "chatbox" id="chatbox" rows="10%" maxlength="16000" placeholder="Texto..."></textarea>
					<input type="submit" id="send" value="Enviar">
				</form>
			</div>
		</div>	
	</div>
	
	<?php 
		$textM=$_POST["chatbox"];
		
		if (($textM!="")&&($textM!=$_SESSION["textAnterior"]))
		{
			$sql = "INSERT INTO messages (messages.username, messages.message, messages.created_on) VALUES ('$usuario', '$textM', '$date')";
			$vista = $mysqli->query($sql);
			$_SESSION["textAnterior"]=$textM;
			echo("<script>location.reload()</script>");
		}
	?>
	<script language="javascript">
	window.onload=function updateScroll(){
		var element = document.getElementById("chat");
		element.scrollTop = element.scrollHeight;	
	}
	function disconnect()
		{
			window.location.replace("disconnect.php");
		}
	function refresh()
		{
			location.reload();
		}
	function inactive()
		{
			alert("Desconexión por inactividad");
			window.location.replace("disconnect.php");
		}
		time = setTimeout(inactive, 600000);//diez minutos
	</script>

</body>
</html>