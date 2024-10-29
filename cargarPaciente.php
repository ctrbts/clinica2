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
					desconectar();
					$db = conectar_admin();
					//mysql_query("BEGIN WORK");
				
						$sql = "SELECT * FROM paciente WHERE  dni=$dni";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						if (( mysql_num_rows($result) == 0) && ($codi == 0)) 
						{
							//el nombre de paciente no existe
				
							mysql_query("COMMIT");
							//$tipo=$_POST['tipodoc'];
							desconectar();
							$url_relativa = "paciente.php?valor=1&dni=$dni";
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
											//aca vamos a  paciente.php ya que el paciente ya existe
									$url_relativa = "paciente.php?valor=2&dni=$dni";
									
									redirigir($url_relativa);
							}
							else{ 
							 	if($_GET['codi'] == 2){
									//aca insertamos si el paciente dependiendo si hay que cargar las modificaciones, hay que armar el string de la consulta y volvemos a la carga de un nuevo registro
									$_SESSION['dni']=$dni;	
									$apellido=$_POST['apellido'];
									$nombre=$_POST['nombre'];
									$direccion=$_POST['direccion'];
									$localidad=$_POST['local'];
									$cadena="UPDATE paciente SET ";
									$cad=",";
									
									//$cadena="\""."SELECT codigo, autor, titulo, texto, fechadeCreacion, borrado FROM articuloDocumento WHERE";
									//aca hacemos el insert
									if(isset($_POST['ape']) || isset($_POST['nom']) || isset($_POST['dir']) || isset($_POST['localidad']) ){
										
																	
												if (isset($_POST['ape'])){
															$apellido=$_POST['apellido'];
															$cadena.= "\n"."  `apellido` = '".$apellido."'  ";
															
													}		
												if (isset($_POST['ape'])){
												        if(isset($_POST['nom'])){
															$cadena.=$cad;
															$nombre=$_POST['nombre'];
															$cadena.= "\n"."  `nombre` = '".$nombre." ' " ;
														}
													}	
													else{
													      if(isset($_POST['nom'])){
															$nombre=$_POST['nombre'];
															$cadena.= "\n"."  `nombre` = '".$nombre." ' " ;
															
															}
														}
												if (isset($_POST['nom'])|| isset($_POST['ape'])){
												      if(isset($_POST['dir'])){
															$cadena.=$cad;
															$direccion=$_POST['direccion'];
															$cadena.= "\n"."  `direccion` = '".$direccion."' ";
													   	}	
												}
												else{
															$direccion=$_POST['direccion'];
															$cadena.= "\n"."  `direccion` = '".$direccion."' ";

												}
												if (isset($_POST['nom'])|| isset($_POST['ape'])||isset($_POST['dir'])){
												      if(isset($_POST['local'])){
													       
															$cadena.=$cad;
															$localidad=$_POST['local'];
															$cadena.= "\n"."  `localidad` = '".$localidad."' ";
														}
												}	
												else{
												       		 $cadena.=$cad;
															$localidad=$_POST['local'];
															$cadena.= "\n"."  `localidad` = '".$localidad."' ";
												}
													
												 $cadena.=" WHERE dni=".$dni."" ;	
											  $consulta=mysql_query($cadena); 
	
												 
										}
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
										$consultaUltima="select * from historiaclinica where dni= $dni  order by idHistoriaClinica desc";
										$resuUltimo=mysql_query($consultaUltima);
										$filaUltimo=mysql_fetch_assoc($resuUltimo);
										$apellido=$filaPaciente['apellido'];
										$nombre=$filaPaciente['nombre'];
										$direccion=$filaPaciente['direccion'];
										$localidad=$filaPaciente['localidad'];
										$materia=$filaUltimo['materia'];
										$hoja=$_POST['acta'];
										$plan=$filaUltimo['plan'];
										$usuario=$_SESSION['usuario'];										
									$historia=$_POST['historia'];	
									//realizo la consulta para obtener el ultimo historial del paciente
										$sqlUltimoHsito="select * from historiaclinica where dni='$dni' order by idHistoriaClinica desc limit 1";
										$resulUlti=mysql_query($sqlUltimoHsito);
										$filaPa=mysql_fetch_assoc($resulUlti);
                                     //para verificar si esta seteado el radio button para sumar 
									if(isset($_POST['modificarSumar'])){
										//echo 'entro en moficar';
										if($_POST['sumar']==0){
											$sumar=$_POST['sumar'];
											$fechaSumar=$fecha;
											echo 'entro en asignacion de  sumar';
										}
										else{
											 $sumar=$_POST['sumar'];
											$fechaSumar="0000-00-00";
											echo 'entro en no asignacion';
										}
									}
									else{
										// echo 'no entro en moficar'; no se quita o se lo asigna el plan sumar
										$sumar=$filaPa['sumar'];
										$fechaSumar=$filaPa['fechaSumar'];
										echo 'no se asigno nada de sumar';
									}
									//verificar el seteo del plan
									if(isset($_POST['planes'])){
										$plan=$_POST['plan'];
									}
									else{
										
										$plan=$filaPa['plan'];
									}
									//verificar el seteo de la materia
									if(isset($_POST['mat'])){
										$materia=$_POST['materia'];
									}
									else{
										
										$materia=$filaPa['materia'];
									}									
									
									if(($historia != '') || ($historia == '')){
													
								     //hay que ver si es nuevo el paciente y si es nuevo insertarlo y luego insertar el historial
											if ( mysql_num_rows($result) == 0){
												//el  paciente no existe, insertar el paciente
												
												$cons="INSERT INTO paciente (dni, apellido, nombre, direccion, localidad) VALUES ('$dni','$apellido','$nombre','$direccion','$localidad')";	
												$result=mysql_query($cons);	

											}	 
											//hay que hacer el string para realizar la consulta si se cambio el plan o la materia sino se sostiene todo
				
										//hacer una consulta y obtener el valor de la materia
										$sqlMateria="select * from materia where materia='$materia'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor=$filamat['valor'];
									
											
									
											      $consultHistoria="INSERT INTO historiaClinica (dia, mes, anos, dni, hora, apellido, nombre, direccion, localidad, materia, hoja, plan, sumar, fechaSumar, usuario, historia,valor) values ('$dia','$mes','$anos', '$dni','$hora','$apellido', '$nombre', '$direccion', '$localidad', '$materia', '$hoja', '$plan', '$sumar', '$fechaSumar', '$usuario', '$historia', '$valor' ) ";
																				
											$resultadoHistoria=mysql_query($consultHistoria);
											 
														
														desconectar();
													//echo $consultHistoria; 	
												
												$url_relativa = "verificarPaciente.php?dni=$dni";
												redirigir($url_relativa); 
												
												
												
													
										}	
										//en caso que no ingrese ninguna observacion no se hace nada
										else{
										     
												$url_relativa = "paciente.php?valor=0";
												redirigir($url_relativa);
											}
							}
							else{
								if($_GET['codi'] == 1){										
										//aca insertamos el paciente nuevo con su atencion y volvemos a la carga de un nuevo registro
												
											
										$tipo=$_POST['tipodoc'];
										$apellido=$_POST['apellido'];
										$nombre=$_POST['nombre'];
										$direccion=$_POST['direccion'];
										$localidad=$_POST['local'];
										$plan=$_POST['plan'];
										$materia=$_POST['materia'];
										//consulta para obtener el precio del bono
										$sqlMateria="select * from materia where materia='$materia'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor=$filamat['valor'];		
																			
										$dni=$_POST['dni'];
										$_SESSION['dni']=$dni;
										$hoja=$_POST['acta'];
										$fecha=date("Y/m/d");
										$mes= substr($fecha,5,2);
										$dia= substr($fecha,8,2);
										$anos= substr($fecha,0,4);
										$usuario= $_SESSION['usuario']; 

										//$usuario=$filUsuario['usuario'];
										$historia=$_POST['historia'];
										//echo $tipo;
										//aca hacemos el insert del paciente
										 $sql2="INSERT INTO paciente (dni,tipodoc,apellido,nombre,direccion,localidad) VALUES ('$dni','$tipo','$apellido','$nombre','$direccion','$localidad')";
										$result=mysql_query($sql2);
										//vemos si es sumar ponemos sumar en 0 y le agregamos la fecha en caso contrario ponemos 1 y fecha en 0000-00-00
										if(($_POST['plan'] == 'SUMAR')){
										//echo 'entro en moficar';
											$sumar=1;
											$fechaSumar=DATE("Y-m-d");
										}
										else{
											 $sumar=1;
											$fechaSumar="0000-00-00";
										}
									
										//insertamos el historial, hay que preguntar por si quiere modificar el plan o la materia sino hay que realizar la consulta para no modificar dicho  plan y materia

										//hacer una consulta y obtener el valor de la materia
										$sqlMateria="select * from materia where materia='$materia'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor=$filamat['valor'];

										
										$consulta2="INSERT INTO historiaClinica (apellido, nombre, direccion, localidad, plan, materia, usuario,  dni,  historia, hoja,  dia, mes, anos, hora, sumar, fechaSumar,  valor) VALUE ('".$apellido."', '".$nombre."', '".$direccion."', '".$localidad."', '".$plan."', '".$materia."', '".$_SESSION['usuario']."','".$dni."','".$historia."', '".$_POST['acta']."', '".$dia."', '".$mes."', '".$anos."', '".$hora."', '".$sumar."', '".$fechaSumar."', '".$valor."'  )";
										$resultadoHistoria2=mysql_query($consulta2);	
																		
										//$resulta=mysql_query($consulta2);	
										
									
												
										$url_relativa = "verificarPaciente.php?dni=$dni";
										desconectar();
										redirigir($url_relativa); 
								}
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
