<?php
 session_start();
 require_once ("funciones.php"); 
 $db = conectar_admin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>INGRESAR</title>

		<LINK REL="stylesheet" href="css/inicio.css" TYPE="text/css">

		<meta name="description" content="FOLP">
		
		<meta name="Keywords" content="Facultad de odontologia,La Plata, Argentina">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		
		<meta http-equiv="refresh" content="-1;URL=">
		
		<meta http-equiv="cache-control" content="no-cache">

	</head>


	<body >
	<div id="marco">
	   <?php if (!isset($_SESSION['pass'])){ 
	   		$idusu = $_SESSION['idUsuario'];
	   		//$usu=1;
			$producto=1;
			$usuario=$_SESSION['usuario'];
			$sql2="SELECT * FROM usuarioTienePerfil WHERE idusuario='$idusu'";
			$resul2=mysql_query($sql2);
			$privilegio=$_SESSION['privilegio'];
	   		
	   
	   ?>
	   
			 <div> <img src="imagenes/banner.jpg" style="width:850px; height:100px; position:relative; left:-200px;" /> </div>
						<div style=" position:relative; left:950px; top:-110px; width:100px; right:-150px"><img src="imagenes/UNLP_Logo.jpg" alt="logo unlp" /> </div>
				         <div style="position:relative; left:200px; right:-550px; top:-200px" ><fieldset style=" width:600px; heigh:200px; border-top-width: 10px;  border-right-width: 1em;  border-bottom-width: thick;  border-left-width: thin; color:#00CC33">
						  <legend align="center" style="font-size:30px; color:#006600">OPCIONES</legend>	  
					<div >
						<br />
						<div >
							<a href="paciente.php?valor=0"target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Atencion al Pacientes</p></a>
							
						</div>
						<div >
							<a href="servicioEsterilizacion.php?valor=0" target="_blank" rel="noopener"><p style="font-size:25px; color:#003300">Bono de Esterilización</p></a>
						</div>
						<div >
							<a href="bonoCurso.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono Curso</p></a>
							
						</div>
						<div >
							<a href="bonoCursorto.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono Curso de Ortodoncia</p></a>
							
						</div>
						<div >
							<a href="bonoQuirofano.php?valor=0" target="_blank"><p style="font-size:25px; color:#003300">Bono Uso de Quirofano</p></a>
							
						</div>							
						<div >
							<a href="cambiarBonoAsignatura.php"><p style="font-size:25px; color:#003300">Cambiar asignatura bono</p></a>
							
						</div>
						<div >
							<a href="cambiarPlanBono.php"><p style="font-size:25px; color:#003300">Cambiar plan al bono</p></a>
							
						</div>						
						<div >
							<a href="altaComplejidad.php?valor=0"><p style="font-size:25px; color:#003300">IMPRIMIR POR MATERIA</p></a>
						</div>
						<div >
							<a href="reimprimirBono.php?valor=0"><p style="font-size:25px; color:#003300">Reimprimir Bono</p></a>
						</div>	
						<div >
							<a href="anularBono.php?valor=0"><p style="font-size:25px; color:#003300">Anular Bono</p></a>
						</div>		
						<?php
						if($privilegio=1){
											
						 ?>										
						<div >
							<a href="anularBono.php?valor=1"><p style="font-size:25px; color:#003300">Reimprimir Bono cancelado</p></a>
						</div>
 						<div >
							<a href="anularBonoAnteriorAlAumento.php?valor=1"><p style="font-size:25px; color:#003300">Reimprimir Bono cancelado Anterior al aumento</p></a>
						</div>                       
						<?php 
						}
						?>	
						<div>	
							<a href="consultar.php?valor=0"><p style="font-size:25px; color:#003300">Consultas</p></a>
							
					   </div>
					   	<div>	
							<a href="consultarSumar.php?valor=0"><p style="font-size:25px; color:#003300">Consultas si tiene sumar</p></a>
							
					   </div>
	   <?php if($privilegio=1){ ?>			   
						<div>	
							<a href="backupBaseDeDatos.php?valor=0"><p style="font-size:25px; color:#003300">backup de la base de datos</p></a>
							
					   </div>
					   <a href="agregarPacienteAsumar.php?valor=0&parrafo=''"><p style="font-size:25px; color:#003300">Agregar sumar A un paciente</p></a> 
							
				    <?php		
					   } ?>
					   <br/>					   
						<div>	
							<a href="cerrarsesion.php" style="font-size:25px">salir</a>
							
					   </div>
					   <br />		

					</div>
			</fieldset>		
			<spam><p style="color:#FF0000"><spam><?php echo $_SESSION["usuario"] ?></spam><div style="position:relative; top:-36px; right:-110px" > <a href="cerrarsesion.php"><p style="color:#0000CC">[ CERRAR SESION ]</p></spam></p></a>  </spam>
	</div>		
			<?php 
			
			
			}		
			else {
			      $url='loguearUsuario.php?valor=0';
				  redirigir($url);
			} ?>
						
</body>

</html>