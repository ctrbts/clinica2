<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$bonoInicio=$_POST['bonoInicio'];
$bonoFin= $_POST['bonoFin'];               
        //$_POST['bonoFin'];
//tomo los valores de la tabla de servicios

     $valor0= 0;	 
	// $valor50=50;
	 $valor1000=1000;
	 //$valor150=150;
	 //$valor200=200;
	// $valor500=500;
	 
if($_POST['bonoInicio']=='' and $_POST['bonoFin']=='' ){ 
			$url_relativa = "consultar.php?valor=1";
			redirigir($url_relativa);
}
else{

	 /*$cant0 = 0;	//sumo la cantidad de bonos cancelados con valor 0, 100, 150 y 200
	 $cant100= 0;
	 $cant150= 0;
	 $cant200= 0;*/
	 
	 //valores 0, 100, 150 y 200
 	 

	 
	 //cantidad de bonos cancelados de 0, 50, 100, 150 y 200
	 
	 $cantcance0=0; 
	// $cantcance50=0;
	 $cantcance1000=0;
	/* $cantcance150=0;
	 $cantcance200=0;
	 $cantcance500=0;*/

//subtotales cancelados 0, 50 100, 150 y 200

	 $subtotalcance0=0;
	 //$subtotalcance50=0;
	 $subtotalcance1000=0;
	 /*$subtotalcance150=0;
	 $subtotalcance200=0;
	 $subtotalcance500=0;*/	 
	 
	 //subtotales no cancelados 0, 50, 100, 150, 200 y 500
	 $subtotal0=0;
	 //$subtotal50=0;
	 $subtotal1000=0;
	 /*$subtotal150=0;
	 $subtotal200=0;
	 $subtotal500=0;*/	 
	
	//cantidad de 0, 50, 100, 150 y 200
	 
	 $cantidad0=0;
	 //$cantidad50=0;
	 $cantidad1000=0;
	 /*$cantidad150=0;
	 $cantidad200=0;	 
	 $cantidad500=0;*/	 
	 
	 //total 0, 50, 100, 150, 200 y 500
	 $subtotalnocance0=0;
	 //$subtotalnocance50=0;
	 $subtotalnocance1000=0;
	 /*$subtotalnocance150=0;
	 $subtotalnocance200=0;
	 $subtotalnocance500=0;	*/ 
	 

	 //valor total y subtotal
	 $total=0;
	 $subtotal=0;	

	 //valor total y subtotal cancelado
	 $totalcance=0;
	 $subtotalcance=0;
 
	 $valorARestar=0;
	$pdf = new Cezpdf('C3');
		$pdf->ezImage('UNLP_Logo.jpg',50, 80, 'none', 'center','');    //UNLP_Logo.jpg array('none')

		$pdf->selectFont('fonts/Helvetica.afm');
		$pdf->ezText("Listado de bonos \n",14,array('justification'=>'center'));
		$pdf->ezText("Hospital Odontologico \n",14,array('justification'=>'center'));
		$pdf->ezText("Universitario\n",14,array('justification'=>'center'));
		$pdf->ezText("<b>Fecha: </b> ".$fecha ,12);
    	$pdf->ezSetCmMargins(1,1,1,1,1,0.5,1,1);
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
				
		$pdf->addInfo($datacreator); 
		 $cero=0;
		 $valorTotal=0;
		 /*$cant50=0;
		 $cant0=0;*/
		$consulta="SELECT * FROM bono WHERE numeroBono Between '$bonoInicio' AND '$bonoFin' ";
		 $sql=mysql_query($consulta);
			$pdf->ezText($data,12,array('justification'=>'center'));	

		 while ($fila=mysql_fetch_assoc($sql)){
			     $val=$fila['valor'];
			     $cancelado=$fila['cancelado'];
    				/*$valor4=$fila['valor'];	
					$valorTotal= $valorTotal + $valor4;*/				 
				 if($cancelado == 0){     // no esta cancelado el bono
    				/*$valor2=$fila['valor'];	
					$valor= $valor + $valor2;*/
					switch ($val) {
								case 0:
									$cantidad0++;

									break;
								/*case 50:
									$cantidad50++;

									break;	*/								
								case 1000:
									$cantidad1000++;
									
									break;
								/*case 150:
									$cantidad150++;
									
									break;	
								case 200:
									$cantidad200++;
									
									break;									
								case 500:
									$cantidad500++;
									
									break;*/									
							}
				 }
				 else{			//cancelados
					/*	$valor3=$fila['valor'];				 
		 				$valorARestar=$valorARestar + $valor3;*/	
						switch ($val) {
								case 0:
									$cantcance0++;
									break;
								/*case 50:
									$cantcance50++;
									break;*/									
								case 1000:
									$cantcance1000++;
									break;
								/*case 150:
									$cantcance150++;
									break;
								case 200:
									$cantcance200++;
									break;	
								case 500:
									$cantcance500++;
									break; */	
	}

			 }
				 $bono=$fila["numeroBono"];
                 $paciente=$fila["paciente"];
				 $dni=$fila['dni'];
				 $asignatura=$fila["asignatura"];
				 $fecha=$fila["fecha"];
				 $hora=$fila["hora"];
				 $cancelado=$fila["cancelado"];
                 if($cancelado == 0){
						$data[] = array('Numero'=>$bono,'Paciente'=>$paciente, 'DNI'=>$dni, 'Asignatura'=>$asignatura, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'', 'valor'=>$val);
						
						}
				 else{
						$data[] = array('Numero'=>$bono,'Paciente'=>$paciente, 'DNI'=>$dni, 'Asignatura'=>$asignatura, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'CANCELADO', 'valor'=>$val);	
						
				 }		

		}
		$titles = array('Numero'=>'<b>#BONO</b>','Paciente'=>'<b>PACIENTE</b>', 'DNI'=>'<b>DNI</b>','Asignatura'=>'<b>ASIGNATURA</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>','cancelado'=>'<b>CANCELADO</b>','valor'=>'<b>VALOR</b>');
		 $total=$valorTotal - $valorARestar;
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
	
//subtotales no cancelados de 0, 100, 150 y 200
		$subtotalnocance0=($cantidad0 * $valor0);
		/*$subtotalnocance50=($cantidad50 * $valor50);
		$subtotalnocance100=($cantidad100 * $valor100);
		$subtotalnocance150=($cantidad150 * $valor150);
		$subtotalnocance200=($cantidad200 * $valor200); */
		$subtotalnocance1000=($cantidad1000 * $valor1000);		
//subtotales cancelados 0, 100, 150, 200 y 500
	 $subtotalcance0=($cantcance0 * $valor0);
	/* $subtotalcance50=($cantcance50 * $valor50);	 
	 $subtotalcance100=($cantcance100 * $valor100);	 
	 $subtotalcance150=($cantcance150 * $valor150);
	 $subtotalcance200=($cantcance200 * $valor200);	   */
	 $subtotalcance1000=($cantcance1000 * $valor1000);
//subtotal cancelados 	 
//cantidad total de bonos cancelados
	/*$cantidadtotalcance=($cantcance0 + $cantcance50 + $cantcance100 +$cantcance150 +$cantcance200 + $cantcance500 );     //cantidad total de bonos cancelados		
     $subtotalcance=  ($subtotalcance50 + $subtotalcance100 +$subtotalcance150 +$subtotalcance200 + $subtotalcance500);   //cantidad de bonos cancelados en dinero */
	 	$cantidadtotalcance=($cantcance0 + $cantcance1000);     //cantidad total de bonos cancelados		
     $subtotalcance=$subtotalcance1000;   //cantidad de bonos cancelados en dinero
	 
	 
//subtotal no cancelados de 0, 100, 150 y 200
   /* $subtotalnocance= ( $subtotalnocance50 + $subtotalnocance100 + $subtotalnocance150 +$subtotalnocance200 + $subtotalnocance500); // cantidad total de bonos no cancelados  en dinero
    $cantidadbonosnocance=($cantidad0 + $cantidad50 + $cantidad100 + $cantidad150 + $cantidad200 + $cantidad500);	//cantidad total de bonos no cancelados */
	    $subtotalnocance= ( $subtotalnocance1000); // cantidad total de bonos no cancelados  en dinero
    $cantidadbonosnocance=($cantidad0 + $cantidad1000);	//cantidad total de bonos no cancelados
	
				
		$pdf->ezText("<b> BONOS CANCELADOS  </b> ",24);
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $0 CANCELADOS TOTAL:  </b> ".$cantcance0. "  X  $0 = $0" ,18);
		/*$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $50 CANCELADOS TOTAL:  </b> ".$cantcance50. "  X  $ 50 = $" .$subtotalcance50 ,18);		
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $100 CANCELADOS TOTAL:  </b> ".$cantcance100. "  X  $ 100 = $" .$subtotalcance100 ,18);
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $150 CANCELADOS TOTAL:  </b> ".$cantcance150. "  X  $ 150 = $" .$subtotalcance150,18);	*/	
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $1000 CANCELADOS TOTAL:  </b> ".$cantcance1000. "  X  $ 1000 = $" .$subtotalcance1000,18);	
		$pdf->ezText("<b>CANTIDAD DE BONOS CANCELADO:  </b> ".$cantidadtotalcance,18);
		$pdf->ezText("<b>TOTAL DE BONOS CANCELADO:  </b> $".$subtotalcance,18);	
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b> BONOS NO CANCELADOS  </b> ",24);	
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $0  TOTAL:  </b> ".$cantidad0. "  X  $ 0 = $" .$subtotal0,18);		//cantidad total por 0
	/*	$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $50  TOTAL:  </b> ".$cantidad50. "  X  $ 50 = $" .$subtotalnocance50,18);		// cantidad total por 50		
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $100  TOTAL:  </b> ".$cantidad100. "  X  $ 100 = $" .$subtotalnocance100,18);		// cantidad total por 100		
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $150  TOTAL:  </b> ".$cantidad150. "  X  $ 150 = $" .$subtotalnocance150,18);		//cantidad total por 150
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $200  TOTAL:  </b> ".$cantidad200. "  X  $ 200 = $" .$subtotalnocance200,18);	*/	// cantidad total por 200
		$pdf->ezText("<b>CANTIDAD DE BONOS VALOR $1000  TOTAL:  </b> ".$cantidad1000. "  X  $ 1000 = $" .$subtotalnocance1000,18);		// cantidad total por 500		
		$pdf->ezText("<b>CANTIDAD DE BONOS NO CANCELADO:  </b> ".$cantidadbonosnocance,18);
		
		$pdf->ezText("<b>TOTAL DE BONOS NO CANCELADO:  </b> $".$subtotalnocance,18);	
		$pdf->ezText("<b> </b> ",18);


		$totalgeneral=($subtotalnocance + $subtotalcance);
		
		$pdf->ezText("<b>               TOTAL DE BONOS SUBTOTAL GENERAL:  </b>    $".$totalgeneral,20);	
		$pdf->ezText("<b>                                                            -               </b> ",18);		
		$pdf->ezText("<b>                       TOTAL BONOS CANCELADOS:  </b>                $".$subtotalcance,20);
		$pdf->ezText("<b>         ------------------------------------------------------------------------------------------- </b> ",18);
		$pdf->ezText("<b>       TOTAL DE BONOS MENOS LOS CANCELADOS:  </b> $".$subtotalnocance,20);
		 
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

