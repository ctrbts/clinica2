<?php
include('class.ezpdf.php');
require_once ("funciones.php");
	session_start();
	$fecha=date('Y-m-d');
	//$hora=date(" H:i:s");
    echo $_POST['plan'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>bono pdf cambio de plan</title>
</head>

<body>

<?php if (!isset($_SESSION['pass'])){ 
            // seteo de la fecha y hora 	
				date_default_timezone_set('America/Argentina/Buenos_Aires');

				$script_tz = date_default_timezone_get();
				$hora = date('H:i:s', gmdate('U')); 
			//me conecto a la base de datos
				$dni=$_GET["dni"];
				$db = conectar_admin();	
				echo $dni;
				$plan=$_POST['plan'];
			//realizo la consulta para saber que plan eligio
			  $consultaplan="select * from plan where idPlan= '$plan'";
			  $resultadoplan=mysql_query($consultaplan);
			  $filaplan=mysql_fetch_assoc($resultadoplan);
			  $cadenaplan=$filaplan['plan'];
			  //echo $cadenaplan;
			//realizo la consulta para obtener los datos a imprimir del paciente para hacer el bono	
				$consulta="SELECT * FROM historiaclinica WHERE dni = $dni order by idHistoriaClinica desc";
				$respuesta=mysql_query($consulta);
				$fila=mysql_fetch_assoc($respuesta);
				$idHistoriaClinica=$fila['idHistoriaClinica'];
			//Agregar el bono del paciente
			   $consul="Update historiaclinica Set plan = '$cadenaplan' Where idHistoriaClinica = '$idHistoriaClinica'";	
			   $resulta=mysql_query($consul);
			//realizo la consulta para saber que se ha realizado bien los cambios
				$consulta2="SELECT * FROM historiaclinica WHERE dni = $dni order by idHistoriaClinica desc";
				$respuesta2=mysql_query($consulta2);
				$fila2=mysql_fetch_assoc($respuesta2);			
			   $hora=$fila['hora'];
			   $apellido=$fila2['apellido'];
			   $nombre= $fila2['nombre'];
			   $nombreYApellido="".$apellido." " ;
			   $nombreYApellido.=",";
			   $nombreYApellido.="".$nombre."";
			   $asignatura=$fila2['materia'];
			   $valor=$fila['valor'];
              // echo $fila['hora'];
			  //consulta para obtener el precio del bono
										$sqlMateria="select * from materia where materia='$asignatura'";
										$resulUlt=mysql_query($sqlMateria);
										$filamat=mysql_fetch_assoc($resulUlt);
    									$valor2=$filamat['valor'];			  
			  $cad=",";   

			//busco el ultimo ingreso en el bono para imprimir
				$consu="SELECT * FROM bono WHERE dni = $dni order by numeroBono desc";
				$res=mysql_query($consu);
				$filaBono=mysql_fetch_assoc($res); 
			//creacion de la fecha
					//$fecha=date('Y-m-d');
					
					/*$mes= substr($fecha,5,2);
					$dia= substr($fecha,8,2);
					$anos= substr($fecha,0,4);*/
					$dia=$fila2['dia'];
					$mes=$fila2['mes'];
					$anos=$fila2['anos'];
					$cadenaFecha="FECHA: ";
					$cadenaFecha.="".$dia." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$mes." " ;
					$cadenaFecha.="/";
					$cadenaFecha.="".$anos." " ;
				//obtener el valor del bono desde la consulta	
					$valor2=$filaBono['valor'];
					//echo $cadenaFecha;
					
         $pdf = new Cezpdf('LETTER');
		/*$img = ImageCreatefromjpeg(’logo.jpg’);
		$pdf-> addImage($img,120,300,400,400);*/
		//$pdf->ezImage("logo.jpg", -10, 100, 'none', 'center');
		//$pdf->ezImage('logo.jpg',0, 40, 'none', 'left',array('none'));
		$pdf->selectFont('fonts/Helvetica.afm');
	
		//$pdf->ezText("\n");
		$pdf->ezText("<b>UNIVERSIDAD NACIONAL DE LA PLATA</b>",24,array('justification'=>'center'));
		$pdf->ezText( 'Facultad de Odontologia' ,22,array('justification'=>'center'));
		$pdf->ezText( 'Hospital Odontologico' ,20,array('justification'=>'center'));		
		$pdf->ezText($cadenaFecha,16,array('justification'=>'right')); 
		$pdf->ezText("<b>Hora:</b> ".$hora,12, array('justification'=>'right'));
		$nombYApe=$filaBono['paciente'];
		$materia=$filaBono['asignatura'];

		$pdf->ezText( "<b>PACIENTE: </b>" .$nombYApe,24,array('justification'=>'left'));
		$pdf->ezText( "<b> DNI: </b>".$dni ,24,array('justification'=>'left'));
		//agregar dni
	    $dni=$filaBono['dni'];
		//$pdf->ezText("<b>DNI: </b>".$dni,12,array('justification'=>'left'));
		//agregamos el bono
		$bono=$filaBono['numeroBono'];
	//	$pdf->ezText("<b>BONO N° </b>" .$bono,18,array('justification'=>'right'));	
		$pdf->ezText( "<b>MATERIA: </b>" .$materia. "",18,array('justification'=>'left'));
		//Valor del bono
		$pdf->ezText("<b>VALOR: </b><b> $ $valor2        </b>" ."<b> BONO N° </b>".$bono ,20,array('justification'=>'left'));
		$pdf->ezText("<b>PLAN:  </b>" .$cadenaplan ,20,array('justification'=>'left'));		
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
		//$pdf->ezTable($data,$titles,'',$options );
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
