<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor = $_GET['codi'];
 $fecha=$_POST['fecha'];
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
		
	   <?php 
 
	   	
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 						
			 <span style="position: relative; right:-50px " ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
							<b>Clickee sobre el paciente para emitir el bono</b>
							<?php	
							//busqueda para obtener los datos del paciente

								  $dni=$_POST['dni'];
								  $nombre=$_POST['nombre'];
								   $apellido=$_POST['apellido'];
                                   $nyap=''; 								   
								   $nyap.=$nombre.' '.$apellido;
									$docegradua=$_POST['docegradua'];
									
								  $sql="select * from pacienteQuirofano where dni = '$dni'";
								  $resultado=mysql_query($sql);
						//coloco la carga de datos y lo envio para emitirBono.php
						    if($valor == 0){
	
								  // en caso de que el paciente exista no hay que agregarlo, solo muestra los datos y carga al alumno
								  //hacer la consulta para ver si el paciente se encuentra dentro del listado de paciente

								  if(mysql_num_rows($resultado) == 0){
									  //enviar a bonoquirofano.php?valor=1 para la carga completa
									  $url_relativa = "bonoquirofano.php?valor=1&idPaciente=0&dni=$dni&nyap=$nyap&docegradua=$docegradua&fecha=$fecha";
                            		  redirigir($url_relativa); 
								  }
								  else{
									  
									    while ($fila=mysql_fetch_assoc($resultado)){
									  
												  $idPaciente=$fila['idPaciente'];
												  $dni=$fila['dni'];
												  $nyap=$fila['nyap'];
										  ?>
												  <div >
												  <a href="bonoquirofano.php?valor=1&idPaciente=<?php echo $idPaciente; ?>&dni=<?php echo $dni; ?>&nyap=<?php echo $nyap; ?>&docegradua=<?php echo $docegradua ?>&fecha=<?php echo $fecha ?>"><p style="font-size:25px; color:#003300"><?php echo $dni?>&nbsp;&nbsp;&nbsp;<?php echo $nyap ?></p></a>
												  </div>
						          <?php 	}
									} ?>	
							<a  href="bonoQuirofano.php?valor=0&DNI=0"> VOLVER  </a><b>  -  </b><a href="ingresar.php">	VOLVER  AL INICIO </a><b>  -  </b>				
							<a href="cerrarSesion.php">	CERRAR SESION </a>										
							<?php } ?>
						</div>
     </div>		
</body>

</html>