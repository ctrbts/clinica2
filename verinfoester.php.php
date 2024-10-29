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
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
					<div > 
						
							<?php	

								$consudatos="select * from persona where documento ='".$_GET['dni']."'";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosPersona=mysql_fetch_assoc($resuDatos);
								$consultaUltima="select * from historiaClinica where dni= '".$_GET['dni']."' order by idHistoriaClinica desc limit 1";
								$resuUltimo=mysql_query($consultaUltima) or die(mysql_error());
								$filaUltimo=mysql_fetch_assoc($resuUltimo);

								$consultaCantidad="select * from historiaClinica where dni= '".$_GET['dni']."'";
								$resuCantidad=mysql_query($consultaCantidad) or die(mysql_error());

						       
													//aca va si el paciente es nuevo con codi igual a 1
													$db = conectar_admin();
													//mysql_query("BEGIN WORK");
													$sql2 ="SELECT * FROM localidad ORDER BY localidad asc";
													// Ejecutar Consulta
													$result2 = mysql_query($sql2)or die(mysql_error());
												//consulta para los documentos									
												$sqldoc ="SELECT * FROM tipodoc";
												// Ejecutar Consulta
												$resuldoc = mysql_query($sqldoc) or die(mysql_error());
												$tupladoc=mysql_fetch_assoc($resuldoc);
													 //$tipo=$_GET['tipo'];
													 $dni=$_GET['dni']; ?>
													<form action="cargarPaciente.php?codi=1" method="POST" enctype="multipart/form-data" target="_blank">	
															<div>  <div>DNI DEL PACIENTE: &nbsp;&nbsp;<input type="text"  value="<?php echo $dni ?>" name="dni" id="dni"> TIPO: <select  name="tipodoc" id="tipodoc" style="border:groove"></p>
												
													<option value="<?php echo $tupladoc['tipo']  ?>" selected="selected" ><?php echo $tupladoc['tipo'] ?></option>
													<?php while($tupladoc=mysql_fetch_assoc($resuldoc)){
															?><option value="<?php echo $tupladoc['tipo']  ?>" ><?php echo $tupladoc['tipo'] ?></option>
													<?php }	?>			
												  </select>
												  </div><br /></div></div>
															<div>Apellido: &nbsp;&nbsp;<input type="text" name="apellido" id="apellido" maxlength="200" size="62" ></div>
															<div>Nombre: &nbsp;&nbsp;<input type="text" name="nombre" id="nombre" maxlength="200" size="62" ></div>
															<div>Direccion: &nbsp;&nbsp;<input type="text" name="direccion" id="direccion" maxlength="300" size="60" ></div> <br />
															PARTIDO:<select  name="local" id="local"> 
														<?php 
															$fila2=mysql_fetch_assoc($result2); ?>
																	<option value="<?php echo $fila2['localidad']  ?>" selected="selected" ><?php echo $fila2['localidad'] ?></option>
																<?php	while ($fila2=mysql_fetch_assoc($result2)){    ?>		  
																			 <option value="<?php echo $fila2['localidad']  ?>" ><?php echo $fila2['localidad'] ?></option> 
																<?php	} ?>   
																		</select> 
																		<br/>
																		MATERIA:<select  name="materia" id="materia"> 
																				<?php  //introducir historial clinico 
																				 $consultaMateria="SELECT * FROM materia";
																				 $sqlmateria=mysql_query($consultaMateria)or die(mysql_error());
																				 $fila3=mysql_fetch_assoc($sqlmateria); ?>	
																				 <option value="<?php echo $fila3['materia']  ?>" selected="selected" ><?php echo $fila3['materia'] ?></option>
																				<?php	while ($fila3=mysql_fetch_assoc($sqlmateria)){    ?>		  
																					 <option value="<?php echo $fila3['materia']  ?>" ><?php echo $fila3['materia'] ?></option>
																		<?php	} ?>   
																				</select> 
																			</select> 
																					
																		<br />
																		PLAN:<select  name="plan" id="plan"> 
																				<?php  //introducir historial clinico 
																				 $consultaplan="SELECT * FROM plan";
																				 $sqlplan=mysql_query($consultaplan)or die(mysql_error());
																				 $fila4=mysql_fetch_assoc($sqlplan); ?>
																				 <option value="<?php echo $fila4['plan']  ?>" selected="selected" ><?php echo $fila4['plan'] ?></option>
																				<?php	while ($fila4=mysql_fetch_assoc($sqlplan)){    ?>		  
																					 <option value="<?php echo $fila4['plan']  ?>" ><?php echo $fila4['plan'] ?></option>
																		<?php	} ?>   
																				</select> 
																		<br />
																		HOJA DE ACTA:<select  name="acta" id="acta"> 
																		<?php $i=1; ?>
																			<option value="<?php echo $i  ?>" selected="selected" ><?php echo $i ?></option>
																			<?php for ($i=2; $i<10000; $i++){ ?>
																				<option value="<?php echo $i  ?>" ><?php echo $i ?></option>
																			<?php	}
																		 ?>   
																				</select> 		
																		<br />		
																		
																		<b style="color:#003300; position:relative; top:-40px; font-size:18px"> </b><textarea id="historia" name="historia" cols="110" rows="3"></textarea>  
																		<br/>	
																		<div style="margin-left:28%">	<input onClick="validarAtencionPaciente(this.form)" type="button" value="GUARDAR" name="GUARDAR" >&nbsp;&nbsp;<input onClick="location.href = 'paciente.php?valor=0' " type="button" value="CANCELAR" name="CANCELAR" ></div><br/>	
																
																<b style="color:#064400"><input type="radio" name="sumar"  value="0" >Agregar a sumar<br>
																<input type="radio" name="sumar"  value="1" checked="checked" >Eliminar de Sumar </b>	<br/><br/>
																</fieldset>	
																			<div style=" position:absolute; left:700px; top:650px; font-size:24px">	
																			
																
											
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