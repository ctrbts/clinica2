<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();

$fechaInicio=$_POST['fechaInicio'];
$fechaFin= $_POST['fechaFin'];                     
$materia=$_POST['materia'];
$fecha=date("d/m/Y");
	$pdf = new Cezpdf('C3');
		$pdf->ezImage('UNLP_Logo.jpg',0, 120, 'none', 'left','');    //UNLP_Logo.jpg array('none')

		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("Listado de bonos \n",14,array('justification'=>'center'));
		$pdf->ezText("Hospital Odontologico \n",14,array('justification'=>'center'));
		$pdf->ezText("Universitario\n",14,array('justification'=>'center'));
		$pdf->ezText("<b>Fecha: </b> ".$fecha ,12);
    	$pdf->ezSetCmMargins(1,1,1,1,1,0.5,1,1);
		$datacreator = array (
							'Title'=>'pdf por fecha',
							'Subject'=>'PDF ',
							'Author'=>'FOLP'
							);
		$options = array(
		 'showHeadings'=>1,
		 'shadeCol'=>array(0.6,0.6,0.6),
		 'xOrientation'=>'center',
		 'width'=>800
		 );
		$anos=substr($fechaInicio, 6, 4);
		$dia=substr($fechaInicio, 0, 2);
		$mes=substr($fechaInicio, 3, 2);
		

		$cadenaFecha="";	
		$cadenaFecha.="".$anos."";
		$cadenaFecha.='-';
		$cadenaFecha.="".$mes."";
		$cadenaFecha.='-';	
		$cadenaFecha.="".$dia."";	
	 
		$anos2=substr($fechaFin, 6, 4);
		$dia2=substr($fechaFin, 0, 2);
		$mes2=substr($fechaFin, 3, 2);
		

		$cadenaFecha2="";	
		$cadenaFecha2.="".$anos2."";
		$cadenaFecha2.='-';
		$cadenaFecha2.="".$mes2."";
		$cadenaFecha2.='-';	
		$cadenaFecha2.="".$dia2."";	 

	 
				

				$consulta="select * from bono where asignatura='$materia' and fecha Between '$cadenaFecha' AND '$cadenaFecha2' AND cancelado=0";
				$resultado=mysql_query($consulta);
				$pdf->addInfo($datacreator); 
	

		 while ($fila=mysql_fetch_assoc($resultado)){
                 $paciente=$fila["paciente"];
				 $dni=$fila['dni'];
				 $asignatura=$fila["asignatura"];
				 $fecha=$fila["fecha"];
				 $anos3=substr($fecha, 0, 4);
   				 $dia3=substr($fecha, 8, 2);
				 $mes3=substr($fecha, 5, 2);
					

				$cadenaFecha3="";	
				$cadenaFecha3.="".$dia3."";
				$cadenaFecha3.='-';
				$cadenaFecha3.="".$mes3."";
				$cadenaFecha3.='-';	
				$cadenaFecha3.="".$anos3."";	

						$data[] = array('dni'=>$dni,'Paciente'=>$paciente, 'Asignatura'=>$asignatura, 'Fecha'=>$cadenaFecha3);
		}

		$titles = array('dni'=>'<b>DNI</b>','Paciente'=>'<b>PACIENTE</b>', 'Asignatura'=>'<b>ASIGNATURA</b>', 'Fecha'=>'<b>FECHA</b>');

		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
		 
	ob_end_clean();
		$pdf->ezStream();

		

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

