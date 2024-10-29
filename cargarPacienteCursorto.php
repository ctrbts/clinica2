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
					$_SESSION['dni']=$dni;
					desconectar();
					$db = conectar_admin();
					//mysql_query("BEGIN WORK");
				
						$sql = "SELECT * FROM pacienteorto WHERE  dni=$dni";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						if (( mysql_num_rows($result) == 0) && ($codi == 0)) 
						{
							//El paciente todavia no se atendio
				
							mysql_query("COMMIT");
							desconectar();
							$url_relativa = "pacienteorto.php?valor=1&dni=$dni";
							desconectar();
							redirigir($url_relativa);			
							//desconectamos la BD
							
				
							exit();
						}
						else
						{   
							//saco el usuario para imprimir en pantalla
							
							$consUsuario="SELECT * FROM usuario WHERE usuario= '".$_SESSION['usuario']."'";
							$resUsuario=mysql_query($consUsuario);
							$filaUsuario=mysql_fetch_assoc($resUsuario);
							if($codi == 0){
											//aca vamos a  paciente del curso, ya que el paciente ya existe
									$url_relativa = "pacienteorto.php?valor=2&dni=$dni";
									
									redirigir($url_relativa);
							}
							else{ 
							 	if($_GET['codi'] == 2){
									//aca insertamos si el paciente dependiendo si hay que cargar las modificaciones, hay que armar el string de la consulta y volvemos a la carga de un nuevo registro
								
										
									$nyap=$_POST['nyap'];
									
									
											//obtengo la fecha
									$consulta2="INSERT INTO pacienteorto(dni, nyap) VALUES ('$dni','$nyap')";
									$sqlpac=mysql_query($consulta2);
									$url='verinfopacientecursorto.php?valor=0';
									redirigir($url);
								}
						}    
														
					}	
	}						
			else{
					desconectar();
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
