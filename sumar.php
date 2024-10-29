<?php
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $consulta="select * from historiaclinica ";
 $resultado=mysql_query($consulta);
    while($fila=mysql_fetch_assoc($resultado)){
		if($fila['plan']=="SUMAR"){
			//echo 'entro';
				$sumar=$fila['idHistoriaClinica'];
	        	$consultafinal="update historiaclinica set sumar= 0 where idHistoriaClinica=$sumar";	
	
		}
		else{
				$sumar=$fila['idHistoriaClinica'];
				$consultafinal="update historiaclinica set sumar= 1 where idHistoriaClinica=$sumar";

		}		
		$resu=mysql_query($consultafinal);
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
