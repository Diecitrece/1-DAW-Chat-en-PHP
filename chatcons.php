<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table id="chatable">
	<?php 
	include("datos.php");
	$sql = "SELECT messages.username as a, messages.message as b, messages.created_on as c 		FROM messages ORDER BY messages.created_on ASC";
	$vista = $mysqli->query($sql);
	while ($registro = $vista->fetch_object())
	{
		echo "<tr>";
		echo ("<td><span style='color:#5C5C4B; font-weight:bold;'>".$registro->a."</span> >>> ".$registro->c."</td>");
		echo "</tr><tr>";
		echo ("<td style='border:2px solid green';>".$registro->b."</td>");
		echo "</tr>";
	}
	$vista->close();
	?>
	</table>
</body>
</html>
