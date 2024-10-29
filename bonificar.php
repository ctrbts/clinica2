<?php
include('class.ezpdf.php');
require_once ("funciones.php");
	session_start();
	$fecha=date('Y-m-d');
	$hora=date(" H:i:s");
$db = conectar_admin();
		
		

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>bonificar pdf</title>
</head>

<body>

<?php if (!isset($_SESSION['pass'])){ 
             $valor=$_GET['valor'];
			// seteo de la fecha y hora 	
				date_default_timezone_set('America/Argentina/Buenos_Aires');

				$script_tz = date_default_timezone_get();
				$hora = date('H:i:s', gmdate('U')); 
			//me conecto a la base de datos
				$dni=$_GET["dni"];
				$db = conectar_admin();	
			//realizo la consulta para obtener los datos a imprimir del paciente para hacer el bono	
				$consulta="SELECT * FROM historiaclinica WHERE dni = $dni order by idHistoriaClinica desc";
				$respuesta=mysql_query($consulta);
				$fila=mysql_fetch_assoc($respuesta);
			//Agregar el bono del paciente
			   $apellido=$fila['apellido'];
			   $nombre= $fila['nombre'];
			   $nombreYApellido="".$apellido." " ;
			   $nombreYApellido.=",";
			   $nombreYApellido.="".$nombre."";
			   $asignatura=$fila['materia'];
			   $valor=$fila['valor'];
              // echo $fila['hora'];
			  //consulta para obtener el precio del bono
										$sqlMateria="select * from materia where materia='$asignatura'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor2=$filamat['valor'];			  
			  $cad=",";   
			 //  echo $nombreYApellido;
			   if($valor =1){
			 
						 //ahora insertamos la tupla del bono
						$cons="INSERT INTO bono (fecha, hora, paciente, dni, asignatura, leido, valor) VALUES ('$fecha','$hora','$nombreYApellido','$dni','$asignatura', 0, '$valor2' )";	
						 $result=mysql_query($cons);
				}		
	 	
		desconectar();
		$url='bonopdf.php?valor=1&dni='.$dni ;  
		redirigir($url);
}
 else{
		desconectar();
		$url='loguearUsuario.php?valor=0';
		redirigir($url);
	}		
	?>			
</body>		
</html>
