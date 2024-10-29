<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
$fecha=$_POST['fechaBonoemitido'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
if($_POST['fechaBonoemitido']==''){
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
		$consulta="select * from bono where fecha = '$cadenaFecha'";
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,12,array('justification'=>'center'));	
		$cancelado=0;	
		 while ($fila=mysql_fetch_assoc($sql)){
			    // $cancelado=$fila['cancelado'];
    				$valor4=$fila['valor'];	
					$valorTotal= $valorTotal + $valor4;					 
			 if($fila['cancelado'] == 0){
    				$valor2=$fila['valor'];	
					$valor= $valor + $valor2;
				} 
				else{
						$valor3=$fila['valor'];				 
		 				$cancelado=$cancelado + $valor3;						
				}
				 $fechaBaseDeDatos=$fila['fecha'];
				 $bono=$fila["numeroBono"];
				/*$consu="Update bono Set leido=1 Where numeroBono = $bono";	
				$sql2=mysql_query($consu);*/	
			//creo la cadena de la fecha de la base de datos para poder compararla con la del sistema
				/*$fechaBase=$fila['fecha'];
				$anos=substr($fechaBase, 0, 4);
				$dia=substr($fechaBase, 8, 2);
				$mes=substr($fechaBase, 5, 2);
				
		
				$cadenaFecha="";	
				$cadenaFecha.=substr($fechaBase, 8, 2);
				$cadenaFecha.='/';
				$cadenaFecha.="".$mes."";
				$cadenaFecha.='/';	
				$cadenaFecha.="".$anos."";	*/	
				
			

						$data[] = array('Numero'=>$fila["numeroBono"],'Paciente'=>$fila["paciente"], 'DNI'=>$fila["dni"], 'Asignatura'=>$fila["asignatura"], 'Fecha'=>$fila["fecha"],'Hora'=>$fila["hora"]);
						
		}
		/*$consul="Update bono Set marca=1 Where numeroBono = $bono";	
		$sql3=mysql_query($consul);*/
		//++$valor;	
		//$resultado = $valor * 5;
		//$cancel=$cancelado * 5;
		$titles = array('Numero'=>'<b>#BONO</b>','Paciente'=>'<b>PACIENTE</b>', 'DNI'=>'<b>DNI</b>','Asignatura'=>'<b>ASIGNATURA</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>');
		$total=$valorTotal - $cancelado; 
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
		//$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
		$pdf->ezText("<b>TOTAL:  </b> $".$valorTotal,18); 
		$pdf->ezText("<b>CANCELADOS:  </b> $".$cancelado,18); 
		$pdf->ezText("<b>RESULTADO:  </b> $".$total,20); 
		 
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
