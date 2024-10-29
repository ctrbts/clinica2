<?php
 require_once ("funciones.php"); 

 $db = conectar_base();
 $consulta="select * from historiaclinica where sumar='0' ";
 $resultado=mysql_query($consulta, $db);

 //$fila=mysql_fetch_assoc($resultado);
/* $fecha=$fila{'anos'};
 $fecha.='-';
 $fecha.=$fila{'mes'};
 $fecha.='-';
 $fecha.=$fila{'dia'};
 echo $fecha;*/
 $db2= conectar_admin();
//$fila=mysql_fetch_assoc($resultado);
    while($fila=mysql_fetch_assoc($resultado)){
		$dia=$fila['dia'];
		$mes=$fila['mes'];
		$anos=$fila['anos'];	
		$dni=$fila['dni'];
		if(($fila['plan']=='SUMAR')&&($fila['sumar']== '0')){
	        	$consultafinal="update historiaclinica set sumar= 0 where dia=$dia and mes=$mes and anos=$anos and dni=$dni";
				$resulta2=mysql_query($consultafinal,$db2);	
				
		}
		
	}
 	
desconectar();

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