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
			$bono=$_GET["bono"];
			
			$consulta="select * from bonoCurso where idbono ='$bono'" ;
			$result=mysql_query($consulta);
			$fila=mysql_fetch_assoc($result);
			$idCurso=$fila['idCurso'];
			$dni=$fila['dni'];
			$consu="select * from pacienteCurso where dni = $dni";
			$resu=mysql_query($consu);
			$filaper=mysql_fetch_assoc($resu);
			$nyap=$filaper['nyap'];
			
			
			$consulcurso="select * from curso where idCurso='$idCurso'";

			$resulconsulta=mysql_query($consulcurso);
			$filaCurso=mysql_fetch_assoc($resulconsulta);
             $curso=$filaCurso['curso']; // titulo del curso
			 $valor=$filaCurso['valor'];
			 // seteo de la fecha y hora 	
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$script_tz = date_default_timezone_get();
				$hora = date('H:i:s', gmdate('U')); 
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

		$pdf->ezText( "<b>" .$nyap. "</b><b> DNI: </b>".$dni ,24,array('justification'=>'left'));
		$pdf->ezText( "<b>    </b>" .$curso. "",18,array('justification'=>'left'));
		
		$pdf->ezText("<b>Valor del Bono: $ $valor;        </b>" ."<b>BONO N° </b>" .$bono,20,array('justification'=>'left'));	
		 $pdf->ezSetCmMargins(1,1,1,1,1,1);
			$pdf->ezText("<b>BONO CANCELADO</b>",20,array('justification'=>'right'));	
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
		 
		 $fecha=$fila['fecha'];
		 $hora=$fila['hora'];
		 
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
