<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
$fechaInicio=$_POST['fechaInicio'];
$fechaFin=$_POST['fechaFin'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
if(($_POST['fechaInicio']=='')&($_POST['fechaFin']=='')){
			$url_relativa = "consultarEsterilizacion.php?valor=1";
			redirigir($url_relativa);
}
else{
		$pdf = new Cezpdf('C3');
		$pdf->ezImage('UNLP_Logo.jpg',0, 120, 'none', 'left','');    //UNLP_Logo.jpg array('none')

		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("Listado de bonos \n",14,array('justification'=>'center'));
		$pdf->ezText("Hospital Odontologico \n",14,array('justification'=>'center'));
		$pdf->ezText("Universitario\n",14,array('justification'=>'center'));
		$pdf->ezText("<b>Fecha: </b> ".$fecha ,12);
    	$pdf->ezSetCmMargins(1,1,1,1,1,1);
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
		$anosInicio=substr($fechaInicio, 6, 4);
		$mesInicio=substr($fechaInicio, 3, 2);
		$diaInicio=substr($fechaInicio, 0, 2);					
		$pdf->addInfo($datacreator);

 		$anosFin=substr($fechaFin, 6, 4);
		$diaFin=substr($fechaFin, 0, 2);
		$mesFin=substr($fechaFin, 3, 2);
		

		$cadenaFechaInicio="";	
		$cadenaFechaInicio.="".$anosInicio."";
		$cadenaFechaInicio.='-';
		$cadenaFechaInicio.="".$mesInicio."";
		$cadenaFechaInicio.='-';	
		$cadenaFechaInicio.="".$diaInicio."";
		
		$cadenaFechaFin="";	
		$cadenaFechaFin.="".$anosFin."";
		$cadenaFechaFin.='-';
		$cadenaFechaFin.="".$mesFin."";
		$cadenaFechaFin.='-';	
		$cadenaFechaFin.="".$diaFin."";		
		$consulta="select * from bonoesterilizacion where fecha between '$cadenaFechaInicio' and '$cadenaFechaFin'";
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,12,array('justification'=>'center'));	
		
		 while ($fila=mysql_fetch_assoc($sql)){
			$valor4=$fila['valor'];	
			$numeroBono=$fila['numeroBono'];		 
			$fecha=$fila['fecha'];
			$data[] = array('Numero'=>$fila["numeroBono"], 'Fecha'=>$fila["fecha"],'Hora'=>$fila["hora"]);
		}
		$titles = array('Numero'=>'<b>#BONO</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>');
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
		 
		ob_end_clean();
		$pdf->ezStream();
		
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
