<?php
include('class.ezpdf.php');
require_once ("funciones.php");
$db = conectar_admin();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$bonoInicio=$_POST['bonoInicio'];
$bonoFin= $_POST['bonoFin'];               
	$fecha=date("d-m-Y "); 
if($_POST['bonoInicio']=='' and $_POST['bonoFin']=='' ){ 
			$url_relativa = "consultarEsterilizacion.php?valor=1";
			redirigir($url_relativa);
}
else{

		 
	 //cantidad de bonos cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 
	 $cantcancecontribucion=0; 
	 $cantcanceposycurso=0;
	 $cantcanceodontoext=0;
	 $cantcanceconvayreva=0;
	/* $cantcanceiniciotratamiento=0;
	 $cantcancemensualespecializacionortodoncia=0;*/


//subtotales cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida

	 $subtotalcancecontribucion=0;
	 $subtotalcanceposycurso=0;
	 $subtotalcanceodontoext=0;
	 $subtotalcanceconvayreva=0;
	/* $subtotalcanceiniciotratamiento=0;
	 $subtotalcancemensualespecializacionortodoncia=0;*/

	 //subtotales no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 $subtotalcontribucion=0;
	 $subtotalposycurso=0;
	 $subtotalodontoext=0;
	 $subtotalconvayreva=0;
	/* $subtotaliniciotratamiento=0;
	 $subtotalmensualespecializacionortodoncia=0;*/
	 
	//cantidad de bonos no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 
	 $cantidadcontribucion=0;
	 $cantidadposycurso=0;
	 $cantidadodontoext=0;
	 $cantidadconvayreva=0;
	 /*$cantidadiniciotratamiento=0;
	 $cantidadmensualespecializacionortodoncia=0;*/
	  
	 //total de bonos no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 $subtotalnocancecontribucion=0;
	 $subtotalnocanceposycurso=0;
	 $subtotalnocanceodontoext=0;
	 $subtotalnocanceconvayreva=0;
	 /*$subtotalnocanceiniciotratamiento=0;
	 $subtotalnocancemensualespecializacionortodoncia=0;*/
	//valor total y subtotal no cancelado
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
		$pdf->ezText("<b>  </b> ",12);
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
		
		$consulta="SELECT * FROM bonoesterilizacion WHERE numeroBono Between '$bonoInicio' AND '$bonoFin' ";
		$sql=mysql_query($consulta);
		//$pdf->ezText($data,12,array('justification'=>'center'));	

		 while ($fila=mysql_fetch_assoc($sql)){
			     $val=$fila['valor'];
				 $idEspe=$fila['identificador'];
			     $cancelado=$fila['cancelado'];
   				 if($cancelado == 0){     // no esta cancelado el bono
   					switch ($idEspe) {
								case 1:
									$cantidadcontribucion++;

									break;
								case 2:
									$cantidadposycurso++;

									break;									
								case 3:
									$cantidadodontoext++;
									
									break;
								case 4:
									$cantidadconvayreva++;
									
									break;	
								/*case 5:
									$cantidadiniciotratamiento++;
									
									break;
								case 6:
									$cantidadmensualespecializacionortodoncia++;
									
									break;*/	
								}
				 }
				 else{			
						switch ($idEspe) {
								case 1:
									$cantcancecontribucion++;
									break;
								case 2:
									$cantcanceposycurso++;
									break;									
								case 3:
									$cantcanceodontoext++;
									break;
								case 4:
									$cantcanceconvayreva++;
									break;
								/*case 5:
									$cantcanceiniciotratamiento++;
									
									break;
								case 6:
									$cantcancemensualespecializacionortodoncia++;
									
									break;*/									
							}
            	 }
				 $bono=$fila["numeroBono"];
				 $dni=$fila['dni'];
				 $consuper="select * from persona where documento = $dni";
				 $sqlper=mysql_query($consuper);
				 $filaper=mysql_fetch_assoc($sqlper);
				 $nyap=$filaper['nombreyapellido'];
				 $consuespe="select * from especialidad where idEspecialidad = $idEspe";
				 $sqlespe=mysql_query($consuespe);
				 $filaespe=mysql_fetch_assoc($sqlespe);
				 $especialidad=$filaespe['especialidad'];
				 $fecha=$fila['fecha'];
				 $hora=$fila['hora'];
				 $cancelado=$fila['cancelado'];
                 if($cancelado == 0){
						$data[] = array('Numero'=>$bono,'Persona'=>$nyap, 'DNI'=>$dni, 'Especialidad'=>$especialidad, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'', 'valor'=>$val);
						
						}
				 else{
						$data[] = array('Numero'=>$bono,'Persona'=>$nyap, 'DNI'=>$dni, 'Especialidad'=>$especialidad, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'CANCELADO', 'valor'=>$val);	
						
				 }		

		}
		$titles = array('Numero'=>'<b>#BONO</b>','Persona'=>'<b>NOMBRE Y APELLIDO</b>', 'DNI'=>'<b>DNI</b>','Especialidad'=>'<b>ESPECIALIDAD</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>','cancelado'=>'<b>CANCELADO</b>','valor'=>'<b>VALOR</b>');
//		 $total=$valorTotal - $valorARestar;
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
//valores 

$valorbonocontri=10000;
$valorposycurso=5000;
$valorodontoext=10000;
$valorconvayreva=5000;	
/*$valorcursoposgradoinicio=8000;
$valormensualespecializacionortodoncia=4000;*/
//subtotales no cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
		$subtotalcontribucion=($cantidadcontribucion * $valorbonocontri);
		$subtotalposycurso=($cantidadposycurso * $valorposycurso );
		$subtotalodontoext=($cantidadodontoext * $valorodontoext );
		$subtotalconvayreva=($cantidadconvayreva * $valorconvayreva );
		/*$subtotaliniciotratamiento=($cantidadiniciotratamiento * $valorcursoposgradoinicio );
		$subtotalmensualespecializacionortodoncia=($cantidadmensualespecializacionortodoncia * $valormensualespecializacionortodoncia );*/
		
		
//subtotales cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 $subtotalcancecontribucion=($cantcancecontribucion * $valorbonocontri);
	 $subtotalcanceposycurso=($cantcanceposycurso * $valorposycurso);	 
	 $subtotalcanceodontoext=($cantcanceodontoext * $valorodontoext);	 
	 $subtotalcanceconvayreva=($cantcanceconvayreva * $valorconvayreva);
	 /*$subtotalcanceiniciotratamiento=($cantcanceiniciotratamiento * $valorcursoposgradoinicio);
	 $subtotalcancemensualespecializacionortodoncia=($cantcancemensualespecializacionortodoncia * $valormensualespecializacionortodoncia);*/


//cantidad total de bonos cancelados
	$cantidadtotalcance=($cantcancecontribucion + $cantcanceposycurso + $cantcanceodontoext + $cantcanceconvayreva );     //cantidad total de bonos cancelados		
     $subtotalcance=  ($subtotalcancecontribucion + $subtotalcanceposycurso + $subtotalcanceodontoext + $subtotalcanceconvayreva );   //cantidad de bonos cancelados en dinero
	 
	 
//subtotal no cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
    $subtotalnocance= ( $subtotalcontribucion + $subtotalposycurso + $subtotalodontoext + $subtotalconvayreva ); // cantidad total de bonos no cancelados  en dinero
    $cantidadbonosnocance=($cantidadcontribucion + $cantidadposycurso + $cantidadodontoext + $cantidadconvayreva );	//cantidad total de bonos no cancelados
//Ponemos la especialidad como string

		$contribu='BONO CONTRIBUCION';
		$posycur='POSGRADO Y CURSO';
		$odontoext='ODONTOLOGO EXTERNO';
		$convayreva='CONVALIDACION Y REVALIDA';
		/*$iniciotratamiento='BONO CURSOS DE POSGRADO INICIAN TRATAMIENTO';
		$mensualespecializacionenortodoncia='BONO MENSUAL CURSO ESPECIALIZACION EN ORTODONCIA';*/
				
		$pdf->ezText("<b> BONOS CANCELADOS  </b> ",16);
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$contribu." CANCELADOS TOTAL:  </b> ".$cantcancecontribucion. "  X $" .$valorbonocontri." = ".$subtotalcancecontribucion ,14);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE " .$posycur. " CANCELADOS TOTAL:  </b> ".$cantcanceposycurso. "  X  $" .$valorposycurso.  "= $" .$subtotalcanceposycurso ,14);		
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$odontoext. "  CANCELADOS TOTAL:  </b> ".$cantcanceodontoext. "  X  $" .$valorodontoext."= $" .$subtotalcanceodontoext ,14);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$convayreva. " CANCELADOS TOTAL:  </b> ".$cantcanceconvayreva. "  X  $" .$valorconvayreva." = $" .$subtotalcanceconvayreva,14);
	/*	$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$iniciotratamiento. " CANCELADOS TOTAL:  </b> ".$cantcanceiniciotratamiento. "  X  $" .$valorcursoposgradoinicio." = $" .$subtotalcanceiniciotratamiento,12);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$mensualespecializacionenortodoncia. " CANCELADOS TOTAL:  </b> ".$cantcancemensualespecializacionortodoncia. "  X  $" .$valormensualespecializacionortodoncia." = $" .$subtotalcancemensualespecializacionortodoncia,12);		*/
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b>CANTIDAD DE BONOS CANCELADO:  </b> ".$cantidadtotalcance,14);
		$pdf->ezText("<b>TOTAL DE BONOS CANCELADO:  </b> $".$subtotalcance,14);	
		$pdf->ezText("<b> </b> ",14);
		$pdf->ezText("<b> BONOS NO CANCELADOS  </b> ",14);	
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE "  .$contribu. " TOTAL:  </b> ".$cantidadcontribucion. "  X  $ "  .$valorbonocontri. "= $" .$subtotalcontribucion,14);		
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$posycur. "  TOTAL:  </b> ".$cantidadposycurso. "  X  $" .$valorposycurso. "= $" .$subtotalposycurso,14);				
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$odontoext. "  TOTAL:  </b> ".$cantidadodontoext. "  X  $" .$valorodontoext. "= $" .$subtotalodontoext,14);				
		$pdf->ezText("<b>CANTIDAD DE BONOS DE " .$convayreva. "  TOTAL:  </b> ".$cantidadconvayreva. "  X  $" .$valorconvayreva. " = $" .$subtotalconvayreva,14);
		/*$pdf->ezText("<b>CANTIDAD DE BONOS DE " .$iniciotratamiento. "  TOTAL:  </b> ".$cantidadiniciotratamiento. "  X  $" .$valorcursoposgradoinicio. " = $" .$subtotaliniciotratamiento,14);
        $pdf->ezText("<b>CANTIDAD DE BONOS DE " .$mensualespecializacionenortodoncia. "  TOTAL:  </b> ".$cantidadmensualespecializacionortodoncia. "  X  $" .$valormensualespecializacionortodoncia. " = $" .$subtotalmensualespecializacionortodoncia,14);		*/
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b>CANTIDAD DE BONOS NO CANCELADO:  </b> ".$cantidadbonosnocance,16);
		$pdf->ezText("<b>TOTAL DE BONOS NO CANCELADO:  </b> $".$subtotalnocance,16);	
		$pdf->ezText("<b> </b> ",18);

//hacemos las cuentas finales 
		$totalgeneralbruto=($subtotalnocance + $subtotalcance);
		$totalgeneralneto=($totalgeneralbruto - $subtotalcance);
//sumamos las cantidades de bonos hechos 
        $cantidadtotaldebonos=($cantidadtotalcance + $cantidadbonosnocance );	
		$pdf->ezText("<b>TOTAL DE BONOS:  </b> ".$cantidadtotaldebonos,16);
		
        $pdf->ezText("<b> </b> ",18);		
		$pdf->ezText("<b>               TOTAL DE BONOS SUBTOTAL GENERAL:  </b>    $".$totalgeneralbruto,20);	
		$pdf->ezText("<b>                                                            -               </b> ",18);		
		$pdf->ezText("<b>                       TOTAL BONOS CANCELADOS:  </b>                $".$subtotalcance,20);
		$pdf->ezText("<b>         ------------------------------------------------------------------------------------------- </b> ",18);
		$pdf->ezText("<b>       TOTAL DE BONOS MENOS LOS CANCELADOS:  </b> $".$totalgeneralneto,20);
		 
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

