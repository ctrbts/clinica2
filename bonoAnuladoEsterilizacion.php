<?php
require_once ("funciones.php");
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
		<title>Reimpresion de bonos Cancelados</title>
		<style type="text/css">
			
			a:link {
			color: #FF0000;
			text-decoration: none;
			}
			a:visited {
			text-decoration: none;
			color: #FF0000;
			}
			a:hover {
			text-decoration: none;
			color: #FF0000;
			}
			a:active {
			text-decoration: none;
			color: #FF0000;
			}
			fieldset{
					background:#15b88F;
				}
				
      </style>
	</head>

<body link="#FF0000" vlink="#FF0000" alink="#FF00FF">

<?php
  session_start(); 
  if (!isset($_SESSION['pass'])){  
		 $bono=$_POST['bono'];
		 $db = conectar_admin();
				$consu="UPDATE `bonoesterilizacion` SET `cancelado`= 1 WHERE `numeroBono` = $bono";	
				$sql2=mysql_query($consu);	
		  if($valor=0){
		   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1050px; height:150px; position:relative; left:-200px" /> </div>
			 <span><p style="color:#FF0000"><spam position:relative; right:-20px><?php echo $_SESSION["usuario"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</spam><div style="position:relative; top:-36px; right:-80px" > <a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</spam></p></a>  </spam>	
			<div style="position:relative; left:1050px; top:-80px; width:100px; heigh:100px; right:100px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
			 <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; background-color:#D2F525; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  
					<div > 
						
		  <?php
			$consul="select * from bonoEsterilizacion where numeroBono=$bono";
			$resultado=mysql_query($consul);
			$fila=mysql_fetch_assoc($resultado);
			$cancelado=$fila['cancelado'];
		  
		  if ($cancelado = 1){
				$dni=$fila['dni'];
		  		$consupersona="select * from persona where dni = $dni";
				$resulsql=mysql_query($consupersona);
				$filapersona=mysql_fetch_assoc($resulsql);
				$nyap=$filapersona['nombreYapellido'];

		   echo 'El BONO #: '; echo $fila['numeroBono']; 

		  ?> <p style=" font-size:30px; color:#FF0000" > <?php   
		  		echo 'Nombre y apellido: ';  echo   $nyap; ?>
				<br/>
				<?php
		   		echo 'D.N.I:'; echo $fila['dni']; ?>
				<br/>
				<?php
		   		echo 'a sido cancelado';
		     ?></p><?php
		  }
		  else {
		    echo 'El BONO #: '; echo $fila['numeroBono']; 
		  
			?><br/> <?php
			echo 'No se a cancelado';
		
		  }
		?> </fieldset >
			<div style="position:relative; left:-200px; top:10px"><a href="ingresar.php?valor=0">Volver </a>
	 
			</div>	
		 <?php  
		 desconectar();
		 }
		 else{ ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:1050px; height:150px; position:relative; left:-200px" /> </div>
			 <span><p style="color:#FF0000"><span position:relative; right:-20px><?php echo $_SESSION["usuario"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</spam><div style="position:relative; top:-36px; right:-80px" > <a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</spam></p></a>  </spam>	
			<div style="position:relative; left:1050px; top:-80px; width:100px; heigh:100px; right:100px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /></div>
			 <div style="position:relative; left:30px; right:30px; top:-220px; " ><fieldset style=" width:950px; background-color:#D2F525; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33;">
						  
					<div > 
						
		  <?php
		   $bono=$_POST['bono'];
			$consul="select * from bonoesterilizacion where numeroBono=$bono";
			$resultado=mysql_query($consul);
			$fila=mysql_fetch_assoc($resultado);
			$cancelado=$fila['cancelado'];
		 

		  if ($cancelado = 1){
			  
				$dni=$fila['dni'];
      			$consupersona="select * from persona where documento = $dni";
				$resulsql=mysql_query($consupersona);
				$filapersona=mysql_fetch_assoc($resulsql);
				$nyap=$filapersona['nombreyapellido'];
			  
		  		?><p style="font-size:18px; color:#000099"> <?php echo 'Nombre y apellido: ';  echo $nyap; ?>
				<br/>
				
		   		<?php echo 'D.N.I:    '; echo $fila['dni']; ?>
				<br/>
				<?php
		  
					   echo 'El BONO #: '; echo $fila['numeroBono']; 

		  ?></p> <p style=" font-size:30px; color:#FF0000" > <?php   
		   
		   		echo 'a sido cancelado';
				
				//Aca tendria que poner la reimpresion
				 ?>		<div style="position: relative; left:12%"><p style="font-size:18px; color:#1383F3; position:relative; left:-100px;">Clickee en Reimprimir bono para poder imprimir el bono cancelado</p></div>									
						<div >
							<a href="reimprimirbonoEsterilizacionanuladoPdf.php?bono=<?php echo $bono ?>"><p style="font-size:25px; color:#003300">Reimprimir Bono</p></a>
						</div>
						<?php 
				
		     ?></p><?php
		  }
		  else {
		    echo 'El BONO #: '; echo $fila['numeroBono']; 
		  
			?><br/> <?php
			echo 'No se a cancelado';
		
		  }
		?> </fieldset >
			<div style="position:relative; left:-200px; top:10px"><a href="servicioEsterilizacion.php?valor=0">Volver </a>
	 
			</div>	
		 <?php  
		 desconectar();		 
		 
		  } 
	}	  
 else{
		desconectar();
		$url='loguearUsuario.php?valor=0';
		redirigir($url);
	}	
?>
</body>
</html>