<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?php 

	require 'funciones.php';

	

?>



<html>

	<head>

		<title>INICIAR SESSION</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">		

		<meta name="description" content="Facultad de Odontologia">
		
		<meta name="Robots" content="all">
		
		<meta name="Keywords" content="Facultad de odontologia La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">
		<script type="text/javascript" src="validar/login.js"></script>

	</head>


	<body background="imagenes/fondo.jpg">
		
			<div id="marco" > <?php  
				$valor = $_GET['valor'];	
				if ($valor == 0) {			     ?>  
				 		<div style="position:relative; width:750px; "> <img src="imagenes/banner.jpg" style="width:850px; height:70px; left:-120px" /> </div>
						<div style=" position:relative; left:999px; top:-210px; width:100px; right:-100"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" width="199" height="190" /></div>
						<div style=" position:relative; left:250px; right:150px; top:-120px" >
						<fieldset style=" width:600px; top:-100px; heigh:400px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33"> <legend align="center">INGRESE USUARIO Y CLAVE </legend><p style="color:#FF0000" > <?php echo "fallo en el logueo"; ?><p><br /><br />
										<form action="log.php" method="post" enctype="multipart/form-data" name="form" id="form" >
												<div >  
													<p style="size:28px; color:#003300">Usuario:<input type= "text" name="username" id="username" maxlength="15" size="29" /><br /></p>
																			  
													<p style="size:28px; color:#003300">Clave de acceso:<input type= "password" name= "clave" id= "clave" maxlength="10" ><br /></p>
												</div>
												<div style="margin-left:18%">	<input onClick="validar_acceso(this.form)" type="button" value="Ingresar" name="Ingresar" style="font-size:20px;height:40px; background-color:#009900"></div>
													
													
											  
										</form> <br /><br />
						</fieldset>
				<?php      }
				 else {?>
				 		<div> <img src="imagenes/banner.jpg" style="width:850px; height:100px; position:relative; left:-200px" /> </div>
						<div style=" position:relative; left:999px; top:-110px; width:100px; right:100px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
				         <div style=" position:relative; left:250px; right:250px; top:-120px" ><fieldset style=" width:600px; heigh:800px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33"> <legend align="center">INGRESE USUARIO Y CLAVE</legend><br /><br />
										<form action="log.php" method="post" enctype="multipart/form-data" name="form" id="form" >
												<div >  
													<p style="size:28px; color:#003300">Usuario:<input type= "text" name="username" id="username" maxlength="15" size="29" /><br /></p>
																			  
													<p style="size:28px; color:#003300">Clave de acceso:<input type= "password" name= "clave" id= "clave" maxlength="10" ><br /></p>
												</div>
												<div style="margin-left:18%">	<input onClick="validar_acceso(this.form)" type="button" value="Ingresar" name="Ingresar"  style="font-size:20px;height:40px; background-color:#009900" ></div>
													
													<input type="hidden" value="Ingresar" name="ti">
											  
										</form> 
									<br /><br />
						</fieldset>				
					<?php } ?><br/>
					</div>
						<div style=" position:relative; left:400px; top:-100px">	
								<a href="cerrarsesion.php" style="font-size:24px">Atras</a>
					   </div>
			</div >
						
		</div>		

	</body>
</html>