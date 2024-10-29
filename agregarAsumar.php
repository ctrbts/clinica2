<?php

require_once ("funciones.php");
$historiaClinica=$_GET['historiaClinica'];

//hay que con la historia clinica actualizar la fecha del plan sumar y poner en 0 el campo sumar
session_start();
if (!isset($_SESSION['pass'])){  
			
			$fechaSumar=DATE("Y-m-d");
			$db = conectar_admin();
			$actualizarHistoria="Update historiaclinica Set sumar=0, fechaSumar='$fechaSumar' Where idHistoriaClinica=$historiaClinica";
			$resultado=mysql_query($actualizarHistoria);
		

			desconectar();
			$url="agregarPacienteAsumar.php?valor=0&parrafo=El paciente fue agregado en el plan sumar";
			redirigir($url);
}	
		
else {
			$url='loguearUsuario.php?valor=0';
			redirigir($url);
	}	
?>
	