<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor=$_GET['valor'];
$parrafo=$_GET['parrafo'];
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
	</head>


	<body >
		<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
					/*if ($valor!=0){	   
							$dni=$_GET['dni'];		
				}*/
						$idusu = $_SESSION['idUsuario'];
	 		
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<spam position: relative; right:-50px ><p style="color:#FF0000"><spam><?php echo $_SESSION["usuario"] ?></spam><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></spam></p></a>  </spam>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;AGREGAR PACIENTE AL PLAN SUMAR</B></legend>	  
					<div > 
						
							<?php	
					if ( $valor == 0 ) {
									echo $parrafo;
					 ?>
									
									<form action="agregarSumar.php?codi=0" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="text" maxlength="8" name="dni" id='dni' size="8"  style="border:groove; text-align:center"><BR/>  
																				 <div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="AGREGAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>
						<?php
						}
						else { 
								$consudatos="select * from paciente where dni='".$_GET['dni']."'";
								$resuDatos=mysql_query($consudatos) or die(mysql_error());
								$datosCliente=mysql_fetch_assoc($resuDatos);
								$consultaUltima="select * from historiaClinica where dni= '".$_GET['dni']."' order by idHistoriaClinica desc limit 1";
								$resuUltimo=mysql_query($consultaUltima) or die(mysql_error());
								$filaUltimo=mysql_fetch_assoc($resuUltimo);

								$consultaCantidad="select * from historiaClinica where dni= '".$_GET['dni']."'";
								$resuCantidad=mysql_query($consultaCantidad) or die(mysql_error());

						       	 		
									  ?>
				
									   		
							<?php } ?>
									</div>
														
						</div><?php 
							
							
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>