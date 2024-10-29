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
             $bono=$_GET['bono'];
 			 $db = conectar_admin();	

			//busco el bono a imprimir
				$consu="SELECT * FROM bonoesterilizacion WHERE numeroBono = $bono ";
				$res=mysql_query($consu);
				$filaBono=mysql_fetch_assoc($res); 
			//creacion de la fecha
					$fecha=$filaBono['fecha'];
					$hora=$filaBono['hora'];
					$dni=$filaBono['dni'];
					$valor=$filaBono['valor'];					
					$cancelado=$filaBono['cancelado'];
					$idEspecial=$filaBono['identificador'];
					//consulta para obtener la especializacion 
					$consultaespe="select * from persona where documento = $dni ";
					$sqlespe=mysql_query($consultaespe);
					$filaes=mysql_fetch_assoc($sqlespe);
					$codiester=$filaes['numeroesterilizacion'];
					//obtener la especialidad
					$consulta="select * from especialidad where idEspecialidad = $idEspecial";
					$sqlespecia=mysql_query($consulta);
					$filaresul=mysql_fetch_assoc($sqlespecia);
					$especialidad=$filaresul['especialidad'];
					$valor=$filaresul['valor'];
					
         $pdf = new Cezpdf('LETTER');

		$pdf->selectFont('fonts/Helvetica.afm');
	
		$pdf->ezText("<b>UNIVERSIDAD NACIONAL DE LA PLATA</b>",24,array('justification'=>'center'));
		$pdf->ezText( 'Facultad de Odontologia' ,22,array('justification'=>'center'));
		$pdf->ezText( 'Hospital Odontologico' ,20,array('justification'=>'center'));		
		$pdf->ezText("<b>Fecha:</b> ".$fecha,12,array('justification'=>'right')); 
		$pdf->ezText("<b>Hora:</b> ".$hora,12, array('justification'=>'right'));
		$nombYApe=$filaes['nombreyapellido'];
		
		$pdf->ezText( "<b></b>" .$nombYApe. "<b>    DNI: </b>".$dni ,18,array('justification'=>'left'));
			
	    $pdf->ezText( "<b></b>" .$especialidad. "",18,array('justification'=>'left'));
		//$pdf->ezText( "<b>Codigo de Esterilización:  </b>" .$codiester. "",18,array('justification'=>'left'));
		//Valor del bono
		$pdf->ezText("<b>Valor del Bono:  $  $valor      </b>" ."<b>BONO N° </b>" .$bono,20,array('justification'=>'left'));
		if($cancelado == 1){
			$pdf->ezText( "<b>BONO CANCELADO</b>",18,array('justification'=>'left'));
		}
		
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

