<?php
 session_start();
 require_once ("funciones.php"); 
 require_once('class.ezpdf.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>listado de consultas</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="facultad de odontologia">
		
		<meta name="Keywords" content="Fundaci&oacute;n, Jos&eacute; Poblete,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">


	</head>


	<body >
	<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
	    if($valor=0){
	   		
				$pdf =& new Cezpdf('a4');
				$pdf->selectFont('../fonts/courier.afm');
				$pdf->ezSetCmMargins(1,1,1.5,1.5);
				$db = conectar_admin();

				
   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1000px; height:200px; position:relative; left:-100px;" /> </div>
						<div style=" position:relative; left:1150px; top:-210px; width:200px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /> </div>
				<?php     	
				$sqlpaciente = "SELECT * FROM paciente";
				$resulpaciente = mysql_query($sqlpaciente);
				$paciente=mysql_fetch_assoc($resulpaciente);
				$datacreator = array (
                    'Title'=>'CONSULTAS FOLP',
                    'Author'=>'FOLP',
                    'Subject'=>' CONSULTA de PDF',
                    'Creator'=>'consultasFOLP@hotmail.com'
			    );
				$pdf->addInfo($datacreator);
				$data[] = array('dni'=>$paciente['dni']);
				$pdf->ezTable($data, $title,$options);
				$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
				$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
				$pdf->ezStream();
			}
			else{ ?>
			
			
			
			<?php }	 
			 }		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>
