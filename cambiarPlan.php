<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 ?>
 <html>
<head>
		<title>Cambio de plan</title>

			<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="Facultadad de odontologia - cambio de plan ">
		
		<meta name="Keywords" content="FOLP,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		<script language='javascript' src='validar/validarBono.js'>
		</script>
</head>
<body>
 <?php
 
 if (!isset($_SESSION['pass'])){ ?>
 			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:250px" /> </div> <span style="position: relative; right:-50px "><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAMBIAR PLAN A UN PACIENTE</B></legend>	  
					<div > 
						
	<?php
    $dni=$_POST['dni'];
	//consulta de la historia clinica
	$consulta="select * from historiaClinica where dni = $dni order by idHistoriaClinica desc limit 1 ";
	$resultado=mysql_query($consulta);
	$fila=mysql_fetch_assoc($resultado);
	$idHistoriaClinica=$fila['idHistoriaClinica'];
	$nombre=$fila['nombre'];
	$planActual=$fila['plan'];	
	$apellido=$fila['apellido'];
	$tienePlan=$fila['plan'];
	$nyap= $nombre."    ".$apellido;
	
	$consultaplan="select * from plan where idPlan = '$tienePlan'";
	$resultadoplan=mysql_query($consultaplan);
	$filaplan=mysql_fetch_assoc($resultadoplan);
	
    
	?>
	<form action="cambiodeplan.php?dni=<?php echo $dni ?>" method="POST" target="_blank" >	
	   			<div style=" position:relative; left:0px;  font-size:24px">	
				<font color="blue"> <?php  echo $nyap;  ?></font>
					</div>
				<div style="position: relative; left:-5%">	
								  <div style="position:relative; top: 50%"><p>EL PLAN ACTUAL ES: <font color="blue" > <?php echo $tienePlan ?> </font>  </p> </div>
					<P>Cambiar el por:  <select  name="plan" id="plan"> </P>
                <?php 
				 $consulta2="select * from plan";
				 $resultado2=mysql_query($consulta2);
				 $fila2=mysql_fetch_assoc($resultado2); ?>	

								
			   <option value="<?php echo $fila2['idPlan']  ?>" selected="selected" ><?php echo $fila2['plan'] ?></option> <?php
				while($fila2=mysql_fetch_assoc($resultado2)){ 
					$plan=$fila2['plan'];
				 	?>
					<option value="<?php echo $fila2['idPlan']  ?>"><?php echo $plan ?></option>
			<?php } ?>
			</div>
			<br/>
			<br/>
			<br/>
				<div style="position: relative; top:15%; left:15%" >	<span><input type="submit" value="CAMBIAR DE PLAN" style="background-color:#009990;border-radius: 30px; font-family: Arial,Verdana,Helvetica,sans-serif ; font-weight:bold; font-size:20px" /></span><input onClick="location.href = 'cambiarPlanBono.php'"  type="button" value="volver" name="volver" style="background-color:#009990;border-radius: 30px; font-family: Arial,Verdana,Helvetica,sans-serif ; font-weight:bold; font-size:20px" >
                <input onClick="location.href = 'ingresar.php'"  type="button" value="volver al inicio" name="inicio" style="background-color:#009990;border-radius: 30px; font-family: Arial,Verdana,Helvetica,sans-serif ; font-weight:bold; font-size:20px" > 				</div>
			</form>	
				<?php
				
	}
 else {
       $url='ingresar.php';
	   redirigir($url);
} 
 
 
 ?>
 </body>
 </html>