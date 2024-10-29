<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
$fecha=$_POST['fecha'];
if($_POST['fecha']==''){
			$url_relativa = "consultar.php?valor=1";
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
		$anos=substr($fecha, 6, 4);
		$mes=substr($fecha, 3, 2);
		$dia=substr($fecha, 0, 2);					
		$pdf->addInfo($datacreator);
		 $cero=0;
		 		$anos=substr($fecha, 6, 4);
		$dia=substr($fecha, 0, 2);
		$mes=substr($fecha, 3, 2);
		

		$cadenaFecha="";	
		$cadenaFecha.="".$anos."";
		$cadenaFecha.='-';
		$cadenaFecha.="".$mes."";
		$cadenaFecha.='-';	
		$cadenaFecha.="".$dia."";
		$consulta="select * from bono where fecha = '$cadenaFecha'";
		 $sql=mysql_query($consulta);
		//	$pdf->ezText($data,12,array('justification'=>'center'));	

		 while ($fila=mysql_fetch_assoc($sql)){
	
				 $fechaBaseDeDatos=$fila['fecha'];
				 $bono=$fila["numeroBono"];

						$data[] = array('Numero'=>$fila["numeroBono"],'Paciente'=>$fila["paciente"], 'DNI'=>$fila["dni"], 'Asignatura'=>$fila["asignatura"], 'Fecha'=>$fila["fecha"],'Hora'=>$fila["hora"],'Marca'=>$fila["marca"]);

		}
		$titles = array('Numero'=>'<b>#BONO</b>','Paciente'=>'<b>PACIENTE</b>', 'DNI'=>'<b>DNI</b>','Asignatura'=>'<b>ASIGNATURA</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>','Marca'=>'<b>MARCA</b>');
		 
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina

		$pdf->ezText("<b>Fecha de los bonos:  </b> ".$fecha,20); 
		 
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

