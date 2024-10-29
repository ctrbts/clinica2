<?php

session_start();

session_destroy();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<script language='javascript' src='./validar/operaciones.js'>
	</script>
	<script language='javascript' src='./validar/login.js'>
	</script>
	<title>LOGIN</title>
	<link rel="stylesheet" href="./css/login.css" type="text/css">
	<meta name="description" content="Fundaci&oacute;n Jos&eacute; Poblete">
	<meta name="Keywords" content="Fundaci&oacute;n, Jos&eacute; Poblete,La Plata, Argentina">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="refresh" content="-1;URL=">
	<meta http-equiv="cache-control" content="no-cache">
</head>

<body>
	<div style=" position:relative; left:700px; top:100px; width:200px; right:50px"><img src="imagenes/UNLP_Logo.jpg"
			alt="logo unlp" /> </div>
	<div style=" position:relative; left:500px; right:150px; top:120px">
		<fieldset
			style=" width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">
			<legend>INGRESE SU USUARIO Y CLAVE</legend>

			<form action="log.php" method="post">
				<div id="parrafo">
					Usuario:<input type="text" name="username" id="username" maxlength="15" size="29" /><br />

					Clave de acceso:<input type="password" name="clave" id="clave" maxlength="10"><br />
				</div>
				<div> <input onClick="validar_acceso(this.form)" type="button" value="Ingresar" name="Ingresar"></div>

				<input type="hidden" value="Ingresar" name="ti">

			</form>
		</fieldset>
	</div>

</body>

</html>