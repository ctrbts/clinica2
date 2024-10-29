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
			 $bono=$_POST['bono'];
			 $asignatura=$_POST['asignatura'];		
             $valor=$_GET['valor'];
			// seteo de la fecha y hora 	
				date_default_timezone_set('America/Argentina/Buenos_Aires');

				$script_tz = date_default_timezone_get();
				$hora = date('h:i a',time() - 3600*date('I')); 
			//me conecto a la base de datos
					$db = conectar_admin();	
			//realizo la consulta para obtener los datos a imprimir del paciente para hacer el bono	
				/*$consulta="SELECT * FROM historiaclinica WHERE dni = $dni order by idHistoriaClinica desc";
				$respuesta=mysql_query($consulta);
				$fila=mysql_fetch_assoc($respuesta);*/
			//Agregar el bono del paciente
			 /*  $apellido=$fila['apellido'];
			   $nombre= $fila['nombre'];
			   $nombreYApellido="".$apellido." " ;
			   $nombreYApellido.=",";
			   $nombreYApellido.="".$nombre.""; */
			    // echo $fila['hora'];
			  //consulta para obtener el precio del bono
										$sqlMateria="select * from materia where materia='$asignatura'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor=$filamat['valor'];	
			  $cad=",";   
			 //  cambiar la asignatura
				$consu="Update bono Set asignatura = '$asignatura', valor= '$valor' Where numeroBono = $bono";	
				$sql2=mysql_query($consu);			 
			 //buscar el valor de la materia en base a la nueva materiay realizar un update del bono 
			 
			 	 	
			//busco el ultimo ingreso en el bono para imprimir
				$consuL="SELECT * FROM bono WHERE numeroBono = $bono";
				$res=mysql_query($consuL);
				$filaBono=mysql_fetch_assoc($res); 
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
					$dni=$filaBono['dni'];
					//echo $cadenaFecha;
					//buscar el valor de la materia y realizar un update del bono
         $pdf = new Cezpdf('LETTER');
		/*$img = ImageCreatefromjpeg(’logo.jpg’);
		$pdf-> addImage($img,120,300,400,400);*/
		//$pdf->ezImage("logo.jpg", -10, 100, 'none', 'center');
		//$pdf->ezImage('logo.jpg',0, 40, 'none', 'left',array('none'));
		$pdf->selectFont('fonts/Helvetica.afm');
	
		//$pdf->ezText("\n");
		$pdf->ezText("<b>UNIVERSIDAD NACIONAL DE LA PLATA</b>",24,array('justification'=>'center'));
		$pdf->ezText( 'Facultad de Odontologia' ,22,array('justification'=>'center'));
		$pdf->ezText( 'Hospital Escuela' ,20,array('justification'=>'center'));		
		$pdf->ezText($cadenaFecha,16,array('justification'=>'right')); 
		$pdf->ezText("<b>Hora:</b> ".$hora,12, array('justification'=>'right'));
		$nombYApe=$filaBono['paciente'];

		$pdf->ezText( "<b>PACIENTE: </b>" .$nombYApe. "<b> DNI: </b>".$dni ,18,array('justification'=>'left'));
		//agregar dni
	    $dni=$filaBono['dni'];
		//$pdf->ezText("<b>DNI: </b>".$dni,12,array('justification'=>'left'));
		//agregamos el bono
		$bono=$filaBono['numeroBono'];
		$asig=$filaBono['asignatura'];
	//	$pdf->ezText("<b>BONO N° </b>" .$bono,18,array('justification'=>'right'));	
		//Valor del bono
		$pdf->ezText("<b> $ $valor       </b>" ."<b>BONO N° </b>" .$bono,20,array('justification'=>'left'));
        $pdf->ezText("<b>ASIGNATURA: </b>"  .$asig,20,array('justification'=>'left'));			
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
		  $dia=$fila['dia'];
		 $fecha.=$dia;
		 $fecha.='-';
		 $mes=$fila['mes'];
		 $fecha.=$mes;
		 $fecha.='-';		 
		 $anos=$fila['anos'];
 		 $fecha.=$anos;
	
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
