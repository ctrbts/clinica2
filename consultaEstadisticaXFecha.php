<?php
 session_start();
//include('class.ezpdf4.php');
require_once ("funciones.php");
$db = conectar_admin();
$fechaInicio=$_POST['fechaEstadistica'];
		$anos=substr($fechaInicio, 6, 4);
		$mes=substr($fechaInicio, 3, 2);
		$dia=substr($fechaInicio, 0, 2);	
			$consulta="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia";
			$resultado=mysql_query($consulta);
			$total=mysql_num_rows($resultado);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ESTADISTICA DE PLAN</title>
</head>

<body>
<?php if (!isset($_SESSION['pass'])){
 ?>
 <div id="marco">
								 <div> <img src="imagenes/banner.jpg" style="width:70%; height:15%; position:relative; left:25%px" > 
						<div style="position:relative; left:75%; width:10%; top:20px; heigh:10%; right:15%"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div></div>
						<fieldset style="width:60%; top:-30%; left:10%; position:relative "> <legend>ESTADISTICA DE LOS PLANES</legend>
  <form> <?php
			$consultasumar="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='SUMAR'";
			$resultado=mysql_query($consultasumar);
			$sumar=mysql_num_rows($resultado);
			$porcentajesumar=($sumar/$total)*100;
			//plan pami
			$consultapami="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='PAMI'";
			$resultapami=mysql_query($consultapami);
			$pami=mysql_num_rows($resultapami);
			$porcentajepami=($pami/$total)*100;
			//plan ioma
			$consultaioma="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='IOMA'";
			$resultaioma=mysql_query($consultaioma);
			$ioma=mysql_num_rows($resultaioma);
			$porcentajeioma=($ioma/$total)*100;
			//plan profe
			$consultaprofe="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='PROFE'";
			$resultaprofe=mysql_query($consultaprofe);
			$profe=mysql_num_rows($resultaprofe);
			$porcentajeprofe=($profe/$total)*100;
			//plan particular
			$consultaparticular="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='PARTICULAR'";
			$resultaparticular=mysql_query($consultaparticular);
			$particular=mysql_num_rows($resultaparticular);
			$porcentajeparticular=($particular/$total)*100;
			//plan obra
			$consultaobra="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='OBRA'";
			$resultaobra=mysql_query($consultaobra);
			$obra=mysql_num_rows($resultaobra);
			$porcentajeobra=($obra/$total)*100;
			//plan osprera
			$consultaosprera="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='OSPRERA'";
			$resultaosprera=mysql_query($consultaosprera);
			$osprera=mysql_num_rows($resultaosprera);
			$porcentajeosprera=($osprera/$total)*100;
			//plan samo
			$consultasamo="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and plan='SAMO'";
			$resultasamo=mysql_query($consultasamo);
			$samo=mysql_num_rows($resultasamo);
			$porcentajesamo=($samo/$total)*100;
			//plan otros
			$consultaotro="select * from historiaclinica where anos=$anos and mes=$mes and dia=$dia and (plan='x' OR plan='X' OR plan='RX' OR plan='')";
			$resultaotro=mysql_query($consultaotro);
			$otro=mysql_num_rows($resultaotro);
			$porcentaotros=($otro/$total)*100;			
			//echo $otro;
		// imprimmimos los porcentajes por cada plan
		$date = new DateTime($_POST['fechaEstadistica']);
		$fecha=$date->format('d/m/Y');
		$v1= 'Total cantidad de registro del dia: ';
		$v1.=$fecha;
		$v1.=' ';
		$v1.='total de registro: ';
		
		$v1.=$total;
		//echo 'Total cantidad de registro del dia: $total ' ;  //'".$total."'
		echo $v1; ?> <br/><br/><br/> <?php
		echo 'El porcentaje del plan SUMAR es: ' ; //'".$porcentajesumar."' ?>
		 <B style="color:#0000FF; font-size:18px"> <?php  echo $porcentajesumar; ?> </B> <?php	
		echo '%';
		?> <br/> <?php
		echo 'El porcentaje del plan PAMI es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php   echo $porcentajepami; ?> </B> <?php	
		echo '%';
		?> <br/> <?php	
				echo 'El porcentaje del plan IOMA es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajeioma;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje del plan PROFE es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajeprofe;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje del plan PARTICULAR es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajeparticular;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje del plan OBRA es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajeobra;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje del plan OSPRERA es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajeosprera;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje del plan SAMO es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentajesamo;	?> </B> <?php
		echo '%';
		?> <br/> <?php
				echo 'El porcentaje de OTROS planes es: ' ; //'".$porcentajesumar."'
		?>
		 <B style="color:#0000FF; font-size:18px"><?php echo $porcentaotros;	?> </B> <?php
		echo '%';		
		?> <br/><br/><br/><br/><br/> <?php
		echo 'Porcentaje total: ';
		$totalporcentaje=$porcentajesumar + $porcentajepami + $porcentajeioma +	$porcentajeprofe + $porcentajeparticular + 	$porcentajeobra + $porcentajeosprera + $porcentajesamo + $porcentaotros;
		echo $totalporcentaje;
		echo '%';
			
      ?><br/><input type='button' onclick='window.print();' value='Imprimir' /> </form></fieldset></div><?php
}
else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
</body>
</html>
