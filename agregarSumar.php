<?php
   include('class.ezpdf.php');
   require_once ("funciones.php");
	
/////////////////////////////////////////////////////////////////////////////

	session_start();
	$codi=$_GET['codi'];
	$fecha=date('Y-m-d');
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$script_tz = date_default_timezone_get();
	$hora =  date('H:i:s', gmdate('U'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>Agregar sumar a un paciente</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="FOLP">
		
		<meta name="Keywords" content="Facultad de odontologia,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
</head>

<body>
<div id="marco">
<?php	
	
$db = conectar_admin();
	//tomo los parametros enviados, les saco los espacios en blanco y los pongo en mayusculas
	if (!isset($_SESSION['pass'])){  	

					$dni=$_POST["dni"];
					
					$db = conectar_admin();
					//mysql_query("BEGIN WORK");
				
						$sql = "SELECT * FROM paciente WHERE  dni=$dni";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						if (( mysql_num_rows($result) == 0) && ($codi == 0)) 
						{
							//el paciente no existe
				
							mysql_query("COMMIT");
							desconectar();
							$url_relativa = "agregarPacienteAsumar.php?valor=0&parrafo='El paciente no se encuentra registrado'";
							redirigir($url_relativa);			
							
							
				
							exit();
						}
                      	else
						{   
							//saco el usuario para imprimir en pantalla
							
							$consUsuario="SELECT * FROM usuario WHERE usuario= '".$_SESSION['usuario']."'";
							$resUsuario=mysql_query($consUsuario);
							$filaUsuario=mysql_fetch_assoc($resUsuario);

							//obtengo la fecha
										$fecha=date('Y-m-d');
										$mes= substr($fecha,5,2);
										$dia= substr($fecha,8,2);
										$anos= substr($fecha,0,4);
											 //obtener datos paciente
										 $sqlpac="select * from paciente where dni=$dni";
										 $resul=mysql_query($sqlpac);
										 $filaPaciente=mysql_fetch_assoc($resul);
											//consulta para obtener el ultimo histiral del paciente
										$consultaUltima="select * from historiaclinica where dni= $dni  order by idHistoriaClinica desc limit 1";
										$resuUltimo=mysql_query($consultaUltima);
										$filaUltimo=mysql_fetch_assoc($resuUltimo);
										$apellido=$filaPaciente['apellido'];
										$nombre=$filaPaciente['nombre'];
										$direccion=$filaPaciente['direccion'];
										$localidad=$filaPaciente['localidad'];
										$materia=$filaUltimo['materia'];
										$historiaclinica=$filaUltimo['idHistoriaClinica'];
										//$hoja=$_POST['acta'];
										$plan=$filaUltimo['plan'];
										$usuario=$_SESSION['usuario'];										
										//$historia=$_POST['historia'];
										$diah=$filaUltimo['dia'];
										$mesh=$filaUltimo['mes'];
										$anosh=$filaUltimo['anos'];
										$variable='/';										
										$fechah=$diah.$variable.$mesh.$variable.$anosh;
										?>
			 </br></br></br></br> 
			 <span position: relative; right:-50px ><p style="color:#FF0000"><spam><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></spam></p></a>  </spam>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;AGREGAR PACIENTE AL PLAN SUMAR</B></legend>	  
					<div > 		
					<fieldset style=" width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#0000FF">
						  <legend align="center" style="font-size:30px; color:#006600">PACIENTE</legend>					
					<?php
									//realizo la consulta para obtener el ultimo historial del paciente
									echo 'NOMBRE: ';	echo $nombre; ?>
										   </br>
										<?php
									echo 'APELLIDO: ';	echo $apellido; ?>
										   </br>
										<?php
									echo 'DNI: ';	echo $dni; ?>
										   </br>
										<?php
										echo $fechah; ?>
										   </br>
										<?php
									echo 'HISTORIA CLINICA: ';	echo $historiaclinica; ?>   
					</fieldset>			
                      <a href="agregarAsumar.php?historiaClinica=<?php echo $historiaclinica; ?> ">Agregar sumar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agregarPacienteAsumar.php?valor=0&parrafo=''; ?> ">Cancelar</a>				
										<?php
                                     
		
													
						}	
				}


			
			else{
					desconectar();
					$url='loguearUsuario.php?valor=0';
					redirigir($url);
			}		  
				?>
</div>

</body>
</html>
