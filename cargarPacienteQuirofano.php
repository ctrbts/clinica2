<?php

 require_once ("funciones.php"); 
$valor=$_GET['valor'];
$db = conectar_admin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>INGRESAR</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="FOLP">
		
		<meta name="Keywords" content="Facultad de odontologia,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">

	</head>


	<body >
	<div id="marco">
  <?php 
				$bono=$_POST['bono'];
                $dni=$_POST['dni'];
				$nyap=$_POST['nyap'];
				$docegradua=$_POST['docegradua'];
				$fecha=$_POST['fecha'];
  				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$script_tz = date_default_timezone_get();
				$hora = date('H:i', gmdate('U')); 

  if($valor == 1){   //este paciente se cargo, por lo tanto existe
				 //inserto al paciente en caso de no encontrarlo en la base de datos
				 $consudocegradua="select * from docentegraduado where docentegraduado ='$docegradua'";
				 $respuestaPaciente=mysql_query($consudocegradua);
				 if(mysql_num_rows($respuestaPaciente) == 0){
					 $consuInserAlu="INSERT INTO docentegraduado (docentegraduado) VALUES ('$docegradua')";
					 $respuestaalu=mysql_query($consuInserAlu);
					$idDocegradua=mysql_insert_id();	
				 }
				 else{
					 $fila=mysql_fetch_assoc($respuestaPaciente);
					 $idDocegradua=$fila['iddocentegraduado'];
					 
				 }
				$sql2="select * from tipoBono where idBono = 1";
				$resulta=mysql_query($sql2);
				$fila=mysql_fetch_assoc($resulta);				 			 
				$valor=$fila['valor']; 
                $consulta="INSERT INTO bonoquirofano (dni, nyap, valor, idDocenteGraduado, fecha, hora) VALUES ('$dni','$nyap','$valor','$idDocegradua','$fecha', '$hora')";
				$respuesta=mysql_query($consulta);
				$idBono=mysql_insert_id();

				$tipoBono=$fila['bono'];
				$consulbono="select * from bonoquirofano where idBonoQuirofano = '$idBono'";
				$resu=mysql_query($consulbono);
				$filaBono=mysql_fetch_assoc($resu);
				$iddocentegraduado=$filaBono['iddocentegraduado'];
				
			?>
            
            <!-- Desde aca -->
              <div style="position:relative; left:30px; right:30px; top:220px">
              <fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
					 <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BONO USO DE QUIROFANO</B></legend>	  
									<table align="center">
                                    <tr><td>BONO #: <?php echo  $idBono;  ?> </td></tr>
                                    <tr>
                                            <td><b style="color:#000">FECHA: <b style="color:#006"></b> <?php echo $fecha; ?></b></td><td><b style="color:#000">HORA: </b> <b style="color:#006"> <?php echo $hora; ?></b></td></tr>
                                     <tr>       <td width="100"><b style="color:#000">PACIENTE:</b> <b style="color:#006">  <?PHP echo $nyap; ?> </b></td></tr>
                                     <tr><td><b style="color:#000"> DNI: </b>  <b style="color:#006">  <?php echo $dni; ?> </b></td></tr> 
                                       <tr>      <td><b style="color:#000">DOCENTE/GRADUADO: </b> <b style="color:#006">  <?php echo $docegradua; ?> 
                                      </b>     
                                            
                                    </tr>    
                                       <tr>     <td width="600px" ><b style="color:#000">Tipo de Bono:</b><b width="200px" style="color:#006"><?php  echo $bono; ?> </b> </td>
                                            
                                    </tr>
									                                       <tr>     <td width="600px" ><b style="color:#000">VALOR:</b><b width="200px" style="color:#006"><?php  echo $valor; ?> </b> </td>
                                            
                                    </tr>
                                    </table>		
			 </fieldset>
  <!-- hasta aca -->
            <span><a href="cerrarsesion.php" style="font-size:20px">Cerrar session</a><b> - </b><a href="ingresar.php" style="font-size:18px; ">VOLVER AL INICIO</a> 
            	<b> - </b><a target="_blank" href="imprimirBonoQuirofano.php?idBono=<?php echo $idBono; ?>" >IMPRIMIR BONO USO DE QUIROFANO</a>
				<b> - </b><a  href="bonoquirofano.php?valor=0&idPaciente=0"> VOLVER A INGRESAR BONO DE USO DE QUIROFANO </a></span>
				
								
<?php	 
     }
     
			
  ?>
						
</body>

</html>