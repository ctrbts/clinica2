<?php
         
	require_once ("funciones.php");
	
/////////////////////////////////////////////////////////////////////////////

	session_start();
	$codi=$_GET['codi'];

	//tomo los parametros enviados, les saco los espacios en blanco y los pongo en mayusculas
	if (!isset($_SESSION['pass'])){  	
					$dni=$_POST["dni"];
				
					$db = conectar_admin();
				
					//mysql_query("BEGIN WORK");
				
						$sql = "SELECT * FROM paciente WHERE  dni='$dni'";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						
						 
						 
						if ( mysql_num_rows($result) == 0) 
						{
							//el paciente no existe
				
							mysql_query("COMMIT");
							desconectar();
							$url_relativa = "altaPacienteBorrado.php?valor=1";
							redirigir($url_relativa);			
							//desconectamos la BD
							
				
							exit();
						}
						else
						{   
							if($_GET['codi'] == 1){
											
									$_SESSION['dni']=$dni;	
									$url_relativa = "bajaPaciente.php?valor=2";
									redirigir($url_relativa); //esta en funciones.php
								}
								else{
									$dni=$_SESSION['dni'];
									//aca hacemos el update
									$sql2="UPDATE paciente SET borrado=1 WHERE dni='$dni'";
									$result=mysql_query($sql2);
									$url_relativa = "bajaPaciente.php?valor=0";
									redirigir($url_relativa);
								}
					}	
				
			}
			else{
					$url='loguearUsuario.php?valor=0';
					redirigir($url);
			}		  
				?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
