<?php
 session_start();
 require_once ("funciones.php"); 
$bono=$_POST['bono'];
$conectar=conectar_admin();
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
		<script language='javascript' src='validar/validardato.js'>
		</script>
	</head>


	<body >
		<div id="marco">
	   <?php 
		$consulta="select * from bonoQuirofano where idBonoQuirofano = '$bono'";	
	    $resultado=mysql_query($consulta);
	   	$fila=mysql_fetch_assoc($resultado);
		$nyap=$fila['nyap'];
		$dni=$fila['dni'];
		$valor=$fila['valor'];
		$fecha=$fila['fecha'];
		$cancelado= $fila['cancelado'];
		echo $bono;
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 									
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IMPRIMIR BONO CANCELADO</B></legend>	  
					<div > 
								<form action="imprimirBonoCanceladoQuirofano.php?bono=$bono" target="_blank" method="POST" enctype="multipart/form-data" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO NUMERO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bono" id="bono" size="8" value=<?php echo $bono ?>  style="border:groove; text-align:center" ><BR/> 
												<b style="color:#3380FF" >NOMBRE Y APELLIDO DEL PACIENTE: <?php echo $nyap; ?></b><br>
												<b style="color:#3380FF" >DNI: <?php echo $dni; ?></b>
																										
																				 <div style="margin-left:18%">	<input type="submit" value="IMPRIMIR">&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
								</form><br />
						 </FIELDSET>
                        												
							<div style="position:relative; top: 50px;">						<b>  -  </b><a href="ingresar.php">	VOLVER  AL INICIO </a><b>  -  </b>				
							<a href="cerrarSesion.php">	CERRAR SESION </a>
						</div>
			
						
</body>

</html>