<?php 
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor=$_GET['valor'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>consultas historial paciente</title>
<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});


$(document).ready(function() {
$("#datepicker").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker2").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});

$(document).ready(function() {
$("#datepicker3").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker4").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker5").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker6").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker7").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker8").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
$(document).ready(function() {
$("#datepicker9").datepicker({
changeMonth: true,
changeYear: true,
onSelect: function(dateText, inst) {}
});
});
</script>
</head>

<body>
	<div id="marco">
								 <div> <img src="imagenes/banner.jpg" style="width:70%; height:15%; position:relative; left:25%px" > 
						<div style="position:relative; left:75%; width:10%; top:20px; heigh:10%; right:15%"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " >
					<?php if($valor == 0){ ?>
					    <br/>
						<br/>
						<fieldset style="width:60%; top:10%; left:10%; position:relative "> <legend>CONSULTAS</legend>
							<fieldset style=" position:relative; width:90%; height:auto; left:AUTO "><legend><B>LISTAR HISTORIAL DE LOS PACIENTE PARA UNA FECHA</B></legend>							
									<form action="pruebapdf.php" target="_blank" method="POST" enctype="multipart/form-data">
												<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaInicio" id="datepicker"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														    <input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTAR HISTORIAL DEL PACIENTE POR DOCUMENTO</B></legend>							
									<form action="xdnipdf.php" target="_blank" method="POST" enctype="multipart/form-data">
							  				<?php	$sqldni="select * from paciente order by dni asc";	
													$resultadni=mysql_query($sqldni);
											?>
												<div id="fechas1">
													<b style="color:#0000FF">DOCUMENTO</b>
													<select  name="dni"> 
													<?php 
														$fila2=mysql_fetch_assoc($resultadni); ?>
																<option value="<?php echo $fila2['dni'];  ?>" selected="selected" ><?php echo $fila2['dni'] ?></option>
															<?php	while ($fila2=mysql_fetch_assoc($resultadni)){    ?>		  
																		 <option value="<?php echo $fila2['dni'];  ?>" ><?php echo $fila2['dni'] ?></option> 
															<?php	} ?> </div>   
									</select>
										<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>CONSULTAS CARGA DE DATOS</B></legend>							
									<form action="consultaUsuario.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaUsuario" id="datepicker2"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
							<?php
									$sql = "SELECT * FROM plan";
									// Ejecutar Consulta
									$result = mysql_query($sql);
									//$fila= mysql_fetch_assoc($result);
						?>
						<fieldset style=" position:relative; width:60%;  height:auto; left:10% "><legend><B>LISTADO PLAN DESDE UNA FECHA</B></legend>							
									<form action="crearlistaPlan.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1"> 
													<b style="color:#0000FF">DESDE</b><input text="text" size="8" name="desde" id="datepicker8"/>
															<img src="IMAGENES/separadorFecha.jpg" /><b style="color:#0000FF">HASTA</b><input text="text" size="8" name="hasta" id="datepicker9"/>
									</div>			
									<div>PLAN:<select  name="plan" id="plan"> 
																			<?php  //introducir historial clinico 
																			 
																			 $consultaplan="SELECT * FROM plan ORDER BY plan asC";
																			 $sqlplan=mysql_query($consultaplan);
																			 $fila4=mysql_fetch_assoc($sqlplan); ?>
																			 <option value="<?php echo $fila4['plan']  ?>" selected="selected" ><?php echo $fila4['plan'] ?></option>
																			<?php	while ($fila4=mysql_fetch_assoc($sqlplan)){    ?>		  
																				 <option value="<?php echo $fila4['plan']  ?>" ><?php echo $fila4['plan'] ?></option>
																	<?php	} ?>   
									</select></div>	
														<input type="submit" value="BUSCAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												
								</form>
								
						</fieldset>
								
					</fieldset>	
											<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS EMITIDOS</B></legend>							
									<form action="listarBonos.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaBono" id="datepicker5"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>
												<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS </B></legend>							
									<form action="listarBonosEmitidos.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaBonoemitido" id="datepicker6"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
						
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS PARA RENDICION</B></legend>							
									<form action="listarRendicion.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">

													<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO INICIO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bonoInicio" id='bonoInicio' size="8"  style="border:groove; text-align:center"><BR/>  
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO FIN: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bonoFin" id='bonoFin' size="8"  style="border:groove; text-align:center"><BR/>  	
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS POR FECHA</B></legend>							
									<form action="listaPorFecha.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fecha" id="datepicker7"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>								
				</fieldset>								
				<?php	}
						else { 
							if( $valor=1 ){	 ?><div><b style="color:#FF0000">INGRESE LA FECHA , POR FAVOR VERIFICAR ANTES DE PRESIONAR </b> </div>	
											<fieldset style=" position:relative; width:60%; height:auto; left:10% "><legend><B>LISTAR HISTORIAL DEL PACIENTE</B></legend>	
																
											<form action="pruebapdf.php" method="POST" enctype="multipart/form-data">
												<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaInicio" id="datepicker"/>
															<img src="IMAGENES/separadorFecha.jpg" />
															<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="Limpiar" id="botLimpiar">
															<input onClick="location.href = 'pruebapdf.php' " type="BUTTON"  value="VOLVER" id="CANCELAR">
												</div>
											</form>
											</fieldset>		
											<fieldset style=" position:relative; width:60%; height:auto; left:10% "><legend><B>LISTAR HISTORIAL DEL PACIENTE POR DOCUMENTO</B></legend>							
											<form action="xdnipdf.php" target="_blank" method="POST" enctype="multipart/form-data">
												<div id="fechas1">
													<b style="color:#0000FF">DOCUMENTO</b><input text="text" name="dni" id="dni"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
										</form>
										</fieldset>	
																<fieldset style=" position:relative; width:60%;  height:auto; left:10% "><legend><B>CONSULTAS CARGA DE DATOS POR CADA USUARIO</B></legend>							
									<form action="consultaUsuario.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1"> 
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaUsuario" id="datepicker2"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="BUSCAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
								
						<?php
									$sql = "SELECT * FROM plan";
									// Ejecutar Consulta
									$result = mysql_query($sql);
									//$fila= mysql_fetch_assoc($result);
						?>
						<fieldset style=" position:relative; width:60%;  height:auto; left:10% "><legend><B>LISTADO PLAN DESDE UNA FECHA</B></legend>							
									<form action="listarPlan.php" target="_blank" method="POST" enctype="multipart/form-data">
								<div id="fechas1"> 
													<b style="color:#0000FF">DESDE</b><input text="text" size="8" name="desde" id="datepicker8"/>
															<img src="IMAGENES/separadorFecha.jpg" /><b style="color:#0000FF">HASTA</b><input text="text" size="8" name="hasta" id="datepicker9"/>
									</div>	
									<div>PLAN:<select  name="plan" id="plan"> 
																			<?php  //introducir historial clinico 
																			 
																			 $consultaplan="SELECT * FROM plan ORDER BY plan asC";
																			 $sqlplan=mysql_query($consultaplan);
																			 $fila4=mysql_fetch_assoc($sqlplan); ?>
																			 <option value="<?php echo $fila4['plan']  ?>" selected="selected" ><?php echo $fila4['plan'] ?></option>
																			<?php	while ($fila4=mysql_fetch_assoc($sqlplan)){    ?>		  
																				 <option value="<?php echo $fila4['plan']  ?>" ><?php echo $fila4['plan'] ?></option>
																	<?php	} ?>   
									</select></div>	
														<input type="submit" value="BUSCAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												
								</form>
								
						</fieldset>
					</fieldset>	
											<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS EMITIDOS</B></legend>							
									<form action="listarBonos.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaBono" id="datepicker5"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>							
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS </B></legend>							
									<form action="listarBonosEmitidos.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fechaBonoemitido" id="datepicker6"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>	
						<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS PARA RENDICION</B></legend>							
									<form action="listarBonosParaRendicion.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">

													<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO INICIO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bonoInicio" id='bonoInicio' size="8"  style="border:groove; text-align:center"><br/>  
								<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO FIN: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bonoFin" id='bonoFin' size="8"  style="border:groove; text-align:center"><BR/>  	
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>		
												<fieldset style=" position:relative; width:90%; height:auto; left:auto "><legend><B>LISTADO DE BONOS POR FECHA</B></legend>							
									<form action="listaPorFecha.php" target="_blank" method="POST" enctype="multipart/form-data">
									<div id="fechas1">
													<b style="color:#0000FF">FECHA</b><input text="text" name="fecha" id="datepicker7"/>
															<img src="IMAGENES/separadorFecha.jpg" />
														<input type="submit" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
								</form>
						</fieldset>						     
					<?php   }
					
					
					
					
						}
					?>
</div>	
</body>
</html>
