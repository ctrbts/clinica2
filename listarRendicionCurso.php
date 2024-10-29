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
	 
	 //$cantcancecursoinicio=0; 
	 $cantcancecurso=0;
	 


//subtotales cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida

	 //$subtotalcancecursoinicio=0;
	 $subtotalcancecurso=0;
	 
	 //subtotales no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 //$subtotalcursoinicio=0;
	 $subtotalcurso=0;

	//cantidad de bonos no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 
	 //$cantidadcursoinicio=0;
	 $cantidadcurso=0;
	 	  
	 //total de bonos no cancelados de:  bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	/* $subtotalnocancecontribucion=0;
	 $subtotalnocanceposycurso=0;*/
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
		
		$consulta="SELECT * FROM bonocurso WHERE idBono Between '$bonoInicio' AND '$bonoFin' ";
		$sql=mysql_query($consulta);
		//$pdf->ezText($data,12,array('justification'=>'center'));	

		 while ($fila=mysql_fetch_assoc($sql)){
			     $val=$fila['valor'];
				 $idCurso=$fila['idCurso'];
			     $cancelado=$fila['cancelado'];
   				 if($cancelado == 0){     // no esta cancelado el bono
   					switch ($idCurso) {
								case 1:
									$cantidadcurso++;

									break;									
								
								}
				 }
				 else{			
						switch ($idCurso) {
								case 1:
									$cantcancecurso++;
									break;									
						}
            	 }
				 $bono=$fila["idBono"];
				 $dni=$fila['dni'];
				 $consupac="select * from pacientecurso where dni = $dni";
				 $sqlpac=mysql_query($consupac);
				 $filapac=mysql_fetch_assoc($sqlpac);
				 $nyap=$filapac['nyap'];
				 $consucurso="select * from curso where idCurso = $idCurso";
				 $sqlcur=mysql_query($consucurso);
				 $filacur=mysql_fetch_assoc($sqlcur);
				 $curso=$filacur['curso'];
				 $fecha=$fila['fecha'];
				 $hora=$fila['hora'];
				 $cancelado=$fila['cancelado'];
                 if($cancelado == 0){
						$data[] = array('Numero'=>$bono,'Persona'=>$nyap, 'DNI'=>$dni, 'curso'=>$curso, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'', 'valor'=>$val);
						
						}
				 else{
						$data[] = array('Numero'=>$bono,'Persona'=>$nyap, 'DNI'=>$dni, 'curso'=>$curso, 'Fecha'=>$fecha,'Hora'=>$hora, 'cancelado'=>'CANCELADO', 'valor'=>$val);	
				 }		

		}
		$titles = array('Numero'=>'<b>#BONO</b>','Persona'=>'<b>NOMBRE Y APELLIDO</b>', 'DNI'=>'<b>DNI</b>','curso'=>'<b>CURSO</b>', 'Fecha'=>'<b>FECHA</b>','Hora'=>'<b>HORA</b>','cancelado'=>'<b>CANCELADO</b>','valor'=>'<b>VALOR</b>');
//		 $total=$valorTotal - $valorARestar;
		$pdf->ezText($data,16); 
		 $pdf->ezTable($data,$titles,'',$options );
		$pdf->ezText("\n\n\n",5);  //salto de pagina
//valores 

//$valorbonocursoinicio=8000;
$valorcurso=8000;

//subtotales no cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
		//$subtotalcursoinicio=($cantidadcursoinicio * $valorbonocursoinicio);
		$subtotalcurso=($cantidadcurso * $valorcurso );
				
//subtotales cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
	 //$subtotalcancecursoinicio=($cantcancecursoinicio * $valorbonocursoinicio);
	 $subtotalcancecurso=($cantcancecurso * $valorcurso);	 

//cantidad total de bonos cancelados
	$cantidadtotalcance= $cantcancecurso ;     //cantidad total de bonos cancelados		
     $subtotalcance=  $subtotalcancecurso ;   //cantidad de bonos cancelados en dinero
	 
	 
//subtotal no cancelados de: bono contribucion, posgrado y curso, odontologo externo y convalidacion y revalida
    $subtotalnocance=  $subtotalcurso ; // cantidad total de bonos no cancelados  en dinero
    $cantidadbonosnocance= $cantidadcurso ;	//cantidad total de bonos no cancelados
//Ponemos la especialidad como string

		//$contribu='BONO CURSO INICIO';
		$cur='CURSO';
					
		$pdf->ezText("<b> BONOS CANCELADOS  </b> ",16);
		$pdf->ezText("<b> </b> ",18);
		//$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$contribu." CANCELADOS TOTAL:  </b> ".$cantcancecursoinicio. "  X $" .$valorbonocursoinicio." = ".$subtotalcancecursoinicio ,14);
		$pdf->ezText("<b>CANTIDAD DE BONOS DE " .$cur. " CANCELADOS TOTAL:  </b> ".$cantcancecurso. "  X  $" .$valorcurso.  "= $" .$subtotalcancecurso ,14);		
		
//$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$iniciotratamiento. " CANCELADOS TOTAL:  </b> ".$cantcanceiniciotratamiento. "  X  $" .$valorcursoposgradoinicio." = $" .$subtotalcanceiniciotratamiento,12);
//$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$mensualespecializacionenortodoncia. " CANCELADOS TOTAL:  </b> ".$cantcancemensualespecializacionortodoncia. "  X  $" .$valormensualespecializacionortodoncia." = $" .$subtotalcancemensualespecializacionortodoncia,12);		
		$pdf->ezText("<b> </b> ",18);
		$pdf->ezText("<b>CANTIDAD DE BONOS CANCELADO:  </b> ".$cantidadtotalcance,14);
		$pdf->ezText("<b>TOTAL DE BONOS CANCELADO:  </b> $".$subtotalcance,14);	
		$pdf->ezText("<b> </b> ",14);
		$pdf->ezText("<b> BONOS NO CANCELADOS  </b> ",14);	
		$pdf->ezText("<b> </b> ",18);
		//$pdf->ezText("<b>CANTIDAD DE BONOS DE "  .$contribu. " TOTAL:  </b> ".$cantidadcursoinicio. "  X  $ "  .$valorbonocursoinicio. "= $" .$subtotalcursoinicio,14);		
		$pdf->ezText("<b>CANTIDAD DE BONOS DE ".$cur. "  TOTAL:  </b> ".$cantidadcurso. "  X  $" .$valorcurso. "= $" .$subtotalcurso,14);				
			
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

