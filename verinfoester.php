<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>listado</title>

			<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="Facultadad de odontologia - Ver notas / noticias anteriores">
		
		<meta name="Keywords" content="FOLP,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		<script language='javascript' src='validar/validarAtencionPaciente.js'>
		</script>
			<style type="text/css">
			fieldset{
					background:#15b88F;
				}
      </style>	
	</head>


	<body >
		<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
      	   
	   				$dni=$_GET['dni'];		
			
	   		$idusu = $_SESSION['idUsuario'];
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span type="position: relative; right:-50px" ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#000000"> PERSONA QUE ESTERILIZA</B></legend>	  
					<div > 
						
							<?php	
					
								$consudatos="select * from persona where documento ='".$_GET['dni']."'";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosPersona=mysql_fetch_assoc($resuDatos);
								$idEspe=$datosPersona['idEspecialidad'];
								$consulta="select * from especialidad where idEspecialidad = $idEspe";
								$consuesp=mysql_query($consulta);
								$filaesp=mysql_fetch_assoc($consuesp);
								$especialidad=$filaesp['especialidad'];
								//$codigoEster=$datosPersona['numeroesterilizacion'];
								$nyap=$datosPersona['nombreyapellido'];
								?>
								<form action="cargarPersona.php?codi=3" method="POST" enctype="multipart/form-data" target="_blank">	
								<div>  <div><b style="color:#000000"> DNI DE LA PERSONA:</b>&nbsp;&nbsp;<input type="text"  value="<?php echo $dni ?>" name="dni" id="dni"> 						
							  </div></div>
							<div><b style="color:#000000"> Nombre y Apellido: </b>&nbsp;&nbsp;<input type="text" name="nyap" id="" maxlength="300" size="62" value="<?php echo $nyap?>"></div>
							
							<?php  //listar la especializacion y ver si quiere modificarlo 
												$consultaEspecial="SELECT * FROM especialidad where idEspecialidad = $idEspe";
												$sqlEspecial=mysql_query($consultaEspecial)or die(mysql_error());
												$fila4=mysql_fetch_assoc($sqlEspecial); 
												$especial=$fila4['especialidad'];			
												$consultaEspecialidad="SELECT * FROM especialidad where idEspecialidad <> $idEspe";
												$sqlEspecialidad=mysql_query($consultaEspecialidad)or die(mysql_error());
												$fila3=mysql_fetch_assoc($sqlEspecialidad); ?>	
														
											    <b style="color:#000000"> ESPECIALIZACION:</b><select  name="especializacion" id="especializacion"> 	
												<option value="<?php echo $fila3['idEspecialidad']  ?>" selected="selected" ><?php echo $fila3['especialidad'] ?></option>
																				<?php	while ($fila3=mysql_fetch_assoc($sqlEspecialidad)){    ?>		  
																					 <option value="<?php echo $fila3['idEspecialidad']  ?>" ><?php echo $fila3['especialidad'] ?></option>
																		<?php	} ?>   
											</select><b style="color:#000000"> La especialidad actual es:&nbsp;<b style="color:#AD0B0B" ><?php echo $especial ?></b></b>
											<input type="checkbox" name="espe" value="espe" /><B style="color:#0000FF">Desea modificar la especialidad de la persona? </B><br /><br />
											<input type="submit" value="GUARDAR" name="GUARDAR" >&nbsp;&nbsp;<input onClick="location.href = 'servicioEsterilizacion.php?valor=0' " type="button" value="VOLVER" name="CANCELAR" ></div><br />
																																	
									   </div>	
																		<?php 
																		//desconectamos la BD
																		desconectar();	?>		
									</form>
												    
									</div>
									
													</div><?php 
							
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>