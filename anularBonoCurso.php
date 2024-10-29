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
		<script language='javascript' src='validar/validarBono.js'>
		</script>
		<style type="text/css">
			fieldset{
					background:#25b88A;
				}
      </style>		
	</head>


	<body >
		<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
 	   		$idusu = $_SESSION['idUsuario'];
  		 		if($valor == 0){
		 ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span style="position: relative; right:-50px "><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </span>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; background-color:#D2F525; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px"><B style="font-size:18px; color:#003300; position:relative; left:-100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CANCELAR BONO</B></legend>	  
					<div > 
						
					
									
									<form action="bonoAnuladoCurso.php?valor=0" method="POST" enctype="multipart/form-data" id="bonus" name="bonus"  target="_blank" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;"># BONO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bono" id='bono' size="8"  style="border:groove; text-align:center"><BR/>  
												 <div style="margin-left:18%">	<input  type="submit" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'bonoCurso.php?valor=0' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>
						<?php
				}
					else{
			
?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:750px; height:100px; position:relative; left:-250px" /> </div> 								<span style="position: relative; right:-50px" ><p style="color:#FF0000"><span><?php echo $_SESSION["usuario"] ?></span><div style="position:relative; top:-36px; right:-110px" >&nbsp;&nbsp; &nbsp;<a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></span></p></a>  </spam>	
						<div style="position:relative; left:1050px; top:-120px; width:100px; heigh:100px; right:150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  <legend align="center" style="font-size:24px; color:#003300;"><p style="font-size:28px; color:#003300; position:relative; left:-10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CANCELAR BONO</p></legend>	  
					<div > 
						
					
									
									<form action="bonoAnuladoCurso.php?valor=1" method="POST" enctype="multipart/form-data" id="bonus" name="bonus"  target="_blank">	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;"># BONO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bono" id='bono' size="8"  style="border:groove; text-align:center"><BR/>  
												 <div style="margin-left:18%">	<input onClick="validarBonoAnulado(this.form)" type="button" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'servicioEsterilizacion.php?valor=0' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
										</form><br />
									<div style=" position:relative; left:400px; top:50px; font-size:24px">	
											
																		
									   </div>
											
									   </div>			
			<?php	}				

			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>
