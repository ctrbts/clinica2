<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
					<fieldset style="width:auto; height:auto"><lengend STYLE=" color:#0000FF; font-family:Arial, Helvetica, sans-serif" ><b>LISTADO DE LOS BONOS A EMITIR PARA LA RENDICION </b></legend>	

									<form action="listarBonosParaRendicion.php" method="POST" enctype="multipart/form-data" id="carga" name="carga" >	
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO INICIO: &nbsp;&nbsp;<input  type="text" maxlength="8" name="bonoInicio" id='bonoInicio' size="8"  style="border:groove; text-align:center"><BR/>  
												<br />	<div style="size:auto"><p style="font-size:18px; color:#003300; position:relative; left:-100px;">BONO FIN: &nbsp;&nbsp;<input  type="text" maxlength="8" name="BonoFin" id='BonoFin' size="8"  style="border:groove; text-align:center"><BR/>  												
																				 <div style="margin-left:18%">	<input onClick="validarAltaPacientebuscar(this.form)" type="button" value="BUSCAR" name="BUSCAR" >&nbsp;&nbsp;<input onClick="location.href = 'ingresar.php' " type="button" value="CANCELAR" name="CANCELAR" ></div>		
																				 
										</form><br />
					</fieldset>					
</body>
</html>
