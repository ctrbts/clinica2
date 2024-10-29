<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $dni=$_POST["dni"];


  
//defino fecha 1 

/*$fecha1=$_POST['fechaInicio'];
$mes1= substr($fecha1,5,2);
$dia1= substr($fecha1,8,2);
$ano1= substr($fecha1,0,4);*/
if (!isset($_SESSION['pass'])){  
					
					$db = conectar_admin();
					//mysql_query("BEGIN WORK");
				
						$sql = "SELECT * FROM paciente WHERE  dni=$dni";
				
						// Ejecutar Consulta
						$result = mysql_query($sql);
						if ( mysql_num_rows($result) == 0) 
						{
											
							//el nombre de paciente no existe
				
							mysql_query("COMMIT");
							desconectar();
							$url_relativa = "consultarSumar.php?valor=1";
							
							redirigir($url_relativa);		
							//desconectamos la BD
							
				
						exit();
						}
						else{ 
								$esSumar=1;
								//defino fecha 2 
								$fecha2=date('Y,m,d');
								//$fecha2=$_POST['fechaFin'];
								$mes2= substr($fecha2,5,2);
								$dia2= substr($fecha2,8,2);
								$ano2= substr($fecha2,0,4);
						        //hacer consulta y obtener desde cuando corre el sumar
								$sql2 = "SELECT * FROM historiaclinica WHERE  dni=$dni  and	 sumar=0";
								$resultado=mysql_query($sql2)or die(mysql_error());
								
								while($fila=mysql_fetch_assoc($resultado)){
										$mes1= $fila['mes'];
										$dia1= $fila['dia'];
										$ano1= $fila['anos'];
								 		$apellido=$fila['apellido'];
								
										//calculo timestam de las dos fechas 
										$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
										$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 
										
										//resto a una fecha la otra 
										$segundos_diferencia = $timestamp1 - $timestamp2; 
										//echo $segundos_diferencia; 
										
										//convierto segundos en días 
										$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
										
										//obtengo el valor absoulto de los días (quito el posible signo negativo) 
										$dias_diferencia = abs($dias_diferencia); 
										
										//quito los decimales a los días de diferencia 
										$dias_diferencia = floor($dias_diferencia); 
										if($dias_diferencia <= 180){
										   $esSumar=0;
										
							  			}	
							
								}
							$sql3="select * from historiaclinica where dni=$dni";
							$resu=mysql_query($sql3);
							$fila2=mysql_fetch_assoc($resu);	
							//vemos que hacer si imprimimos indicando que es sumar
						if($esSumar == 0){	
							?>			 <div id="marco"> <img src="imagenes/banner.jpg" style="width:750px; height:200px; position:relative; left:250px" /> </div>
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:12px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
						  <b style="color:#FF0000; font-size:14px"><b style="color:#0000FF">EL PACIENTE:&nbsp;</b> <?php echo  $fila2['apellido'] ?> &nbsp; <?php echo $fila2['nombre'] ?></b>
						  <b style="color:#FF0000; font-size:14px"><b style="color:#0000FF">CON DOCUMENTO:&nbsp; </b><?PHP echo $fila2['dni'] ?><br/>
						  <b style="color:#00FFFF; font-size:26px">POSEE<b/><b style="color:#FF9900; font-size:22px"> SUMAR YA QUE SE ENCUENTRA DENTRO DE LOS 6 MESES QUE CUBRE SUMAR<br/>
						  <input onClick="location.href = 'consultarSumar.php?valor=0' " type="button" value="VOLVER" name="VOLVER" >
						  
					
																			
														
						<?php	
						}
					
						else{
															?>			 <div id="marco"> <img src="imagenes/banner.jpg" style="width:750px; height:200px; position:relative; left:250px" /> </div>
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:16px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
						  <b style="color:#FF0000; font-size:14px"><b style="color:#0000FF">EL PACIENTE:</b>&nbsp; <?php echo $fila2['apellido'] ?> &nbsp; <?php echo $fila2['nombre'] ?> &nbsp&nbsp</b><br/>
						  <b style="color:#FF0000; font-size:14px"><b style="color:#0000FF">CON DOCUMENTO:&nbsp; </b> <?PHP ECHO $dni ?><br/>
						  <b style="color:#00FFFF; font-size:26">NO POSEE </b>  <b style="color:#009900; font-size:22px"> SUMAR YA QUE SE ENCUENTRA FUERA DE LOS 6 MESES QUE CUBRE SUMAR<br/>
						  <input onClick="location.href = 'consultarSumar.php?valor=0' " type="button" value="VOLVER" name="VOLVER" >
						
						<?PHP }
						
					}				

}
else{
					$url='loguearUsuario.php?valor=0';
					redirigir($url);
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
