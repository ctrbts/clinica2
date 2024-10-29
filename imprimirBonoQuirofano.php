<?php
include('class.ezpdf.php');
require_once ("funciones.php");
	session_start();
	$fecha=date('Y-m-d');
	$hora=date(" H:i:s");
$db = conectar_admin();
$numeroBono=$_GET['idBono'];

		
		

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>bono pdf</title>
</head>

<body>

<?php 
            //necesitamos obtener la fecha y la hora para imprimir el bono 
			
					
			//realizo la consulta para obtener los datos a imprimir del paciente para hacer el bono	
				$consulta="SELECT * FROM bonoquirofano WHERE idBonoQuirofano = $numeroBono";
				$respuesta=mysql_query($consulta);
				$fila=mysql_fetch_assoc($respuesta);
				$fecha=$fila['fecha'];
				$hora=$fila['hora'];
				$bono='USO DE QUIROFANO';
				$dniPaciente=$fila['dni'];
				$nyap=$fila['nyap'];
				$valor=$fila['valor'];
				$iddocegradua=$fila['iddocentegraduado'];
				
			   $consul="select * from docentegraduado where iddocentegraduado = '$iddocegradua'";
			   $respuesta=mysql_query($consul);
			   $filadoc=mysql_fetch_assoc($respuesta);
			   $docegradua=$filadoc['docentegraduado'];
			   echo $docegradua;
			 //obtener los datos del alumno
				
         $pdf = new Cezpdf('LETTER');

		$pdf->selectFont('fonts/Helvetica.afm');
	
		//$pdf->ezText("\n");
		$pdf->ezText("<b>UNIVERSIDAD NACIONAL DE LA PLATA</b>",24,array('justification'=>'center'));
		$pdf->ezText( 'Facultad de Odontologia' ,22,array('justification'=>'center'));
		$pdf->ezText( 'QUIROFANO' ,20,array('justification'=>'center'));		
		$pdf->ezText("<b>Fecha: </b>" .$fecha,16,array('justification'=>'right')); 
		$pdf->ezText("<b>Hora:</b> ".$hora,12, array('justification'=>'right'));
		$pdf->ezText( "<b>DOCENTE/GRADUADO: </b>" .$docegradua,22 ,array('justification'=>'left'));
		$pdf->ezText( "<b>PACIENTE: </b>" .$nyap. "<b> DNI: </b>".$dniPaciente ,20,array('justification'=>'left'));

		$pdf->ezText( "<b> TIPO DE BONO:   </b>" .$bono ,20 ,array('justification'=>'left'));
		//Valor del bono
		$pdf->ezText("<b> VALOR BONO:  $ </b>".$valor."<b>    BONO N° </b>" .$numeroBono,20,array('justification'=>'left'));	
		 $pdf->ezSetCmMargins(1,1,1,1,1,1);
		$datacreator = array (
							'Title'=>'USO DE QUIROFANO',
							'Subject'=>'PDF ',
							'Author'=>'sato'
							);
		$options = array(
		 'showHeadings'=>1,
		 'shadeCol'=>array(0.9,0.9,0.9),
		 'xOrientation'=>'center',
		 'width'=>50
		 );  

		$pdf->addInfo($datacreator);
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",1);  //salto de pagina
		
		ob_end_clean();
		$pdf->ezStream();

	
	?>			
</body>		
</html>
