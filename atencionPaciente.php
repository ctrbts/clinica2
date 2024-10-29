<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>listado</title>

		<LINK REL="stylesheet" HREF="estilos/estiloContacto.css" TYPE="text/css">

		<meta name="description" content="Fundaci&oacute;n Jos&eacute; Poblete - Ver notas / noticias anteriores">
		
		<meta name="Keywords" content="Fundaci&oacute;n, Jos&eacute; Poblete,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">

	</head>


	<body background="imagenes/fondo.jpg">
	   <?php if (!isset($_SESSION['pass'])){ 
	   		$idusu = $_SESSION['idUsuario'];
	   		$usu=1;
			$producto=1;
			$usuario=$_SESSION['usuario'];
			$sql2="SELECT * FROM usuarioTienePerfil WHERE idusuario='$idusu'";
			$resul2=mysql_query($sql2);
			 
	   		$valor=$_GET['valor'];
		
	   
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1200px; height:200px; position:relative; left:-100px" /> </div>
						<div style=" position:relative; left:1350px; top:-190px; width:200px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" />
				         <div style=" position:relative; left:-900px; right:150px; top:120px" ><fieldset style=" width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">
						  <legend align="center">PACIENTES</legend>	  
					<div > 
						
						<div >
							<a href="atenderPaciente.php?valor=0">Atencion al Pacientes</a>
						</div>
						<br/>
				
						<div>	
							<a href="ModificacionAtencionPaciente.php?valor=0">Modificacion datos de la atencion paciente</a>
							
					   </div>
					   <br/>
						<div style=" position:relative; left:450px">	
							<a href="ingresar.php">Atras</a>&nbsp;&nbsp;<a href="cerrarsesion.php">salir</a>
							
					   </div>		

					</div>
			</fieldset>		
			<?php 
			
			
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>