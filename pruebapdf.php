<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
$fechaInicio=$_POST['fechaInicio'];
//$fecha=date("d-m-Y" , $fechaInicio);


if($_POST['fechaInicio']==''){
			$url_relativa = "consultar.php?valor=1";
			redirigir($url_relativa);
}
else{
 
		$pdf = new Cezpdf('C3');
		//$pdf->ezImage('UNLP_Logo.jpg',0, 120, 'none', 'left','');    //UNLP_Logo.jpg array('none')
		/*$img = ImageCreatefromjpeg(’UNLP_Logo.jpg’);
		$pdf-> addImage($img,120,300,400,400);*/
		$pdf->selectFont('fonts/Helvetica.afm');
		//$pdf->ezText("ACTA\n",14,array('justification'=>'center'));
		//$pdf->ezText("Hospital Odontologico \n",14,array('justification'=>'center'));
		//$pdf->ezText("Universitario\n",14,array('justification'=>'center'));
		$pdf->ezText("<b>Fecha a imprimir:</b> ".$fechaInicio,10);
		$pdf->ezText("<b>Fecha Actual:</b> ".date("d/m/Y"),10);
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
		$consulta="select * from historiaclinica ";
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,10,array('justification'=>'center'));	
		 while ($fila=mysql_fetch_assoc($sql)){
			if( ($fila['anos'] == $anosInicio)&&($fila['mes']==$mesInicio)&&($fila['dia']==$diaInicio)){
							
							$data[] = array('hora'=>$fila["hora"],'materia'=>$fila["materia"], 'plan'=>$fila["plan"], 'apellido'=>$fila["apellido"], 'nombre'=>$fila["nombre"],'dni'=>$fila["dni"], 'direccion'=>$fila["direccion"], 'localidad'=>$fila["localidad"]);
				}	
		}
		
		$titles = array('hora'=>'<b>HORA</b>','materia'=>'<b>MATERIA</b>', 'plan'=>'<b>PLAN</b>','apellido'=>'<b>APELLIDO</b>', 'nombre'=>'<b>NOMBRE</b>','dni'=>'<b>DOCUMENTO</b>', 'direccion'=>'<b>DIRECCION</b>', 'localidad'=>'<b>LOCALIDAD</b>');
		 
		$pdf->ezText($data,12); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
		$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
		
		 
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
