<?php

  session_start();

  session_destroy();

?>

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">

<html>

<head>

	<link rel="stylesheet" href="./css/login.css" type="text/css">


    <script language='javascript' src='./validar/operaciones.js'>
	</script>
    
	<script language='javascript' src='./validar/login.js'>
	</script>

	<title>LOGIN</title>

</head>

	<body>
		<div style=" position:relative; left:25%; width:100%; height:100%; margin-top:6%"><img src="./css/fondos/login.jpg" />

			<form action="log.php" method="post">
					  
				<div id="user"><input type= "text" name="username" id="username" maxlength="15"> </div>
						  
				<div id="pass"><input type= "password" name= "clave" id= "clave" maxlength="10" >  </div>

				<div id="boton"><input onClick="validar_acceso(this.form)" type="button" value="Ingresar" name="Ingresar"></div>

				<input type="hidden" value="Ingresar" name="ti">

			</form>

		</div>

	</body>

</html>