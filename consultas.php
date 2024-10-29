<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>listado de consultas</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="facultad de odontologia">
		
		<meta name="Keywords" content="Fundaci&oacute;n, Jos&eacute; Poblete,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">


	</head>


	<body >
	<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
	   		
			 
	   		if($_GET['valor']!= 0){
	   
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1000px; height:200px; position:relative; left:-100px;" /> </div>
						<div style=" position:relative; left:1150px; top:-210px; width:200px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /> </div>
				         <div style="position:relative; left:380px; right:150px; top:-200px" ><fieldset style=" width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">
						  <legend align="center" style="font-size:30px; color:#006600">OPCIONES</legend>	  
					<div >
						<br />
						<div >
							<a href="consultaTodos.php?valor=0"><p style="font-size:25px; color:#003300">MOSTRAR TODO</p></a>
						</div>
					
						<div>	
							<a href="consultasDni.php"><p style="font-size:25px; color:#003300">CONSULTAR POR DNI DEL PACIENTE</p></a>
							
					   </div>
									   
						<div>	
							<a href="consultaAvanzada.php"><p style="font-size:25px; color:#003300">CONSULTAS AVANZADAS</p></a>
							
					   </div>
					   <br/>					   
						<div>	
							<a href="ingresar.php" style="font-size:25px">Atras</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cerrarsesion.php" style="font-size:25px">salir</a>
							
					   </div>
					   <br />		

					</div>
			</fieldset>		
	</div>		
			<?php 
			}
			else{?>
			    <img src="imagenes/trabajando.jpg" width="450" height="450" /><br/>
				<a href="ingresar.php">Atras</a>				
		<?php	}
			
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>