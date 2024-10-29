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
<title>bono pdf</title>
</head>

<body>

<?php if (!isset($_SESSION['pass'])){ 
			$dni=$_GET["dni"];
			//echo $dni;
			//$curso=$_POST['curso'];
			//echo $curso;
			//obtengo el paciente
			//$consulta="select * from pacienteCurso where dni ='$dni'" ;
			/*$result=mysql_query($consulta);
			$fila=mysql_fetch_assoc($result);
			//consulta para obtener el ultimo bono del paciente				
			//$consucurso="";		
			$nyap=$fila['nyap'];*/
			/*$consultacurso="select * from curso where idCurso='$curso'";
			$resulconsulta=mysql_query($consultacurso);
			$idcurso=mysql_fetch_assoc($resulconsulta);
             $nomcurso=$idcurso['curso']; */// obtengo el id del curso
			// echo $precio;
			// seteo de la fecha y hora 
			//$precio=$idcurso['valor'];
				date_default_timezone_set('America/Argentina/Buenos_Aires');
			//agrego el bono y luego lo tengo que recuperar
			$fecha=date('Y-m-d');
			$hora = date('H:i:s', gmdate('U')); 
			$script_tz = date_default_timezone_get();
				/*echo $fecha;
				echo $hora;*/
			//me conecto a la base de datos
				$db = conectar_admin();
			//tengo que obtener el ultimo bono de esterilizacion que agregue para esa persona
			 $consultaBono="SELECT * FROM bonocursorto where dni= '$dni' ORDER BY idBono DESC LIMIT 1";
			 $resuBono=mysql_query($consultaBono);
			 $filabonocurso=mysql_fetch_assoc($resuBono);
			 $numeroBono=$filabonocurso['idBono'];
			 $idCurso=$filabonocurso['idCurso'];
			 //la consulta para sacar el nombre del curso y el vamor
			 $consulcurso="select * from cursorto where idCurso = $idCurso";
			 $sqlcurso=mysql_query($consulcurso);
			 $filacurso=mysql_fetch_assoc($sqlcurso);
			 
			 $nombrecurso=$filacurso['curso'];
			 //echo $nombrecurso;
			 $valor=$filacurso['valor'];
			  
			 //echo $numeroBono;
			 //consulta para obtener con el dni el nombre y apellido del paciente
			 $consultaPaciente="select * from pacienteorto where dni = '$dni'";
			 $resulpaciente=mysql_query($consultaPaciente);
			 $listaPaciente=mysql_fetch_assoc($resulpaciente);
		 
			 $nombreYApellido=$listaPaciente['nyap'];
			//echo $nombreYApellido;
			//creacion de la fecha
					$fecha=date('Y-m-d');
					$mes= substr($fecha,5,2);
					$dia= substr($fecha,8,2);
					$anos= substr($fecha,0,4);
					$cadenaFecha="FECHA: ";
					$cadenaFecha.="".$dia." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$mes." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$anos." " ;
				
         $pdf = new Cezpdf('LETTER');
		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("<b>UNIVERSIDAD NACIONAL DE LA PLATA</b>",24,array('justification'=>'center'));
		$pdf->ezText( 'Facultad de Odontologia' ,22,array('justification'=>'center'));
		$pdf->ezText( 'Hospital Odontologico' ,20,array('justification'=>'center'));		
		$pdf->ezText($cadenaFecha,16,array('justification'=>'right')); 
		$pdf->ezText("<b>Hora:</b> ".$hora,12, array('justification'=>'right'));

		$pdf->ezText( "<b>" .$nombreYApellido. "</b><b>          DNI: </b>".$dni ,24,array('justification'=>'left'));
		$pdf->ezText( "<b>            </b>" .$nombrecurso. "    ",18,array('justification'=>'left'));
		
		//Valor del bono
		$pdf->ezText("<b>Valor del Bono: $" .$valor. "       </b>" ."<b>BONO N° </b>" .$numeroBono,20,array('justification'=>'left'));	
		 $pdf->ezSetCmMargins(1,1,1,1,1,1);
		$datacreator = array (
							'Title'=>'pdf por fecha',
							'Subject'=>'PDF ',
							'Author'=>'FOLP'
							);
		$options = array(
		 'showHeadings'=>1,
		 'shadeCol'=>array(0.9,0.9,0.9),
		 'xOrientation'=>'center',
		 'width'=>50
		 );  
		 
		/* $fecha=$filabonoesterilizacion['fecha'];
		 $hora=$filabonoesterilizacion['hora'];*/
		 
		$pdf->addInfo($datacreator);
		$pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",1);  //salto de pagina
		
				
				 
		ob_end_clean();
		$pdf->ezStream();
}
 else{
		desconectar();
		$url='loguearUsuario.php?valor=0';
		redirigir($url);
	}		
	?>			
</body>		
</html>
