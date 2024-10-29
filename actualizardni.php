<?php
require_once ("funciones.php");
$db = conectar_admin();
$sql="select * from paciente";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)){
  if($fila['dni']>=90000000 and $fila['dni']<=99900000  ){
				$actualizar="Update paciente Set tipodoc='DNI EXTRANJERO' Where dni='".$fila['dni']."' ";
  
  }
  else{
  				$actualizar="Update paciente Set tipodoc='DNI' Where dni='".$fila['dni']."' ";
  }
	$resu=mysql_query($actualizar);

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
