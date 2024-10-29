<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor=$_GET['valor'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>Bono uso de quirofano</title>

			<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="Facultadad de odontologia - Ver notas / noticias anteriores">
		
		<meta name="Keywords" content="FOLP,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		<script type="text/javascript" src="validar/validarAtencionPaciente.js"></script>
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


	<body >
		
	    
		<div style="position: relative; top:-200px" >
	
	</div>	
			<div id="marco">
	 		
	   
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 									
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BONO DE USO DE QUIROFANO</B></legend>	  
					<div > 
						
							<?php	
					if ( $valor == 0 ) { 

					 ?>
									
									<form action="buscarPacienteQuirofano.php?codi=0&dni=0&nyap=0" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="text" maxlength="8" name="dni" id='dni' size="10"  style="border:groove; text-align:center"><BR/> 
														<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">NOMBRE: &nbsp;&nbsp;<input  type="text" maxlength="100" name="nombre" id='nombre' size="50"  style="border:groove; text-align:center"><BR/>
														<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">APELLIDO: &nbsp;&nbsp;<input  type="text" maxlength="100" name="apellido" id='apellido' size="50"  style="border:groove; text-align:center"><BR/>
														<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DOCENTE/GRADUADO: &nbsp;&nbsp;<input  type="text" maxlength="100" name="docegradua" id='docegradua' size="50"  style="border:groove; text-align:center"><BR/>
														<div style=" position:relative; left:-120px; top:-200px; width:1024px; right:200px" > <b style="color:#0000FF">FECHA : </b><input text="text" name="fecha" id="datepicker"/></div>
													<div style="margin-left:18%">	<input  type="submit" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:18px">	
											
										<span style=" position: relative; top:150px;  right:150px" ><p style="position:relative; top:-600PX;color:#FF0000;RIGHT:-100px"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-736px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>								
									   </div>
											
									   </div>
			
									</div>
									<div style="margin-left: 150px;">
									<fieldset style=" width:600px; heigh:300px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">	
<legend align="center" style="font-size:30px; color:#006600">OPCIONES PARA IR A OTROS BONOS</legend>	  
					<div >
					<br />
				<div >
													<a href="paciente.php?valor=0"target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Atencion al Pacientes</p></a>	
							
				</div>
					<div >
	<a href="escaneoDeBoca.php?valor=0" target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Bono Escaneo De Boca</p></a>
						</div>						
						<div >
							<a href="servicioEsterilizacion.php?valor=0" target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Bono de Esterilización</p></a>
						</div>
						<div >
							<a href="bonoCurso.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono Curso</p></a>
							
						</div>
						<div >
							<a href="bonoCursorto.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono contribucion de Ortodoncia</p></a>
							
						</div>
									
</fieldset>		</div>									   
						<?php
						}
						else{
							
								if( $valor == 1){

									//sino lo encuentro al paciente lo cargo  junto con la del alumno  y lo envio para emitirBono.php
									$dni=$_GET['dni'];
									$nyap=$_GET['nyap'];
									$docegradua=$_GET['docegradua'];
									//consulta con el dni, si esta cargo los datos, sino esta dejo los datos
                                    $sql="select * from pacientequirofano where dni='$dni'";
								    $respuesta=mysql_query($sql);
									
									if(mysql_num_rows($respuesta) != 0){
									     $fila=mysql_fetch_assoc($respuesta);
										 $dni=$fila['dni'];
										 $nyap=$fila['nyap'];

									}else{
										//el paciente no se encuentra en la base de datos por lo tanto lo ingresamos
										$inserPa="insert into pacientequirofano(dni, nyap) value('$dni','$nyap')";
										$resul=mysql_query($inserPa);
        							}
									
									$fecha=$_GET['fecha'];
									$_session['dnipaciente']=$dni;
									$sql2="select * from tipoBono where idBono = 1";
									$resulta=mysql_query($sql2);
									$fila=mysql_fetch_assoc($resulta);
									?><form action="cargarPacienteQuirofano.php?dni=<?php echo $dni; ?>&nyap=<?php echo $nyap?>&valor=1&doceGradua=<?php echo $docegradua ?>" method="POST" enctype="multipart/form-data">
									 <fieldset><legend align="center">PACIENTE</legend>
									                 <div>DNI: &nbsp;&nbsp;<input type="text" name="dni" id="dni" size="9" maxlength="10" value="<?php echo $dni; ?>">
													<div>Nombre y Apellido: &nbsp;&nbsp;<input type="text" name="nyap" id="nyap" size="62" maxlength="200" value="<?php echo $nyap; ?>">
													<div>Docentes/Graduados: &nbsp;&nbsp;<input type="text" name="docegradua" id="docegradua" size="62" maxlength="200" value="<?php echo $docegradua; ?>">
													<div>Bono: &nbsp;&nbsp;<input type="text" name="bono" id="bono" size="62" maxlength="50" value="<?php echo $fila['bono'] ?>" readonly="readonly">
													<div>Fecha: &nbsp;&nbsp;<input type="text" name="fecha" id="fecha" size="62" maxlength="50" value="<?php echo $fecha ?>" readonly="readonly">
									 </FIELDSET>
                                     
										<input  type="SUBMIT" value="EMITIR BONO" name="GUARDAR" >	
									</form>
									
									<br/>
							<br/>
							<br/>
							<br/>
									</div>
									<div style="margin-left: 150px;">
									<fieldset style=" width:600px; heigh:300px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">	
<legend align="center" style="font-size:30px; color:#006600">OPCIONES PARA IR A OTROS BONOS</legend>	  
					<div >
					<br />
				<div >
													<a href="paciente.php?valor=0"target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Atencion al Pacientes</p></a>	
							
				</div>
					<div >
	<a href="escaneoDeBoca.php?valor=0" target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Bono Escaneo De Boca</p></a>
						</div>						
						<div >
							<a href="servicioEsterilizacion.php?valor=0" target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Bono de Esterilización</p></a>
						</div>
						<div >
							<a href="bonoCurso.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono Curso</p></a>
							
						</div>
						<div >
							<a href="bonoCursorto.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono contribucion de Ortodoncia</p></a>
							
						</div>	
<span style=" position: relative; top:180px;  right:-50px" ><p style="color:#FF0000"><?php echo $_SESSION["usuario"] ?></span><span style="position:relative; top:36px; right:-200px"><a href=ingresar.php>VOLVER</a></span><span style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>						
									<?php
									
							    }
								else{
									
									//el paciente encuentrA, cargo al alumno y lo envio a emitirBono.php
									$docegradua=$_GET['docegradua'];
									$idPaciente=$_GET['idPaciente'];	
									$dni=$_GET['dni'];
									$nyap=$_GET['nyap'];
									$fecha=$_GET['fecha'];									
									$_session['dnipaciente']=$dni;
									$sql2="select * from tipoBono where idBono = 7";
									$resulta=mysql_query($sql2);
     								$fila=mysql_fetch_assoc($resulta);
									?><form action="cargarPacienteQuirofano.php?dni=<?php echo $dni; ?>&nyap=<?php echo $nyap?>&valor=1&doceGradua=<?php echo $docegradua ?>" method="POST" enctype="multipart/form-data">
									 <fieldset><legend align="center">PACIENTE</legend>
									                 <div>DNI: &nbsp;&nbsp;<input type="text" name="dni" id="dni" size="9" maxlength="10" value="<?php echo $dni; ?>">
													<div>Nombre y Apellido: &nbsp;&nbsp;<input type="text" name="nyap" id="nyap" size="62" maxlength="200" value="<?php echo $nyap; ?>"></div>
													<div>Docentes/Graduados: &nbsp;&nbsp;<input type="text" name="docegradua" id="docegradua" size="62" maxlength="200" value="<?php echo $docegradua; ?>">
													<div>Bono: &nbsp;&nbsp;<input type="text" name="bono" id="bono" size="62" maxlength="200" value="<?php echo $fila['bono'] ?>" readonly="readonly">
													<div>Fecha: &nbsp;&nbsp;<input type="text" name="fecha" id="fecha" size="62" maxlength="50" value="<?php echo $fecha ?>" readonly="readonly">													
									 </FIELDSET>
                                      	
										<input onClick="validarQuirofano(this.form)" type="button" value="EMITIR BONO" name="GUARDAR" >	
									</form>
									<?php
								}
							
							
						} ?>
												
							<div style="position:relative; top: 50px;">						<a  href="bonoQuirofano.php?valor=0&DNI=0"> VOLVER  </a><b>  -  </b><a href="ingresar.php">	VOLVER  AL INICIO </a><b>  -  </b>				
							<a href="cerrarSesion.php">	CERRAR SESION </a>
						</div>
			
						
</body>

</html>