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
         if ($valor!=0){	   
	   				$dni=$_GET['dni'];		
			}
	   		$idusu = $_SESSION['idUsuario'];
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span type="position: relative; right:-50px" ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
					<div > 
						
							<?php	
					if ( $valor == 0 ) { 
					 ?>
									
									<form action="cargarPaciente.php?codi=0" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="number" maxlength="8" name="dni" id='dni' size="8"  style="border:groove; text-align:center"><BR/>  
																				 <div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>
						<?php
						}
						else { 
								$consudatos="select * from paciente where dni='".$_GET['dni']."'";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosCliente=mysql_fetch_assoc($resuDatos);
								$consultaUltima="select * from historiaClinica where dni= '".$_GET['dni']."' order by idHistoriaClinica desc limit 1";
								$resuUltimo=mysql_query($consultaUltima) or die(mysql_error());
								$filaUltimo=mysql_fetch_assoc($resuUltimo);

								$consultaCantidad="select * from historiaClinica where dni= '".$_GET['dni']."'";
								$resuCantidad=mysql_query($consultaCantidad) or die(mysql_error());

						       if ($valor == 2){ //aca va si el paciente ya se cargo con codi igual a 2
												$db = conectar_admin();
												
												$sql2 ="SELECT * FROM localidad ORDER BY localidad asc";
												// Ejecutar Consulta
												$result2 = mysql_query($sql2) or die(mysql_error());
												$dni=$_GET['dni'];	
												$sqlpaciente="SELECT * FROM paciente WHERE DNI='$dni'";
												$consu=mysql_query($sqlpaciente) or die(mysql_error());
												$tupla=mysql_fetch_assoc($consu);	
												
												$consultaHistorial="SELECT * FROM historiaClinica WHERE dni='$dni'";
												$sqlHistoria=mysql_query($consultaHistorial) or die(mysql_error());
												$tuplaHistorial=mysql_fetch_assoc($sqlHistoria);
																															
												 ?>
												<form action="cargarPaciente.php?codi=2&dni=<?php echo  $dni ?>"  method="POST" enctype="multipart/form-data"  target="_blank" >	
														<div>DNI DEL PACIENTE: &nbsp;&nbsp;<input type="text"  value="<?php echo $dni ?>" name="dni" id="dni"></div>
														<div>Apellido: &nbsp;&nbsp;<input type="text" name="apellido" id="apellido" size="62" maxlength="200" value="<?php echo $tupla['apellido'] ?>"><input type="checkbox" name="ape" value="ape" / ><B style="color:#0000FF">Desea modificar el apellido del paciente?</B></div>
														<div>Nombre: &nbsp;&nbsp;<input type="text" name="nombre" id="nombre" maxlength="200" size="62" value="<?php echo $tupla['nombre'] ?>"><input type="checkbox" name="nom" value="nom" /><B style="color:#0000FF">Desea modificar el nombre del paciente?</B> <br /></div>
														<div>Direccion: &nbsp;&nbsp;<input type="text" name="direccion" id="direccion" maxlength="300" size="60" value="<?php echo $tupla['direccion'] ?>"><input type="checkbox" name="dir" value="dir" /><B style="color:#0000FF">Desea modificar la direccion del paciente? </B><br /></div> <br />
													<div style=" position:relative; top:0px;">	PARTIDO:<select  name="local" id="local"> 
													<?php 
														$fila2=mysql_fetch_assoc($result2); ?>
																<option value="<?php echo $fila2['localidad']  ?>" selected="selected" ><?php echo $fila2['localidad'] ?></option>
															<?php	while ($fila2=mysql_fetch_assoc($result2)){    ?>		  
																		 <option value="<?php echo $fila2['localidad']  ?>" ><?php echo $fila2['localidad'] ?></option> 
															<?php	} ?> </div>   
																	</select> El partido actual es:&nbsp;<b style="color:#AD0B0B" ><?php echo $datosCliente['localidad'] ?></b>
																	<input type="checkbox" name="localidad" value="localidad" /><B style="color:#0000FF">Desea modificar la localidad del paciente? </B><br /><br />
																	<div style="left:180px">MATERIA:<select  name="materia" id="materia"> 
																			<?php  //introducir historial clinico 
																			$idMateria=$tuplaHistorial['idMateria'];
																			 $consultaMateria="SELECT * FROM materia ORDER BY materia asc ";
																			 $sqlmateria=mysql_query($consultaMateria)or die(mysql_error());
																			 $fila3=mysql_fetch_assoc($sqlmateria); ?>
																			 <option value="<?php echo $fila3['materia']  ?>" selected="selected" ><?php echo $fila3['materia'] ?></option>
																			<?php	while ($fila3=mysql_fetch_assoc($sqlmateria)){    ?>		  
																				 <option value="<?php echo $fila3['materia']  ?>" ><?php echo $fila3['materia'] ?></option>
																	<?php	} ?>   
																			</select> 
																		</select> 
																		
																	<?php 
																	
																	//hago la consulta para obtener la ultima materia que fue asignado
																		$consultaUltiMatPlan="select * from historiaclinica where dni= '".$_GET['dni']."' order by idHistoriaClinica desc limit 1";
																		$resuUltMP=mysql_query($consultaUltiMatPlan)or die(mysql_error());
																		$filaUlti=mysql_fetch_assoc($resuUltMP);
		
																	
																		if ( mysql_num_rows($sqlHistoria) != 0 ){ ?>	La materia actual es:<b style="color:#AD0B0B" ><?php echo $filaUlti['materia'];?></b> <?php  }
																		  else{ ?>
																			 <b style="color:#000000">No posee historial  </b>
																		  <?php }	
																	?>
																		
																	<input type="checkbox" name="mat" id="mat" value="mat" /><B style="color:#0000FF">Desea modificar datos la materia asignada?</B> <br /><br /></div>
																	<div>PLAN:<select  name="plan" id="plan"> 
																			<?php  //introducir historial clinico 
																			 
																			 $consultaplan="SELECT * FROM plan ORDER BY plan asC";
																			 $sqlplan=mysql_query($consultaplan);
																			 $fila4=mysql_fetch_assoc($sqlplan); ?>
																			 <option value="<?php echo $fila4['plan']  ?>" selected="selected" ><?php echo $fila4['plan'] ?></option>
																			<?php	while ($fila4=mysql_fetch_assoc($sqlplan)){    ?>		  
																				 <option value="<?php echo $fila4['plan']  ?>" ><?php echo $fila4['plan'] ?></option>
																	<?php	} ?>   
																			</select> 
																			
																		<?php 

																		if ( mysql_num_rows($sqlHistoria) != 0 ){ ?>			
																					El plan actual es:<b style="color:#AD0B0B" ><?php echo $filaUlti['plan']; ?></b> <?php } 
																		 else{ ?>
																			 <b style="color:#000000">No posee historial  </b>
																		  <?php }	?>			
																	<input type="checkbox" name="planes" id="planes" value="planes" /><B style="color:#0000FF">Desea modificar datos del plan asignada?</B> 
																		HOJA DE ACTA:<select  name="acta" id="acta"> 
																		<?php $i=1; ?>
																			<option value="<?php echo $i  ?>" selected="selected" ><?php echo $i ?></option>
																			<?php for ($i=2; $i<200; $i++){ ?>
																				<option value="<?php echo $i  ?>" ><?php echo $i ?></option>
																			<?php	} ?>  </div>
																	<br/><br/>
																	<div>
																	<b style= "color:#003300; position:relative; top:200px; font-size:18px"> </b><textarea id="historia" name="historia" cols="90" rows="3"> </textarea>  </div>
																	
																<div style="margin-left:28%;" align="center"> 
																<input type= "checkbox" name="modificarSumar" id="modificarSumar" value="sumar" /><B style="color:#0000FF">Desea modificar el estado del plan sumar?</B><br/>
																<b style= "color:#064400"><input type="radio" name="sumar"  value="0" >Agregar a sumar<br>
																<input type= "radio" name="sumar"  value="1" checked="checked" >Eliminar de Sumar </b>	<br/><br/>
																<input onClick= "validarAtencionPaciente(this.form)" type="button" value="GUARDAR" name="GUARDAR" >&nbsp;&nbsp;<input onClick="location.href = 'paciente.php?valor=0' " type="button" value="VOLVER" name="CANCELAR" ></div><br />
															</fieldset>
						
																<fieldset style="width:auto; height:auto"><lengend STYLE=" color:#0000FF; font-family:Arial, Helvetica, sans-serif" > <b>HISTORIAL CLINICO </b></legend>	
																<!-- tendriamos que preguntar si existe registro de historial    -->
															<?php  if ( mysql_num_rows($sqlHistoria) != 0 ){   ?>	
																	<table border= "1">
																		    <tr>
																				  <td><B style= "color:#006600">HORA #</B></td>
																				  <td><B style= "color:#006600">DIA</B></td>
																				  <td><B style= "color:#006600">MES</B></td>
																				  <td><B style= "color:#006600">AÑO</B></td>
																				  <td><B style= "color:#006600">DNI</B></td>
																				  <td><B style= "color:#006600">APELLIDO</B></td>
																				  <td><B style= "color:#006600">NOMBRE</B></td>
																				  <td><B style= "color:#006600">DIRECCION</B></td>
																				  <td><B style= "color:#006600">PARTIDO</B></td>
																				  <td><B style= "color:#006600">MATERIA</B></td>
																				  <td><B style= "color:#006600">HOJA</B></td>
																				  <td><B style= "color:#006600">PLAN</B></td>
																				  <td><B style= "color:#006600">SUMAR</B></td>
																				  <td><B style= "color:#006600">FECHA ASIGNADO AL PLAN SUMAR</B></td>
																				  <td><B style= "color:#006600"></B></td>
																		 </tr>		
																			 
																	<?php 
																		  $consultaHistorial="SELECT * FROM historiaClinica WHERE dni='$dni'";
																		  $sqlHistoria=mysql_query($consultaHistorial) or die(mysql_error());
																		  $filaHistoria=mysql_fetch_assoc($sqlHistoria);
												  
																		   ?> <tr>
																		   			<?php $nyap= $filaHistoria['nombre']. " "  .$filaHistoria['apellido']  ;     ?>
																				  <td><B style="color:#000000"> <?php echo $filaHistoria['hora']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['dia']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['mes']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['anos']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['dni']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['apellido']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['nombre']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['direccion']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['localidad']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['materia']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['hoja']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['plan']  ?></B></td>
																				  <?php if ($filaHistoria['sumar']== 1){  ?>
																						<td><B style="color:#000000">SIN SUMAR</B></td>
																						
																				  <?PHP }
																						else{ ?>
																							<td bgcolor="#FFFF00"><B style="color:#000000"> SUMAR</B></td>
																							
																					<?php	}
																				  ?>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['fechaSumar']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['historia']  ?></B></td>
																				  
																			 </tr>	<?PHP
																	while ($filaHistoria=mysql_fetch_assoc($sqlHistoria)){
																	      $plan=$filaHistoria['plan'];

																			?><tr>
																		  	<?php	  $nyap= $filaHistoria['nombre']. " "  .$filaHistoria['apellido']  ;     ?>
																				  <td><B style="color:#000000"> <?php echo $filaHistoria['hora']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['dia']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['mes']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['anos']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['dni']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['apellido']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['nombre']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['direccion']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['localidad']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['materia']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['hoja']  ?></B></td>
																				  <td><B style="color:#000000"><?php echo $filaHistoria['plan']  ?></B></td>
																				  <?php if ($filaHistoria['sumar']== 1){  ?>
																						<td><B style="color:#000000">SIN SUMAR</B></td>
																							<?php	$fechaSumar=date("0000-00-00"); ?>
																				  <?PHP }
																						else{ ?>
																							<td bgcolor="#FFFF00"><B style="color:#000000"> SUMAR</B></td>
																								<?php	$fechaSumar=$filaHistoria['fechaSumar']; ?>
 																					<?php	}
																				  ?>
																				  <td><B style="color:#000000"><?php 	echo $fechaSumar  ?></B></td>																				  
																				  <td><B style="color:#000000"><?php echo $filaHistoria['historia']  ?></B></td>
																			</tr>
																	<?php
																	
																	}
																	
																	}
																	?>
																	</table>
																	<?PHP
																	//desconectamos la BD
																	desconectar();	?>		
																	</form>
															</fieldset>

																		
									   </div>
				
																		
									   </div>
												   <?php    
								   
							   
							   }
							   else{   
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
												   <?php    
											
										}			 		
									  ?>
				
									   		
							<?php } ?>
									</div>
									

							<!--	<div style=" position:relative; left:100px; top:0px; font-size:24px"><a href="cerrarsesion.php">salir</a> -->
						</div><?php 
							
							
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>