<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor=$_GET['valor'];

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
		<script language='javascript' src='../validar/validarAtencionPaciente.js'>
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
         if ($valor!=0){	   
	   				$dni=$_GET['dni'];		
			}
	   		$idusu = $_SESSION['idUsuario'];
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<spaN style="position: relative; right:-50px "><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px"><b style="color:#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONA A ESTERILIZA</B></legend>	  
					<div > 
						
							<?php	
					if ( $valor == 0 ) { 
					 ?>
									
									<form action="cargarEsterilizacion.php?codi=0" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;"><b style="color:#000000">DNI DE LA PERSONA QUE VA A ESTERILIZAR:</b> &nbsp;&nbsp;<input  type="number" maxlength="8" name="dni" id='dni' size="8"  style="border:groove; text-align:center"><BR/>  
																				 <div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'servicioEsterilizacion.php?valor=0' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>
						<?php
						}
						else { 
								

						       if ($valor == 1){ //aca va si el persona es nuevo con codi igual a 1
													//echo 'hola';
													$db = conectar_admin();
													//mysql_query("BEGIN WORK");
													$sql2 ="SELECT * from especialidad";
													// Ejecutar Consulta
													$result2 = mysql_query($sql2)or die(mysql_error());
																								
													 $dni=$_GET['dni']; ?>
													<form action="cargarPersona.php?codi=2" method="POST" enctype="multipart/form-data" target="_blank">	
														 	<div><b style="color:#000000"> DNI DE LA PERSONA:</b> &nbsp;&nbsp;<input type="text"  value="<?php echo $dni ?>" name="dni" id="dni"> </div> 											 
															<!--<div>NUMERO DE ESTERILIZACIÓN: &nbsp;&nbsp;<input type="text" name="ester" id="ester" size="10" /> </div><br />		-->
															<!--<div> Numero De Esterilización: &nbsp;&nbsp;<input type="text" maxlength="100" size="40"> </div> 	-->
															<div><b style="color:#000000">Nombre y Apellido:</b> &nbsp;&nbsp;<input type="text" name="nyap" id="nyap" maxlength="300" size="62"></div> <br />
															<b style="color:#000000">Tipo de especialidad:</b><select  name="especialidad" id="especialidad"> 
														<?php 
															$fila2=mysql_fetch_assoc($result2); ?>
																	<option value="<?php echo $fila2['idEspecialidad']  ?>" selected="selected" ><?php echo $fila2['especialidad'] ?></option>
																<?php	while ($fila2=mysql_fetch_assoc($result2)){    ?>		  
																			 <option value="<?php echo $fila2['idEspecialidad']  ?>" ><?php echo $fila2['especialidad'] ?></option> 
																<?php	} ?>   
																		</select> 
														
									   </div>	
									   <div style="margin-left:28%">	<input  type="submit" value="GUARDAR" name="GUARDAR" /> &nbsp;&nbsp;<input onClick="location.href = 'servicioEsterilizacion.php?valor=0' " type="button" value="CANCELAR" name="CANCELAR" /></div><br/>
																		<?php 
																		//desconectamos la BD
																		desconectar();	?>		
													</form>
											
									   		
							<?php } 
							      else{									  
									    $url="verinfoester.php?dni=$dni";
									    redirigir($url);
									  
									  
									  
								  } 
							
							?>
									</div>
									
			
						</div><?php }
							
							
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>