<?php
session_start();
date_default_timezone_set("America/El_Salvador");
?>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		background-color: #4C5258;
		margin: 0;
	}

	#Alerta {
		border-collapse: collapse;
		width: 100%;
	}

	#Alerta td, #planes th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#Alerta tr:nth-child(even){background-color: #f2f2f2;}

	#Alerta th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		color: white;
	}
</style>
<title>Mi Tiendita</title>
<meta name="author" content="SIGE" />
<link rel="shortcut icon" href="imagenes/favicon.ico">
</head>
<body>
	<table id="Alerta" width="80%">
		<tbody>
			<tr>
				<td width="55%">
					<table id="Alerta" width="50%">
						<tbody>
							<tr>
								<th width="55%" align="center" valign="middle" style="text-align: center; color: #f2f2f2; text-shadow: 0px 1px 1px #000000; background-color: #D45E38;"><h1>[ ERROR 404 ]</h1></tr>
									<tr>
										<td>
											<p style="color: #3E4348; text-align: center;">Redirección inválida o archivo no encontrado</p>
											<p style="color: #3E4348; text-align: center;"><input type="button" name="index" value="Ir a Inicio" style="background-color: tomato; color: white; font-weight: bold; border-style: none; height: 30px; width: 150px; cursor: pointer;" onClick="location.replace('index.php');"></p>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</body>
		</html>
