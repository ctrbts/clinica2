<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>listado</title>

			<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="Facultadad de odontologia - Ver notas / noticias anteriores">
		
		<meta name="Keywords" content="FOLP,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		<script language='javascript' src='validar/validarAtencionPaciente.js'>
		</script>
			<style type="text/css">
			fieldset{
					background:#15b88F;
				}
		</style>	
	</head>

	<body>

		<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
      	        
	   			$dni=$_SESSION['dni'];		
			   	$idusu = $_SESSION['idUsuario'];
				$valor=$_GET['valor'];
				
	 			if($valor == 0){  // paciente ingresa por primera ves
				
				?> 
				<div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span type="position: relative; right:-50px" ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				        <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						<legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#000000"> PACIENTE DEL CURSO</B></legend>	  
				<div > 
				<?php	
								$consudatos="select * from pacientecurso where dni =$dni";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosPaciente=mysql_fetch_assoc($resuDatos);
								$dni=$datosPaciente['dni'];
								$nyap=$datosPaciente['nyap'];
								?>
								<form action="verinfopacientecurso.php?valor=3" method="POST" enctype="multipart/form-data" target="_blank">	
								<div>  <div><b style="color:#000000"> DNI DEL PACIENTE:</b>&nbsp;&nbsp;<input type="text"  value="<?php echo $dni ?>" name="dni" id="dni"> 						
								</div></div>
								<div><b style="color:#000000"> Nombre y Apellido: </b>&nbsp;&nbsp;<input type="text" name="nyap" id="" maxlength="300" size="62" value="<?php echo $nyap?>"></div>
							
							<?php  //listar la curso y poner en que curso esta
												$consultacurso="SELECT * FROM curso";
												$sqlcurso=mysql_query($consultacurso)or die(mysql_error());
												$fila4=mysql_fetch_assoc($sqlcurso); 
												$curso=$fila4['curso'];			
												//obtener el curso en el que esta 
												$consulta="select * from bonocurso where dni = $dni order by idBono Desc limit 1 ";
												$sqlcur=mysql_query($consulta);
												$fila3=mysql_fetch_assoc($sqlcur);
												$cursoAcual=$fila3['curso'];
												?>	
														
											    <b style="color:#000000"> CURSO:</b><select  name="curso" id="curso"> 	
												<option value="<?php echo $fila4['idCurso']  ?>" selected="selected" ><?php echo $fila4['curso'] ?></option>
																				<?php	while ($fila4=mysql_fetch_assoc($sqlcurso)){    ?>		  
																							<option value="<?php echo $fila4['idCurso'];  ?>" ><?php echo $fila4['curso']; ?></option>
																				<?php	} ?>
												<b style="color:#000000"> El curso actual es:&nbsp;<b style="color:#AD0B0B" ><?php echo $cursoActual; ?></b></b>
												
										</form>			
											<input type="submit" value="GUARDAR" name="GUARDAR" >&nbsp;&nbsp;<input onClick="location.href = 'bonoPacienteCurso.php?valor=0' " type="button" value="VOLVER atras" name="CANCELAR" ><br />
										   	
																		<?php 
																	
																		//desconectamos la BD
																		desconectar();			
				}				
			  /* if($valor == 1){ ?>
					  <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span type="position: relative; right:-50px" ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"]; ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#000000"> PACIENTE DEL CURSO</B></legend>	  
					 
						
							<?php	
					
								$consudatos="select * from pacientecurso where dni =$dni";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosPaciente=mysql_fetch_assoc($resuDatos);
								$dni=$datosPaciente['dni'];
								$nyap=$datosPaciente['nyap'];
								?>
								<form action="verinfopacientecurso.php?valor=3" method="POST" enctype="multipart/form-data" target="_blank">	
								  <div><b style="color:#000000"> DNI DEL PACIENTE:</b>&nbsp;&nbsp;<input type="text"  value="<?php echo $dni; ?>" name="dni" id="dni"> 						
							  </div>
							<div><b style="color:#000000"> Nombre y Apellido: </b>&nbsp;&nbsp;<input type="text" name="nyap" id="" maxlength="300" size="62" value="<?php echo $nyap; ?>"></div>
							
							<?php  //listar la especializacion y ver si quiere modificarlo 
												$consultacurso="SELECT * FROM curso";
												$sqlcurso=mysql_query($consultacurso)or die(mysql_error());
												$fila4=mysql_fetch_assoc($sqlcurso); 
												$curso=$fila4['curso'];			
												
												?>	
														
											    <b style="color:#000000"> CURSO:</b><select  name="curso" id="curso"> 	
												<option value="<?php echo $fila4['idCurso'];  ?>" selected="selected" ><?php echo $fila4['curso']; ?></option>
																				<?php	while ($fila4=mysql_fetch_assoc($sqlcurso)){    ?>		  
																								<option value="<?php echo $fila4['idCurso'];  ?>" ><?php echo $fila4['curso']; ?></option>
																		<?php	}

												$consulta="select * from bonocurso where dni = $dni order by idBono Desc limit 1 ";
												$sqlcur=mysql_query($consulta);
												$fila3=mysql_fetch_assoc($sqlcur);
												$cursoAcual=$fila3['curso'];

										//$valor=$_GET[valor];
										?>   
											</select><b style="color:#000000"> El curso actual es:&nbsp;<b style="color:#AD0B0B" ><?php echo $cursoAcual; ?></b></b>
											
											<?php  //}	?>
											<input type="submit" value="GUARDAR" name="GUARDAR" >&nbsp;&nbsp;<input onClick="location.href = 'bonoCurso.php?valor=0' " type="button" value="VOLVER" name="CANCELAR" ><br />
																																	
									   		<?php 
												//desconectamos la BD
												//desconectar();	?>		
									</form>
					<? }  */
				   if($valor == 3){    //aca iria la carga del bono y redireccionamiento al bono por primera ves
											$dni=$_POST["dni"];
											//echo $dni;
											$curso=$_POST['curso'];
											//echo $curso;
											$consulta="select * from pacienteCurso where dni = '$dni'" ;
											$result=mysql_query($consulta);
											$fila=mysql_fetch_assoc($result);
										
											$consultacurso="select * from curso where idCurso='$curso'";
											$resulconsulta=mysql_query($consultacurso);
											$idcurso=mysql_fetch_assoc($resulconsulta);
											$nomcurso=$idcurso['curso']; // obtengo el id del curso
											 
											$precio=$idcurso['valor'];
											//agrego el bono y luego lo tengo que recuperar
											date_default_timezone_set('America/Argentina/Buenos_Aires');
											$fecha=date('Y-m-d');
											$hora = date('H:i:s', gmdate('U')); 
											$consulBono="INSERT INTO bonocurso (dni, idCurso, valor,fecha, hora, cancelado) values ('$dni','$curso', '$precio', '$fecha', '$hora', 0)";
											$resul=mysql_query($consulBono);			
											$url="bonoCursoPdf.php?dni=$dni";
											redirigir($url);
						  }
		}	
	else {
			      $url="loguearUsuario.php?valor=0";
				  redirigir($url);
		} ?>
						
</body>
</html>