<?php
require_once ("funciones.php");
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
		<title>Verificacion de datos</title>
	</head>

<body>

<?php
  session_start();
  if (!isset($_SESSION['pass'])){  
		 $dni=$_GET["dni"];
		 $db = conectar_admin();
		  $sql = "SELECT * FROM historiaclinica WHERE  dni=$dni ORDER BY idHistoriaClinica DESC LIMIT 1";
		  // Ejecutar Consulta
		  $result = mysql_query($sql);
		  $tupla=mysql_fetch_assoc($result);
		  $fecha='';
		  $dia=$tupla['dia'];
		  $mes=$tupla['mes'];
		  $anos=$tupla['anos'];
		  $fecha.="\n"." ".$anos."-".$mes."-0".$dia."";
		  
		  //echo $fecha; 
		  //echo ' ';
		  $fechaHoy=date('Y-m-d');
		  $fecha2='';
		  $mes2= substr($fechaHoy,5,2);
		  $dia2= substr($fechaHoy,8,2);
		  $anos2= substr($fecha,0,6);
		  $fecha2.="".$anos2."-".$mes2."-".$dia2."";
		  $fechauno=trim($fecha, ' ');
		 
		  $fechados=trim($fecha2, ' '); 
		  
		   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1050px; height:150px; position:relative; left:-200px" /> </div>
			 <spam  ><p style="color:#FF0000"><spam position:relative; right:-20px><?php echo $_SESSION["usuario"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</spam><div style="position:relative; top:-36px; right:-80px" > <a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</spam></p></a>  </spam>	
			<div style="position:relative; left:1050px; top:-80px; width:100px; heigh:100px; right:100px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
			 <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  
					<div > 
						
		  <?php

		  
		  if ($fechauno != $fechados){
		  

		   echo 'El paciente con D.N.I: '; echo ' '; 
		   ?> <p style="font-size:22px; color:#FF0000" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $dni; ?><?php
		   ?> 
		   <p style=" font-size:30px; color:#FF0000" > <?php   
		   
		   		echo 'se ha guardado correctamente';
		     ?></p><?php
		  }
		  else {
		    echo 'El paciente con D.N.I: '; echo '    '; 
		    echo $dni;		  
			?><br/> <?php
			echo 'no se ha guardado los datos';
		
		  }
		?> </fieldset >
			<!-- <div style="position:relative; left:-200px; top:10px"><a href="paciente.php?valor=0">Volver a ingresar DNI</a>&nbsp;&nbsp; -- &nbsp;&nbsp;<a href="bonoPdf.php?valor=1&dni=<?php echo $dni ?>" target="_blank">Imprimir Bono</a> &nbsp;&nbsp; -- &nbsp;&nbsp;<a href="bonoPdf.php?valor=2&dni=<?php echo $dni ?> ">Reimprimir bono</a> -->
	 
			</div>	
		 <?php
		desconectar();
		$url='bonificar.php?valor=1&dni='.$dni ;  
		redirigir($url);
		/*$url='paciente.php?valor=0';
		redirigir($url);	*/	

	}	  
 else{
		desconectar();
		$url='loguearUsuario.php?valor=0';
		redirigir($url);
	}	
?>
</body>
</html>