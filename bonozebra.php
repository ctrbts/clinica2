<?php
require_once ("funciones.php");
	
/////////////////////////////////////////////////////////////////////////////

	session_start();
	$fecha=date('Y-m-d');
	$hora=date(" H:i:s");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Creacion del bono en word</title>
</head>

<body>

<?php if (!isset($_SESSION['pass'])){ 
			//me conecto a la base de datos
				$dni=$_GET["dni"];
				$db = conectar_admin();	
			//realizo la consulta para obtener los datos a imprimir del paciente para hacer el bono	
				$consulta="SELECT * FROM historiaclinica WHERE dni = $dni order by idHistoriaClinica desc";
				$respuesta=mysql_query($consulta);
				$fila=mysql_fetch_assoc($respuesta);
			//Agregar el bono del paciente
			   $apellido=$fila['apellido'];
			   $nombre= $fila['nombre'];
			   $nombreYApellido="".$apellido." " ;
			   $nombreYApellido.=",";
			   $nombreYApellido.="\n"."  ".$nombre."";
			   $asignatura=$fila['materia'];
              echo $fila['hora'];
			  $cad=",";
			 //  echo $nombreYApellido;
			 //ahora insertamos la tupla del bono
			$cons="INSERT INTO bono (fecha, hora, paciente, dni, asignatura) VALUES ('$fecha','hora','$nombreYApellido','$dni','$asignatura')";	
			 $result=mysql_query($cons);	
			//busco el ultimo ingreso en el bono para imprimir
				$consu="SELECT * FROM bono WHERE dni = $dni order by numeroBono desc";
				$res=mysql_query($consu);
				$filaBono=mysql_fetch_assoc($res); 
			// Incluir el PHPWord.php, todas las demás clases fueron cargados por un cargador automático 
				require_once  'PHPWord.php' ;
			
				$PHPWord = new PHPWord();
			
			// Every element you want to append to the word document is placed in a section.
			// To create a basic section:
			$section = $PHPWord->createSection();

			//agrego la imagen
			$imageStyle = array('width'=>12, 'height'=>10, 'align'=>'center');
			$section->addImage('imagenes/logo.jpg' , $imageStyle);
			/*$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100, 'name'=>'Arial', 'size'=>2, 'bold'=>false));			
			$section->addText( 'UNIVERSIDAD NACIONAL DE LA PLATA',
				'rStyle','pStyle');	
			$PHPWord->addParagraphStyle('tStyle', array('align'=>'center', 'spaceAfter'=>100, 'name'=>'Arial', 'size'=>1, 'bold'=>true));	
			$section->addText( 'Facultad de Odontologia',
				 null,'tStyle' );	*/		
				 			$section->addText("                                            UNIVERSIDAD NACIONAL DE LA PLATA ",
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));				
				$section->addText("                                            Facultad de Odontologia ",
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));
			//creacion de la fecha
					$fecha=date('Y-m-d');
					$mes= substr($fecha,5,2);
					$dia= substr($fecha,8,2);
					$anos= substr($fecha,0,4);
					$cadenaFecha="FECHA: ";
					$cadenaFecha.="\n"."".$dia." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$mes." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$anos." " ;
					
					echo $cadenaFecha;
			/*$PHPWord->addParagraphStyle('fStyle', array('align'=>'right', 'spaceAfter'=>100, 'name'=>'Arial', 'size'=>1.2, 'bold'=>true));	
			$section->addText( $cadenaFecha,
				null, 'fStyle');*/
			$section->addText( $cadenaFecha,
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));							
			// After creating a section, you can append elements:
			$paciente= "paciente: ";
			$nombYApe=$filaBono['paciente'];
			$paciente.="\n"." ".$nombYApe."";
             echo $paciente;
			$section->addText( $paciente,
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));
			//agregar dni
				$cadenaDni= "DNI: ";
			    $dni=$filaBono['dni'];
			    $cadenaDni.="\n"." ".$dni."";
				echo $cadenaDni;		
				$section->addText( $cadenaDni,
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));
			//agregar asignatura
				$cadenaAsignatura= "Asignatura: ";
			    $asignatura=$filaBono['asignatura'];
			    $cadenaAsignatura.="\n"." ".$asignatura."";
				echo $cadenaAsignatura;
				$section->addText( $cadenaAsignatura,
				array('name'=>'Arial', 'size'=>1.2, 'bold'=>true));	
			//valor del bono
					  $section->addText('Son Pesos: CINCO',
				array('name'=>'Arial', 'size'=>1.4, 'bold'=>true));	
				$valor="                                                       $ 5";
						$section->addText( $valor,
				array('name'=>'Arial', 'size'=>2.4, 'bold'=>true));	
			//Numero de bono
						$numero= "                                BONO N° ";
						$bono=$filaBono['numeroBono'];
						$numero.="\n"." ".$bono."";
			         
			 			$section->addText( $numero,
				array('name'=>'Arial', 'size'=>1.6, 'bold'=>true));		
			?><a onClick=imprimir(); href= #  >Imprimir</a> 
				<?php					
			// You can also put the appended element to local object like this:
		/*	$fontStyle = new PHPWord_Style_Font();
			$fontStyle->setBold(true);
			$fontStyle->setName('Verdana');
			$fontStyle->setSize(22);
			$myTextElement = $section->addText('Hello World!');*/
			/*$myTextElement->setFontStyle($fontStyle);*/
			
			// Finally, write the document:
			$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
			$bonoNumero="bono";
			$bonoNumero.=$filaBono['numeroBono'];
			$bonoNumero.=".docx";
			$carpeta="bono/";
			$carpeta.="$bonoNumero.";
			//$objWriter->save($carpeta);

} 
else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			}

?>


</body>
</html>
