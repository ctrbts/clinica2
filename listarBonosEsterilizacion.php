<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha=$_POST['fechaBono'];
if($_POST['fechaBono']==''){
			$url_relativa = "consultar.php?valor=1";
			redirigir($url_relativa);
}
else{
        $valor = 0;
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
		$consulta="select * from bonoesterilizacion where fecha = '$cadenaFecha'";
		 $sql=mysql_query($consulta);
		$pdf->ezText($data,12,array('justification'=>'center'));	

		 while ($fila=mysql_fetch_assoc($sql)){
				 ++$valor;
				 $dni=$fila['dni'];
				 $consuper="select * from persona where documento = $dni";
				 $sqlper=mysql_query($consuper);
				 $filaper=mysql_fetch_assoc($sqlper);
				 $nyap=$filaper['nombreyapellido'];
				 $especial=$fila['identificador'];
				 $consuespecial=" select * from especialidad where idEspecialidad = $especial";
				 $sqlespe=mysql_query($consuespecial);
				 $filaespe=mysql_fetch_assoc($sqlespe);
				 $especial=$filaespe['especialidad'];
				 $fechaBaseDeDatos=$fila['fecha'];
				 $bono=$fila["numeroBono"];
				 $data[] = array('Numero'=>$fila["numeroBono"],'Persona'=>$filaper["nombreyapellido"], 'DNI'=>$fila["dni"], 'Especialidad'=>$filaespe["especialidad"], 'Fecha'=>$fila["fecha"],'Hora'=>$fila["hora"]);

		}
		$titles = array('Numero'=>'<b>#BONO</b>','Persona'=>'<b>PERSONA</b>', 'DNI'=>'<b>DNI</b>','Especialidad'=>'<b>ESPECIALIDAD</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>');
		 
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
