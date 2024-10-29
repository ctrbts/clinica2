<?php 
 session_start();
 require_once ("funciones.php"); 
$conectar=conectar_admin();
 $valor=$_GET['valor'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>consultas historial paciente</title>
<LINK REL="stylesheet" href="../sdt/css/inicio.css" TYPE="text/css">
<script type="text/javascript" src="validar/validardato.js"></script>
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
		dateFormat: 'yy-mm-dd',
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


</script>
</head>

<body>
	<div id="marco">
								 <div> <img src="../sdt/imagenes/banner.jpg" style="width:70%; height:15%; position:relative; left:25%px" > 
						<div style="position:relative; left:75%; width:10%; top:20px; heigh:10%; right:15%"><img src="../sdt/imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " >
					<?php if($valor == 0){ ?>
                 						
						<fieldset style=" position:relative; width:50%; height:auto; left:auto "><legend align='center'><B>NUMERO DE BONO A CANCELAR</B></legend>							
									<form action="cancelarBonoQuirofano.php"  method="POST" enctype="multipart/form-data">
									<div>
													<b style="color:#0000FF"># de Bono</b><input text="text" name="bono" id="bono"/>
															<img src="../sdt/IMAGENES/separadorFecha.jpg" />
														<input onClick="validarNBono(this.form)" type="button" value="LISTAR" id="botBuscar"> 
															<input type="reset" value="LIMPIAR" id="botLimpiar">
															<input onClick="location.href = 'ingresar.php'  " type="BUTTON"  value="VOLVER" id="CANCELAR">
															
												</div>
									</form>
							</fieldset>								
						</fieldset>		                          
                           <span style="position:relative; left:100px; top:-170px;"><span><a href="ingresar.php" style="font-size:20px">Volver</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="cerrarsesion.php" style="font-size:20px">Cerrar session</a></span></span>
						<?php }
	
				
						?>

                        
</div>	
</body>
</html>
