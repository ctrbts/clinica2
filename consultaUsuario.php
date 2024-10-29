<?php
include('class.ezpdf3.php');
require_once ("funciones.php");
$db = conectar_admin();
$fechaInicio=$_POST['fechaUsuario'];



//crear el armado de la fecha para la consulta
		$anosInicio=substr($fechaInicio, 6, 4);
		$mesInicio=substr($fechaInicio, 3, 2);
		$diaInicio=substr($fechaInicio, 0, 2);	
		
				$cadenaFecha="";	
		$cadenaFecha.="".$anosInicio."";
		$cadenaFecha.='-';
		$cadenaFecha.="".$mesInicio."";
		$cadenaFecha.='-';	
		$cadenaFecha.="".$diaInicio."";
	


if($_POST['fechaUsuario']==''){
			$url_relativa = "consultar.php?valor=1";
			redirigir($url_relativa);
}
else{
 
		$pdf = new Cezpdf('C3');
		$pdf->ezImage('UNLP_Logo.jpg',0, 12, 'none', 'left','');    //UNLP_Logo.jpg array('none')
		/*$img = ImageCreatefromjpeg(’UNLP_Logo.jpg’);
		$pdf-> addImage($img,120,300,400,400);*/
		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("REGISTRO \n",14,array('justification'=>'center'));
		$pdf->ezText("Hospital Odontologico \n",14,array('justification'=>'center'));
		$pdf->ezText("Universitario\n",14,array('justification'=>'center'));
		$pdf->ezText("<b>Fecha de Consulta:</b>".$fechaInicio,14);		
		$pdf->ezText("<b>Fecha actual:</b> ".date("d/m/Y"),10);
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
		 'width'=>820
		 );
		$anosInicio=substr($fechaInicio, 6, 4);
		$mesInicio=substr($fechaInicio, 3, 2);
		$diaInicio=substr($fechaInicio, 0, 2);					
		$pdf->addInfo($datacreator);
		$consulta="select * from historiaclinica where dia='".$diaInicio."' AND mes='".$mesInicio."' AND anos='".$anosInicio."' ";
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,5,array('justification'=>'center'));	
		 while ($fila=mysql_fetch_assoc($sql)){
			if( ($fila['anos'] == $anosInicio)&&($fila['mes']==$mesInicio)&&($fila['dia']==$diaInicio)){
							
							$data[] = array('materia'=>$fila["materia"], 'plan'=>$fila["plan"], 'apellido'=>$fila["apellido"], 'nombre'=>$fila["nombre"],'dni'=>$fila["dni"], 'direccion'=>$fila["direccion"], 'usuario'=>$fila["usuario"],);
				}	
		}
		
		$titles = array('materia'=>'<b>MATERIA</b>', 'plan'=>'<b>PLAN</b>','apellido'=>'<b>APELLIDO</b>', 'nombre'=>'<b>NOMBRE</b>','dni'=>'<b>DOCUMENTO</b>', 'direccion'=>'<b>DIRECCION</b>', 'usuario'=>'<b>USUARIO</b>');
		 
		$pdf->ezText($data,12); 
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
