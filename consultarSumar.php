<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
 $valor=$_GET['valor'];

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
	     	//if($valor == 0){	 
	   ?>
	   						
							<?php	
					$sqldni="select * from paciente order by dni asc";	
					$resultadni=mysql_query($sqldni);	
					if ( $valor == 0 ) {  
										
										
										?>
										 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div>
										<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
										 <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
										  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
									<div> 
									<form action="calcularFecha.php" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
											<select  name="dni"> 
													<?php 
														$fila2=mysql_fetch_assoc($resultadni); ?>
																<option value="<?php echo $fila2['dni'];  ?>" selected="selected" ><?php echo $fila2['dni'] ?></option>
															<?php	while ($fila2=mysql_fetch_assoc($resultadni)){    ?>		  
																		 <option value="<?php echo $fila2['dni'];  ?>" ><?php echo $fila2['dni'] ?></option> 
															<?php	} ?> </div>   
									</select>
											<!--	<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="text" name="dni" id="dni" style="border:groove"></p></div><br /> -->
																				 <div style="margin-left:18%">	<input type="submit"  value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									
						<?php
				//}
		
				}
				else{
				 ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div>
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="left:100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PACIENTE</B></legend>	  
						  <b style="color:#FF0000; font-size:36px">NO HAY PACIENTE CON DICHO NUMERO DE DOCUMENTO</b>
					<div >  
						
													
									<form action="calcularFecha.php" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">DNI DEL PACIENTE: &nbsp;&nbsp;<input  type="text" name="dni" id="dni" style="border:groove"></p></div><br />
																				 <div style="margin-left:18%">	<input type="submit" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>
				
				<?php }			?>
					</fieldset>		
			<?php }		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>
