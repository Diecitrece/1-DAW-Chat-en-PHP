<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body>
	<table>
			<h3 style="text-align: center;">Usuarios<hr></h3>
			<?php
				include("datos.php");
				$sql = "SELECT users.username as a, users.conectado as b, users.created_on as c FROM users ORDER BY users.conectado DESC";
				$vista = $mysqli->query($sql);
					while ($registro = $vista->fetch_object())
					{
						if ($registro->b == 'si')
						{
							$activo="<span style='color:Blue; font-weight:bold;'>Activo</span>";
						}
						else
						{
							$activo="<span title='$registro->c' style='color:Red; font-weight:bold;'>Inactivo</span>";
						}
						echo "<tr>";
						echo ("<td>".$registro->a." >>> ".$activo."</td>");
						echo "</tr>";
					}
					$vista->close();
			?>
		
			
		</table>
</body>
</html>