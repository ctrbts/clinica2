<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();


		$pdf = new Cezpdf('C3');
		$pdf->ezImage('UNLP_Logo.jpg',0, 120, 'none', 'left','');    //UNLP_Logo.jpg array('none')

		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("Listado de pacientes con ioma \n",14,array('justification'=>'center'));

    	$pdf->ezSetCmMargins(1,1,1,1,1,1);
		$datacreator = array (
							'Title'=>'LISTADO DE PACIENTE CON IOMA',
							'Subject'=>'PDF ',
							'Author'=>'FOLP'
							);
		$options = array(
		 'showHeadings'=>1,
		 'shadeCol'=>array(0.8,0.8,0.8),
		 'xOrientation'=>'center',
		 'width'=>800
		 );
	


		$consulta = "SELECT * FROM ioma" ;
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,20,array('justification'=>'center'));	
			

		 while ($fila=mysql_fetch_assoc($sql)){

				$data[] = array('Paciente'=>$fila["paciente"], 'Dni'=>$fila["dni"], 'Plan'=>$fila["plan"], 'Fecha'=>$fila["fecha"]);

		}


		$titles = array('Paciente'=>'<b>PACIENTE</b>', 'Dni'=>'<b>DNI</b>','Plan'=>'<b>PLAN</b>','Fecha'=>'<b>FECHA</b>');
		 
		$pdf->ezText($data,20); 
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