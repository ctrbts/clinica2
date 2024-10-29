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
</script>
</head>

<body>
	<div id="marco">
								 <div> <img src="imagenes/banner.jpg" style="width:70%; height:15%; position:relative; left:25%px" > 
						<div style="position:relative; left:75%; width:10%; top:20px; heigh:10%; right:15%"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " >
					    <br/>
						<br/>
						<?php
									$sql = "SELECT * FROM materia";
									// Ejecutar Consulta
									$result = mysql_query($sql);
									//$fila= mysql_fetch_assoc($result);
						?>
						<fieldset style=" position:relative; width:60%;  height:auto; left:10% "><legend><B>LISTADO PLAN DESDE UNA FECHA</B></legend>							
									<form action="listarAltaComplejidad.php" target="_blank" method="POST" enctype="multipart/form-data">
								<div id="fechas1"> 
													<b style="color:#0000FF">DESDE</b><input text="text" size="8" name="fechaInicio" id="datepicker6"/>
															<img src="IMAGENES/separadorFecha.jpg" /><b style="color:#0000FF">HASTA</b><input text="text" size="8" name="fechaFin" id="datepicker7"/>
									</div>	
									<div>MATERIA:<select  name="materia" id="materia"> 
																			<?php  //introducir historial clinico 
																			 
																			 $consultaplan="SELECT * FROM materia ORDER BY materia asC";
																			 $sqlplan=mysql_query($consultaplan);
																			 $fila4=mysql_fetch_assoc($sqlplan); ?>
																			 <option value="<?php echo $fila4['materia']  ?>" selected="selected" ><?php echo $fila4['materia'] ?></option>
																			<?php	while ($fila4=mysql_fetch_assoc($sqlplan)){    ?>		  
																				 <option value="<?php echo $fila4['materia']  ?>" ><?php echo $fila4['materia'] ?></option>
																	<?php	} ?>   
									</select></div>	
														<input type="submit" value="BUSCAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												
								</form>
								
						</fieldset>
										     
					
</div>	
</body>
</html>
