<?php
include('class.ezpdf2.php');
require_once ("funciones.php");
$db = conectar_admin();

$fechaFin=$_POST['fechaFin'];
$dni=$_POST['dni'];
$consulta="select * from historiaclinica where dni= $dni";
$sql=mysql_query($consulta);
$fila=mysql_fetch_assoc($sql);
$pdf = new Cezpdf('A4');
		$img = ImageCreatefromjpeg(’logo.jpg’);
		$pdf-> addImage($img,120,300,400,400);
		//$pdf->ezImage('UNLP_Logo.jpg',0, 60, 'none', 'left',array('none'));
		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText($fila['apellido'],12,array('justification'=>'left'));
		$pdf->ezText( $fila['nombre'] ,12,array('justification'=>'left'));
		$pdf->ezText($fila['dni'],12,array('justification'=>'left'));
		$pdf->ezText( $fila['direccion'] ,12,array('justification'=>'left'));
		$pdf->ezText($fila['localidad'],12,array('justification'=>'left'));		
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
		  $dia=$fila['dia'];
		 $fecha.=$dia;
		 $fecha.='-';
		 $mes=$fila['mes'];
		 $fecha.=$mes;
		 $fecha.='-';		 
		 $anos=$fila['anos'];
 		 $fecha.=$anos;
		 	$data[] = array('id'=>$fila["idHistoriaClinica"],'fecha'=>$fecha,'materia'=>$fila["materia"], 'plan'=>$fila["plan"], 'apellido'=>$fila["apellido"], 'nombre'=>$fila["nombre"]);
		  $fecha='';

		 while ($fila=mysql_fetch_assoc($sql)){
					 $dia=$fila['dia'];
					 $fecha.=$dia;
					 $fecha.='-';
					 $mes=$fila['mes'];
					 $fecha.=$mes;
					 $fecha.='-';		 
					 $anos=$fila['anos'];
					 $fecha.=$anos;
					 $data[] = array('id'=>$fila["idHistoriaClinica"],'fecha'=>$fecha,'materia'=>$fila["materia"], 'plan'=>$fila["plan"], 'apellido'=>$fila["apellido"], 'nombre'=>$fila["nombre"],);
				$fecha='';
		}
		
		$titles = array('id'=>ID,'fecha'=>'<b>FECHA</b>','materia'=>'<b>MATERIA</b>', 'plan'=>'<b>PLAN</b>','apellido'=>'<b>APELLIDO</b>', 'nombre'=>'<b>NOMBRE</b>');
$pdf->addInfo($datacreator);
$pdf->ezTable($data,$titles,'',$options );
$pdf->ezText("\n\n\n",1);  //salto de pagina
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
		
		 
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
