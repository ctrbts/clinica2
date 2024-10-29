<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $desde= $_POST['desde'];
 $hasta= $_POST['hasta']; 
 $plan= $_POST['plan'];
 		$anos=substr($desde, 6, 4);
		$mes=substr($desde, 3, 2);
		$dia=substr($desde, 0, 2);
$desde="$anos"."-"."$mes"."-"."$dia";
 		$anos2=substr($hasta, 6, 4);
		$mes2=substr($hasta, 3, 2);
		$dia2=substr($hasta, 0, 2);
$hasta="$anos2"."-"."$mes2"."-"."$dia2";		
	 if (!isset($_SESSION['pass'])){ 
              $sql="select b.dni, b.paciente, h.plan, b.fecha from historiaclinica h, bono b where b.cancelado=0 and h.plan = '$plan' and h.dni = b.dni and b.fecha between '$desde' and '$hasta' order by b.fecha";
			  $resultado=mysql_query($sql);
			  while($fila=mysql_fetch_assoc($resultado)){
				 $dni=$fila['dni'];  
				 $sql2="select * from ioma where dni= '$dni'";
				 //echo $fila['fecha'];
				 $result = mysql_query($sql2);
				 if ( (mysql_num_rows($result) == 0)) {
					$paciente=$fila['paciente'];	
					$dni=$fila['dni'];				
					$plan=$fila['plan'];
					$fecha=$fila['fecha'];
					$anos3=substr($fecha, 6, 4);
					$mes3=substr($fecha, 3, 2);
					$dia3=substr($fecha, 0, 2);
					$fecha=="$anos3"."-"."$mes3"."-"."$dia3";
					
					$sql3="insert into ioma (paciente, dni, plan, fecha) values('$paciente','$dni','$plan','$fecha')";
				    $resu=mysql_query($sql3);
				 }
			  }
	   	      $url='listarPlan.php';
			  redirigir($url);		
	 }	
	 else{  
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			}
						
