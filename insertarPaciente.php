<?php
         
	require_once ("funciones.php");
	
/////////////////////////////////////////////////////////////////////////////
				$db = conectar_admin();
				$sql = "SELECT DISTINCT dni FROM historiaclinica";
				$resultado=mysql_query($sql);
				while ($fila=mysql_fetch_assoc($resultado)){
					$consulta="SELECT * FROM historiaclinica WHERE dni='".$fila['dni']."' order by idHistoriaClinica desc limit 1 ";
					$resul=mysql_query($consulta) or die(mysql_error());
					$datos=mysql_fetch_assoc($resul);
					$sql2="SELECT * FROM paciente WHERE dni='".$fila['dni']."' ";
					$resu=mysql_query($sql2);
					if (( mysql_num_rows($resu) == 0)){
					    $dni=$fila['dni'];
						
						$apellido=$datos['apellido'];
					 	$nombre=$datos['nombre'];
						$direccion=$datos['direccion'];
						$localidad=$datos['localidad'];
					    $consulta="INSERT INTO paciente (dni, apellido, nombre, direccion, localidad) VALUES ('$dni','$apellido','$nombre','$direccion','$localidad')";
						$resuconsulta=mysql_query($consulta)or die(mysql_error());
					} 
					//echo $fila['dni'];	echo '  ';
			
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
