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

	//tomo los parametros enviados, les saco los espacios en blanco y los pongo en mayusculas
	if (!isset($_SESSION['pass'])){  	

					$dni=$_POST["dni"];
					//desconectar();
					$db = conectar_admin();
			
						$sql = "SELECT * FROM persona WHERE  documento=$dni";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						if (( mysql_num_rows($result) == 0) && ($codi == 0)) 
						{
							//la persona a esterilizar no existe
		
							mysql_query("COMMIT");
							desconectar();
							$url_relativa = "persona.php?valor=1&dni=$dni";
							desconectar();
							redirigir($url_relativa);			
							exit();
								
						}
						else {
							if($codi == 2){
								 $dni=$_POST['dni'];
								 $nyap=$_POST['nyap'];
								 //$numester=$_POST['ester'];
								 $especialidad=$_POST['especialidad'];
								 $consulta="INSERT INTO persona (documento, nombreyapellido,idEspecialidad) VALUES ('$dni','$nyap','$especialidad')";
								 $result=mysql_query($consulta);
								/* echo $dni;
								 echo ' - ';
								 echo $nyap;
								 echo ' - ';
								
								 echo ' - ';
								 echo $especialidad;
								 echo ' - ';*/
								 //obtener el valor de la especialidad
								$consules="select * from especialidad where idEspecialidad = $especialidad";
								$sqles=mysql_query($consules);
								$filaes=mysql_fetch_assoc($sqles);
								$precio= $filaes['valor'];
								 // seteo de la fecha y hora
								date_default_timezone_set('America/Argentina/Buenos_Aires');			
								$script_tz = date_default_timezone_get();
								$hora = date('H:i:s', gmdate('U')); 			
				
								//agrego el bono y luego lo tengo que recuperar
								$consulBono="INSERT INTO bonoesterilizacion (identificador, dni, fecha, hora, valor) values ('$especialidad','$dni','$fecha','$hora', '$precio')";
								$resul=mysql_query($consulBono);

								$url="bonoEsterilizacionPdf.php?dni=$dni";
								 redirigir($url);
							}
							else{
								$dni=$_POST['dni'];

								if(isset($_POST['espe'])){	
									$especial=$_POST['especializacion'];
									$consu="Update persona Set idEspecialidad = '$especial' Where documento = $dni";
									$sqlconsues=mysql_query($consu);	
								}
								//consulta para obtener la especialidad de la persona mediante el dni
								$consulespe="select * from persona where documento = $dni";
								$sqlespe=mysql_query($consulespe);
								$fila=mysql_fetch_assoc($sqlespe);
								$especialidad=$fila['idEspecialidad'];
															echo $especialidad;	 
								 //obtener el valor de la especialidad
								$consules="select * from especialidad where idEspecialidad = $especialidad";
								$sqles=mysql_query($consules);
								$filaes=mysql_fetch_assoc($sqles);
								$precio= $filaes['valor'];
								 // seteo de la fecha y hora
								date_default_timezone_set('America/Argentina/Buenos_Aires');			
								$script_tz = date_default_timezone_get();
								$hora = date('H:i:s', gmdate('U')); 			
				
								//agrego el bono y luego lo tengo que recuperar
								$consulBono="INSERT INTO bonoesterilizacion (identificador, dni, fecha, hora, valor) values ('$especialidad','$dni','$fecha','$hora', '$precio')";
								$resul=mysql_query($consulBono);								
								$url="bonoEsterilizacionPdf.php?dni=$dni";
								redirigir($url);							
							}
						}
								
				}

					
			else{
					//desconectar();
					$url='loguearUsuario.php?valor=0';
					redirigir($url);
			}		  
				?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CARGAR PACIENTE</title>
</head>

<body>
</body>
</html>
