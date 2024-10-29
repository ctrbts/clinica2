<?php 
require_once ("funciones.php");
$db = conectar_admin();
$sql="select * from historiaclinica";	
$resultado= mysql_query($sql)or die ("Error in query: $query. ".mysql_error());
while($fila = mysql_fetch_assoc($resultado)){
		if($fila['dni']<100){
		  	  $sql2="select * from paciente where apellido='".$fila['apellido']."' and nombre='".$fila['nombre']."'";
			$resulta=mysql_query($sql2);
			$fila2=mysql_fetch_assoc($resulta);
			$consulta="update historiaclinica set dni='".$fila2['dni']."' where idHistoriaClinica='".$fila['idHistoriaClinica']."'";
			$resul=mysql_query($consulta); 
		}
	

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
