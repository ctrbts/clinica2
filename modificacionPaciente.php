<?php 
	require_once ("funciones.php");
	$valor=$_GET['valor'];

	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

	<head>
		<title>Alta paciente</title>

		<LINK REL="stylesheet" HREF="estilos/estiloContacto.css" TYPE="text/css">

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		
		<script language='javascript' src='validar/validaraltapaciente.js'>
		</script>
	</head>

<body background="imagenes/fondo.jpg">

 <?php

if (!isset($_SESSION['pass'])) {  ?>

					 <div> <img src="imagenes/banner.jpg" style="width:1200px; height:200px; position:relative; left:-100px" /> </div>
					<div style=" position:relative; left:1350px; top:-190px; width:200px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /> </div>
					
     	      	  <div style=" position:relative; left:250px; right:150px; top:-120px" >
					<fieldset style="width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">
					  <legend align="center" style="color:#003300">MODIFICAR INFORMACION DEL PACIENTES</legend>		
						  
		 
			<?php	
					if ( $valor == 0 ) {  ?>
									
									<form action="modificarPaciente.php?codi=1" method="POST" enctype="multipart/form-data" id="modificacion" name="modificacion" >	
																				<div>DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="text" name="dni" id="dni"></div>
																				 <div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="BUSCAR" name="BUSCAR" ></div>		
										</form>
										 
								
						<?php
						}
						else { 
										 if ($valor == 1) { ?>

											 <form action="modificarPaciente.php?codi=1" method="POST" enctype="multipart/form-data" id="modificacion" name="modificacion" >	
														<b style=" color:#FF0000; font:Arial, Helvetica, sans-serif; font-size:18px; ">El paciente no se encuentra registrado</b>
														<div>DNI DEL PACIENTE: &nbsp;&nbsp;<input type="text" name="dni" id="dni"></div>
														<div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="BUSCAR" name="BUSCAR" ></div>		
											 </form>
										 <?php } 
										 else {
													$db = conectar_admin();

													//mysql_query("BEGIN WORK");

													$sql2 ="SELECT * FROM localidad ORDER BY localidad asc";

													// Ejecutar Consulta
													$result2 = mysql_query($sql2);
													
													$dni=$_SESSION['dni'];
													echo $dni;
													$sql3="SELECT * FROM paciente WHERE dni=$dni";
													$result3=mysql_query($sql3);
													echo 'hola';
													$paciente=mysql_fetch_assoc($result3);
													$localidad=$paciente['localidad'];
													echo $localidad;

												 ?>
													<form action="modificarPaciente.php?codi=2" method="POST" enctype="multipart/form-data"  >	
															<div>DNI DEL PACIENTE: &nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['dni'] ?>" name="dni" id="dni"></div>
															<div>Apellido: &nbsp;&nbsp;<input type="text" name="apellido" id="apellido" size="62" value="<?php echo $paciente['apellido'];  ?>"></div>
															<div>Nombre: &nbsp;&nbsp;<input type="text" name="nombre" id="nombre" size="62" value="<?php echo $paciente['nombre'];  ?>"></div>
															<div>Direccion: &nbsp;&nbsp;<input type="text" name="direccion" id="direccion" size="60" value="<?php echo $paciente['direccion'];  ?>"></div>
															<div> El partido actual es: <b style="color:#003300"> <?php echo $paciente['localidad'];  ?></b> </div>
															PARTIDO:<select  name="local" id="local"> 
																	<?php 
																	$fila2=mysql_fetch_assoc($result2); ?>
																	<option value="<?php echo $fila2['localidad']  ?>" selected="selected" ><?php echo $fila2['localidad'] ?></option>
																<?php	while ($fila2=mysql_fetch_assoc($result2)){    ?>		  
																		 <option value="<?php echo $fila2['localidad']  ?>" ><?php echo $fila2['localidad'] ?></option> 
																<?php	} ?>   
															</select> 
															
															<div style="margin-left:28%">	<input onClick="validarAltaPaciente(this.form)" type="button" value="MODIFICAR" name="modificar" ></div>		
													<?php 
													//desconectamos la BD
													desconectar();	?>		
													</form>
											
								   <?php    }
						  	
						}			 		
					  ?>
					</fieldset> </div>
					<div style="position:relative; left:500px">	<a href="paciente.php?valor=0">Atras</a>&nbsp;&nbsp;&nbsp;<a href="cerrarSesion.php">Inicio</a> </div>

					

<?php }
else{
         $url='loguearUsuario.php?valor=0';
	     redirigir($url);
} ?>
		
</body>
</html>
